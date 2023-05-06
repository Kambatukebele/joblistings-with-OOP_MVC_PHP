<?php

  class Post_job extends Controller
  {
    public function index(){
      //You need to specify the folder of the view you want to load
      return $this->view("theme","post_job");  
    }
  }