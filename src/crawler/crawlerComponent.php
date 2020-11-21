<?php
include 'model/link.php';
include 'model/image.php';
include 'model/siteContentModel.php';

class CrawlerComponent {

  function getSiteContent($website){
    error_log("getSiteContent start", 0);
    $html = file_get_contents($website);
    $htmlDom = new DOMDocument;
    @$htmlDom->loadHTML($html);

    $links = $htmlDom->getElementsByTagName('a');
    $extractedLinks = array();
    foreach($links as $link){
      $linkText = $link->nodeValue;
      $linkHref = $link->getAttribute('href');

      error_log(print_r($linkText . ' - ' . $linkHref, true), 0);
      if(strlen(trim($linkHref)) == 0){
         continue;
      }
      if($linkHref[0] == '#'){
         continue;
      }
      $extractedLinks[] = new Link($linkText, $linkHref);
    }

    $images = $htmlDom->getElementsByTagName('img');
    $extractedImages = array();
    foreach($images as $image){
      $altText = $image->getAttribute('alt');
      $src = $image->getAttribute('src');

      error_log(print_r($altText . ' - ' . $src, true), 0);
      if(strlen(trim($src)) == 0){
          continue;
      }
      $extractedImages[] = new Image($altText, $src);
    }
    error_log("getSiteContent end", 0);
    return new SiteContentModel($website, $extractedLinks, $extractedImages);
  }
}

?>