<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{
   public function index()
   {
   	 $this->load->view('vendor/product');
   }
   public function change_product()
   {
   	$unit_id=$this->input->post('unit_id');
    $sqlcity=$this->db->select('*')->where('unitid',$unit_id)->get('size')->result();
    $sqlcity=json_decode(json_encode($sqlcity),true);
    $output='<option value="">Select Size</option>';
    foreach($sqlcity as $rows)
    {
        $output .= '<option value="'.$rows['id'].'">'.$rows['name'].'</option>';

    }
      echo  $output;
   }
  public function manage_product()
   {
    $id=$this->input->post('pid');
    $categoryid=$this->input->post('categoryid');
    $name=$this->input->post('name');
     $vendor_id=$this->session->userdata('sessionuser')['userid'];
     $sku_no=$this->input->post('sku_no');
     $brandid=$this->input->post('brandid');
     $short_description=$this->input->post('short_description');
     $description=$this->input->post('description');
     if(!empty($this->input->post('stock_type')))
     {
     $stock_type=$this->input->post('stock_type');
     }
     else
     {
      $stock_type="";
     }
     if(!empty($this->input->post('sale_type')))
     {
        $sale_type=$this->input->post('sale_type');
     }
     else
     {
       $sale_type="";
     }
     $ctime=date('Y-m-d H:i:s');
     $cuid=$this->session->userdata('sessionuser')['id'];
     $muid=$this->session->userdata('sessionuser')['id'];
      $catfolder=APPPATH.'../img/product';
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
        $target='img/product/'.$name."/".$newfilename;
     }
    $second_image=$_FILES['second_image']['name'];
    $target2="";
     if ($second_image!="") {
       $temp = explode(".", $_FILES["second_image"]["name"]);
        $newfilename = $name .rand(). '-second_image.'.$temp[1];
        $tmp_name=$_FILES['second_image']['tmp_name'];
        $target2=$categoryfolder."/".$newfilename;
        move_uploaded_file($tmp_name, $target2);
        $target2='img/product/'.$name."/".$newfilename;
     }
      $gallery=$_FILES['gallery']['name'];
      $target1="";
      $uptarget1="";
      //print_r($gallery);
      if ($gallery!="") {
        $total = count($_FILES['gallery']['name']);
        for( $i=0 ; $i < $total ; $i++ ) {
          $tmpFilePath = $_FILES['gallery']['tmp_name'][$i];
          if ($tmpFilePath != ""){
             $newFilePath = $categoryfolder."/" . $_FILES['gallery']['name'][$i];
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
              $newFilePath = "img/product/".$name."/". $_FILES['gallery']['name'][$i];
              if (empty($target1)) {
               $target1.=$newFilePath;
              }else{
             $target1.=",".$newFilePath;
            }
            }
          }
        }
        $uptarget1="`gallery`='".$target1."',";
       }
      $unit_id=$this->input->post('unit_id');
      $size_id=$this->input->post('size_id');
      $price=$this->input->post('price');   
      $sale_price=$this->input->post('sale_price');
      $price_id=$this->input->post('price_id');
      if($id=="")
      {
        $insertdata=array(
        'vendor_id'=>$vendor_id,
        'name'=>$name,
        'sku_no'=>$sku_no, 
        'vendor_id'=>$vendor_id, 
        'categoryid'=>$categoryid,
        'brandid'=>$brandid,
        'short_description'=>$short_description,
        'description'=>$description, 
        'stock_type'=>$stock_type,
        'sale_type'=>$sale_type,
        'image'=>$target,
        'second_image'=>$target2,
        'gallery'=>$target1,
        'cuid'=>$cuid,
        'muid'=>$muid,
        'ctime'=>$ctime
        );
        if ($this->db->insert('product',$insertdata)) {
         $pro_id = $this->db->insert_id();
         foreach($unit_id as $keys =>$vals)
         {
         $pVaritation= array(
          'pro_id'=>$pro_id,
          'unit_id'=>$vals,
          'size_id'=>$size_id[$keys], 
          'price'=>$price[$keys],
          'sale_price'=>$sale_price[$keys], 
          'price_id'=>$price_id[$keys],
          'ctime'=>$ctime
         );
           $this->db->insert('product_variation',$pVaritation);
        }
        if($this->input->post('no_of_stock'))
        {
          $addstockitem = array(
            'pro_id' => $pro_id,
            'total_add_in_stock' =>$this->input->post('no_of_stock'),
            'in_stock_item' =>$this->input->post('no_of_stock'),
            'created_at' =>$ctime,
          );
          $this->db->insert('product_inventries',$addstockitem);
        }
        $data['status']="added";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
        
      }
        else{
        $insertdata=array(
        'id' => $id,
        'vendor_id'=>$vendor_id,
        'name'=>$name,
        'sku_no'=>$sku_no, 
        'brandid'=>$brandid, 
        'categoryid'=>$categoryid,
        'short_description'=>$short_description,
        'description'=>$description,  
        'stock_type'=>$stock_type,
        'sale_type'=>$sale_type,
        'muid'=>$muid
        );
        $imgarray=array();
        $galarray=array();
        $secondimage=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
         if ($target1!="") {
          $galarray['gallery']=$target1;
        }
        if($target2!="")
        {
          $secondimage['second_image']=$target2;
        }
        $insertdata=array_merge($insertdata,$galarray,$imgarray,$secondimage);
        if($this->db->where('id',$id)->update('product',$insertdata)) {
        foreach($unit_id as $keys =>$vals)
        {
         $sqlex=$this->db->select('*')->from('product_variation')->where(['pro_id'=>$id,'unit_id'=>$vals])->get()->result_array();
         if(!empty($sqlex[0]['unit_id']))
         {
         $pVaritation= array(
          'pro_id'=>$id,
          'unit_id'=>$vals,
          'size_id'=>$size_id[$keys], 
          'price'=>$price[$keys],
          'sale_price'=>$sale_price[$keys], 
          'price_id'=>$price_id[$keys]
         );
          $this->db->where(['pro_id'=>$id,'unit_id'=>$vals])->update('product_variation',$pVaritation);
        }
        else
        {
          $pVaritation= array(
          'pro_id'=>$id,
          'unit_id'=>$vals,
          'size_id'=>$size_id[$keys], 
          'price'=>$price[$keys],
          'sale_price'=>$sale_price[$keys], 
          'price_id'=>$price_id[$keys],
          'ctime'=>$ctime
         );
          $this->db->insert('product_variation',$pVaritation);
        }
      }
      if($this->input->post('no_of_stock') >= 1)
        {
         
          $product_inventries = $this->db->select('*')->from('product_inventries')->where('pro_id',$id)->get()->result_array();
          if(!empty($product_inventries[0]['pro_id']))
          {
            $updatestockitem = array(
              'pro_id' => $id,
              'total_add_in_stock' =>$product_inventries[0]['total_add_in_stock']+$this->input->post('no_of_stock'),
              'in_stock_item' =>$product_inventries[0]['in_stock_item']+$this->input->post('no_of_stock'),
            );
            $this->db->where('pro_id',$id)->update('product_inventries',$updatestockitem);
          }
          else
          {
            $addstockitem = array(
            'pro_id' => $id,
            'total_add_in_stock' =>$this->input->post('no_of_stock'),
            'in_stock_item' =>$this->input->post('no_of_stock'),
            'created_at' =>$ctime,
          );
          $this->db->insert('product_inventries',$addstockitem);
          }
        }

        $data['status']="updated";
        $data['success']=true;
        }else{
          $data['success']=false;
        }
      }
         echo json_encode($data);

   }
   public function delete_product()
   {
    $id=$this->input->post('id');
    $deleteproduct=$this->db->where('id',$id)->delete('product');
    $data['success']=true;
    echo json_encode($data);
   }
   public function filter_product()
   {
    $productsearch=$this->input->post('productsearch');
    $brandid=$this->input->post('brandid');
    $categoryid=$this->input->post('categoryid');//
    $this->db->select('product.*,brand.name as brandname,category.name as categoryname,unit.name as unitname,size.name as sizename,product_price.pricerange')->from('product')->join('category','category.id=product.categoryid')->join('brand','brand.id=product.brandid')->join('unit','unit.id=product.unit_id')->join('size','size.id=product.size_id')->join('product_price','product_price.id=product.price_id');
    $this->db->like('product.name', $productsearch);
    if($brandid!=""){
      $this->db->like('product.brandid',$brandid);
    }
    if($categoryid!=""){
      $this->db->like('product.categoryid',$categoryid);
    }
  /*->like('product.brandid',$brandid)->like('product.categoryid',$categoryid)*/
    $getdata=$this->db->get()->result_array(); 
    //echo $this->db->last_query();
       $data="";
        $i=1;
      if(!empty($getdata)){ foreach($getdata as $rows){
         $data.='<tr>
                      <th>'.$i.'</th>';
                      if(!empty($rows['image'])){
                      $data.='<td><img src="'.base_url().''.$rows['image'].'" style="height: 45px;"></td>';
                      } else {
                      $data.='<td></td>';
                      }
                      $data.='<td>'.$rows['name'].'</td>
                      <td>'.$rows['brandname'].'</td>
                      <td>'.$rows['categoryname'].'</td>
                      <td>'.$rows['unitname'].'</td>
                      <td>'.$rows['sizename'].'</td>
                      <td>'.$rows['price'].'</td>
                      <td>'.$rows['sale_price'].'</td>
                      <td>'.$rows['sale_type'].'</td>
                      <td>'.$rows['pricerange'].'</td>
                      <td>
                   <a  class="btn btn-warning btn-sm" href="'.base_url().'Product?do=update&id='.$rows['id'].'"><i class="fa fa-pencil"></i></a>
                  <button class="btn btn-success btn-sm" id="'.$rows['id'].'" onclick="deleteproduct(this.id)"><i class="fa fa-trash"></i></button></td>
                    </tr>';
         $i++;
         }
     }
      else{
            $data.="<tr><td colspan='12' style='text-align:center'>No Result Found</td></tr>";
         }
    echo json_encode($data);
   }
   public function changeproductdata()
   {
     if(empty($this->input->post('pro_id')))
      {
        $pro_id="";
      }
      else
      {
        $pro_id=$this->input->post('pro_id');
      }
     if(empty($this->input->post('price')))
      {
        $price="";
      }
      else
      {
        $price=$this->input->post('price');
      }
      if(empty($this->input->post('sale_price')))
      {
        $sale_price="";
      }
      else
      {
        $sale_price=$this->input->post('sale_price');
      }
      if(empty($this->input->post('sale_type')))
      {
        $sale_type="";
      }
      else
      {
        $sale_type=$this->input->post('sale_type');
      }
      if(empty($this->input->post('price_id')))
      {
        $price_id="";
      }
      else
      {
        $price_id=$this->input->post('price_id');
      }
      foreach($pro_id as $key =>$val)
      { 
        $updatedata=array(
          'id'=>$val,
          'price'=>$price[$key],
          'sale_price'=>$sale_price[$key],
          'sale_type'=>$sale_type[$key],
          'price_id'=>$price_id[$key]
        );
        
        if ($this->db->where('id',$val)->update('product',$updatedata)) {
        $data['success']=true;
        }else{
          $data['success']=false;
        }
      }
      echo json_encode($data);
   }
 
}
?>