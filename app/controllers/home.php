<?php

class Home extends Controller
{
  public function index($id)
  {
    
    $listingModel = $this->model('Listings');
    $result = $listingModel->showSix();

    if (is_array($result) && count($result) > 0) {
      $data['success'] = $result;
    }
    $data['page_title'] = "Home | Job Listings";
    //You need to specify the folder of the view you want to load
    return $this->view("theme", "home", $data);
  }

  public function single_listing($id)
  {

    $listingModel = $this->model('Listings');
    $result = $listingModel->SinglePost($id);

    if (is_array($result) && count($result) > 0) {
      $data['success'] = $result;
    }
    $data['page_title'] = "Single Listing | Job Listings";
    //You need to specify the folder of the view you want to load
    return $this->view("theme", "single_listing", $data);
  }

  public function loadMoreListings()
  {

  }
}