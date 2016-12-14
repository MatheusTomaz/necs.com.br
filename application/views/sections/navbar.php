	 
<ul id="slide-out" class="side-nav">
	<li><div class="userView">
		<div class="background">
			<img src="<?php echo base_url('assets/img/background1.jpg'); ?>">
		</div>
		<a href="#!user"><img class="circle" src="<?php echo base_url('assets/img/logo.png'); ?>"></a>
		<a href="#!name"><span class="text-marron name">II Simpósio de Ciência do Solo</span></a>
		<a href="#!email"><span class="text-marron email">01 a 05 de Maio</span></a>
	</div></li>
	<li><a href="">
		<i class="material-icons">home</i>
		Home</a>
	</li>
	<li><a href="<?php echo base_url('Paginas/inscrever');?>"><i class="material-icons">mode_edit</i>
		Inscrição</a>
	</li>
	<li><a href="">
		<i class="material-icons">query_builder</i>
		Programação</a>
	</li>
	<li><a href="">
		<i class="material-icons">supervisor_account</i>
		Parceiros</a>
	</li>
	<li><a href="">
		<i class="material-icons">contact_phone</i>
		Contato</a>
	</li>
	<li><div class="divider"></div></li>
	<li><a class="subheader">Outros</a></li>

</ul>

<div class="navbar-fixed">
	<div id="barra-superior"></div>
	<nav>
		<div class="nav-wrapper container">
			<a href="#!" class="brand-logo"><img class="logo-bar" src="<?php echo base_url('assets/img/logo-barra.png'); ?>"></a>
			<a href="#" data-activates="slide-out" class="button-collapse text-marron"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a class="text-marron" href="">Home</a></li>
				<li><a class="text-marron" href="<?php echo base_url('Paginas/inscrever');?>">Inscrição</a></li>
				<li><a class="text-marron" href="">Programação</a></li>
				<li><a class="text-marron" href="">Parceiros</a></li>
				<li><a class="text-marron" href="">Contato</a></li>
			</ul>
			
		</div>
	</nav>
</div>
<script type="text/javascript">
	$(".button-collapse").sideNav();
</script>

