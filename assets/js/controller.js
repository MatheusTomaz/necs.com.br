/* global angular, document, window */
'use strict';
var necs = angular.module('necs', []);


necs.controller('cadastroParticipanteController', function($scope, $rootScope, $http, $timeout) {

        $scope.data = {};
        $scope.msg = {};
        $scope.cadastrou = false;
        $scope.class = " ";

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
            }).finally(function(data){

            });
        }

});

