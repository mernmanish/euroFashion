<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_Master extends CI_Controller
{
   Public function Product_brand()
   {
   	 $this->load->view('cp/Product-brand');
   }
   public function Manage_Brand()
   {
   	$id=$this->input->post('brandid');
    $name=$this->input->post('name');
    $count=$this->db->select('*')->where('name',$name)->where('id<>',$id)->from('brand')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/brand';
      $categoryfolder=$catfolder.'/'.$name;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $name.rand() . '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/brand/'.$name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'image'=>$target,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid,
        'ctime'=>$ctime,        
        'status'=>'1'
      );
        if ($this->db->insert('brand',$insertdata)) {
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
        $image=array();
        if ($target!="") {
            $image=array(
              'image'=>$target
            );
          }
        $logo=array_merge($image);
        $insertdata=array_merge($insertdata,$logo);
        if ($this->db->where('id',$id)->update('brand',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function Delete_brand()
   {
   	$id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('brand');
    $data['success']=true;
    echo json_encode($data);
   }
   public function Edit_brand()
   {
   	$id=$this->input->post('id');
    $editbrand=$this->db->select('*')->where('id',$id)->get('brand')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($editbrand),true)[0];
    echo json_encode($data);
   }
   public function product_unit()
   {
    $this->load->view('cp/unit');
   }
   public function Manage_unit()
   {
    $id=$this->input->post('unitid');
    $name=$this->input->post('name');
    $count=$this->db->select('*')->where('name',$name)->where('id<>',$id)->from('unit')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
      $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
     if($id==""){
      $insertdata=array(
        'name'=>$name,  
         'cuid'=>$cuid,
        'muid'=>$muid,
        'ctime'=>$ctime      
      );

        if ($this->db->insert('unit',$insertdata)) {

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
        'muid'=>$muid,
        );
        if ($this->db->where('id',$id)->update('unit',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function Delete_unit()
   {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('unit');
    $data['success']=true;
    echo json_encode($data);
   }
   public function edit_unit()
   {
    $id=$this->input->post('id');
    $editbrand=$this->db->select('*')->where('id',$id)->get('unit')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($editbrand),true)[0];
    echo json_encode($data);
   }
   public function Product_size()
   {
    $this->load->view('cp/size');
   }
   public function Manage_size()
   {
    $id=$this->input->post('sizeid');
    $unitid=$this->input->post('unitid');
    $name=$this->input->post('name');
    $count=$this->db->select('*')->where('name',$name)->where('unitid',$unitid)->where('id<>',$id)->from('size')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
     if($id==""){
      $insertdata=array(
        'unitid'=>$unitid,
        'name'=>$name,  
        'cuid'=>$cuid,
        'muid'=>$muid,
        'ctime'=>$ctime,     
        'status'=>'1'
      );
        if ($this->db->insert('size',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'unitid'=>$unitid,
        'name'=>$name,
        'muid'=>$muid,
        );
        if ($this->db->where('id',$id)->update('size',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function Delete_size()
   {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('size');
    $data['success']=true;
    echo json_encode($data);
   }
   public function edit_size()
   {
    $id=$this->input->post('id');
    $editsize=$this->db->select('*')->where('id',$id)->get('size')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($editsize),true)[0];
    echo json_encode($data);
   }
   public function Taxslab()
   {
    $this->load->view('cp/taxslab');
   }
   public function manage_taxslab()
   {
    $id=$this->input->post('taxid');
    $slabname=$this->input->post('slabname');
    $count=$this->db->select('*')->where('slabname',$slabname)->where('id<>',$id)->from('taxslab')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
      $cgst=$this->input->post('cgst');
      $sgst=$this->input->post('sgst');
      $igst=$this->input->post('igst');
     if($id==""){
      $insertdata=array(
        'slabname'=>$slabname,        
        'cgst'=>$cgst,        
        'sgst'=>$sgst,        
        'igst'=>$igst,        
        'status'=>'1'
      );
        if ($this->db->insert('taxslab',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'slabname'=>$slabname,        
        'cgst'=>$cgst,        
        'sgst'=>$sgst,        
        'igst'=>$igst
        );
        if ($this->db->where('id',$id)->update('taxslab',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function delete_taxsalb()
   {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('taxslab');
    $data['success']=true;
    echo json_encode($data);
   }
   public function edit_taxslab()
   {
    $id=$this->input->post('id');
    $edittaxslab=$this->db->select('*')->where('id',$id)->get('taxslab')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($edittaxslab),true)[0];
    echo json_encode($data);
   }
   public function Transport()
   {
    $this->load->view('cp/transport');
   }
   public function Manage_Transport()
   {
    $id=$this->input->post('transportid');
    $name=$this->input->post('name');
    $count=$this->db->select('*')->where('name',$name)->where('id<>',$id)->from('transport')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     if($id==""){
      $insertdata=array(
        'name'=>$name,                
        'status'=>'1'
      );
        if ($this->db->insert('transport',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'name'=>$name
        );
        if ($this->db->where('id',$id)->update('transport',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function Delete_transport()
   {
    $id=$this->input->post('id');
    $deletetransport=$this->db->where('id',$id)->delete('transport');
    $data['success']=true;
    echo json_encode($data);
   }
   public function Edit_transport()
   {
    $id=$this->input->post('id');
    $edittransport=$this->db->select('*')->where('id',$id)->get('transport')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($edittransport),true)[0];
    echo json_encode($data);
   }
   public function Product_category()
   {
    $this->load->view('cp/product-category');
   }
   public function add_category()
   {
    $id=$this->input->post('categoryid');
    $name=$this->input->post('name');
    $count=$this->db->select('*')->where('name',$name)->where('id<>',$id)->from('category')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/category';
      $categoryfolder=$catfolder.'/'.$name;
      if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
      if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
    $image=$_FILES['image']['name'];
    $target="";
     if ($image!="") {
       $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = $name.rand() . '-image.'.$temp[1];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target);
        $target='img/category/'.$name."/".$newfilename;
     }
     $banner=$_FILES['banner']['name'];
    $target1="";
     if ($banner!="") {
       $temp = explode(".", $_FILES["banner"]["name"]);
        $newfilename = $name .rand(). '-banner.'.$temp[1];
        $tmp_name=$_FILES['banner']['tmp_name'];
        $target1=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target1);
        $target1='img/category/'.$name."/".$newfilename;
     }
     if($id==""){
      $insertdata=array(
        'name'=>$name,
        'image'=>$target,
        'banner'=>$target1,
        'cuid'=>$cuid,
        'muid'=>$muid,
        'ctime'=>$ctime,          
        'status'=>'1'
      );
        if ($this->db->insert('category',$insertdata)) {
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
         $image=array();
         $banner=array();
          if ($target!="") {
            $image=array(
              'image'=>$target
            );
          }
          if ($target1!="") {
            $banner=array(
              'banner'=>$target1
            );
          }
        $logo=array_merge($image,$banner);
        $insertdata=array_merge($insertdata,$logo);
        if ($this->db->where('id',$id)->update('category',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function Delete_category()
   {
    $id=$this->input->post('id');
    $deletetransport=$this->db->where('id',$id)->delete('category');
    $data['success']=true;
    echo json_encode($data);
   }
   public function Edit_category()
   {
    $id=$this->input->post('id');
    $edittransport=$this->db->select('*')->where('id',$id)->get('category')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($edittransport),true)[0];
    echo json_encode($data);
   }
      public function price_range()
   {
    $this->load->view('cp/price-range');
   }
   public function managepricerange()
   {
    $id=$this->input->post('feeid');
    $pricerange=$this->input->post('pricerange');
    $count=$this->db->select('*')->where('pricerange',$pricerange)->where('id<>',$id)->from('product_price')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $pricefrom=$this->input->post('pricefrom');
     $priceto=$this->input->post('priceto');
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
     if($id==""){
      $insertdata=array(
        'pricerange'=>$pricerange,
        'pricefrom'=>$pricefrom,
        'priceto'=>$priceto,
        'ctime'=>$ctime,
        'cuid'=>$cuid,
        'muid'=>$muid
      );
        if ($this->db->insert('product_price',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'pricerange'=>$pricerange,
        'pricefrom'=>$pricefrom,
        'priceto'=>$priceto,
        'muid'=>$muid
        );
        if ($this->db->where('id',$id)->update('product_price',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
   public function deletepricerange()
   {
    $id=$this->input->post('id');
    $deldb=$this->db->where('id',$id)->delete('product_price');
    $data['success']=true;
    echo json_encode($data);
   }
   public function coupan()
   {
    $this->load->view('cp/coupan');
   }
   public function managecoupan()
   {
    $id=$this->input->post('coupanid');
    $coupan_code=$this->input->post('coupan_code');
    $vendor_id=$this->input->post('vendor_id');
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