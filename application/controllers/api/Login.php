<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use \Firebase\JWT\JWT;
require_once APPPATH . '/core/BD_Controller.php';
class Login extends BD_Controller {
      
    public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Login_db');
    }
    public function registration_post()
    {
       $cust_name = $this->post('cust_name');
        $mobile= $this->post('mobile');
         if(!empty($this->post('email')))
        {
          $email=$this->post('email');  
        }
        else
        {
          $email="";  
        }
        if(!empty($this->post('branch_id')))
        {
          $branch_id=$this->post('branch_id');  
        }
        else
        {
          $branch_id="";  
        }
        $password=$this->post('password');
        $rand = \random_int(100000, 999999);
        $ref_id=$rand;
        $reg_date=date('d-m-Y');
        $ip_address=$_SERVER['REMOTE_ADDR'];
        if(!empty($this->post('ref_by')))
        {
          $ref_by=$this->post('ref_by');  
        }
        else
        {
          $ref_by="";  
        }
        
        $count=$this->db->select('*')->where('mobile',$mobile)->from('customer')->count_all_results();
         if ($count>0) {
            $this->response("Mobile No Already Registred", REST_Controller::HTTP_BAD_REQUEST);
         }else{
            $insertdata=array(
            'cust_name'=>$cust_name,
            'mobile'=>$mobile,
            'email'=>$email,
            'password'=>$password,
            'ref_id'=>$ref_id,
            'reg_date'=>$reg_date,
            'ip_address'=>$ip_address,
            'branch_id'=>$branch_id,
            'ref_by'=>$ref_by
            );
            if($this->db->insert('customer',$insertdata))
            { 
                if(!empty($ref_by))
                {
                $sql=$this->db->select('*')->from('customer')->where('ref_id',$ref_by)->get()->result_array();
               
                $walletdata=$sql[0]['wallet'];
                $totalwallet=$walletdata+20;
                $walletData=array(
                'ref_id'=>$ref_by,
                'wallet'=>$totalwallet
               );
               $this->db->where('ref_id',$ref_by)->update('customer',$walletData);
               $newwalletData=array(
                'ref_id'=>$ref_id,
                'wallet'=>10
               );
               $this->db->where('ref_id',$ref_id)->update('customer',$newwalletData);
                }
               $this->response([
                    'status' => TRUE,
                    'message' => 'User has been Registred successfully.',
                ], REST_Controller::HTTP_OK);
            }
            else
            {
               $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
         }
    }
    public function login_post(){
        $mobile = $this->post('mobile'); //Username Posted
        $password = $this->post('password'); //Pasword Posted       
        $kunci = $this->config->item('thekey');
        $invalidLogin = ['status' => 'Invalid Login']; //Respon if login invalid
        $val = $this->Login_db->login($mobile,$password); //Model to get single data row from database base on username
        if($val){           
            $token['id'] = $val[0]->id;  //From here
            $token['username'] = $val[0]->mobile;  //From here
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            $token['exp'] = $date->getTimestamp() + 60*60*5; //To here is to generate token
            $output['token'] = JWT::encode($token,$kunci); //This is the output token  
            $output['cust_name']=$val[0]->cust_name;
            $output['id']=$val[0]->id;
            $output['mobile']=$val[0]->mobile;
            $output['email']=$val[0]->email;
             $output['wallet']=$val[0]->wallet;
             $output['ref_id']=$val[0]->ref_id;
            $this->set_response($output, REST_Controller::HTTP_OK); //This is the respon if success
        }
        else{
            $this->set_response($invalidLogin, REST_Controller::HTTP_NOT_FOUND); //This is the respon if failed
        }    
    }
    public function checkmobile_post()
    {
    $mobile=$this->input->post('mobile');
    $submitted=true;
    $count=$this->db->select('*')->where('mobile',$mobile)->from('customer')->count_all_results();
    if($count>0){
       $submitted=true;
        $this->response([
                'status' => TRUE,
                'message' => 'Mobile No Exits'
            ], REST_Controller::HTTP_OK);
    }
    else{
       $submitted=false;
       $this->response([
                'status' => FALSE,
                'message' => 'Mobile no not exits.'
            ], REST_Controller::HTTP_NOT_FOUND);
       exit();
    }
    if($submitted){
        $this->response([
        'status' => TRUE,
        'message'=>'Mobile No Exits'
      ], REST_Controller::HTTP_OK);
    }else{
        $this->response([
                'status' => TRUE,
                'message' => 'Mobile No not Exits'
            ], REST_Controller::HTTP_OK);
    }

    }
    public function changepassword_post()
    {
        $mobile = $this->post('mobile');
        $password = $this->post('password');
        $passworddata=array(
            'mobile'=>$mobile,
            'password'=>$password
            );
       
            if($this->db->where('mobile',$mobile)->update('customer',$passworddata)){
                 $this->response([
                    'status' => TRUE,
                    'message' => 'Password has been Change successfully.',
                ], REST_Controller::HTTP_OK);
               
            }else{
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
    }
    
    
}

?>
