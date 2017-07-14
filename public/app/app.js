var app = angular.module('famerp', []);
app.controller('listaController', function ($scope, $http) {
    $scope.listas = [];

    $http({
        method: 'GET',
        url: '/api/listas-chamadas'
    }).then(function successCallback(response) {
        $scope.listas = response.data;
    }, function errorCallback(response) {
        console.log(response.errors);
    });
});
app.controller('pacienteController', function ($scope, $http){
    $scope.pacientes = [];

    $http({
        method: 'GET',
        url: '/api/pacientes'
    }).then(function successCallback(response) {
        $scope.pacientes = response.data;
    }, function errorCallback(response) {
        console.log(response.errors);
    });
});