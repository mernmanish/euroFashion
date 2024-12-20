<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use \Firebase\JWT\JWT;
require_once APPPATH . '/core/BD_Controller.php';
class Slider extends BD_Controller {
      
    public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Slider_db');
    }
    public function slider_get($id = 0) {
        $sliderlist = $this->Slider_db->getRows($id);
        if(!empty($sliderlist)){
            $this->response($sliderlist, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}