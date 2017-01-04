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


    <style type="text/css">
        .ajustecentral {
    margin: 25% 10%;
}
    </style>
</head>
<body ng-app='necs'>
    <div ng-controller='cadastroParticipanteController'>
        <?php $this->load->view('sections/navbar'); ?>
        <div class="container">
            <div class="row">
            <div class="col l12 m12 s12 justificado">
                <h3 class="text-theme contato-titulo">Inscrição</h3>
                <form class="col s12" method='post' name="formInscricao">
                    <div class="row">
                        <div class="input-field form-group col m12 s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" ng-model="data.nomeParticipante" name="nomeParticipante" type="text" class="validate" required>
                            <label for="name">Nome</label>
                        </div>
                        <div class="input-field col m4 s6">
                            <i class="material-icons prefix">recent_actors</i>
                            <input id="CPF" ng-model="data.cpfParticipante" name="cpfParticipante" type="text" class="validate" required>
                            <label for="CPF">CPF</label>
                        </div>
                        <div class="input-field col m4 s6">
                            <i class="material-icons prefix">recent_actors</i>
                            <input id="rg" ng-model="data.rg" name="rg" type="text" class="validate" required>
                            <label for="rg">RG</label>
                        </div>
                        <div class="input-field form-group col m4 s6">
                            <i class="material-icons prefix">perm_contact_calendar</i>
                            <input id="nascimento" ng-model="data.nascimento" name="nascimento" type="text" class="validate" required>
                            <label for="nascimento">Data de nascimento</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="material-icons prefix">phone</i>
                            <input id="telefone" ng-model="data.telefone" name="telefone" type="tel" class="validate" required>
                            <label for="telefone">Telefone</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="material-icons prefix">language</i>
                            <input id="nacionalidade" ng-model="data.nacionalidade" name="nacionalidade" type="text" class="validate" required>
                            <label for="nacionalidade">Nacionalidade</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="material-icons prefix">my_location</i>
                            <input id="cidade" ng-model="data.cidade" name="cidade" type="text" class="validate" required>
                            <label for="cidade">Cidade</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="material-icons prefix">location_on</i>
                            <input id="estado" ng-model="data.estado" name="estado" type="text" class="validate" required>
                            <label for="estado">Estado</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" ng-model="data.emailParticipante" name="emailParticipante" type="email" class="validate" required>
                            <label for="email">E-mail</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="senhaParticipante" ng-model="data.senhaParticipante" name="senhaParticipante" type="password" class="validate" required>
                            <label for="senhaParticipante">Senha</label>
                        </div>
                        <div class="input-field col m4 s12">
                            <input type="radio" ng-model="data.categoria" name="categoria" value="graduacao" id="categoria1" ng-required="!data.categoria"/>
                            <label for="categoria1">Estudante de graduação</label>
                        </div>
                        <div class="input-field col m4 s12">
                            <input type="radio" ng-model="data.categoria" name="categoria" value="pos-graduacao" id="categoria2" ng-required="!data.categoria"/>
                            <label for="categoria2">Estudante de pós-graduação</label>
                        </div>
                        <div class="input-field col m4 s12">
                            <input type="radio" ng-model="data.categoria" name="categoria" value="outros" id="categoria3" ng-required="!data.categoria"/>
                            <label for="categoria3">Professor/Pesquisador/Profissionais</label>
                        </div>
                        <div class="input-field col m12 s12">
                            <button ng-disabled="formInscricao.$invalid" type="submit" name="enviar" value="enviar" ng-click="cadastrarParticipante()" class="waves-effect waves-light btn btn-primary btn-inscricao">
                                INSCREVER-SE
                            </button>
                        </div>
                    </div>
                </form>
                <h3 class="text-theme contato-titulo">Alguma dúvida?<br>Entre em Contato</h3>
                <h5 class="contato-texto">Telefone: +55 (35) 3829-1255 <br> E-mail: necs.dcs.ufla@gmail.com</h5>
            </div>
        </div>
        <script src="<?=base_url('assets/js/jquery.js')?>"></script>
        <script src="<?=base_url('assets/js/angular.min.js')?>"></script>
        <script src="<?=base_url('assets/js/controller.js')?>"></script>

        <script src="<?=base_url('assets/js/materialize.min.js')?>"></script>
        <footer>
            <?php
            $this->load->view('sections/footer');
            ?>
        </footer>
    </body>
