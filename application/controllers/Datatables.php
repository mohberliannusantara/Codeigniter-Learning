<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

  public function index()
  {
    $artikel['page_title'] = 'DataTable List Artikel';

    $this->load->model('blog_model');

    $artikel['data'] = $this->blog_model->get_all();

    $this->load->view("templates/header");
    //passing data ke view
    $this->load->view('datatables/dt_view', $artikel);
    $this->load->view("templates/footer");
  }
}
