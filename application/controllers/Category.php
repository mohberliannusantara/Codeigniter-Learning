<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// $this->load->helper('MY');

		$this->load->model('blog_model');
		$this->load->model('category_model');
	}

	public function index()
	{
		$data['page_title'] = 'List Kategori';

		// mendapatkan semua kategori
		//dan memasukkannya ke array bernama categories
		$data['categories'] = $this->category_model->get_all();

		$this->load->view('templates/header');

		//Passing data ke cat_view
		$this->load->view('categories/cat_view', $data);

		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data['page_title'] = 'Buat Kategori Baru';

		// meload helper dan library untuk validasi
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Form validasi
		$this->form_validation->set_rules(
			'cat_name',
			'Nama Kategori',
			'required|is_unique[categories.cat_name]',
			array(
				'required' => 'Isi %s donk, males amat.',
				'is_unique' => 'Judul <strong>' . $this->input->post('cat_name') . '</strong> sudah ada bosque.'
			)
		);

		// Cek inputan valid atau tidak
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('categories/cat_create', $data);
			$this->load->view('templates/footer');

		} else {
			$this->category_model->create();
			redirect('category');
		}
	}

	public function artikel($id)
	{
		$data['page_title'] = $this->category_model->get_category_by_id($id)->cat_name;

		$data['all_artikel'] = $this->blog_model->get_by_category($id);

		$this->load->view('templates/header');
		$this->load->view('blogs/blog_view', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id = NULL)
	{
		$data['page_title'] = 'Edit Kategori';

		$data['category'] = $this->category_model->get_category_by_id($id);

		// cek apakah id kosong atau tidak
		if ( empty($id) || !$data['category'] ) redirect('blog');

		$this->load->helper('form');
		// meload library form_validation
		$this->load->library('form_validation');

		// validasi input
		$this->form_validation->set_rules('cat_name', 'Nama Kategori', 'required',
		array('required' => 'Isi %s donk, males amat.'));
		$this->form_validation->set_rules('cat_description', 'Deskripsi', 'required');

		// Cek apakah input valid atau tidak
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('categories/cat_edit', $data);
			$this->load->view('templates/footer');

		} else {

			$post_data = array(
				'cat_name' => $this->input->post('cat_name'),
				'cat_description' => $this->input->post('cat_description'),
			);

			$this->load->view('templates/header');

			if ($this->category_model->update($post_data, $id)) {
				$this->load->view('blogs/blog_success', $data);
			} else {
				$this->load->view('blogs/blog_failed', $data);
			}
			$this->load->view('templates/footer');

		}
	}

	public function delete($id)
	{
		$data['page_title'] = 'Delete category';

		$this->category_model->delete($id);

		$this->load->view('templates/header');
		$this->load->view('categories/cat_success', $data);
		$this->load->view('templates/footer');

	}

}
