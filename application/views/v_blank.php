<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- jQuery -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/css/blank.css">

<div class="container error-container">
	<div class="row  d-flex align-items-center justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="big-text">Oops!</h1>
			<h2 class="small-text"><?= $title ?></h2>
		</div>
		<div class="col-md-6  text-center">
			<p><?= $text ?></p>

			<?php $role = $this->session->userdata('role');
			$url = '';
			if ($role == '') {
				$url = 'auth';
			} else {
				$url = $role . '/dashboard';
			} ?>

			<a href="<?= site_url($url) ?>" class="button button-dark-blue iq-mt-15 text-center">HOME PAGE</a>
		</div>
	</div>
</div>
