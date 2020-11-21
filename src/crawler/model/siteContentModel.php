<?php

class SiteContentModel {

  private $website;
  private $links = array();
  private $images = array();

  function __construct($website, $links, $images){
    $this->website = $website;
    $this->links = $links;
    $this->images = $images;
  }

  public function getWebsite() {
    return $this->website;
  }

  public function getLinks() {
    return $this->links;
  }

  public function getImages() {
    return $this->images;
  }
}

?>