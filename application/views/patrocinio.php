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
		$this->load->view('sections/navbar'); 
		?>
		<div class="container">
			<div class="row">
				<div class="col s12 m10 offset-l2 l8 offset-m1 center">
					<img src="<?php echo base_url('assets/img/titulo_home.jpg'); ?>" class="responsive-img">
					<p class="waves-effect waves-light btn-primary btn-large space-patrocinador"><i class="material-icons left">star</i> PATROCINADORES</p>
				</div>
			</div>
		</div>
	</header>
	<main>
		<?php 
		$this->load->view('sections/patrocinio');
		?>
		<div class="container">
			<div class="row">
			<a href="#invista-patrocinio">
				<div id="popup-invista">
					<p><strong>Invista no</strong><br>II Simpósio de Ciência do Solo!</p>
				</div>
			</a>
		</div>
		<div class="row">
			<div id="invista-patrocinio" class="row">
				<h4 class="text-theme">Invista no II Simpósio de Ciência do Solo!</h4>
				<p>
					Para que este evento seja viabilizado com a qualidade pretendida temos a necessidade de parceiros e patrocinadores. Nesse sentido, acreditamos que o investimento de empresas e órgãos de fomento é de grande importância.<br>
					É importante frisar, o NECS não tem fins lucrativos e não detém qualquer quantia financeira de sua propriedade, portanto, para confecção de material aos participantes, divulgação e execução de serviços necessita-se da captação dos recursos de parceiros.<br>
					Caso seja do interesse de sua empresa patrocinar nosso evento, entre em contato conosco pelo e-mail: a <a href="mailto:necs.dcs.ufla@gmail.com" target="_blank">necs.dcs.ufla@gmail.com</a> para que enviemos nosso plano de patrocínio.
				</p>
			</div>
		</div>

		</div>
		
	</main>
	<footer>
		<?php 
		$this->load->view('sections/footer');
		?>
	</footer>
</body>
</html>