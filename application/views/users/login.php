<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main role="main" class="container">
  <section class="jumbotron text-center">
    <div class="container">
      <img src="<?php echo base_url('assets/icon.png') ?>" alt="">
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <center>
          <?php if($this->session->flashdata('login_failed')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
          <?php endif; ?>
          </center>
          <?php
          $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          echo validation_errors();
          echo form_open('user/login');
          ?>
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          <?php echo form_close(); ?>
          <br>
          Tidak punya akun ? <a href="<?php echo site_url('user/register') ?>">Daftar</a>
        </div>
      </div>
    </div>
  </section>
</main>
