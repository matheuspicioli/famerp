var app = angular.module('famerp', []);
app.controller('turmasController', function ($scope, $http) {
    $scope.turmas = [];

    $http({
        method: 'GET',
        url: '/api/turmas'
    }).then(function successCallback(response) {
        $scope.turmas = response.data;
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