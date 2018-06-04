<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->helper('MY');
    $this->load->model('Biodata_model');
  }

  public function index()
	{
  	$data['page_title'] = 'List Biodata';

    //mengdapatkan data dari model
    // $data['biodata_query_array'] = $this->Biodata_model->getQueryArray();
 		// $data['biodata_query_object'] = $this->Biodata_model->getQueryObject();
 		// $data['biodata_builder_array'] = $this->Biodata_model->getBuilderArray();
 		$data['biodata_builder_object'] = $this->Biodata_model->getBuilderObject();

		$this->load->view("templates/header");

		// Passing data ke view
		$this->load->view('biodata/biodata_view', $data);
		$this->load->view("templates/footer");
	}
}


 ?>
