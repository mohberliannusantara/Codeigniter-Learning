<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Begin page content -->
	<main role="main">
		<section class="jumbotron text-center">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
				<p>
					<?php echo anchor('category/create', 'Buat Kategori Baru', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>
		</section>

		<?php if( !empty($categories) ) : ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">

					<?php
						foreach ($categories as $key) :
					?>

					<div class="col-md-4">
						<div class="card mb-4 box-shadow border-0">
							<div class="card-body">
								<h5><?php echo character_limiter($key->cat_name, 40) ?></h5>
								<p class="card-text"><?php echo word_limiter($key->cat_description, 20) ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="<?php echo base_url('category/'.$key->cat_id) ?>" class="btn btn-outline-secondary">Lihat Artikel</a>
										<a href="<?php echo base_url(). 'category/edit/' . $key->cat_id ?>" class="btn btn-outline-secondary">Edit</a>
									</div>
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
