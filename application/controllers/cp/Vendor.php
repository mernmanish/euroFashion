<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendor extends CI_Controller
{
	public function __construct()
	 {
	  parent::__construct();
	 }
   public function index()
   {
   	 $this->load->view('cp/vendor');
   }
   public function managevendor()
   {
   	$id=$this->input->post('vendorid');
    $name=$this->input->post('name');
     $mobile=$this->input->post('mobile');
    $count=$this->db->select('*')->where('name',$name)->where('mobile',$mobile)->where('id<>',$id)->from('vendor')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $email_id=$this->input->post('email_id');
     $state_id=$this->input->post('state_id');
     $city_id=$this->input->post('city_id');
     $pin_code=$this->input->post('pin_code');
     $emg_no=$this->input->post('emg_no');
     $password=md5($this->input->post('password'));
     $full_address=$this->input->post('full_address');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
     $catfolder=APPPATH.'../img/vendor';
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
        $target='img/vendor/'.$name."/".$newfilename;
     }
    $aadhar=$_FILES['aadhar']['name'];
    $target1="";
     if ($aadhar!="") {
       $temp = explode(".", $_FILES["aadhar"]["name"]);
        $newfilename = $name .rand(). '-aadhar.'.$temp[1];
        $tmp_name=$_FILES['aadhar']['tmp_name'];
        $target1=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target1);
        $target1='img/vendor/'.$name."/".$newfilename;
     }
     $pancard=$_FILES['pancard']['name'];
      $target2="";
       if ($pancard!="") {
         $temp = explode(".", $_FILES["pancard"]["name"]);
          $newfilename = $name .rand(). '-pancard.'.$temp[1];
          $tmp_name=$_FILES['pancard']['tmp_name'];
          $target2=$categoryfolder."/".$newfilename;
          move_uploaded_file($tmp_name, $target2);
          $target2='img/vendor/'.$name."/".$newfilename;
       }

     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'email_id'=>$email_id,
        'mobile'=>$mobile,
        'state_id'=>$state_id,
        'city_id'=>$city_id,
        'pin_code'=>$pin_code,
        'image'=>$target,
        'aadhar'=>$target1,
        'aadhar'=>$target2,
        'emg_no'=>$emg_no,
        'full_address'=>$full_address,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('vendor',$insertdata)) {
        $lastid=$this->db->insert_id();
        $userdata=array(
          'name'=>$name,
          'mobile'=>$mobile,
          'email_id'=>$email_id,
          'image'=>$target,
          'password'=>$password,
          'full_address'=>$full_address,
          'usertype'=>'vendor',
          'p_id'=>$cuid,
          'cuid'=>$cuid,
          'muid'=>$muid,
          'ctime'=>$ctime,
          'userid'=>$lastid
        );
        $this->db->insert('users',$userdata);
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
        'email_id'=>$email_id,
        'mobile'=>$mobile,
        'state_id'=>$state_id,
        'city_id'=>$city_id,
        'pin_code'=>$pin_code,
        'emg_no'=>$emg_no,
        'full_address'=>$full_address,
        'muid'=>$muid
        );
        $imgarr=array();
        if ($target!="") {
          $imgarr['image']=$target;
        }
        if ($target1!="") {
          $imgarr['aadhar']=$target1;
        }
        if ($target2!="") {
          $imgarr['pancard']=$target2;
        }
        $insertdata=array_merge($insertdata,$imgarr);

        if ($this->db->where('id',$id)->update('vendor',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
      }
      public function deletevendor()
      {
        $id=$this->input->post('id');
        $deldb=$this->db->where('id',$id)->delete('vendor');
        $data['success']=true;
        echo json_encode($data);
      }
      public function changevendorstatus()
      {
    $id=$this->input->post('id');
    $status=$this->input->post('status');
    if($status=="active")
    {
      $updatedata=array(
        'id'=>$id,
        'status'=>"inactive"
      );
      if($this->db->where('id',$id)->update('vendor',$updatedata))
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
      if($this->db->where('id',$id)->update('vendor',$updatedata))
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
}