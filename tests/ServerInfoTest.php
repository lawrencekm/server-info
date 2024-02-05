<?php
use PHPUnit\Framework\TestCase;
use ServerInfo\ServiceInfo;
use ServerInfo\SystemInfo;

class ServerInfoTest extends TestCase
{

  public function testServerInfo()
  {
    $serviceInfo = new ServiceInfo();
    $systemInfo = new SystemInfo();
    $this->assertIsArray($serviceInfo->getServiceInfo());
    $this->assertIsArray($systemInfo->getSystemInfo());

    $this->assertArrayHasKey('services', $serviceInfo->getServiceInfo());
    $this->assertArrayHasKey('system', $systemInfo->getSystemInfo());
  }

}