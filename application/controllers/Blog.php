<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('MY');
		$this->load->model('blog_model');
		$this->load->model('category_model');
	}

	public function index()
	{
		$data['page_title'] = 'List Artikel';

		// mendapatkan data dari model Blog
		//dan memasukkannya ke array bernama all_artikel
		$data['all_artikel'] = $this->blog_model->get_all();

		$this->load->view("templates/header");

		// Passing data ke blog_view
		$this->load->view('blogs/blog_view', $data);

		$this->load->view("templates/footer");
	}

	public function create()
	{
		$data['page_title'] = 'Tulis Artikel';

		// butuh meload helper dan library untuk validasi
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['categories'] = $this->category_model->generate_cat_dropdown();

		// validasi input
		$this->form_validation->set_rules('title', 'Judul', 'required|is_unique[blogs.post_title]',
		array(
			'required' 		=> 'Silahkan %s isi dulu gan.',
			'is_unique' 	=> 'Judul <strong>' .$this->input->post('title'). '</strong> data udah ada gan.'
		));

		$this->form_validation->set_rules('text', 'Konten', 'required|min_length[8]',
		array(
			'required' 		=> 'Silahkan %s isi dulu gan.',
			'min_length' 	=> 'Konten %s kurang panjang gan.',
		));

		// Cek inputan valid atau tidak
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('blogs/blog_create', $data);
			$this->load->view('templates/footer');

		} else {

			// Cek apakah upload gambar atau tidak
			if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				// Load library upload
				$this->load->library('upload', $config);

				// Cek apakah file berhasil diupload atau tidak
				if ( ! $this->upload->do_upload('thumbnail'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header');
					$this->load->view('blogs/blog_create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$slug = url_title($this->input->post('title'), 'dash', TRUE);

			$post_data = array(
			'fk_cat_id' => $this->input->post('cat_id'),
			'post_title' => $this->input->post('title'),
			'post_date' => date("Y-m-d H:i:s"),
			'post_slug' => $slug,
			'post_content' => $this->input->post('text'),
			'post_thumbnail' => $post_image,
			'date_created' => date("Y-m-d H:i:s"),
			);

			if( empty($data['upload_error']) ) {
				$this->blog_model->create($post_data);

				$this->load->view('templates/header');
				$this->load->view('blogs/blog_success', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function read($slug='')
	{

		// Mendapatkan data dari Blog_model
		$data['artikel'] = $this->blog_model->get_by_slug($slug);

		// Jika slug kosong atau tidak ada di db, lempar user ke halaman 404
		if ( empty($slug) || !isset($data['artikel']) ) show_404();

		$this->load->view("templates/header");

		// Passing data ke view
		$this->load->view('blogs/blog_read', $data);

		$this->load->view("templates/footer");
	}

}
