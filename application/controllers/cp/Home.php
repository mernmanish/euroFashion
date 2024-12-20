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
    $query = $this->db->select('status, COUNT(*) AS count')
                  ->from('orders')
                  ->group_by('status')
                  ->get()->result_array();
   	 $this->load->view('cp/dashboard',['query'=>$query]);
   }
   public function customer_list()
   {
   	$this->load->view('cp/customer-list');
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
   	$this->load->view('cp/deliverd-order');
   }
   public function new_ordered()
   {
   	$this->load->view('cp/new-ordered');
   }
   public function technical_support()
   {
    $this->load->view('cp/technical-support');
   }
}
?>