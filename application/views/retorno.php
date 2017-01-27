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
        <div id="home" class="">
            <div id="animate-area">
                <?php $this->load->view('sections/navbar'); ?>
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12" align="center">
                            <h1>
                                <img id="logo-home" src="<?php echo base_url('assets/img/logo.png'); ?>" class="responsive-img">
                                <h5 class="contato-texto"><b>Obrigado por efetuar sua compra! Seu pagamento está em processamento pelo PagSeguro</b></h5>
                                <span id='idParticipante'></span>
                                <?=$_GET['transaction_id'];?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <script src="<?=base_url('assets/js/jquery.js')?>"></script>
        <script src="<?=base_url('assets/js/angular.min.js')?>"></script>
        <script src="<?=base_url('assets/js/controller.js')?>"></script>
        <script src="<?=base_url('assets/js/materialize.min.js')?>"></script>
        <script type="text/javascript">
            $('#idParticipante').html(localStorage.getItem('necsParticipanteId'));
        </script>
        <!-- <footer>
            <?php
            $this->load->view('sections/footer');
            ?>
        </footer> -->
    </body>
