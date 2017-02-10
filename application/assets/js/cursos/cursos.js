var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {

    $http.get("http://localhost/CodeIgniterAngular/index.php/cursos/cursos_controller/getInformacion")
    .then(function (response) {
        $scope.namesCursos = response.data;
    });

 $scope.datos = {};


$scope.submitRegistro = function(){
    $http({
    method: 'POST',
    url: 'http://localhost/CodeIgniterAngular/index.php/cursos/cursos_controller/recibirdatos',
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify({nombre:$scope.datos.nombre, videos:$scope.datos.videos})
    }).then(function (data) {
        //console.log(data);
        $('#myModalRegistro').modal('toggle'); 
        $scope.alldata();
        $scope.datos.nombre = "";
        $scope.datos.videos = "";
    });
}

//Funcion Mostrar Registros
 $scope.alldata=function(){
    $http.get("http://localhost/CodeIgniterAngular/index.php/cursos/cursos_controller/getInformacion")
    .then(function (response) {
        $scope.namesCursos = response.data;
    });
 }

$scope.borrar = function(id){
     $scope.datos.idBorrar = id;
}

$scope.editar = function(id, nombre, videos){
    $scope.datos.idEdit = id;
    $scope.datos.nombreEdit = nombre;
    $scope.datos.videosEdit = videos;
}

$scope.submitEditar = function(){
    $http({
    method: 'POST',
    url: 'http://localhost/CodeIgniterAngular/index.php/cursos/cursos_controller/editardatos',
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify({id:$scope.datos.idEdit, nombre:$scope.datos.nombreEdit, videos:$scope.datos.videosEdit})
    }).then(function (data) {
        console.log(data);
        $('#myModalEditar').modal('toggle'); 
        $scope.alldata();
        $scope.datos.idEdit = "";
        $scope.datos.nombreEdit = "";
        $scope.datos.videosEdit = "";
    });
}

$scope.submitBorrar = function(){
    $http({
    method: 'POST',
    url: 'http://localhost/CodeIgniterAngular/index.php/cursos/cursos_controller/borrardatos',
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify({id: $scope.datos.idBorrar})
    }).then(function (data) {
        console.log(data);
        $('#myModalBorrar').modal('toggle'); 
        $scope.alldata();
        $scope.datos.idBorrar = "";
    });   
}



} );









