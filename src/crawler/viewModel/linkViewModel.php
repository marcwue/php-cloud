<?php

class LinkViewModel {
  public $text;
  public $href;

  function __construct($text, $href){
    $this->text = $text;
    $this->href = $href;
  }
}

?>