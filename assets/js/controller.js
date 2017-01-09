/* global angular, document, window */
'use strict';
var necs = angular.module('necs', []);


necs.controller('cadastroParticipanteController', function($scope, $rootScope, $http, $timeout) {

        $scope.data = {};
        $scope.msg = {};
        $scope.cadastrou = false;
        $scope.categoria = " ";
        $scope.class = " ";
        $scope.valor = 0;
        $scope.num = 0;
        $scope.nEstaCadastrado = false;
        $scope.estaCadastrado = false;
        $scope.cpfParticipante = 0;
        $scope.nomeUsuario = "Matheus Tomaz"

        $scope.candidatoCadastrar = function(){
            $scope.nEstaCadastrado = true;
        }

        $scope.logar = function(){
            $http.post('http://localhost/sisqrcode/controller/participante/loginParticipanteController.php', { "loginEmailParticipante" : $scope.data.loginEmailParticipante,
                       "loginSenhaParticipante" : $scope.data.loginSenhaParticipante}).success(function(data) {

                        console.log("sucesso:"+data[0].cpfParticipante+"/"+data[0].achou+ "/" +data[0].msg);
                        if(data[0].achou == "true"){
                            $scope.estaCadastrado = true;
                            $scope.class = "green";
                            $scope.cpfParticipante = data[0].cpfParticipante;
                        }else{
                            $scope.class = "red darken-2";
                        }
                        Materialize.toast(data[0].msg, 10000, $scope.class)
            }).finally(function(data){
                $scope.cpfParticipante = data[0].cpfParticipante;
            });
        }

        $scope.cadastrarParticipante = function(){
            console.log($scope.data);
            $http.post('http://localhost/sisqrcode/controller/participante/cadastroParticipanteController.php', { "nomeParticipante" : $scope.data.nomeParticipante,
                       "senhaParticipante" : $scope.data.senhaParticipante, "eventoId" : 100 , "emailParticipante" : $scope.data.emailParticipante,
                       "cpfParticipante" : $scope.data.cpfParticipante, "nacionalidade" : $scope.data.nacionalidade,
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
                    window.setTimeout("location.href='http://localhost/necs.com.br'",3000);
                }
            }).finally(function(data){

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

            $http.post('http://localhost/necs.com.br/application/controllers/pagseguro.php',
                       { "tipoInscricao" : $scope.categoria,
                       "qtdMinicursos" : $scope.num,
                       "cpfParticipante" : $scope.cpfParticipante,
                       "valor" : $scope.valor}).success(function(data) {
                        // JSON retornado do banco
                console.log("sucesso:"+data[0].code[0]);
                $('#code').val(data[0].code[0]);
                $('#pagseguro').submit()


            }).finally(function(data){
                 $scope.num = 0;
            });
        }

});

