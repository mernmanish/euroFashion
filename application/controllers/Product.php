<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$data['product']=$this->db->select('*')->from('product')->where('status','active')->get()->result_array();
		$data['category']=$this->db->select('*')->from('category')->get()->result_array();
		$this->load->view('product-list',$data);
	}
	public function category_wise_product_list()
	{
		$data['product']=$this->db->select('*')->from('product')->where('categoryid',$this->uri->segment(3))->get()->result_array();

		$this->load->view('category-wise-product-list',$data);
	}
	public function filterproduct()
	{
		$count_id=array();
	    $category_id=array();
	    if (!empty($this->input->post('category_id'))) {
	      $count_id = $this->input->post('category_id');
	    }
	    $this->db->select('*');
	    if(count($count_id)>0){
		    foreach($count_id as $key){
		      $this->db->or_where('categoryid',$key);
		    }
	    }
       $getdata=$this->db->get('product')->result_array(); 
       $data="";
      if(!empty($getdata)){ foreach($getdata as $row){
   		$variation = $this->db->select('*')->from('product_variation')->where('pro_id',$row['id'])->get()->result_array();
        $size = $this->db->select('*')->from('size')->where('id',$variation[0]['size_id'])->get()->result_array();
         $data.='<div class="col mb-30">
	                <div class="product__items ">
	                    <div class="product__items--thumbnail">
	                        <a class="product__items--link" href="'.base_url().'Product/product_details/'.$row['id'].'">
	                            <img class="product__items--img product__primary--img productImage" src="'.base_url().''.$row['image'].'" alt="product-img">
	                            <img class="product__items--img product__secondary--img productImage" src="'.base_url().''.$row['second_image'].'" alt="product-img">
	                        </a>
	                        <div class="product__badge">
	                            <span class="product__badge--items sale">'.$row['sale_type'].'</span>
	                        </div>
	                    </div>
	                    <div class="product__items--content">
	                        <h4 class="product__items--content__title h4"><a href="<?php echo base_url(); ?>product-details.php">'.substr($row['name'], 0,32).'</a></h4>
	                        <div class="product__items--price">
	                            <span class="current__price">$'.$variation[0]['sale_price'].'</span>
	                            <span class="price__divided"></span>
	                            <span class="old__price">$'.$variation[0]['price'].'</span>
	                        </div>
	                       	<div>
                           <span class="text-success" style="font-weight: bold;">MOQ: '.$size[0]['name'].'</span>
                           </div>
	                        <ul class="product__items--action d-flex">
	                            <li class="product__items--action__list">
	                                <a class="product__items--action__btn add__to--cart" href="">
	                                    <svg class="product__items--action__btn--svg" xmlns="" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
	                                        <g transform="translate(0 0)">
	                                          <g>
	                                            <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
	                                            <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
	                                            <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
	                                          </g>
	                                        </g>
	                                    </svg>
	                                    <span class="add__to--cart__text"> + Order Now</span>
	                                </a>
	                            </li>
	                            
	                        </ul>
	                    </div>
	                </div>
	            </div>';
       
         }
     }
      else{
            $data.="<h4>No Data found</h4>";
         }
     
      echo $data;
	}

	public function product_details()
	{
		$id = $this->uri->segment(3);
		$data['product'] = $this->db->where('id',$id)->get('product')->row_array();
		$this->load->view('product-details',$data);
	}
	public function single($id)
	{
	        $data['product'] = $this->db->where('categoryid', $id)->get('product')->result_array();
	   	    $this->load->view('single-product', $data);
	}
	public function searchProduct()
	{
		$output = "";
	      if(!empty($this->input->post('keyword'))) {
	         $keyword = $this->input->post('keyword');
	         $result = $this->db->select('name,id,image')
	                           ->like('name', $keyword)
	                           ->get('category', 10)->result_array();

	         if(!empty($result)) {
	         $output = '<ul class="list-group" id="product-list" style="position: absolute;z-index:999;width: 27.5%;">';
	         foreach($result as $prod) {
	         	 $output .= '<li class="list-group-item list-group-item-action" style="cursor: pointer"><a class="text-dark d-block" href="'.base_url('product/single/'.$prod['id']).'"><img src="'.base_url($prod['image']).'" class="img-fluid" width="50px" height="20px" />&nbsp;&nbsp; '.$prod['name'].'</a></li>';
	            // $output .= '<li class="list-group-item list-group-item-action" style="cursor: pointer" onclick="selectProduct('.$prod['name'].')"><a class="text-dark d-block" href="'.base_url('Product/index?#product'.$prod['id']).'">'.$prod['name'].'</a></li>';
	         }
	     } else {
	        $output .= '<li class="list-group-item list-group-item-action">No Records found :(</li>';
	     }
	     $output .= '</ul>';
	     echo $output;
	   }
	}

	public function addtocart()
	{

		$pro_id = $this->input->post('pro_id');
		$variation_id = $this->input->post('variation_id');
		$quantity = 1;
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$count = $this->db->where(['pro_id'=>$pro_id,'ip_address'=>$ip_address])->from("cart")->count_all_results();
		if($count > 0)
		{
			$data['success']=true;
            $data['status']="avail";
		}
		else
		{
			$insertData = array(
				'pro_id' => $pro_id,
				'price_id' => $variation_id,
				'quantity' => $quantity,
				'ip_address' => $ip_address			
			);
			if($this->db->insert('cart',$insertData))
			{
			   $counts = $this->db->where(['ip_address'=>$ip_address])->from("cart")->count_all_results();	
				$data['counts'] = $counts;
				$data['success'] = true;
			}
			else
			{
				$data['success'] = false;
			}
	    }
		echo json_encode($data);
	}
	public function my_cart()
	{
		$data['cart'] = $this->db->where(['ip_address'=>$_SERVER['REMOTE_ADDR']])->from("cart")->get()->result_array();
		$this->load->view('cart',$data);
	}
	public function checkout()
	{
		
		$this->load->view('check-out');
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */