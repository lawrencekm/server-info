<?php
require __DIR__ . '/../vendor/autoload.php';

$serviceInfo = new \ServerInfo\ServiceInfo();
$systemInfo = new \ServerInfo\SystemInfo();

$serverInfo = json_encode([$systemInfo->getSystemInfo(), $serviceInfo->getServiceInfo()]);

// json string
echo "JSON STRING\n\n".$serverInfo ."\n\nOR\n\nRender a Table\n";

// Or render a table on your view
$data = json_decode($serverInfo, true);

echo '<table border="1">';
echo '<tr><th>Item</th><th>Total</th><th>Used</th><th>Usage</th></tr>';

foreach ($data as $item) {
    if (isset($item['system'])) {
        $system = $item['system'];
        echo '<tr>';
        echo '<td>CPU Model</td><td colspan="3">' . $system['cpu']['model'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Memory</td>';
        echo '<td>' . $system['cpu']['total'] . '</td>';
        echo '<td>' . $system['cpu']['used'] . '</td>';
        echo '<td>' . $system['cpu']['usage']['percent'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Memory</td>';
        echo '<td>' . $system['memory']['total'] . '</td>';
        echo '<td>' . $system['memory']['used'] . '</td>';
        echo '<td>' . $system['memory']['usage']['percent'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Storage</td>';
        echo '<td>' . $system['storage']['total'] . '</td>';
        echo '<td>' . $system['storage']['used'] . '</td>';
        echo '<td>' . $system['storage']['usage']['percent']['percent'] . '</td>';
        echo '</tr>';
    }
}

echo '</table>';

echo '<br>';

echo '<table border="1">';
echo '<tr><th>Service</th><th>Version</th><th>Status</th></tr>';

foreach ($data as $item) {
    if (isset($item['services'])) {
        $services = $item['services'];
        foreach ($services as $service => $details) {
            echo '<tr>';
            echo '<td>' . $service . '</td>';
            echo '<td>' . $details['version'] . '</td>';
            echo '<td>' . $details['status'] . '</td>';
            echo '</tr>';
        }
    }
}

echo '</table>';
echo '<br>';