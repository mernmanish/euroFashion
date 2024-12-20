<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use \Firebase\JWT\JWT;
require_once APPPATH . '/core/BD_Controller.php';
class Coupan extends BD_Controller {
      
    public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Coupan_db');
    }
    public function coupan_get($id = 0) {
        $catlist = $this->Coupan_db->getRows($id);
        if(!empty($catlist)){
            $this->response($catlist, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function coupanapply_post()
    {
       $cust_id = $this->post('cust_id');
       $coupan_id= $this->post('coupan_id');  
       $ctime=date('Y-m-d H:i:s');      
        $count=$this->db->select('*')->where('cust_id',$cust_id)->where('coupan_id',$coupan_id)->from('user_coupan')->count_all_results();
         if ($count>0) {
            $this->response("Coupan Already Reedem", REST_Controller::HTTP_BAD_REQUEST);
         }else{
            $insertdata=array(
            'cust_id'=>$cust_id,
            'coupan_id'=>$coupan_id,
            'ctime'=>$ctime
            );
            if($this->db->insert('user_coupan',$insertdata))
            { 
               $this->response([
                    'status' => TRUE,
                    'message' => 'Coupan has been Reedem successfully.',
                ], REST_Controller::HTTP_OK);
            }
            else
            {
               $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
         }
    }
    public function checkcoupan_post()
    {
       $cust_id = $this->post('cust_id');
       $coupan_id= $this->post('coupan_id');  
        $count=$this->db->select('*')->where('cust_id',$cust_id)->where('coupan_id',$coupan_id)->from('user_coupan')->count_all_results();
         if ($count>0) {
            $this->response("Coupan Already Reedem", REST_Controller::HTTP_BAD_REQUEST);
         }
        else
        {
           $this->response([
                    'status' => TRUE,
                    'message' => 'Coupan Apply.',
                ], REST_Controller::HTTP_OK);
        }
    }
}