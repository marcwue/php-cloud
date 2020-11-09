<?php

class SiteContentModel {

  private $website; // Todo
  private $links = array();
  private $images = array();

  function __construct($links, $images){
    $this->links = $links;
    $this->images = $images;
  }

  public function getLinks() {
    return $this->links;
  }

  public function getImages() {
    return $this->images;
  }
}

?>