<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

  //Contoh pengambilan data dengan
  //Query Manual
	// public function getQueryArray()
	// {
	// 	$query = $this->db->query("SELECT * FROM biodata");
	// 	return $query->result_array();
	// }
  //
	// public function getQueryObject()
	// {
	// 	$query = $this->db->query("SELECT * FROM biodata");
	// 	return $query->result();
	// }

  //Contoh pengambilan data dengan
  //Query Builder

  // public function getBuilderArray()
	// {
	// 	$query = $this->db->get("biodata");

  // // Return dalam bentuk object
	// 	return $query->result_array();
	// }

	public function getBuilderObject()
	{
    //Mendapatkan seluruh data dari table biodata
		$query = $this->db->get('biodata');

    // Return dalam bentuk object
		return $query->result();
	}

}

/* End of file Biodata_model.php */
/* Location: ./application/models/Biodata_model.php */
