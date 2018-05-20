<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main role="main" class="container">
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><?php	echo $page_title ?></h1>
      <h6 class="text-muted">Silahkan Isi Username dan Password Anda</h6>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <?php
          $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          echo validation_errors();
          echo form_open('user/login'); ?>
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</main>
