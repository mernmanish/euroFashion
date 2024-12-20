<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

class Login_db extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function login($mobile,$password)
    {
          $query=$this->db->query("SELECT * FROM `customer` WHERE `mobile`='".$mobile."' AND `password`='".$password."'");
           if($query->num_rows() > 0)
           {
             $user_data = $query->result();             
             return $user_data;
           }
           else
           {
            return false;
           }

    }

}
?>