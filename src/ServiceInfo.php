<?php
namespace ServerInfo;

class ServiceInfo
{
  //private $serviceFunctionName;
  public function __construct()
  {
//$this->serviceFunctionName = "";
  }
  public function getServiceInfo() {
    $serviceInfo = array();
    $serviceInfo["services"] = [
       "nginx"=> $this->getNginxStatus(),
       "apache"=>  $this->getApacheStatus(),
       "nodejs" => $this->getNodejsStatus(),
       "php" => $this->getPhpStatus()
    ];

    return $serviceInfo;
  }
  public function checkServiceStatus($service)
  {
    $serviceFunctionName = "get" . ucfirst($service) . "Status";
      return $this->$serviceFunctionName();
  }
  public function getNginxStatus()
  {
    $nginxStatus = array();
    $nginxStatus["status"] = "running";
    $nginxStatus["version"] = "8.34";

    return $nginxStatus;
  }
  public function getApacheStatus()
  {
    $apacheStatus = array();
    $apacheStatus["status"] = "running";
    $apacheStatus["version"] = "8.34";

    return $apacheStatus;
  }
  public function getNodejsStatus()
  {
    $nodejsStatus = array();
    $nodejsStatus["status"] = "running";
    $nodejsStatus["version"] = "8.34";

    return $nodejsStatus;
  }
  public function getPhpStatus()
  {
    $phpStatus = array();
    $phpStatus["status"] = "running";
    $phpStatus["version"] = "8.34";

    return $phpStatus;
  }

}