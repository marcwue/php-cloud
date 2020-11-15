<?php
include 'crawlerComponent.php';
include 'crawlerViewModelCreator.php';

class CrawlerController {

  function getSiteContent($website){
    error_log("endpoint start", 0);
    $crawlerComponent = new CrawlerComponent();
    $crawlerViewModelCreator = new CrawlerViewModelCreator();
    error_log("getSiteContent", 0);
    $siteContent = $crawlerComponent->getSiteContent($website);
    error_log("createViewModel", 0);
    $viewModel = $crawlerViewModelCreator->create($siteContent);
    error_log("endpoint end", 0);
    return $viewModel;
  }

}

?>