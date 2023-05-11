<?php

class Manager_posts extends Controller
{
  public function index()
  {
    $listingsModel = $this->model("Listings");
        $result = $listingsModel->show($_POST);
   
    if ($result) {
      $data['success'] = $result;
    }
    $data['page_title'] = "Manager Posts | Job Listings";
    //You need to specify the folder of the view you want to load
    return $this->view("theme", "manager_posts", $data);
  }

  public function listing_edit ($id)
  {
    showPrint($_GET['url']); 
    $data['page_title'] = "Edit Posts | Job Listings";
    // we going to use the get method here in the order to get the id from the link
    return $this->view("theme", "listing_edit", $data);
  }
}