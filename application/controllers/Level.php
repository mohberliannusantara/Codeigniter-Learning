<?php
class Level extends CI_Controller{

  public function __construct(){
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('level_model');
  }

  public function index()
	{
		$data['page_title'] = 'List Level';
		$data['all_level'] = $this->level_model->get_all();

		$this->load->view('templates/header');
		$this->load->view('level/level_view', $data);
		$this->load->view('templates/footer');
	}

  public function create(){
    $data['page_title'] = 'Tambah Level User';

    $this->form_validation->set_rules('nama_level', 'Nama_level', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('level/level_create', $data);
      $this->load->view('templates/footer');
    } else {
      $post_data = array(
				'nama_level' => $this->input->post('nama_level'),
			);
      $this->level_model->create($post_data);
      redirect('level');
    }
  }

  public function edit($id = NULL)
  {
    $data['page_title'] = 'Edit Level';

    $data['level'] = $this->level_model->get_level_by_id($id);

    $this->load->helper('form');

    $this->load->library('form_validation');

    // validasi input
    $this->form_validation->set_rules('nama_level', 'Nama_level', 'required');

    // Cek apakah input valid atau tidak
    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header');
      $this->load->view('level/level_edit', $data);
      $this->load->view('templates/footer');

    } else {

      $post_data = array(
        'nama_level' => $this->input->post('nama_level'),
      );

      $this->level_model->update($post_data, $id);
      redirect('level');
    }
  }

  public function delete($id)
  {
    $this->level_model->delete($id);
    redirect('level');
  }
}
?>
