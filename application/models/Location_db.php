<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

class Location_db extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getCity($id = "")
    {
        if(!empty($id)){
            $query=$this->db->query("SELECT * FROM `city` WHERE `id`='".$id."'");
            return $query->result_array();
        }else{
            $query = $this->db->query("SELECT * FROM `city` WHERE `status`='1'");
            return $query->result_array();
        }
    }
    public function getState($id = "")
    {
        if(!empty($id)){
            $query=$this->db->query("SELECT * FROM `state` WHERE `id`='".$id."'");
            return $query->result_array();
        }else{
            $query = $this->db->query("SELECT * FROM `state` WHERE `status`='1'");
            return $query->result_array();
        }
    }
    public function getLocation($id = "")
    {
        if(!empty($id)){
            $query=$this->db->query("SELECT * FROM `location` WHERE `id`='".$id."'");
            return $query->result_array();
        }else{
            $query = $this->db->query("SELECT * FROM `location` WHERE `status`='1'");
            return $query->result_array();
        }
    }
}