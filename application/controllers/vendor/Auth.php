<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
 public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Calcutta');
  }
	public function index()
	{
		$this->load->view('vendor/index');
	}
	public function admin()
	{
		$this->load->view('vendor/admin');
	}
	public function Login_user()
	{
		$credentials['mobile']=$this->input->post('loginname');
		$credentials['password']=md5($this->input->post('loginpassword'));
		$count=$this->db->select('*')->where($credentials)->from('users')->where('usertype','vendor')->where('status','active')->count_all_results();
		if ($count>0) {
			 $this->session;
       $sessiondata = array('logged_in' => TRUE);
       $data=array();
       $data=json_decode(json_encode($this->db->select('*')->where($credentials)->get('users')->result()),true);
       $data=$data[0];
       $sessiondata=array_merge($sessiondata,$data);
       $this->session->set_userdata('sessionuser',$sessiondata);
			$data['success']=true;
		}else{
				$data['success']=false;
		}
		echo json_encode($data);
	}
    public function logout()
	  {
	  $this->session->unset_userdata('sessionuser');
	  $this->session->unset_userdata('logged_in');
	  redirect(base_url('vendor/Auth'),'refresh');
	 }
    public function deleteadmin()
    {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('users');
    $data['success']=true;
    echo json_encode($data);
    }
    public function change_password()
    {
        $this->load->view('vendor/change-password');
    }
    public function change_userpassword()
    {
     $id=$this->input->post('branchid');
     $newpassword=md5($this->input->post('newpassword'));
      $changedata=array(
        'id'=>$id,
        'password'=>$newpassword
      ); 
      if($this->db->where('id',$id)->update('users',$changedata))
      {
        $data['success']=true;
      }
      else
      {
        $data['success']=false;
      }
      echo json_encode($data);
    }
  
}
