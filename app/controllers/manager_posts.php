<?php

class Manager_posts extends Controller
{
  public function index()
  {
    $listingsModel = $this->model("Listings");
    $result = $listingsModel->showManagePostUser();
    if ($result) {
      $data['success'] = $result;
    }
    $data['page_title'] = "Manager Posts | Job Listings";
    //You need to specify the folder of the view you want to load
    return $this->view("theme", "manager_posts", $data);
  }

  public function listing_edit ($id)
  {
    $listingsModel = $this->model("Listings");
    $result = $listingsModel->edit($id); 

    if (is_array($result) && count($result) > 0) {
      $data['success'] = $result;

      if($_SERVER['REQUEST_METHOD'] == "POST"){
      
        $updateSuccess = $listingsModel->update($_POST, $id); 

        if(is_array($updateSuccess)){
          $data['error'] = $updateSuccess;
        }else{
          Redirect("manager_posts"); 
        }

      }
    }

    $data['page_title'] = "Edit Posts | Job Listings";
    // we going to use the get method here in the order to get the id from the link
    return $this->view("theme", "listing_edit", $data);
  }

  public function listing_delete($id)
  {
   $database = new Database(); 
  
    $data['id'] = $id; 
    $query = "DELETE FROM listings WHERE id = :id";
    $result = $database->write($query, $data); 
    if($result){
      Redirect("manager_posts"); 
    }

    $data['page_title'] = "Delete Posts | Job Listings";
    // we going to use the get method here in the order to get the id from the link
    return $this->view("theme", "listing_delete", $data);
  }
}