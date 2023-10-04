<?php

  class _404 extends Controller
  {
    public function index(){
      $data['page_title'] = "404 | Page not Found";
      $this->view("theme","404", $data);  
    }
  }