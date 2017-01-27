/* global angular, document, window */
'use strict';
var necs = angular.module('necs', []);

necs.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

necs.directive('numbersOnly', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, ngModelCtrl) {
            function fromUser(text) {
                if (text) {
                    var transformedInput = text.replace(/[^0-9]/g, '');

                    if (transformedInput !== text) {
                        ngModelCtrl.$setViewValue(transformedInput);
                        ngModelCtrl.$render();
                    }
                    return transformedInput;
                }
                return undefined;
            }
            ngModelCtrl.$parsers.push(fromUser);
        }
    };
});

necs.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, cpf){
        var fd = new FormData();
        fd.append('file', file);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
        })
        .success(function(){
            // alert('deu certinho');
        })
        .error(function(){
        });
    }
}]);

necs.directive('validFile',function(){
  return {
    require:'ngModel',
    link:function(scope,el,attrs,ngModel){
      //change event is fired when file is selected
      el.bind('change',function(){
        scope.$apply(function(){
          ngModel.$setViewValue(el.val());
          ngModel.$render();
        });
      });
    }
  }
});

necs.controller('cadastroParticipanteController', function($scope, $rootScope, $http, $timeout, fileUpload) {

        $scope.data = {};
        $scope.msg = {};
        $scope.cadastrou = false;
        $scope.categoria = " ";
        $scope.class = " ";
        $scope.valor = 0;
        $scope.num = 0;
        $scope.nEstaCadastrado = false;
        $scope.estaCadastrado = false;
        $scope.cpfParticipante = 127654784;
        $scope.nomeUsuario = " ";
        $scope.idParticipante = " ";
        $scope.minicursos = [];
        $scope.palestras = [];
        $scope.transacaoId = " ";
        $scope.descricaoPedidoNRealizado = " ";
        $scope.valorPedidoNRealizado = " ";
        $scope.codigoPedidoNRealizado = " ";
        $scope.codigoRefPedidoNRealizado = " ";
        $scope.temPedidoNRealizado = false;
        $scope.loginSenhaParticipante = " ";
        $scope.loginEmailParticipante = " ";
        $scope.pedidoFeito = false;
        $scope.codigoTipoCadastro = " ";
        $scope.codigoPedido = " ";
        $scope.msgLogin = " ";

        $scope.uploadFile = function(cpf, id){
            var file = $scope.myFile;
            console.log('file is ' );
            // file.name = $scope.cpfParticipante;
            console.dir(file);
            // var uploadUrl = "uploadArquivo?cpf="+$scope.cpfParticipante;
            var uploadUrl = "http://www.roboticajr.com.br/sisqrcode/controller/grupo/grupoController.php?cpf="+cpf+"&id="+id;
            fileUpload.uploadFileToUrl(file, uploadUrl);
        };

        $scope.validarPDF = function(){
            var file = $scope.myFile.name;
            ext = file.split(".").pop();

            if(ext != 'pdf'){
                return false;
            }else{
                return true;
            }
        }


        $scope.candidatoCadastrar = function(){
            $scope.nEstaCadastrado = true;
        }

        $scope.arquivoFile = function(){
            console.log($scope.data.arquivo);
        }

        $scope.logar = function(){
            $http.post('http://www.roboticajr.com.br/sisqrcode/controller/participante/loginParticipanteController.php', { "loginEmailParticipante" : $scope.data.loginEmailParticipante,
                       "loginSenhaParticipante" : $scope.data.loginSenhaParticipante}).success(function(data) {

                if(data[0].achou == "true"){
                    localStorage.setItem('necsParticipanteId', data[0].idParticipante);
                    localStorage.setItem('necsParticipanteCpf', data[0].cpfParticipante);
                    $scope.loginSenhaParticipante = $scope.data.loginSenhaParticipante;
                    $scope.loginEmailParticipante = $scope.data.loginEmailParticipante;
                    $scope.cpfParticipante = data[0].cpfParticipante;
                    $scope.idParticipante = data[0].idParticipante;
                }

                $scope.codigoTipoCadastro = data[0].achou;
                $scope.codigoPedido = data[0].pedidoNRealizado;
                $scope.msgLogin = data[0].msg;

                if($scope.codigoPedido == 2){
                    $scope.descricaoPedidoNRealizado = " ";
                    $scope.valorPedidoNRealizado = " ";
                    $scope.codigoPedidoNRealizado = " ";
                    $scope.codigoRefPedidoNRealizado = " ";
                }else if($scope.codigoPedido == 0){
                    $scope.descricaoPedidoNRealizado = " ";
                    $scope.valorPedidoNRealizado = " ";
                    $scope.codigoPedidoNRealizado = " ";
                    $scope.codigoRefPedidoNRealizado = " ";
                }else{
                    $scope.descricaoPedidoNRealizado = data[0].descricao;
                    $scope.valorPedidoNRealizado = data[0].valor;
                    $scope.codigoPedidoNRealizado = data[0].codigo;
                    $scope.codigoRefPedidoNRealizado = data[0].codigoRef;
                }

                $scope.buscarStatus();

                console.log(data);


                $scope.nomeUsuario = data[0].nome;

            }).finally(function(data){
                // $scope.cpfParticipante = data[0].cpfParticipante;
            });
        }

        $scope.pagarPedidoNFinalizado = function(){
            PagSeguroLightbox({
                    code: $scope.codigoPedidoNRealizado
                },{
                    success : function(transactionCode) {
                        $scope.transacaoId = transactionCode;
                        console.log("success - " + transactionCode);
                        window.setTimeout("location.href='http://www.scsufla.com'",1000);
                }
            });
        }

        $scope.atualizaPagina = function(data){
            if($scope.codigoTipoCadastro == "true"){
                $scope.estaCadastrado = true;
                $scope.class = "green";
            }else{
                $scope.class = "red darken-2";
            }

            console.log($scope.codigoPedido);

            if($scope.codigoPedido == 2){
                $scope.pedidoFeito = true;
            }else if($scope.codigoPedido == 0){
                $scope.pedidoFeito = false;
            }else{
                $scope.temPedidoNRealizado = true;
            }

            Materialize.toast($scope.msgLogin, 10000, $scope.class);

            console.log($scope.temPedidoNRealizado);
        }

        $scope.cancelarInscricaoNFinalizada = function(){
            $http.post('http://www.roboticajr.com.br/sisqrcode/controller/participante/cancelarInscricaoNFinalizada.php',
                       { "idParticipante" : $scope.idParticipante }).success(function(data) {
                        console.log(data);

                        if(data[0].deletou == "true"){
                            $scope.temPedidoNRealizado = false;
                            $scope.class = "green";
                        }else{
                            $scope.class = "red darken-2";
                        }

                        Materialize.toast(data[0].msg, 10000, $scope.class);
            });
        }

        $scope.cadastrarParticipante = function(){
            console.log($scope.data);
            $http.post('http://www.roboticajr.com.br/sisqrcode/controller/participante/cadastroParticipanteController.php', { "nomeParticipante" : $scope.data.nomeParticipante,
                       "senhaParticipante" : $scope.data.senhaParticipante, "eventoId" : 101 , "emailParticipante" : $scope.data.emailParticipante,
                       "cpfParticipante" : $scope.data.cpfParticipante, "profissao" : $scope.data.profissao, "nacionalidade" : $scope.data.nacionalidade,
                       "cidade" : $scope.data.cidade, "estado" : $scope.data.estado, "telefone" : $scope.data.telefone,
                       "categoria" : $scope.data.categoria, "nascimento" : $scope.data.nascimento, "rg" : $scope.data.rg}).success(function(data) {
            // JSON retornado do banco
                console.log("sucesso:"+data[0].cadastrou+ "/" +data[0].msg);

                $scope.msg = data[0].msg;
                $scope.cadastrou = data[0].cadastrou;
                if ($scope.cadastrou == "true"){
                    $scope.class = "green";
                }else{
                    $scope.class = "red darken-2";
                }
                Materialize.toast($scope.msg, 10000, $scope.class)
                if ($scope.cadastrou == "true"){
                    window.setTimeout("location.href='http://www.scsufla.com'",3000);
                }
            }).finally(function(data){

            });
        }

        $scope.inscreverParticipante = function(code,pedido){
            //*****************ALTERAR VALORES PARA O SITE REAL (VERIFICAR RCODE)****************
            $scope.palestras = [106,107,108,109,110,111,112];
            $scope.data.minicurso1 ? $scope.id1 = 100 : $scope.id1 = 0;
            $scope.data.minicurso2 ? $scope.id2 = 101 : $scope.id2 = 0;
            $scope.data.minicurso3 ? $scope.id3 = 103 : $scope.id3 = 0;
            $scope.data.minicurso4 ? $scope.id4 = 104 : $scope.id4 = 0;
            $scope.data.minicurso5 ? $scope.id5 = 105 : $scope.id5 = 0;
            $scope.minicursos = [$scope.id1, $scope.id2, $scope.id3, $scope.id4, $scope.id5];
            $http.post('http://www.roboticajr.com.br/sisqrcode/controller/participante/inscricaoParticipanteController.php', { "eventoId" : 101 ,
                       "emailParticipante" : $scope.data.emailParticipante, "cpfParticipante" : $scope.data.cpfParticipante,
                       "categoria" : $scope.data.categoria, "minicursos" : $scope.minicursos, "palestras" : $scope.palestras,
                       "idParticipante" : $scope.idParticipante, "codigoRef" : code}).success(function(data) {

                        console.log($scope.minicursos+" /// "+$scope.palestras);
                        $scope.msg = data[0].msg;
                        $scope.inscrito = data[0].inscrito;
                        if ($scope.inscrito == "true"){
                            $scope.class = "green";
                        }else{
                            $scope.class = "red darken-2";
                        }
                        if(pedido == 'pedido'){
                            Materialize.toast('Iniciou pedido', 10000, $scope.class)
                        }else{
                            Materialize.toast($scope.msg, 10000, $scope.class)
                        }
                        if ($scope.inscrito == "true"){
                            console.log("OPA");
                            // window.setTimeout("location.href='http://www.roboticajr.com.br/necs.com.br'",3000);
                        }
            }).finally(function(data){
                $scope.uploadFile($scope.cpfParticipante, $scope.idParticipante);
                console.log($scope.minicursos+" /// "+$scope.palestras);
            });
        }

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

        $scope.adicionaValor = function(){
            $scope.valor6 = 0;
            $scope.data.minicurso1 ? $scope.valor1 = 30 : $scope.valor1 = 0;
            $scope.data.minicurso2 ? $scope.valor2 = 20 : $scope.valor2 = 0;
            $scope.data.minicurso3 ? $scope.valor3 = 20 : $scope.valor3 = 0;
            $scope.data.minicurso4 ? $scope.valor4 = 20 : $scope.valor4 = 0;
            $scope.data.minicurso5 ? $scope.valor5 = 20 : $scope.valor5 = 0;
            if($scope.data.categoria == "grad"){
                $scope.valor6 = 50;
            }else if($scope.data.categoria == "grad+"){
                $scope.valor6 = 55;
            }else if($scope.data.categoria == "pos"){
                $scope.valor6 = 60;
            }else if($scope.data.categoria == "pos+"){
                $scope.valor6 = 70;
            }else if($scope.data.categoria == "prof"){
                $scope.valor6 = 80;
            }else if($scope.data.categoria == "prof+"){
                $scope.valor6 = 90;
            }
            $scope.valor = $scope.valor1+$scope.valor2+$scope.valor3+$scope.valor4+$scope.valor5+$scope.valor6;
        }

        $scope.buscarStatus = function(){
            $http.post('http://www.scsufla.com/application/controllers/statusPagSeguro.php',
                       { "idParticipante" : $scope.idParticipante}).success(function(data) {

                        if(data[0] == null){
                            return;
                        }

                        console.log("este AQUI "+data[0].status);


                        if(data[0].status > 0){
                            $scope.codigoPedido = 2;
                        }
                        // $scope.atualizaPagina();
            }).finally(function(data){
                $scope.atualizaPagina();
            });
        }

        $scope.pagamentoParticipante = function(){
            $scope.data.minicurso1 ? $scope.num += 1 : $scope.num += 0;
            $scope.data.minicurso2 ? $scope.num += 1 : $scope.num += 0;
            $scope.data.minicurso3 ? $scope.num += 1 : $scope.num += 0;
            $scope.data.minicurso4 ? $scope.num += 1 : $scope.num += 0;
            $scope.data.minicurso5 ? $scope.num += 1 : $scope.num += 0;

            if($scope.data.categoria == "grad"){
                $scope.categoria = "Graduação";
            }else if($scope.data.categoria == "grad+"){
                $scope.categoria = "Graduação+";
            }else if($scope.data.categoria == "pos"){
                $scope.categoria = "Pós-Graduação";
            }else if($scope.data.categoria == "pos+"){
                $scope.categoria = "Pós-Graduação+";
            }else if($scope.data.categoria == "prof"){
                $scope.categoria = "Professor/Profissional";
            }else if($scope.data.categoria == "prof+"){
                $scope.categoria = "Professor/Profissional+";
            }

            $http.post('http://www.scsufla.com/application/controllers/pagseguro.php',
                       { "tipoInscricao" : $scope.categoria,
                       "qtdMinicursos" : $scope.num,
                       "cpfParticipante" : $scope.cpfParticipante,
                       "idParticipante" : $scope.idParticipante,
                       "valor" : $scope.valor}).success(function(data) {
                        // JSON retornado do banco
                console.log("sucesso:"+data[0].codeRef[0]);
                $scope.inscreverParticipante(data[0].codeRef, 'pedido');
                // window.location.assign("https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code="+data[0].code[0])
                PagSeguroLightbox({
                    code: data[0].code[0]
                }, {
                    success : function(transactionCode) {
                        $scope.transacaoId = transactionCode;
                        console.log("success - " + transactionCode);
                        window.setTimeout("location.href='http://www.scsufla.com'",1000);

                    }, abort : function() {
                        $http.post('http://www.roboticajr.com.br/sisqrcode/controller/participante/loginParticipanteController.php', { "loginEmailParticipante" : $scope.loginEmailParticipante,
                                   "loginSenhaParticipante" : $scope.loginSenhaParticipante}).success(function(data) {

                                    console.log(data[0].descricao);

                                    if(data[0].pedidoNRealizado == 0){
                                        $scope.descricaoPedidoNRealizado = " ";
                                        $scope.valorPedidoNRealizado = " ";
                                        $scope.codigoPedidoNRealizado = " ";
                                        $scope.codigoRefPedidoNRealizado = " ";
                                    }else{
                                        $scope.temPedidoNRealizado = true;
                                        $scope.descricaoPedidoNRealizado = data[0].descricao;
                                        $scope.valorPedidoNRealizado = data[0].valor;
                                        $scope.codigoPedidoNRealizado = data[0].codigo;
                                        $scope.codigoRefPedidoNRealizado = data[0].codigoRef;
                                    }

                                    Materialize.toast(data[0].msg, 10000, $scope.class)
                                    $scope.nomeUsuario = data[0].nome;
                        }).finally(function(data){
                            // $scope.cpfParticipante = data[0].cpfParticipante;
                        });
                        alert("Você não realizou a inscrição! Por favor tente novamente");
                    }
                });
                // $('#code').val(data[0].code[0]);
                // $('#pagseguro').submit()


            }).finally(function(data){
                 $scope.num = 0;
            });
        }

});

