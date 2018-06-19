<?php
class User extends CI_Controller{

  public function __construct(){
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('user_model');
  }

  public function register(){
    $data['page_title'] = 'Registrasi User';

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
    $this->form_validation->set_rules('kodepos', 'Kodepos', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('users/register', $data);
      $this->load->view('templates/footer');
    } else {
      // Encrypt password
      $enc_password = md5($this->input->post('password'));

      $this->user_model->register($enc_password);

      $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

      redirect('blog');
    }
  }

  public function login(){
    $data['page_title'] = 'Login';

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() === FALSE){

      $this->load->view('templates/header');
      $this->load->view('users/login', $data);
      $this->load->view('templates/footer');

    } else {
      $username = $this->input->post('username');
      // Get & encrypt password
      $password = md5($this->input->post('password'));

      $user_id = $this->user_model->login($username, $password);

      if($user_id){
        $user_data = array(
          'user_id' => $user_id,
          'username' => $username,
          'logged_in' => true,
          'level' => $this->user_model->user_level($user_id)
        );

        $this->session->set_userdata($user_data);

        $this->session->set_flashdata('user_login', 'You are now logged in');

        redirect('user/home');

        // if ($user_data->level == 1) {
        //   redirect('biodata');
        // }elseif ($user_data->level == 2) {
        //   redirect('blog');
        // }
        // if($user_id){
        //     $this->session->set_flashdata('user_loggedin', 'You are logged in' . $username );
        //     redirect('user/dashboard');
        // } else {
        //     $this->session->set_flashdata('login_failed', 'Login invalid');
        //     redirect('user/login');
        // }

      }
      else {

        $this->session->set_flashdata('login_failed', 'Login is invalid');

        redirect('user/login');
      }
    }
  }

  public function logout(){
    // Unset user data
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');

    redirect('blog');
  }

  public function home(){

    if(!$this->session->userdata('logged_in')){
      redirect('user/login');
    }

    $username = $this->session->userdata('username');

    // Dapatkan detail user
    $data['user'] = $this->user_model->user_details($username);

    // Load dashboard
    $this->load->view('templates/header');
    $this->load->view('pages/home_view', $data);
    $this->load->view('templates/footer');
  }

}
?>
