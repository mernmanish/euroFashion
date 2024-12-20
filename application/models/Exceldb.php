<?php

class Exceldb extends CI_Model
{
	public function import_excel_item($data)
	{
		$this->db->insert_batch('product', $data);
	}
}

?>