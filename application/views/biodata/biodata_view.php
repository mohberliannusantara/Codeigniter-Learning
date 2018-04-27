<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Begin page content -->
	<main role="main">
		<section class="jumbotron text-center">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>

				<p>
					<?php echo anchor('biodata/create', 'Input Biodata', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>
		</section>

		<?php if( !empty($biodata_builder_object) ) : ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">

					<?php
						// melooping data dari controller biodata
						foreach ($biodata_builder_object as $key) :
					?>

					<div class="col-md-4">
						<!-- mengatur format tampilan biodata dalam bentuk card -->
						<div class="card mb-4 box-shadow border-0">

							<!-- Load thumbnail, jika ada -->
							<?php //if( $key->post_thumbnail ) : ?>
							<!-- <img class="card-img-top" src="<?php echo base_url() .'uploads/'. $key->post_thumbnail ?>" alt="Card image cap"> -->

							<!-- Jika tidak ada thumbnail, mengunakan holder.js -->
							<?php //; else : ?>
							<img class="card-img-top" data-src="holder.js/100px190?theme=thumb&bg=eaeaea&fg=aaa&text=Thumbnail" alt="Card image cap">
							<?php //endif; ?>

							<div class="card-body">

								<!-- Batasi cuplikan konten dengan substr sederhana -->
								<h5><?php echo character_limiter($key->nama, 50) ?></h5>
								<small class="text-success text-uppercase"><?php echo $key->nim ?></small>
								<p class="card-text"><?php echo word_limiter($key->alamat, 20) ?></p>

								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<!-- Untuk link detail -->
										<a href="<?php //echo base_url(). 'biodata/read/' . //$key->post_slug ?>" class="btn btn-outline-secondary">Baca</a>
										<a href="<?php //echo base_url(). 'biodata/edit/' . //$key->id ?>" class="btn btn-outline-secondary">Edit</a>
									</div>
									<!-- <small class="text-muted"><?php echo time_ago($key->post_date) ?></small> -->
								</div>
							</div>

						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
		<?php else : ?>
      <center>
        <p>Belum ada data gan..</p>
      </center>
		<?php endif; ?>

	</main>
