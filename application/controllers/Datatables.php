<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
	}

  public function index()
  {
    $artikel['page_title'] = 'DataTable List Artikel';

    $artikel['data'] = $this->blog_model->get_all();

    $this->load->view("templates/header");
    //passing data ke view
    $this->load->view('datatables/dt_view', $artikel);
    $this->load->view("templates/footer");
  }

  public function get_json()
	{
		$artikel['data'] = $this->blog_model->get_all();
		echo json_encode($artikel);
	}

	public function view_json()
	{
		$this->load->view("templates/header");
		$this->load->view('datatables/dt_json');
		$this->load->view("templates/footer");
	}
}
