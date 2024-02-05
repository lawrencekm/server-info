<?php

use PHPUnit\Framework\TestCase;
use ServerInfo\SystemInfo;

class SystemInfoTest extends TestCase
{
  public function testGetCpuInfo()
  {
    $systemInfo = new SystemInfo();
    $cpuInfo = $systemInfo->getCpuInfo();

    $this->assertIsArray($cpuInfo);
    $this->assertArrayHasKey('model', $cpuInfo);
    $this->assertArrayHasKey('cores', $cpuInfo);
    $this->assertArrayHasKey('usage', $cpuInfo);
  }

  public function testGetMemoryInfo()
  {
    $systemInfo = new SystemInfo();
    $memoryInfo = $systemInfo->getMemoryInfo();

    $this->assertIsArray($memoryInfo);
    $this->assertArrayHasKey('total', $memoryInfo);
    $this->assertArrayHasKey('used', $memoryInfo);
    $this->assertArrayHasKey('free', $memoryInfo);
    $this->assertArrayHasKey('usage', $memoryInfo);
  }

  public function testGetStorageInfo()
  {
    $systemInfo = new SystemInfo();
    $storageInfo = $systemInfo->getStorageInfo();

    $this->assertIsArray($storageInfo);
    $this->assertArrayHasKey('total', $storageInfo);
    $this->assertArrayHasKey('used', $storageInfo);
    $this->assertArrayHasKey('free', $storageInfo);
    $this->assertArrayHasKey('usage', $storageInfo);
  }
}
