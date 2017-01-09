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
							<p class="waves-effect waves-light btn btn-primary btn-large space-patrocinador"> <i class="material-icons left">recent_actors</i> PALESTRANTES</p>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col s12 m12 l12">
							<h4 class="text-theme hospedagem-titulo">Palestrantes</h4>
							<div class="row">
									<div class="col s12 m12">
										<div class="card darken-1">
											<div class="card-content text-primary-500 justificado">
												<span class="card-title palestrante-titulo">Douglas Ramos Guelfi Silva</span>
												<p class="text-primary-500">
													Engenheiro Agrônomo pela Universidade Federal de Lavras (2005), Mestre em Ciência do Solo (2007) pela mesma instituição e Doutor em Agronomia pela Universidade de Brasília (2012). É Professor do Departamento de Ciência do Solo da Universidade Federal de Lavras (DCS/UFLA). Responsável pelo Laboratório de Corretivos e Fertilizantes do DCS/UFLA. Orientador no Programa de Pós-Graduação em Ciência do Solo DCS/UFLA. Tem experiência na área agronômica, com ênfase em Ciência do Solo, atuando principalmente nos seguintes temas: Fertilidade do Solo e Fertilizantes.
												</p>
											</div>
										</div>
									</div>
									<div class="col s12 m12">
										<div class="card darken-1">
											<div class="card-content text-primary-500 justificado">
												<span class="card-title palestrante-titulo">Luiz Roberto Guimarães Guilherme</span>
												<p class="text-primary-500">
													Engenheiro Agrônomo pela ESAL Escola Superior de Agricultura de Lavras (1986), Mestre em Solos e Nutrição de Plantas pela ESAL (1990), Ph.D. (Dual Major) em Ciência do Solo pela Universidade Estadual de Michigan (Michigan State University), e em Toxicologia Ambiental pelo Instituto de Toxicologia Ambiental  (hoje Michigan State Universitys Center for Integrative Toxicology) Estados Unidos (1997).  Pós-Doutorado na Universidade da Califórnia/Riverside EUA (2002) e na Unidade de Pesquisa em Ciência do Solo do Instituto Nacional de Pesquisa Agronômica INRA Orléans, França (Julho 2006 a Janeiro 2008). Professor do Departamento de Ciência do Solo da ESAL, hoje UFLA, desde 1991, atuando como Professor Titular na área de Química do Solo e Toxicologia Ambiental, desde 2014.
												</p>
											</div>
										</div>
									</div>
									<div class="col s12 m12">
										<div class="card darken-1">
											<div class="card-content text-primary-500 justificado">
												<span class="card-title palestrante-titulo">Marco Aurélio Carbone Carneiro</span>
												<p class="text-primary-500">
													Graduado em Engenharia Agronômica pela Universidade Federal de Lavras (1995), mestrado (1997) e doutorado (2000) em Agronomia (Solos e Nutrição de Plantas) pela mesma Universidade. Atuou por 11 anos na Universidade Federal de Goiás Campus de Jataí, lecionando na graduação as disciplinas de Matéria Orgânica do Solo e Conservação do Solo e na pós-graduação Microbiologia e Bioquímica do Solo. Em 2012 foi redistribuído para Universidade Federal de Lavras/Departamento de Ciência do solo. Atualmente atua nas disciplinas na graduação de Fertilidade do Solo e Biologia do Solo e na pós-graduação Microbiologia e Bioquímica do Solo, sendo ainda responsável pela Coleção de Fungos Micorrízicos Arbusculares da UFLA.
												</p>
											</div>
										</div>
									</div>
									<div class="col s12 m12">
										<div class="card darken-1">
											<div class="card-content text-primary-500 justificado">
												<span class="card-title palestrante-titulo">Moacir de Souza Dias Junior</span>
												<p class="text-primary-500">
													Possui graduação em Engenharia Agrícola pela Universidade Federal de Lavras (1979), mestrado em Engenharia Civil pela Pontifícia Universidade Católica do Rio de Janeiro (1983) e doutorado em Crop And Soil Sciences - Michigan State University (1994). Professor Titular. Chefe do Departamento de Ciência do Solo da Universidade Federal de Lavras. Tem experiência na área de Engenharia Civil, com ênfase em Mecânicas dos Solos, atuando principalmente nos seguintes temas: compactação do solo, pressão de pre-consolidação, modelagem da compactação do solo, compressibilidade, colheita florestal mecanizada e cafeicultura.
												</p>
											</div>
										</div>
									</div>
									<div class="col s12 m12">
										<div class="card darken-1">
											<div class="card-content text-primary-500 justificado">
												<span class="card-title palestrante-titulo">Valdemar Faquin</span>
												<p class="text-primary-500">
													Possui graduação em Agronomia pela Universidade Federal de Lavras (1978), mestrado em Agronomia Solos e Nutrição de Plantas pela Escola Superior de Agricultura Luiz de Queiroz (1982) e doutorado em Agronomia Solos e Nutrição de Plantas pela Escola Superior de Agricultura Luiz de Queiroz (1988). Atualmente é professor titular da Universidade Federal de Lavras, com  ênfase em Ciência do Solo, atuando principalmente nos seguintes temas: biofortificação de alimentos, elementos terras raras, nutrição mineral, feijoeiro, adubação fosfatada.
												</p>
											</div>
										</div>
									</div>
									<div class="col s12 m12">
										<div class="card darken-1">
											<div class="card-content text-primary-500 justificado">
												<span class="card-title palestrante-titulo">Valter Casarin</span>
												<p class="text-primary-500">
													Possui graduação em Engenharia Agronômica pela Universidade Estadual Paulista Júlio de Mesquita Filho (1986), graduação em Engenharia Florestal pela Universidade de São Paulo (1994), mestrado em Agronomia (Solos e Nutrição de Plantas) pela Escola Superior de Agricultura “Luiz de Queiroz” (1994) e doutorado em Ciência do Solo pela Ecole Nationale Superieure Agronomique de Montpellier (1999). Atua principalmente nos seguintes temas: rizosfera, ectomicorrizas, fósforo, biodisponibilidade, pH e oxalato. Atualmente é Diretor Adjunto do IPNI Brasil.
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>
			</div>

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