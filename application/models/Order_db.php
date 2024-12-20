<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

class Order_db extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getRows($id = "")
    {
        if(!empty($id)){
            $query=$this->db->query("SELECT * FROM `orders` WHERE `cust_id`='".$id."' ORDER BY id DESC");
            return $query->result_array();
        }
    }
    public function insert($data = array()) {
          $custid=$data['cust_id'];
          $catfolder=APPPATH.'../img/Bulkorder';
          $categoryfolder=$catfolder.'/'.$custid;
          if (!is_dir($catfolder)) mkdir($catfolder, 0777, true);
          if (!is_dir($categoryfolder)) mkdir($categoryfolder, 0777, true);
        $image=$_FILES['image']['name'];
        $target="";
         if ($image!="") {
           $temp = explode(".", $_FILES["image"]["name"]);
            $newfilename =$custid. rand(). '-image.'.$temp[1];
            $tmp_name=$_FILES['image']['tmp_name'];
            $target=$categoryfolder."/".$newfilename;
            move_uploaded_file($tmp_name, $target);
            $target='img/Bulkorder/'.$custid."/".$newfilename;
         }
        else
        {
            $image="";
        }
        $imgarray=array();
        if ($target!="") {
          $imgarray['image']=$target;
        }
        else
        {
            $imgarray['image']="";
        }
        $data=array_merge($data,$imgarray);
        $insert = $this->db->insert('bulk_order', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
}