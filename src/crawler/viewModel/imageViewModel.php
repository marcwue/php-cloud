<?php

class ImageViewModel {
  public $altText;
  public $src;

  function __construct($altText, $src){
    $this->altText = $altText;
    $this->src = $src;
  }
}

?>