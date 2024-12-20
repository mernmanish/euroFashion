<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller
{
   public function __construct()
   {
    parent::__construct();
    date_default_timezone_set('Asia/Calcutta');
   }
   public function order_list()
   {
    // $filterStatus = $this->db->query('SELECT status, COUNT(*) AS count FROM orders GROUP BY status')->get()->result();
    // print_r($filterStatus);
    $query = $this->db->select('status, COUNT(*) AS count')
                  ->from('orders')
                  ->group_by('status')
                  ->get()->result_array();

    // $result = $query->result_array();
   	$this->load->view('cp/order-list',['query'=>$query]);
   }
   public function changeorderstatus()
   {
   	$id=$this->input->post('id');
    $status=$this->input->post('status');
      $updatedata=array(
        'id'=>$id,
        'status'=>$status
      );
      if($this->db->where('id',$id)->update('orders',$updatedata))
      {
        $data['success']=true;
      }
      else
      {
        $data['success']=false;
      }
    echo json_encode($data);
   }
   public function bulk_order()
   {
   	$this->load->view('cp/bulk-order');
   }
    public function changebulkorder()
   {
    $id=$this->input->post('id');
    $status=$this->input->post('status');
    if($status==1)
    {
      $updatedata=array(
        'id'=>$id,
        'status'=>0
      );
      if($this->db->where('id',$id)->update('bulk_order',$updatedata))
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
      if($this->db->where('id',$id)->update('bulk_order',$updatedata))
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
   public function bulk_product()
   {
   	$this->load->view('cp/bulk-product');
   }
   public function manageorderproduct()
   {
    $cust_id=$this->input->post('cust_id');
    $mob_no=$this->input->post('mob_no');
    $order_no=$this->input->post('order_no');
    $order_date=$this->input->post('order_date');
    $fulladdress=$this->input->post('fulladdress');
     $landmark=$this->input->post('landmark');
    $ip_address=$this->input->post('ip_address');
    $state_id=$this->input->post('state_id');
    $city_id=$this->input->post('city_id');
    $pin_code=$this->input->post('pin_code');
    $pro_id=$this->input->post('pro_id');
    $qty=$this->input->post('qty');
   
      $insertdata=array(
        'cust_id'=>$cust_id,
        'mob_no'=>$mob_no,
        'order_no'=>$order_no,
        'order_date'=>$order_date,
        'fulladdress'=>$fulladdress,
        'landmark'=>$landmark,
        'ip_address'=>$ip_address,
        'state_id'=>$state_id,
        'city_id'=>$city_id,
        'pin_code'=>$pin_code,
        'pro_id'=>$pro_id,
        'qty'=>$qty,
        'status'=>1
      );
        if ($this->db->insert('orders',$insertdata)) {
      
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
      echo json_encode($data);
   }
   public function invoice()
   {
   	$this->load->view('cp/invoice');
   }
   public function change_order()
   {
    $this->load->view('cp/change-order');
   }
    public function change_customermobile()
   {
    $cust_id=$this->input->post('cust_id');
    $editbrand=$this->db->select('*')->where('id',$cust_id)->get('customer')->result();
    $data['success']=true;
    $data['data']=json_decode(json_encode($editbrand),true)[0];
    echo json_encode($data);
   }
   public function changeorder()
   {
    $id=$this->input->post('ordid');
    $order_no=$this->input->post('order_no');
    $count=$this->db->select('*')->where('order_no',$order_no)->where('id<>',$id)->from('orders')->count_all_results();
     if ($count>0) {
       $data['success']=true;
        $data['status']="avail";
     }else{
     $branch_id=$this->input->post('branch_id');
     $cust_id=$this->input->post('cust_id');
     $mob_no=$this->input->post('mob_no');
     $state_id=$this->input->post('state_id');
     $city_id=$this->input->post('city_id');
     $pin_code=$this->input->post('pin_code');
     $fulladdress=$this->input->post('fulladdress');
     $landmark=$this->input->post('landmark');
     $order_date=$this->input->post('order_date');
     $ip_address=$_SERVER['REMOTE_ADDR'];
     $year=date("Y");
     $month=date("F");
     if(empty($this->input->post('pro_id')))
     {
      $pro_id="";
     }
     else
     {
       $pro_id=implode(",",$this->input->post('pro_id'));
     }
     if(empty($this->input->post('qty')))
     {
      $qty="";
     }
     else
     {
       $qty=implode(",",$this->input->post('qty'));
     }
     if(empty($this->input->post('size')))
     {
      $size="";
     }
     else
     {
       $size=implode(",",$this->input->post('size'));
     }
     if(empty($this->input->post('unit')))
     {
      $unit="";
     }
     else
     {
       $unit=implode(",",$this->input->post('unit'));
     }
     if(empty($this->input->post('price')))
     {
      $price="";
     }
     else
     {
       $price=implode(",",$this->input->post('price'));
     }
    
     if($id==""){
      $insertdata=array(
        'order_no'=>$order_no,  
        'branch_id'=>$branch_id,
        'cust_id'=>$cust_id,        
        'mob_no'=>$mob_no,        
        'state_id'=>$state_id,        
        'city_id'=>$city_id,        
        'pin_code'=>$pin_code,        
        'fulladdress'=>$fulladdress,        
        'landmark'=>$landmark,        
        'ip_address'=>$ip_address,        
        'order_date'=>$order_date,        
        'pro_id'=>$pro_id,               
        'qty'=>$qty,        
        'size'=>$size,        
        'unit'=>$unit,        
        'price'=>$price,        
        'year'=>$year,        
        'month'=>$month       
      );
        if ($this->db->insert('orders',$insertdata)) {
        $data['status']="added";
        $data['success']=true;
        }
        else{
          $data['success']=false;
        }
        }
        else{
        $insertdata=array(
        'id' => $id,
        'branch_id'=>$branch_id,
        'order_no'=>$order_no,        
        'cust_id'=>$cust_id,        
        'mob_no'=>$mob_no,        
        'state_id'=>$state_id,        
        'city_id'=>$city_id,        
        'pin_code'=>$pin_code,        
        'fulladdress'=>$fulladdress,        
        'landmark'=>$landmark,               
        'order_date'=>$order_date,        
        'pro_id'=>$pro_id,               
        'qty'=>$qty,        
        'size'=>$size,        
        'unit'=>$unit,        
        'price'=>$price
        );

        if ($this->db->where('id',$id)->update('orders',$insertdata)) {
        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
       }
     }
      echo json_encode($data);
   }
}