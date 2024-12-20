<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

class Pricerange_db extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getRows($id = "")
    {
        if(!empty($id)){
            $query=$this->db->query("SELECT * FROM `product_price` WHERE `id`='".$id."'");
            return $query->result_array();
        }else{
            $query = $this->db->query("SELECT * FROM `product_price` WHERE `status`='1'");
            return $query->result_array();
        }
    }
}