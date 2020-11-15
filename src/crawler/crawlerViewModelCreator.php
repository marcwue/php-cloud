<?php
include 'viewModel/linkViewModel.php';
include 'viewModel/imageViewModel.php';
include 'viewModel/siteContentViewModel.php';

class CrawlerViewModelCreator {

  function create($linksAndImages){
    error_log("createViewModel start", 0);

    $extractedLinks = array();
    foreach($linksAndImages->getLinks() as $link){
      $extractedLinks[] = new LinkViewModel($link->getText(), $link->getHref());
    }

    $extractedImages = array();
    foreach($linksAndImages->getImages() as $image){
      $extractedImages[] = new ImageViewModel($image->getAltText(), $image->getSrc());
    }

    $siteContentViewModel = new SiteContentViewModel($extractedLinks, $extractedImages);
    error_log("siteContentViewModel=" . print_r($siteContentViewModel, true), 0);

    $siteContentViewModelEncoded = json_encode($siteContentViewModel);
    error_log("siteContentViewModelEncoded=" . print_r($siteContentViewModelEncoded, true), 0);
    return $siteContentViewModelEncoded;
  }

}

?>