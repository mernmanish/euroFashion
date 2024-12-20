<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	 {
	  parent::__construct();
	 }
   public function index()
   {
   	 $this->load->library('form_validation');
     $this->load->library('session');
     //$this->session->start();
   	 $this->load->view('index');
   }

   public function createOrder()
   {
   		$this->form_validation->set_rules('name', 'Name', 'required');
   		$this->form_validation->set_rules('email', 'Email', 'required');
   		$this->form_validation->set_rules('phone', 'Phone', 'required');
        if($this->form_validation->run())
        {
        	 $name = $this->input->post('name');
           $email = $this->input->post('email');
           $phone = $this->input->post('phone');
           $postal_code = $this->input->post('postal_code');
           $address = $this->input->post('address');
           $pro_id = $this->input->post('pro_id');

        	 $subjects="New Order Generated from Website with customer name ".$name." and ".$phone." Postal code ".$postal_code." Address ".$address."";
            
          $this->load->library('email');
	        $this->email->from($email);
	        $this->email->to('hippielify@gmail.com');
	        $this->email->subject('New Order');
	        $this->email->message($subjects);
          $this->session->set_flashdata('success', 'Order Confirm Successfully');
	        // $this->email->send()
            if($this->email->send())
            {
                
                redirect(base_url() . 'Product/checkout/'.$pro_id.'');
            }
            else
            {
                $this->session->set_flashdata('error', 'Error While Sending Order!');
            }
        }
        else
        {
            $this->index();
        }
   }

   public function login()
   {
    $this->load->view('login');
   }

   public function registration()
   {
    $this->load->view('registration');
   }
  
}