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

	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script src="<?=base_url('assets/js/materialize.min.js')?>"></script>
	<script src="<?=base_url('assets/js/main.js')?>"></script>
</head>
<body>
	<header>
		<?php 
		$this->load->view('sections/home');
		?>
	</header>
	<main>
		<?php 
		$this->load->view('sections/inscricao');
		$this->load->view('sections/programacao');
		$this->load->view('sections/parceiros');
		$this->load->view('sections/contact');
		?>
	</main>
	<?php
	$this->load->view('sections/footer');
	?></body>
</html>