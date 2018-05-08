<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main" class="container">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading"><?php echo $page_title ?> berhasil.</h1>
				<?php echo anchor('category', 'Back to category', array('class' => 'btn btn-primary')); ?>
				<?php echo anchor('category/create', 'Create new category', array('class' => 'btn btn-success')); ?>
			</div>
		</section>
	</main>
