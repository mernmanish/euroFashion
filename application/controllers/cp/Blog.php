<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller
{
   public function __construct()
   {
    parent::__construct();
    date_default_timezone_set('Asia/Calcutta');
   }
   public function blog_category()
   {
   	$this->load->view('cp/blog-category');
   }
   public function managenewscategory()
   {
   	$id=$this->input->post('categoryid');
    $name=$this->input->post('name');
    $count=$this->db->select('*')->where('name',$name)->where('id<>',$id)->from('blog_category')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/blog-category';
      $categoryfolder=$catfolder.'/'.$name;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $name . '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/blog-category/'.$name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'image'=>$target,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('blog_category',$insertdata)) {
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
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('blog_category',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function editcategory()
   {
   	$id=$this->input->post('id');
    $editbrand=$this->db->select('*')->where('id',$id)->get('blog_category')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($editbrand),true)[0];
    echo json_encode($data);
   }
   public function deletecategory()
   {
   	$id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('blog_category');
    $data['success']=true;
    echo json_encode($data);
   }
   public function blog_details()
   {
   	$this->load->view('cp/blog-details');
   }
   public function managenews()
   {
    $id=$this->input->post('newsid');
    $cat_id=$this->input->post('cat_id');
    $news_title=$this->input->post('news_title');
    $count=$this->db->select('*')->where('cat_id',$cat_id)->where('news_title',$news_title)->where('id<>',$id)->from('blog')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $description=$this->input->post('description');
     $ctime=date('Y-m-d H:i:s');
     $day=date('d');
     $month=date('F');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/blog';
      $categoryfolder=$catfolder.'/'.$news_title;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $news_title . '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/blog/'.$news_title."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'cat_id'=>$cat_id,
        'news_title'=>$news_title,
        'description'=>$description,
        'day'=>$day,
        'month'=>$month,
        'image'=>$target,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('blog',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'cat_id'=>$cat_id,
        'news_title'=>$news_title,
        'description'=>$description,
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('blog',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function deletenews()
   {
   	$id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('blog');
    $data['success']=true;
    echo json_encode($data);
   }
}