<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{
   public function __construct()
   {
    parent::__construct();
    date_default_timezone_set('Asia/Calcutta');
   }
   public function login()
   {
   	$this->load->view('login');
   }
   public function Login_customer()
   {
    $credentials['mobile']=$this->input->post('mobile');
    $credentials['password']=$this->input->post('password');
    $count=$this->db->select('*')->where($credentials)->from('customer')->where('status','active')->count_all_results();
    if ($count>0) {
       $this->session;
       $sessiondata = array('logged_in' => TRUE);
       $data=array();
       $data=json_decode(json_encode($this->db->select('*')->where($credentials)->get('customer')->result()),true);
       $data=$data[0];
       $sessiondata=array_merge($sessiondata,$data);
       $this->session->set_userdata('sessioncustomer',$sessiondata);
      $data['success']=true;
    }else{
        $data['success']=false;
    }
    echo json_encode($data);
   }
   public function logout()
   {
    $this->session->unset_userdata('sessioncustomer');
    $this->session->unset_userdata('logged_in');
    redirect(base_url(),'refresh');
   }
   public function registration()
   {
   	$this->load->view('registration');
   }
   public function customer_registration()
   {
    
    $mobile=$this->input->post('mobile');
    $count=$this->db->select('*')->where('mobile',$mobile)->from('customer')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
      $cust_name=$this->input->post('cust_name');
    $email=$this->input->post('email');
    $password=$this->input->post('password');
    $reg_date=date('d-m-Y');
    $ip_address=$_SERVER['REMOTE_ADDR'];
    $rand = \random_int(100000, 999999);
    $ref_id=$rand;
    $insertdata=array(
      'cust_name'=>$cust_name,
      'mobile'=>$mobile,
      'email'=>$email,
      'password'=>$password,
      'reg_date'=>$reg_date,
      'ip_address'=>$ip_address,
      'ref_id'=>$ref_id,
      'status'=>1
    );
    if($this->db->insert('customer',$insertdata))
    {
      $data['status']="added";
      $data['success']=true;
    }
    else
    {
      $data['success']=false;
    }
  }
    echo json_encode($data);
   }
   public function forget_password()
   {
   	$this->load->view('forget-password');
   }
}