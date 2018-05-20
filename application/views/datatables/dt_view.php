<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
      <?php echo anchor('blog/create', 'Tulis Artikel', array('class' => 'btn btn-primary')); ?>
      <?php echo anchor('blog/', 'Lihat versi Card', array('class' => 'btn btn-success')); ?>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-block">
              <div class="container">
                  <br>
                  <h4 class="text-center">Versi Basic</h4>
                  <?php echo anchor('datatables/view_json"', 'Lihat Versi JSON', array('class' => 'btn btn-secondary float-center')); ?>
              </div>
              <br>
              <table id="dt-basic" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $d) : ?>
                    <tr>
                      <td><?php echo $d->post_id ?></td>
                      <td><?php echo $d->post_date ?></td>
                      <td><?php echo $d->post_title ?></td>
                      <td><?php echo $d->cat_name ?></td>
                      <td><?php echo $d->post_status ?></td>
                      <td >
                        <a href="<?php echo base_url('/blog/edit/') . $d->post_id ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?php echo base_url('/blog/delete/') . $d->post_id ?>" class="btn btn-sm btn-danger">Delete</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
