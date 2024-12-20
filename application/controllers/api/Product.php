<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use \Firebase\JWT\JWT;
require_once APPPATH . '/core/BD_Controller.php';
class Product extends BD_Controller {
      
    public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Product_db');
        date_default_timezone_set('Asia/Calcutta');
    }
    public function product_get($id = 0) {
        $prolist = $this->Product_db->getRows($id);
        if(!empty($prolist)){
            $this->response($prolist, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function search_post() {
        $keys=$this->post('keys');
        $amblist = $this->Product_db->searchproduct($keys);
        if(!empty($amblist)){
            $this->response($amblist, REST_Controller::HTTP_OK);
        }else{
            $data=array(
                'keywords'=>$keys
            );
            $this->db->insert('search',$data); 
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
            
        }

    }
}