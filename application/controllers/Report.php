<?php

class Report extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model("app_model");
    }
    
    public function index(){
     echo "This is sample message from Report Controller";
    }
    
    public function report_dashboard(){
        if($this->session->userdata("is_active") == 1){
            
            $product = $this->app_model->get_resource_data(tbl_products());
            $buyers = $this->app_model->get_resource_data(tbl_buyers());
            
            $data = array(
                "page_content" => "pages/reports-dashboard",
                "product" => count($product),
                "order" => count($buyers)
            );
            $this->load->view("layout/main_layout",$data);
        }else{
            $this->load->view("pages/login");
        }
    }
    
}
?>