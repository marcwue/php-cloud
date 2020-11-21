<?php
include 'viewModel/linkViewModel.php';
include 'viewModel/imageViewModel.php';
include 'viewModel/siteContentViewModel.php';

class CrawlerViewModelCreator {

  function create($linksAndImages){
    error_log("createViewModel start", 0);

    $extractedLinks = array();
    foreach($linksAndImages->getLinks() as $link){
      $extractedLinks[] = new LinkViewModel(utf8_encode($link->getText()), $link->getHref());
    }

    $extractedImages = array();
    foreach($linksAndImages->getImages() as $image){
      if ($image->getSrc() !== "" && substr($image->getSrc(), 0, strlen('http')) === 'http') {
        $src = $image->getSrc();
      } else {
        if ($image->getSrc() !== "" && substr($image->getSrc(), 0, strlen('/')) === '/') {
          $src = $linksAndImages->getWebsite() . $image->getSrc();
        } else {
          $src = $linksAndImages->getWebsite() . '/' . $image->getSrc();
        }
      }
      $extractedImages[] = new ImageViewModel(utf8_encode($image->getAltText()), $src);
    }

    $siteContentViewModel = new SiteContentViewModel($extractedLinks, $extractedImages);
    $siteContentViewModelEncoded = json_encode($siteContentViewModel);
    error_log("siteContentViewModelEncoded=" . print_r($siteContentViewModelEncoded, true), 0);
    return $siteContentViewModelEncoded;
  }

}

?>