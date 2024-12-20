<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Offer extends CI_Controller
{
   public function __construct()
   {
    parent::__construct();
    date_default_timezone_set('Asia/Calcutta');
   }
   public function offer_details()
   {
   	$this->load->view('cp/offer-details');
   }

   public function manageoffers()
   {
   	 $id=$this->input->post('offer_id');
     $offer_title=$this->input->post('offer_title');
     $pro_id=$this->input->post('pro_id');
     $discount=$this->input->post('discount');
     $start_date=$this->input->post('start_date');
     $end_date=$this->input->post('end_date');
     $details=$this->input->post('details');
     $catfolder=APPPATH.'../img/offer';
      $categoryfolder=$catfolder.'/'.$offer_title;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $offer_title .rand(). '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/offer/'.$offer_title."/".$newfilename;
     }
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
  
     if($id==""){
        foreach($pro_id as $keys =>$vals)
        {
	      $insertdata=array(
	        'offer_title'=>$offer_title,
	        'pro_id'=>$vals,
          'image'=>$target,
	        'discount'=>$discount,
	        'start_date'=>$start_date,
	        'end_date'=>$end_date,
	        'details'=>$details,
	        'ctime'=>$ctime,
	        'cuid'=>$cuid,
	        'muid'=>$muid
	      );
	        if ($this->db->insert('offers',$insertdata)) {
	        $data['status']="added";
	        $data['success']=true;
	        }else{
	          $data['success']=false;
	        }

	    }
    }
        else{
        $insertdata=array(
        'id' => $id,
        'offer_title'=>$offer_title,
        'pro_id'=>$pro_id,
        'discount'=>$discount,
        'start_date'=>$start_date,
        'end_date'=>$end_date,
        'details'=>$details,
        'muid'=>$muid
        );
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        $insertdata=array_merge($insertdata,$imgarray);
        if ($this->db->where('id',$id)->update('offers',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     
      echo json_encode($data);
   }

   public function deleteoffer()
   {
   	$id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('offers');
    $data['success']=true;
    echo json_encode($data);
   }
}