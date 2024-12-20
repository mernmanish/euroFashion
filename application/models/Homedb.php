<?php

class Homedb extends CI_Model
{

 
 function fetch_chart_data($year)
 {
  $this->db->select('year,month,sum(net_amount) as totalamount');
  $this->db->where('year', $year);
  $this->db->order_by('year', 'ASC');
  return $this->db->get('sale');
 }
}

?>