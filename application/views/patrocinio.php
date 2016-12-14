<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $titulo ?></title>

	<link rel="stylesheet" href="<?=base_url('assets/css/materialize.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/colors.css')?>">

	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/materialize.min.js')?>"></script>
	
</head>
<body>
	<header>
		<?php 
		$this->load->view('sections/home');
		?>
	</header>
	<main>
		<?php 
		$this->load->view('sections/patrocinio');
		?>
	</main>
	<footer>
		<?php 
		$this->load->view('sections/footer');
		?>
	</footer>
</body>