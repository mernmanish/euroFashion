<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_Master extends CI_Controller
{
  
   public function coupan()
   {
    $this->load->view('vendor/coupan');
   }
   public function managecoupan()
   {
    $id=$this->input->post('coupanid');
    $coupan_code=$this->input->post('coupan_code');
    $vendor_id=$this->session->userdata('sessionuser')['userid'];
    $count=$this->db->select('*')->where('vendor_id',$vendor_id)->where('coupan_code',$coupan_code)->where('id<>',$id)->from('coupan')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
      $fix_discount=$this->input->post('fix_discount');
      $coup_val=date('Y-m-d',strtotime($this->input->post('coup_val')));
      $max_value=$this->input->post('max_value');
      $ctime=date('Y-m-d H:i:s');
      $cuid=$this->session->userdata('sessionuser')['id'];
      $muid=$this->session->userdata('sessionuser')['id'];
     if($id==""){
      $insertdata=array(
        'coupan_code'=>$coupan_code,        
        'max_value'=>$max_value,       
        'fix_discount'=>$fix_discount,        
        'vendor_id'=>$vendor_id,
        'coup_val'=>$coup_val,        
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('coupan',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'coupan_code'=>$coupan_code,        
        'vendor_id'=>$vendor_id, 
        'fix_discount'=>$fix_discount,        
        'max_value'=>$max_value,       
        'coup_val'=>$coup_val,        
        'muid'=>$muid
        );
        if ($this->db->where('id',$id)->update('coupan',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function editcoupan()
   {
    $id=$this->input->post('id');
    $edittransport=$this->db->select('*')->where('id',$id)->get('coupan')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($edittransport),true)[0];
    echo json_encode($data);
   }
   public function deletecoupan()
   {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('coupan');
    $data['success']=true;
    echo json_encode($data);
   }
}