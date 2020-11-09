<?php
include 'viewModel/linkViewModel.php';
include 'viewModel/imageViewModel.php';
include 'viewModel/siteContentViewModel.php';

class CrawlerViewModelCreator {

  function create($linksAndImages){
    $extractedLinks = array();
    foreach($linksAndImages->getLinks() as $link){
      $extractedLinks[] = new LinkViewModel($link->getText(), $link->getHref());
    }

    $extractedImages = array();
    foreach($linksAndImages->getImages() as $image){
      $extractedImages[] = new ImageViewModel($image->getAltText(), $image->getSrc());
    }

    $siteContentViewModel = new SiteContentViewModel($extractedLinks, $extractedImages);
    return json_encode($siteContentViewModel);
  }

}

?>