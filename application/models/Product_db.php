<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

class Product_db extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getRows($id = "")
    {
        if(!empty($id)){
            $query=$this->db->query("SELECT product.*,`category`.`name` as `catname` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`categoryid` WHERE `product`.`status`='1' AND `product`.`id`='".$id."' ORDER BY mtime DESC");
            return $query->result_array();
        }else{
            $query = $this->db->query("SELECT product.*,`category`.`name` as `catname` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`categoryid` WHERE `product`.`status`='1' ORDER BY mtime DESC");
            return $query->result_array();
        }
    }
    public function searchproduct($keys)
    {
        /*$query=$this->db->query("SELECT * FROM `product` where `name` like '%".$keys."%'");*/
        $query=$this->db->query("SELECT product.*,`category`.`name` as `catname` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`categoryid` WHERE `product`.`name` like '%".$keys."%' OR  `category`.`name` like '%".$keys."%'");
        return $query->result_array();
    }
}