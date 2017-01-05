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
            <div id="popup-valor">
                <p>
                    <strong>Valor da inscrição</strong>
                    <br>
                    <h5 class="white-text">R$ {{valor}}</h5>
                </p>
            </div>
            <form class="col s12" method='post' name="formInscricao">
                <section id="cadastro">
                    <div class="row">
                        <div class="col l12 m12 s12 justificado">
                            <h3 class="text-theme contato-titulo">Inscrição</h3>
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
                                <div class="input-field col m4 s6">
                                    <i class="material-icons prefix">perm_contact_calendar</i>
                                    <input id="nascimento" ng-model="data.nascimento" name="nascimento" type="text" class="datepicker" required placeholder="Data de nascimento">
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
                            </div>
                        </div>
                    </div>
                </section>
                <section id="categoriaInscricao">
                    <div class="row">
                        <div class="col l12 m12 s12 justificado">
                            <h3 class="text-theme contato-titulo">Categoria</h3>
                            <h5 class="contato-texto">Escolha sua categoria</h5>
                        </div>
                        <div class="col s12 m6">
                            <div class="card brown">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-model="data.categoria" name="categoria" ng-required="!data.categoria" type="radio" id="categoria1" value="grad"/>
                                        <label for="categoria1"></label>
                                        Graduando
                                    </span>
                                    <p>PALESTRAS</p>
                                </div>
                                <div class="card-action right-align">
                                    <b class="white-text">R$ 50,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card green darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-model="data.categoria" name="categoria" ng-required="!data.categoria" type="radio" id="categoria2" value="grad+"/>
                                        <label for="categoria2"></label>
                                    Graduando +</span>
                                    <p>PALESTRAS + SUBMISSÃO DE TRABALHO</p>
                                </div>
                                <div class="card-action right-align">
                                    <b class="white-text">R$ 55,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card brown">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-model="data.categoria" name="categoria" ng-required="!data.categoria" type="radio" id="categoria3" value="pos"/>
                                        <label for="categoria3"></label>Pós-Graduando
                                    </span>
                                    <p>PALESTRAS</p>
                                </div>
                                <div class="card-action right-align">
                                    <b class="white-text">R$ 60,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card green darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-model="data.categoria" name="categoria" ng-required="!data.categoria" type="radio" id="categoria4" value="pos+"/>
                                        <label for="categoria4"></label>Pós-Graduando +
                                    </span>
                                    <p>PALESTRAS + SUBMISSÃO DE TRABALHO</p>
                                </div>
                                <div class="card-action right-align">
                                    <b class="white-text">R$ 70,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card brown">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-model="data.categoria" name="categoria" ng-required="!data.categoria" type="radio" id="categoria5" value="prof" />
                                        <label for="categoria5"></label>Professor/Profissional
                                    </span>
                                    <p>PALESTRAS</p>
                                </div>
                                <div class="card-action right-align">
                                    <b class="white-text">R$ 80,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card green darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-model="data.categoria" name="categoria" ng-required="!data.categoria" type="radio" id="categoria6" value="prof+" />
                                        <label for="categoria6"></label>Professor/Profissional +
                                    </span>
                                    <p>PALESTRAS + SUBMISSÃO DE TRABALHO</p>
                                </div>
                                <div class="card-action right-align">
                                    <b class="white-text">R$ 90,00</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="minicursos">
                    <div class="row">
                        <div class="col l12 m12 s12 justificado">
                            <h3 class="text-theme contato-titulo">Minicursos</h3>
                            <h5 class="inscricao-subtitulo">Dia 10/05 e Dia 11/05<span class="right"><b>14h as 18h</b></span></h5>
                        </div>
                        <div class="col s12 m12">
                            <div class="card" ng-class="{ 'brown': !data.minicurso2 && !data.minicurso3 && !data.minicurso4 && !data.minicurso5, 'grey': data.minicurso2 || data.minicurso3 || data.minicurso4 || data.minicurso5}">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-disabled="data.minicurso2 || data.minicurso3 || data.minicurso4 || data.minicurso5" ng-model="data.minicurso1" name="minicurso1" type="checkbox" id="minicurso1" value="minicurso1" />
                                        <label for="minicurso1"></label>Geoestatística aplicada à Ciência do Solo

                                    </span>
                                    <p class="right-align"><b>Prelecionista:</b> Pedro Veloso Gomes Batista e Fábio Arnaldo Pomar Avalos</p>
                                </div>
                                <div class="card-action right-align white-text">
                                    <div class="col s3 left-align">
                                        <b>Carga horária:</b> 8 horas
                                    </div>
                                    <div class="col s3 left-align">
                                        <b>Local:</b> A definir
                                    </div>
                                    <b>R$ 30,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col l12 m12 s12 justificado">
                            <h5 class="inscricao-subtitulo">Dia 10/05<span class="right"><b>14h as 18h</b></span></h5>
                        </div>
                        <div class="col s12 m12">
                            <div class="card" ng-class="{ 'brown': !data.minicurso1 && !data.minicurso3, 'grey': data.minicurso1 || data.minicurso3 }">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-disabled="data.minicurso1 || data.minicurso3" ng-model="data.minicurso2" name="minicurso2" type="checkbox" id="minicurso2" value="minicurso2" />
                                        <label for="minicurso2"></label>Princípios Básicos para Formulação e Mistura de Fertilizantes
                                    </span>
                                    <p class="right-align"><b>Prelecionista:</b> Msc. Taylor Lima de Souza e Msc. André Leite Silva</p>
                                </div>
                                <div class="card-action right-align white-text">
                                    <div class="col s3 left-align">
                                        <b>Carga horária:</b> 4 horas
                                    </div>
                                    <div class="col s3 left-align">
                                        <b>Local:</b> A definir
                                    </div>
                                    <b>R$ 20,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m12">
                            <div class="card" ng-class="{ 'brown': !data.minicurso1 && !data.minicurso2, 'grey': data.minicurso1 || data.minicurso2 }">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-disabled="data.minicurso1 || data.minicurso2" ng-model="data.minicurso3" name="minicurso3" type="checkbox" id="minicurso3" value="minicurso3" />
                                        <label for="minicurso3"></label>Mapeamento Digital de Solos
                                    </span>
                                    <p class="right-align"><b>Prelecionista:</b> Profª. Drª. Michele Duarte de Menezes e Prof. Dr. Sérgio Henrique Godinho Silva</p>
                                </div>
                                <div class="card-action right-align white-text">
                                    <div class="col s3 left-align">
                                        <b>Carga horária:</b> 4 horas
                                    </div>
                                    <div class="col s3 left-align">
                                        <b>Local:</b> A definir
                                    </div>
                                    <b>R$ 20,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col l12 m12 s12 justificado">
                            <h5 class="inscricao-subtitulo">Dia 11/05<span class="right"><b>14h as 18h</b></span></h5>
                        </div>
                        <div class="col s12 m12">
                            <div class="card" ng-class="{ 'brown': !data.minicurso1 && !data.minicurso5, 'grey': data.minicurso1 || data.minicurso5 }">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-disabled="data.minicurso1 || data.minicurso5" ng-model="data.minicurso4" name="minicurso4" type="checkbox" id="minicurso4" value="minicurso4" />
                                        <label for="minicurso4"></label>Influência da nutrição mineral na qualidade dos produtos agrícolas
                                    </span>
                                    <p class="right-align"><b>Prelecionista:</b> Profª. Drª. Maria Lígia de Souza Silva</p>
                                </div>
                                <div class="card-action right-align white-text">
                                    <div class="col s3 left-align">
                                        <b>Carga horária:</b> 4 horas
                                    </div>
                                    <div class="col s3 left-align">
                                        <b>Local:</b> A definir
                                    </div>
                                    <b>R$ 20,00</b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m12">
                            <div class="card" ng-class="{ 'brown': !data.minicurso1 && !data.minicurso4, 'grey': data.minicurso1 || data.minicurso4 }">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <input ng-click="adicionaValor()" ng-disabled="data.minicurso1 || data.minicurso4" ng-model="data.minicurso5" name="minicurso5" type="checkbox" id="minicurso5" value="minicurso5" />
                                        <label for="minicurso5"></label>Potencialidades do uso de veículo aéreo não tripulado (Vant) no monitoramento da erosão hídrica e da cobertura vegetal
                                    </span>
                                    <p class="right-align"><b>Prelecionista:</b> Prof. Dr. Marx Leandro Naves Silva</p>
                                </div>
                                <div class="card-action right-align white-text">
                                    <div class="col s3 left-align">
                                        <b>Carga horária:</b> 4 horas
                                    </div>
                                    <div class="col s3 left-align">
                                        <b>Local:</b> A definir
                                    </div>
                                    <b>R$ 20,00</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="input-field col m12 s12">
                        <button ng-disabled="formInscricao.$invalid" type="submit" name="enviar" value="enviar" ng-click="pagamentoParticipante()" class="waves-effect waves-light btn btn-inscricao green darken-1">
                            INSCREVER-SE
                        </button>
                    </div>
                    <h3 class="text-theme contato-titulo">Alguma dúvida?<br>Entre em Contato</h3>
                    <h5 class="contato-texto">Telefone: +55 (35) 3829-1255 <br> E-mail: necs.dcs.ufla@gmail.com</h5>
                </div>
            </form>
            <form id="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
                <input type="hidden" name="code" id="code" value="" />
            </form>
        </div>
        <script src="<?=base_url('assets/js/jquery.js')?>"></script>
        <script src="<?=base_url('assets/js/angular.min.js')?>"></script>
        <script src="<?=base_url('assets/js/controller.js')?>"></script>
        <script src="<?=base_url('assets/js/materialize.min.js')?>"></script>
        <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
        <footer>
            <?php
            $this->load->view('sections/footer');
            ?>
        </footer>
    </body>
