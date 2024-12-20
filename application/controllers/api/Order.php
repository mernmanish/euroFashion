<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
use \Firebase\JWT\JWT;
require_once APPPATH . '/core/BD_Controller.php';
class Order extends BD_Controller {
      
    public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Order_db');
    }
    public function order_get($id = 0) {
        $catlist = $this->Order_db->getRows($id);
        if(!empty($catlist)){
            $this->response($catlist, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function order_post()
    {
        $cust_id= $this->post('cust_id');
        $state_id = $this->post('state_id');
        $mob_no=$this->post('mob_no');
        $city_id=$this->post('city_id');
        $pin_code=$this->post('pin_code');
        $fulladdress=$this->post('fulladdress');
        $landmark=$this->post('landmark');
        $extra=$this->post('extra');
        $ip_address=$_SERVER['REMOTE_ADDR'];
        $rand = \random_int(100000, 999999);
        $order_no = "VGMTO".$rand;
        $order_date=date('d-m-Y');
        $pro_id=$this->post('pro_id');  
        $qty=$this->post('qty');
        $size=$this->post('size');
        $unit=$this->post('unit');
        $price=$this->post('price');
        $time_slot=$this->post('time_slot');
        $payment_mode=$this->post('payment_mode');
        if(!empty($this->post('branch_id')))
        {
          $branch_id=$this->post('branch_id');  
        }
        else
        {
          $branch_id="";  
        }
        if(!empty($this->post('delivery_date')))
        {
          $delivery_date=$this->post('delivery_date');  
        }
        else
        {
          $delivery_date="";  
        }
        if(!empty($this->post('payment_status')))
        {
          $payment_status=$this->post('payment_status');  
        }
        else
        {
          $payment_status="";  
        }
        if(!empty($this->post('total_amount')))
        {
          $total_amount=$this->post('total_amount');  
        }
        else
        {
          $total_amount="";  
        }
        if(!empty($this->post('coupan_amount')))
        {
          $coupan_amount=$this->post('coupan_amount');  
        }
        else
        {
          $coupan_amount="";  
        }
        if(!empty($this->post('wallet_amount')))
        {
          $wallet_amount=$this->post('wallet_amount');  
        }
        else
        {
          $wallet_amount="";  
        }
        $year=date("Y");
        $month=date("F");
         $orderdata=array(
            'cust_id'=>$cust_id,
            'branch_id'=>$branch_id,
            'wallet_amount'=>$wallet_amount,
            'coupan_amount'=>$coupan_amount,
            'mob_no'=>$mob_no,
            'state_id'=>$state_id,
            'city_id'=>$city_id,
            'pin_code'=>$pin_code,
            'fulladdress'=>$fulladdress,
            'landmark'=>$landmark,
            'pro_id'=>$pro_id,
            'qty'=>$qty,
            'extra'=>$extra,
            'size'=>$size,
            'unit'=>$unit,
            'price'=>$price,
            'ip_address'=>$ip_address,
            'order_no'=>$order_no,
            'order_date'=>$order_date,
            'time_slot'=>$time_slot,
            'year'=>$year,
            'month'=>$month,
            'payment_mode'=>$payment_mode,
            'delivery_date'=>$delivery_date,
            'payment_status'=>$payment_status,
            'total_amount'=>$total_amount
          );
        if($this->db->insert('orders',$orderdata)){ 
       $this->response([
                'status' => TRUE,
                'order_no'=>$order_no,
                'message' => 'Data has been added successfully.'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function ordercanceled_post()
    {
        $order_id= $this->post('order_id');
        $cancelorder=array(
            'id'=>$order_id,
            'status'=>3
        );
       if($this->db->where('id',$order_id)->update('orders',$cancelorder)){ 
       $this->response([
                'status' => TRUE,
                'message' => 'Order has been Cancelled successfully.'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
   
    public function bulkorder_post()
    {
        $custData = array();
        $custData['cust_id']=$this->post('cust_id');
        $custData['image']=$this->post('image');
        $rand = \random_int(100000, 999999);
        $custData['order_no'] = "VGMTO".$rand;
        $custData['ip_address']=$_SERVER['REMOTE_ADDR'];
        $custData['order_date']=date('d-m-Y');
        $custData['state_id']=$this->post('state_id');
        $custData['city_id']=$this->post('city_id');
        $custData['pin_code']=$this->post('pin_code');
        $custData['fulladdress']=$this->post('fulladdress');
        $custData['landmark']=$this->post('landmark');
        $custData['branch_id']=$this->post('branch_id');
        if(!empty($custData['cust_id'])){
            $insert = $this->Order_db->insert($custData);
            if($insert){
                $this->response([
                    'status' => TRUE,
                    'order_no'=>$custData['order_no'],
                    'message' => 'Order Uploaded successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response("Provide complete Order information to create.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function paymentstatus_post()
    {
        $cust_id=$this->post('cust_id');
        $order_id=$this->post('order_id');
        $payment_status=$this->post('payment_status');
        $statusData=array(
            'cust_id'=>$cust_id,
            'order_id'=>$order_id,
            'payment_status'=>$payment_status
        );
        if(!empty($cust_id)){
          
            if($this->db->insert('payment_status',$statusData)){
                $this->response([
                    'status' => TRUE,
                    'message' => 'Order Status Added successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response("Provide complete Order information to create.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
  }
?>