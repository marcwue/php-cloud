<?php
header("Content-Type:application/json");

$website = $_REQUEST["website"];

if ($website !== "") {

  $html = file_get_contents($website);
  $htmlDom = new DOMDocument;

  //Parse the HTML of the page using DOMDocument::loadHTML
  @$htmlDom->loadHTML($html);

  $links = $htmlDom->getElementsByTagName('a');
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
    $extractedLinks[] = array(
       'text' => $linkText,
       'href' => $linkHref
    );
  }

  $images = $htmlDom->getElementsByTagName('img');
  $extractedImages = array();
  foreach($images as $image){
    $altText = $image->getAttribute('alt');
    $src = $image->getAttribute('src');

    if(strlen(trim($src)) == 0){
        continue;
    }
    $extractedImages[] = array(
        'altText' => $altText,
        'src' => $website . $src // Todo check src if it contains http already
    );
  }
}

$json_response = json_encode(array(
  'links' => $extractedLinks,
  'images' => $extractedImages)
);
echo $json_response;
?>
