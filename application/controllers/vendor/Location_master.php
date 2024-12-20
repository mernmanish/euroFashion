<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Location_master extends CI_Controller
{
   public function __construct()
   {
    parent::__construct();
    date_default_timezone_set('Asia/Calcutta');
   }
   public function state()
   {
   	$this->load->view('branch/state');
   }
   public function managestate()
   {
   	$id=$this->input->post('stateid');
    $name=$this->input->post('name');
    $branch_id=$this->session->userdata('sessionuser')['userid'];
    $count=$this->db->select('*')->where('name',$name)->where('branch_id',$branch_id)->where('id<>',$id)->from('state')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $description=$this->input->post('description');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/state';
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
        $target='img/state/'.$name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'description'=>$description,
        'branch_id'=>$branch_id,
        'image'=>$target,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('state',$insertdata)) {
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
        'description'=>$description,
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('state',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function deletestate()
   {
   	$id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('state');
    $data['success']=true;
    echo json_encode($data);
   }
   public function changecity()
   {
   	$count_id=$this->input->post('count_id');
    $sqlcity=$this->db->select('*')->where('count_id',$count_id)->get('state')->result();
    $sqlcity=json_decode(json_encode($sqlcity),true);
    $output='<option value="">Select State</option>';
    foreach($sqlcity as $rows)
    {
        $output .= '<option value="'.$rows['id'].'">'.$rows['name'].'</option>';

    }
      echo  $output;
   }
   public function managecity()
   {
    $id=$this->input->post('cityid');
    $name=$this->input->post('name');
    $state_id=$this->input->post('state_id');
    $branch_id=$this->session->userdata('sessionuser')['userid'];
    $count=$this->db->select('*')->where('state_id',$state_id)->where('name',$name)->where('branch_id',$branch_id)->where('id<>',$id)->from('city')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $description=$this->input->post('description');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/city';
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
        $target='img/city/'.$name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'branch_id'=>$branch_id,
        'state_id'=>$state_id,
        'description'=>$description,
        'image'=>$target,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('city',$insertdata)) {
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
        'state_id'=>$state_id,
        'description'=>$description,
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('city',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function deletecity()
   {
   	$id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('city');
    $data['success']=true;
    echo json_encode($data);
   }
   public function city()
   {
   	$this->load->view('branch/city');
   }
   public function changelocation()
   {
   	$state_id=$this->input->post('state_id');
    $sqllocation=$this->db->select('*')->where('state_id',$state_id)->get('city')->result();
    $sqllocation=json_decode(json_encode($sqllocation),true);
    $output='<option value="">Select City</option>';
    foreach($sqllocation as $rows)
    {
        $output .= '<option value="'.$rows['id'].'">'.$rows['name'].'</option>';

    }
      echo  $output;
   }
   public function location()
   {
   	$this->load->view('branch/location');
   }
   public function managelocation()
   {
   	$id=$this->input->post('locationid');
    $name=$this->input->post('name');
    $state_id=$this->input->post('state_id');
    $city_id=$this->input->post('city_id');
    $branch_id=$this->session->userdata('sessionuser')['userid'];
    $count=$this->db->select('*')->where('branch_id',$branch_id)->where('state_id',$state_id)->where('city_id',$city_id)->where('name',$name)->where('id<>',$id)->from('location')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $description=$this->input->post('description');
     $pin_code=$this->input->post('pin_code');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'state_id'=>$state_id,
        'city_id'=>$city_id,
        'pin_code'=>$pin_code,
        'branch_id'=>$branch_id,
        'description'=>$description,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('location',$insertdata)) {
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
        'pin_code'=>$pin_code,
        'state_id'=>$state_id,
        'city_id'=>$city_id,
        'description'=>$description,
        'muid'=>$muid
        );
   
        if ($this->db->where('id',$id)->update('location',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function deletelocation()
   {
   	$id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('location');
    $data['success']=true;
    echo json_encode($data);
   }
  public function change_location()
   {
    $city_id=$this->input->post('city_id');
    $sqlsize=$this->db->select('*')->where('city_id',$city_id)->get('location')->result();
    $sqlsize=json_decode(json_encode($sqlsize),true);
    $output='<option value="">Select Location</option>';
    foreach($sqlsize as $rows)
    {
        $output .= '<option value="'.$rows['id'].'">'.$rows['name'].'</option>';

    }
      echo  $output;
   }
   public function changepincode()
   {
    $loc_id=$this->input->post('loc_id');
    $changesuppliers=$this->db->select('*')->where('id',$loc_id)->get('location')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($changesuppliers),true)[0];
    echo json_encode($data);
   }
}