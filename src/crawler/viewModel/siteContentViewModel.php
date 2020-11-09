<?php

class SiteContentViewModel {
  public $links = array();
  public $images = array();

  function __construct($links, $images){
    $this->links = $links;
    $this->images = $images;
  }
}

?>