<?php
namespace ServerInfo;

class SystemInfo
{
  public function __construct()
  {

  }
  public function getSystemInfo()
  {
    $systemInfo = array();
    $systemInfo["system"] = [
      "cpu" => $this->getCpuInfo(),
      "memory" => $this->getMemoryInfo(),
      "storage" => $this->getStorageInfo()
    ];

    return $systemInfo;
  }

  public function getCpuInfo()
  {
    $cpuInfo = array();
    $cpuInfo["model"] = $this->getCPUModel();
    $cpuInfo["cores"] = $this->getNumberOfCores();
    $cpuInfo["usage"] = $this->getCpuUsage();

    return $cpuInfo;
  }

  private function getCPUModel()
  {
    // Your implementation to get CPU model
    return trim(shell_exec("cat /proc/cpuinfo | grep 'model name' | uniq | cut -d ':' -f2"));
  }

  private function getNumberOfCores()
  {
    // Your implementation to get the number of CPU cores
    return (int) trim(shell_exec("nproc --all"));
  }

  private function getCpuUsage()
  {
    // Your implementation to get CPU usage statistics
    $percent = (float) shell_exec("top -bn 1 | awk '/Cpu\(s\):/ {print $2}'");
    $raw = [
      "user" => (float) shell_exec("top -bn 1 | awk '/Cpu\(s\):/ {print $2}'"),
      "system" => (float) shell_exec("top -bn 1 | awk '/Cpu\(s\):/ {print $4}'"),
      "idle" => (float) shell_exec("top -bn 1 | awk '/Cpu\(s\):/ {print $8}'")
    ];

    return [
      "percent" => $percent,
      "raw" => $raw
    ];
  }

  // Add methods for memory, storage, etc. as needed
  public function getMemoryInfo()
  {
    $memoryInfo = array();
    $memoryInfo["total"] = $this->getTotalMemory();
    $memoryInfo["free"] = $this->getFreeMemory();
    $memoryInfo["used"] = $this->getUsedMemory();
    $memoryInfo["usage"] = ["percent" => $this->getMemoryUsage()];

    return $memoryInfo;
  }



  public function getStorageInfo()
  {
    $storageInfo = array();
    $storageInfo["total"] = $this->getTotalStorage();
    $storageInfo["used"] = $this->getUsedStorage();
    $storageInfo["free"] = $this->getFreeStorage();
    $storageInfo["usage"] = ["percent" => $this->getStorageUsage()];

    return $storageInfo;
  }


  private function getTotalMemory()
  {
    // Your implementation to get total memory
    return trim(shell_exec("free -b | awk '/Mem:/ {print $2}'"));
  }

  private function getFreeMemory()
  {
    // Your implementation to get free memory
    return trim(shell_exec("free -b | awk '/Mem:/ {print $4}'"));
  }

  private function getUsedMemory()
  {
    // Your implementation to get used memory
    return trim(shell_exec("free -b | awk '/Mem:/ {print $3}'"));
  }
  private function getTotalStorage()
  {
    return trim(shell_exec("df -h / | awk 'NR==2 {print $2}'"));
  }

  private function getUsedStorage()
  {
    return trim(shell_exec("df -h / | awk 'NR==2 {print $3}'"));
  }

  private function getFreeStorage()
  {
    return trim(shell_exec("df -h / | awk 'NR==2 {print $4}'"));
  }

  private function getStorageUsage()
  {
    $usagePercent = trim(shell_exec("df -h / | awk 'NR==2 {print $5}'"));
    return ["percent" => floatval($usagePercent)];
  }
  private function getMemoryUsage()
  {
    return (float)$this->getUsedStorage() /  (float)$this->getTotalStorage();
  }
}
