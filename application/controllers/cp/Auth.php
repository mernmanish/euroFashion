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
		$this->load->view('cp/index');
	}
	public function admin()
	{
		$this->load->view('cp/admin');
	}
	public function Login_user()
	{
		$credentials['mobile']=$this->input->post('loginname');
		$credentials['password']=md5($this->input->post('loginpassword'));
		$count=$this->db->select('*')->where($credentials)->from('users')->where(['usertype'=>'superadmin'])->or_where(['usertype'=>'admin'])->where('status','active')->count_all_results();
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
	  redirect(base_url('cp/Auth'),'refresh');
	 }
	public function insertadmin()
    {
    $id=$this->input->post('userid');
    $mobile=$this->input->post('mobile');
    $count=$this->db->select('*')->where('mobile',$mobile)->where('id<>',$id)->from('users')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $name=$this->input->post('name');
     $email_id=$this->input->post('email_id');
     $mobile=$this->input->post('mobile');
     $password=md5($this->input->post('password'));
     $emg_no=$this->input->post('emg_no');
     $aadhar_no=$this->input->post('aadhar_no');
     $full_address=$this->input->post('full_address');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/admin';
      $categoryfolder=$catfolder.'/'.$name;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $name .rand(). '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/admin/'.$name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'emg_no'=>$emg_no,
        'aadhar_no'=>$aadhar_no,
        'full_address'=>$full_address,
        'email_id'=>$email_id,
        'mobile'=>$mobile,
        'image'=>$target,
        'password'=>$password,
        'usertype'=>'admin',
        'cuid'=>$cuid,
        'muid'=>$muid,
        'ctime'=>$ctime,
        'status'=>'1'
      );
        if ($this->db->insert('users',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array(
        'id' => $id,
        'name'=>$name,
        'emg_no'=>$emg_no,
        'aadhar_no'=>$aadhar_no,
        'full_address'=>$full_address,
        'email_id'=>$email_id,
        'mobile'=>$mobile,
        'password'=>$password,
        );
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('users',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
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
        $this->load->view('cp/change-password');
    }
    public function change_userpassword()
    {
     $id=$this->input->post('cpid');
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
     public function System_admin()
    {
      $this->load->view('cp/system-admin');
    }
    public function managesystemuser()
    {
      $id=$this->input->post('userid');
    $mobile=$this->input->post('mobile');
    $count=$this->db->select('*')->where('mobile',$mobile)->where('id<>',$id)->from('users')->count_all_results();
     if ($count>0) {
        $data['success']=true;
        $data['status']="avail";
     }else{
     $name=$this->input->post('name');
     $email_id=$this->input->post('email_id');
     $password=md5($this->input->post('password'));
     $emg_no=$this->input->post('emg_no');
     $full_address=$this->input->post('full_address');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/system_admin';
      $categoryfolder=$catfolder.'/'.$name;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $name .rand(). '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/system_admin/'.$name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'emg_no'=>$emg_no,
        'full_address'=>$full_address,
        'email_id'=>$email_id,
        'mobile'=>$mobile,
        'image'=>$target,
        'password'=>$password,
        'usertype'=>'superadmin',
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid,
        'status'=>'1'
      );
        if ($this->db->insert('users',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'name'=>$name,
        'emg_no'=>$emg_no,
        'full_address'=>$full_address,
        'email_id'=>$email_id,
        'mobile'=>$mobile,
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('users',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);  
    }
    public function changesuperstatus()
    {
      $id=$this->input->post('id');
    $status=$this->input->post('status');
    if($status=="active")
    {
      $updatedata=array(
        'id'=>$id,
        'status'=>"inactive"
      );
      if($this->db->where('id',$id)->update('users',$updatedata))
      {
        $data['success']=true;
      }
      else
      {
        $data['success']=false;
      }
    }
    else
    {
      $updatedata=array(
        'id'=>$id,
        'status'=>"active"
      );
      if($this->db->where('id',$id)->update('users',$updatedata))
      {
        $data['success']=true;
      }
      else
      {
        $data['success']=false;
      }
    }
    echo json_encode($data);
    }
    public function vendor_list()
    {
     $this->load->view('cp/vendor-list'); 
    }
}
