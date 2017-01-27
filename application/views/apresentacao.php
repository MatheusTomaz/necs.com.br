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
	</header>
	<main>
		<section>
			<div id="patrocinio">
				<div class="container">
					<div class="row">
						<div class="col s12 m10 offset-l2 l8 offset-m1 center">
							<img src="<?php echo base_url('assets/img/titulo_home.jpg'); ?>" class="responsive-img">
							<p class="waves-effect waves-light btn btn-primary btn-large space-patrocinador"> <i class="material-icons left">star</i> Apresentação</p>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col s12 m12 l12">
							<h4 class="text-theme hospedagem-titulo">Apresentação </h4>
							<div class="row">
								 <br> <img src="<?php echo base_url('assets/img/apresentacao2.jpg'); ?>" class=" img-apresentacao materialboxed">
								<p class="home-text">
									O ano de 2015 foi considerado pela ONU como Ano Internacional dos Solos. Por este nobre motivo e pelo aprimoramento do conhecimento das necessidades de nossos solos, alunos de graduação, pós-graduação e professores do Departamento de Ciência do Solo (DCS) da Universidade Federal de Lavras iniciaram e se prontificaram para a organização do “I Simpósio de Ciência do Solo: Funcionalidades e uso responsável dos recursos do solo” nesta universidade, que se realizou entre os dias 30 de novembro a 4 de dezembro de 2015. O Núcleo de Estudos em Ciência do Solo (NECS) entregou uma repleta programação baseada na ideia de unir as subáreas pertencentes à ciência do solo. Com os primeiros passos ainda em meados daquele ano e encorajados por seus orientadores, o NECS trouxe onze palestras, três mesas de discussão, oito minicursos e roteiro pedológico ao seu público de cerca de 180 inscritos. Contamos com participantes de vários Estados e instituições, como: Brasília (UNB), Mato Grosso (IFMT), Paraná (UFPR), Minas Gerais (UFLA, UFV, UFSJ Campus Sete Lagoas, UFU, IFMG Campus Governador Valadares) e profissionais de empresas. Os assuntos abordados foram desde técnicas já consolidadas há décadas para a melhoria da agricultura no Brasil a técnicas avançadas e modernas para o melhor uso da terra, a fim de gerar informações para agricultores, extensionistas, estudantes, pesquisadores, profissionais. O resultado disso foi o estabelecimento do simpósio na UFLA e o compromisso de realizá-lo periodicamente. <br>
									Em 2017, realizaremos o “II Simpósio de Ciência do Solo: interfaces, desafios e inovações” alicerçados na harmonia das subáreas, compromisso de gerar e aprimorar conhecimentos, levantar questionamentos e atualizar sobre os entraves e possibilidades de crescimento da agricultura focada no estudo dos solos. Nesta segunda edição, a novidade principal é a inserção de aceite de resumos científicos. Os inscritos terão a possibilidade de enviar seus trabalhos para publicação nos anais do evento, com premiação ao melhor trabalho apresentado. <br>
									A abrangência de várias subáreas da ciência do solo permanece como principal alicerce do evento.  As instituições organizadoras esperam que este evento seja uma ponte para que o conhecimento científico ultrapasse as fronteiras da academia e atinja ao agricultor, sociedade e cidadãos.
								</p>
								<img src="<?php echo base_url('assets/img/apresentacao1.jpg'); ?>" class="responsive-img materialboxed">
								
							</div>
						</div>
					</div>		
				</div>
			</div>
			<script type="text/javascript">
				
				$(document).ready(function(){
					$('.materialboxed').materialbox();
				});
			</script>
		</section>
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