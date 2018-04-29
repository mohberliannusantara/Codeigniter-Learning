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

		//cek apakah judul/slug kosong atau tidak
		if ( empty($slug) || !isset($data['artikel']) ) show_404();

		$this->load->view("templates/header");

		// Passing data ke view blog_read
		$this->load->view('blogs/blog_read', $data);

		$this->load->view("templates/footer");
	}

	// Membuat fungsi edit
	public function edit($id = NULL)
	{

		$data['page_title'] = 'Edit Artikel';

		// mendapatkan artikel dari model berdasarkan id
		$data['artikel'] = $this->blog_model->get_by_id($id);

		// cek apakah id kosong atau tidak
		if ( empty($id) || !$data['artikel'] ) redirect('blog');

			$data['categories'] = $this->category_model->generate_cat_drop;

			$old_image = $data['artikel']->post_thumbnail;

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // validasi input
			$this->form_validation->set_rules('title', 'Judul', 'required',
				array('required' => 'Isi %s donk, males amat.'));
		    $this->form_validation->set_rules('text', 'Konten', 'required|min_length[8]',
				array(
					'required' 		=> 'Isi %s lah, hadeeh.',
					'min_length' 	=> 'Isi %s kurang panjang bosque.',
				));

		    // Cek apakah input valid atau tidak
		    if ($this->form_validation->run() === FALSE)
		    {
		        $this->load->view('templates/header');
		        $this->load->view('blogs/blog_edit', $data);
		        $this->load->view('templates/footer');

		    }
				else {

	    		// cek apakah user upload gambar
	    		if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
	    		{
	    			// Konfigurasi folder upload & file yang diijinkan
	    			$config['upload_path']          = './uploads/';
	    	        $config['allowed_types']        = 'gif|jpg|png';
	    	        $config['max_size']             = 100;
	    	        $config['max_width']            = 1024;
	    	        $config['max_height']           = 768;

	    	        $this->load->library('upload', $config);

	    	        // cel apakah file berhasil diupload atau tidak
	    	        if ( ! $this->upload->do_upload('thumbnail'))
	    	        {
	    	        	$data['upload_error'] = $this->upload->display_errors();

	    	        	$post_image = '';

	    	          $this->load->view('templates/header');
	    	          $this->load->view('blogs/blog_edit', $data);
	    	          $this->load->view('templates/footer');

	    	        } else {

									// cek apakah ada file lama atau tidak
	    	        	if( !empty($old_image) ) {
										//jika ada maka hapus file lama
	    	        		if ( file_exists( './uploads/'.$old_image ) ){
	    	        		    unlink( './uploads/'.$old_image );
	    	        		} else {
	    	        		    echo 'File tidak ditemukan.';
	    	        		}
	    	        	}

	    	            $img_data = $this->upload->data();
	    	            $post_image = $img_data['file_name'];

	    	        }
	    		} else {

	    			$post_image = ( !empty($old_image) ) ? $old_image : '';

	    		}

		    	$post_data = array(
		    	    'fk_cat_id' => $this->input->post('cat_id'),
		    	    'post_title' => $this->input->post('title'),
		    	    'post_content' => $this->input->post('text'),
		    	    'post_thumbnail' => $post_image,
		    	);

		    	if( empty($data['upload_error']) ) {

			        $this->blog_model->update($post_data, $id);

			        $this->load->view('templates/header');
			        $this->load->view('blogs/blog_success', $data);
			        $this->load->view('templates/footer');
		    	}
		    }
		}

		// Membuat fungsi delete
		public function delete($id)
		{

			$data['page_title'] = 'Delete artikel';

			//mendapatkan artikel dari model berdasarkan id
			$data['artikel'] = $this->blog_model->get_by_id($id);

			// cek apakah id kosong atau tidak
			if ( empty($id) || !$data['artikel'] ) show_404();

			$old_image = $data['artikel']->post_thumbnail;

			//cek apakah ada file lama atu tidak
	    	if( !empty($old_image) ) {
					// jika ada maka hapus file lama
	    		if ( file_exists( './uploads/'.$old_image ) ){
	    		    unlink( './uploads/'.$old_image );
	    		} else {
	    		    echo 'File tidak ditemukan.';
	    		}
	    	}

	      if( ! $this->blog_model->delete($id) )
	      {
		      $this->load->view('templates/header');
		      $this->load->view('blogs/blog_failed', $data);
		      $this->load->view('templates/footer');
		    } else {
		    	$this->load->view('templates/header');
		        $this->load->view('blogs/blog_success', $data);
		        $this->load->view('templates/footer');
		    }
		}
}
