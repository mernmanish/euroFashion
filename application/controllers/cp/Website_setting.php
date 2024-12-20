<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_setting extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Asia/Calcutta');
    }
	public function testimonial()
	{
	  $this->load->view('cp/testimonial');
	}
	public function managetestimonial()
	{
	$id=$this->input->post('testid');
    $cust_name=$this->input->post('cust_name');
    $rating=$this->input->post('rating');
     $message=$this->input->post('message');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/Testimonial';
      $categoryfolder=$catfolder.'/'.$cust_name;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $cust_name .rand(). '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/Testimonial/'.$cust_name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'cust_name'=>$cust_name,
        'rating'=>$rating,
        'message'=>$message,
        'image'=>$target,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('testimonial',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'cust_name'=>$cust_name,
        'rating'=>$rating,
        'message'=>$message,
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('testimonial',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     
      echo json_encode($data);
	}
	public function deletetestimonial()
	{
		$id=$this->input->post('id');
	    $deldb=$this->db->where('id',$id)->delete('testimonial');
	    $data['success']=true;
	    echo json_encode($data);
	}
	public function changeteststatus()
	{
	  $id=$this->input->post('id');
      $status=$this->input->post('status');
      if($status==0)
      {
        $statusdata=array(
          'id'=>$id,
          'status'=>1
        );
       if ($this->db->where('id',$id)->update('testimonial',$statusdata)) {
        $data['success']=true;
        }else{
          $data['success']=false;
        }
      }
      else{
        $statusdata=array(
          'id'=>$id,
          'status'=>0
        );
       if ($this->db->where('id',$id)->update('testimonial',$statusdata)) {
        $data['success']=true;
        }else{
          $data['success']=false;
        }
      }
      echo json_encode($data);
	}
	
  public function web_enquiry()
  {
    $this->load->view('cp/web-enquiry');
  }
  public function deleteenquiry()
  {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('contact_form');
    $data['success']=true;
    echo json_encode($data);
  }
  public function slider()
  {
    $this->load->view('cp/slider');
  }
  public function manageslider()
  {
    $id=$this->input->post('sliderid');
    $title=$this->input->post('title');
    $sub_title=$this->input->post('sub_title');
    $bottom_title=$this->input->post('bottom_title');
    $url_link=$this->input->post('url_link');
    $position=$this->input->post('position');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/slider';
      $categoryfolder=$catfolder.'/'.$title;
      if (!is_dir($catfolder)) mkdir($catfolder, 0755, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0755, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $title .rand(). '-slider.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/slider/'.$title."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'title'=>$title,
        'sub_title'=>$sub_title,
        'bottom_title'=>$bottom_title,
        'url_link'=>$url_link,
        'position'=>$position,
        'image'=>$target,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('slider',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'title'=>$title,
        'sub_title'=>$sub_title,
        'position'=>$position,
        'bottom_title'=>$bottom_title,
        'url_link'=>$url_link,
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('slider',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     
      echo json_encode($data);
  }
  public function deleteslider()
  {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('slider');
    $data['success']=true;
    echo json_encode($data);
  }
  public function changsliderstatus()
  {
      $id=$this->input->post('id');
      $status=$this->input->post('status');
      if($status==0)
      {
        $statusdata=array(
          'id'=>$id,
          'status'=>1
        );
       if ($this->db->where('id',$id)->update('slider',$statusdata)) {
        $data['success']=true;
        }else{
          $data['success']=false;
        }
      }
      else{
        $statusdata=array(
          'id'=>$id,
          'status'=>0
        );
       if ($this->db->where('id',$id)->update('slider',$statusdata)) {
        $data['success']=true;
        }else{
          $data['success']=false;
        }
      }
      echo json_encode($data);
  }
}
?>