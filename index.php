<?php
require __DIR__ . '/vendor/autoload.php';

class ServerInfo
{
    public $serverInfo;
    public $serviceInfo;
    public function __construct()
    {
        $this->serviceInfo = new \ServerInfo\ServiceInfo();
        $this->systemInfo = new \ServerInfo\SystemInfo();
    }
    public function getServerInformation()
    {
        return json_encode([$this->systemInfo->getSystemInfo(), $this->serviceInfo->getServiceInfo()]);
    }
}

//HOW TO USE
// initialize ServerInfo Class 
//$serverInfo =  new ServerInfo();
// getInformation in json form. see example to render a html table
//echo $serverInfo->getServerInformation();