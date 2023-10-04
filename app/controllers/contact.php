<?php

  class Contact extends Controller
  {
     public function index(){
      $data['page_title'] = "Contact | Job Listings";
      //You need to specify the folder of the view you want to load
      return $this->view("theme","contact", $data);  
    }
  }