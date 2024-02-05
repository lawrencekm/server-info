<?php
use PHPUnit\Framework\TestCase;
use ServerInfo\ServiceInfo;

class ServiceInfoTest extends TestCase
{

  public function testGetNginxStatus()
  {
    $serviceInfo = new ServiceInfo();
    $nginxStatus = $serviceInfo->checkServiceStatus('nginx');
    $this->assertIsArray($nginxStatus);
    $this->assertArrayHasKey('status', $nginxStatus);
    $this->assertArrayHasKey('version', $nginxStatus);
  }

  public function testGetApacheStatus()
  {
    $serviceInfo = new ServiceInfo();
    $apacheStatus = $serviceInfo->checkServiceStatus('apache');
    $this->assertIsArray($apacheStatus);
    $this->assertArrayHasKey('status', $apacheStatus);
    $this->assertArrayHasKey('version', $apacheStatus);
  }

  public function testGetNodejsStatus()
  {
    $serviceInfo = new ServiceInfo();
    $nodejsStatus = $serviceInfo->checkServiceStatus('nodejs');
    $this->assertIsArray($nodejsStatus);
    $this->assertArrayHasKey('status', $nodejsStatus);
    $this->assertArrayHasKey('version', $nodejsStatus);
  }

  public function testGetPhpStatus()
  {
    $serviceInfo = new ServiceInfo();
    $phpStatus = $serviceInfo->checkServiceStatus('php');
    $this->assertIsArray($phpStatus);
    $this->assertArrayHasKey('status', $phpStatus);
    $this->assertArrayHasKey('version', $phpStatus);
  }

}