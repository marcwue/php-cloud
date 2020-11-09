<?php
include 'crawler/crawlerController.php';

$controller = new CrawlerController();
$website = $_REQUEST["website"];

if ($website !== "") {
  $siteContentViewModel = $controller->getSiteContent($website);
}

header("Content-Type:application/json");
echo $siteContentViewModel;
?>
