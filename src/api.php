<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Content-Type: application/json; charset=UTF-8");

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

error_log("viewModel=" . print_r($siteContentViewModel, true), 0);
error_log("api endpoint end", 0);
echo $siteContentViewModel;
?>
