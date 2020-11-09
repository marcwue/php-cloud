<?php
include 'crawlerComponent.php';
include 'crawlerViewModelCreator.php';

class CrawlerController {

  function getSiteContent($website){
    // should be done different
    $crawlerComponent = new CrawlerComponent();
    $crawlerViewModelCreator = new CrawlerViewModelCreator();
    $siteContent = $crawlerComponent->getSiteContent($website);
    return $crawlerViewModelCreator->create($siteContent);
  }

}

?>