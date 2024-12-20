<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

class Slider_db extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getRows($id = "")
    {
        if(!empty($id)){
            $query=$this->db->query("SELECT * FROM `slider` WHERE `id`='".$id."'");
            return $query->result_array();
        }else{
            $query = $this->db->query("SELECT * FROM `slider` WHERE `status`='1'");
            return $query->result_array();
        }
    }
}