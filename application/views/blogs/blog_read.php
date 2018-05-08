<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<!-- Begin page content -->
<main role="main" class="container">

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading"><?php echo $artikel->post_title ?></h1>
			<br>
			<img class="card-img-top" src="<?php echo base_url() .'uploads/'. $artikel->post_thumbnail ?>" alt="Card image cap" style="height: 50%; width: 50%;">
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<?php echo nl2br($artikel->post_content) ?>
					<hr>
					<div class="highlight text-center">
						<a href="<?php echo site_url( 'blog/edit/'.$artikel->post_id) ?>" class="btn btn-secondary">Edit</a>
						<a href="<?php echo site_url( 'blog/delete/'.$artikel->post_id) ?>" class="btn btn-danger">Hapus</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>
