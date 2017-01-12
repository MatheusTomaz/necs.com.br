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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	
</head>
<body>
	<header>
		<?php 
		$this->load->view('sections/home');
		?>
	</header> 
	<main><!--
		<div class="container">
			<div class="row">
				<p class="home-text">O NECS em conjunto com membros do Programa de Pós-Graduação em Ciência do Solo (PPGCS), com o apoio do Departamento de Ciência do Solo da Universidade Federal de Lavras criou em 2015 o Simpósio em Ciência do Solo (SCS) com o intuito de promover um diálogo com periodicidade regular entre estudantes, pesquisadores e profissionais, com base na análise e contemplação do conhecimento e aplicações no âmbito desta Ciência.
				<br>
				O I Simpósio em Ciência do Solo realizado em 2015 teve por tema “Funcionalidades e Uso Responsável dos Recursos do Solo” e foi composto por palestras e minicursos sobre temas atuais da área, bem como discussões referentes ao manejo racional deste recurso natural de forma a incentivar a sua conservação e o uso consciente.
				<br>
				A segunda edição do Simpósio em Ciência do Solo da UFLA será realizada em 2017 com o tema: “Interfaces, Desafios e Inovações” e propõe a difusão do conhecimento em Ciência do Solo sob uma perspectiva interdisciplinar e inovadora, estimulando a articulação e a troca de ideias, informações, experiências e conhecimentos entre os participantes do simpósio, possibilitando ainda a submissão de trabalhos.</p>
				</div>
			</div>
-->
			<?php 
			$this->load->view('sections/patrocinio');
			?>
		</main>
		<?php
		$this->load->view('sections/footer');
		?> 
	</body>
	</html>