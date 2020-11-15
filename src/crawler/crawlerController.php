<?php
include 'crawlerComponent.php';
include 'crawlerViewModelCreator.php';

class CrawlerController {

  function getSiteContent($website){
    $crawlerComponent = new CrawlerComponent();
    $crawlerViewModelCreator = new CrawlerViewModelCreator();
    $siteContent = $crawlerComponent->getSiteContent($website);
    return $crawlerViewModelCreator->create($siteContent);
  }

}

?>