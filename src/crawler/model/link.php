<?php

class Link {
  private $text;
  private $href;

  function __construct($text, $href){
    $this->text = $text;
    $this->href = $href;
  }

  public function getText() {
    return $this->text;
  }

  public function getHref() {
    return $this->href;
  }
}

?>