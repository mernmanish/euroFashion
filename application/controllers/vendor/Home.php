<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	 {
	  parent::__construct();
	  $this->load->model('Homedb');
	 }
   public function index()
   {
   	 $this->load->view('vendor/dashboard');
   }
   public function customer_list()
   {
   	$this->load->view('vendor/customer-list');
   }
   public function changecustomerstatus()
   {
   	$id=$this->input->post('id');
    $status=$this->input->post('status');
    if($status==1)
    {
      $updatedata=array(
        'id'=>$id,
        'status'=>0
      );
      if($this->db->where('id',$id)->update('customer',$updatedata))
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
        'status'=>1
      );
      if($this->db->where('id',$id)->update('customer',$updatedata))
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
   public function deliverd_ordered()
   {
   	$this->load->view('vendor/deliverd-order');
   }
   public function new_ordered()
   {
   	$this->load->view('vendor/new-ordered');
   }
   public function technical_support()
   {
    $this->load->view('vendor/technical-support');
   }
   public function manageamsupport()
   {
     $name=$this->input->post('name');
     $email_id=$this->input->post('email_id');
     $mobile=$this->input->post('mobile');
     $message=$this->input->post('message');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
     $vendor_id=$this->session->userdata('sessionuser')['userid'];
      $catfolder=APPPATH.'../img/supportcenter';
      $categoryfolder=$catfolder.'/'.$name;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $file=$_FILES['file']['name'];
    $target="";
     if ($file!="") {
       $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $name .rand(). '-file.'.$temp[1];
        $tmp_name=$_FILES['file']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/supportcenter/'.$name."/".$newfilename;
     }
      $insertdata=array(
        'name'=>$name,
        'vendor_id'=>$vendor_id,
        'email_id'=>$email_id,
        'mobile'=>$mobile,
        'file'=>$target,
        'message'=>$message,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('support_center',$insertdata)) {
        $data['success']=true;
        }else{
          $data['success']=false;
    }
      echo json_encode($data);
   }
}
?>