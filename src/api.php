<?php
include 'crawler/crawlerController.php';

error_log("api endpoint start", 0);
$controller = new CrawlerController();
$website = $_REQUEST["website"];
$http = "http";

error_log("parameter website=" . print_r($website, true), 0);
if ($website !== "" && substr($website, 0, strlen($http)) === $http) {
  $siteContentViewModel = $controller->getSiteContent($website);
} else {
  error_log("parameter website not correct, website=" . print_r($website, true), 0);
  echo "Enter a correct webiste starting with http://...";
}

header("Content-Type:application/json");
error_log("api endpoint end", 0);
echo $siteContentViewModel;
?>
