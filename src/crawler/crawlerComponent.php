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
    error_log("links=" . print_r($links, true), 0);
    $extractedLinks = array();
    foreach($links as $link){
      $linkText = $link->nodeValue;
      $linkHref = $link->getAttribute('href');

      if(strlen(trim($linkHref)) == 0){
         continue;
      }
      if($linkHref[0] == '#'){
         continue;
      }
      $extractedLinks[] = new Link($linkText, $linkHref);
    }

    $images = $htmlDom->getElementsByTagName('img');
    error_log("images=" . print_r($images, true), 0);
    $extractedImages = array();
    foreach($images as $image){
      $altText = $image->getAttribute('alt');
      $src = $image->getAttribute('src');

      if(strlen(trim($src)) == 0){
          continue;
      }
      $extractedImages[] = new Image($altText, $website . $src);
    }
    error_log("getSiteContent end", 0);
    return new SiteContentModel($extractedLinks, $extractedImages);
  }
}

?>