<?php

class Image {
  private $altText;
  private $src;

  function __construct($altText, $src){
    $this->altText = $altText;
    $this->src = $src;
  }

  public function getAltText() {
    return $this->altText;
  }

  public function getSrc() {
    return $this->src;
  }
}

?>