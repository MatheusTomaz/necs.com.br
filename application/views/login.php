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
	<style type="text/css">
		.ajustecentral {
    margin: 25% 10%;
}
	</style>
</head>
<body>

	<div id="home" class="">
		<div id="animate-area">
			<?php $this->load->view('sections/navbar'); ?>
			<div class="container">
				<div class="row ajustecentral">
					<div class="col m6 l6 s12">
						<img class="responsive-img" style="margin-top: 30px; padding: 0px 20px;" src="<?=base_url('assets/img/titulo.png')?>" alt="DIPS UFLA">
					</div>
					<div class="col m6 l6 s12">
						<form role="form" method="post">
							<input type="hidden" name="captcha">
							<div class="form-group row">
								<div class="input-field col s12 m12">
									<input type="email" name="email"  id="email" maxlength="100"  value="<?php echo set_value('email') ? set_value('email') : ''; ?>" class="validate" >
									<label for="email">Email</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="input-field col s12 m12">
									<input type="password" name="senha"  id="senha" maxlength="100"  value="<?php echo set_value('senha') ? set_value('senha') : ''; ?>" class="validate" >
									<label for="senha">Senha</label>
								</div>
							</div><?php if($alerta != null) {?>
							<div class="col s12 m12 <?php echo $alerta['class'];?>">
								<p><?php echo $alerta["mensagem"]; ?>                        </p>
							</div><?php } ?>  
							<div class="form-group row right">
								<a href="<?php echo base_url('acesso/esqueciminhasenha')?>">Esqueci minha senha </a>
								<a href="<?php echo base_url('Evento/index')?>" class="btn btn-lg waves-effect waves-light btn-primary">Voltar</a>
								<button type="submit" value="login" name="login" class="btn btn-lg waves-effect waves-light btn-primary">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> 
		<footer>
			<?php 
			$this->load->view('sections/footer');
			?>
		</footer>
	</body>