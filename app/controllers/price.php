<?php

  class Price extends Controller
  {
    public function index(){
      //You need to specify the folder of the view you want to load
      return $this->view("theme","price");  
    }
  }