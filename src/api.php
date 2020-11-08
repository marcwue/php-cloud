<?php
header("Content-Type:application/json");

$website = $_REQUEST["website"];

if ($website !== "") {

   $html = file_get_contents($website);
   $htmlDom = new DOMDocument;

   //Parse the HTML of the page using DOMDocument::loadHTML
   @$htmlDom->loadHTML($html);

   //Extract the links from the HTML.
   $links = $htmlDom->getElementsByTagName('a');

   $extractedLinks = array();
   $extractedImages = array();

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
}

$json_response = json_encode(array(
  'links' => $extractedLinks),
  'images' => $extractedImages);
echo $json_response;
?>
