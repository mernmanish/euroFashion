<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use \Firebase\JWT\JWT;
require_once APPPATH . '/core/BD_Controller.php';
class Branch extends BD_Controller {
      
    public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Branch_db');
    }
    public function branch_get($id = 0) {
        $catlist = $this->Branch_db->getRows($id);
        if(!empty($catlist)){
            $this->response($catlist, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}