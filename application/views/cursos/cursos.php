<!--Angular-->
<!DOCTYPE html> 
<html lang="es"> 
<head>
	<title>Bienvenido</title>
  
  <!-- Caracteres especiales-->
	<meta charset="utf-8">
  
  <!-- Libreria para el Diseño-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Librerias para el Modal-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Libreria para Angular-->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>

<style>
.datosIncorrectos {
    color: red;
}

</style>

</head>

<body>
  <div class="container">
  <div ng-app="myApp" ng-controller="customersCtrl"> 

  <h1 class="text-center">Cursos - Angularjs</h1>
  <hr>
  <!-- Boton de Registrar Cursos -->
  <div class="text-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalRegistro">
      <span class="glyphicon glyphicon-ok"> </span> Registro de Cursos
    </button>
  </div>

    <!-- Modal Registrar-->
  <div class="modal fade" id="myModalRegistro" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registro de Cursos</h4>
        </div>
        <div class="modal-body">
          
      <form ng-submit="submitRegistro()" name="myForm" role="form">
        <div class="form-group" >
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombreU" placeholder="Escribe tu nombre" ng-model="datos.nombre" ng-pattern="/^[a-zA-Z ]{1,25}$/" required/>
          <span class="datosIncorrectos" ng-show="myForm.nombreU.$touched && myForm.nombreU.$invalid">* El nombre es requerido.</span>
          <span ng-show="myForm.nombreU.$error.pattern" class="datosIncorrectos"><br>* Solo se aceptan letras.</span>

        </div>

        <div class="form-group" >
          <label for="videos">Numero de Videos</label>
          <input type="text" class="form-control" name="videosU" placeholder="Numero de Videos" ng-model="datos.videos" ng-pattern="/^\d{0,3}(\.\d{1,9})?$/" required/>
          <span class="datosIncorrectos" ng-show="myForm.videosU.$touched && myForm.videosU.$invalid">* El numero de videos es requerido.</span>
          <span ng-show="myForm.videosU.$error.pattern" class="datosIncorrectos"><br>* Solo se aceptan numeros maximo 3.</span>
        </div>
        
        <div class="form-group">
          <input ng-disabled="!myForm.$valid" class="btn btn-success" type="submit" name="submit" value="Aceptar" /> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div> 
      </form>                 
        </div>
      </div>
      
    </div>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th width="25%">ID Curso</th>
        <th width="25%">Nombre Curso</th>
        <th width="25%">Videos</th>
        <th width="25%">Status</th>
        <th width="25%" colspan="2">Acciones</th>
      </tr>
    </thead>
    <tbody ng-repeat="curso in namesCursos">
      <tr >
        <td>{{ curso.idCurso }}</td>
        <td>{{ curso.nombreCurso }}</td>
        <td>{{ curso.videosCurso }}</td>
        <td>{{ curso.status }}</td>
        <td>
          <button data-toggle="modal" ng-click="editar(curso.idCurso, curso.nombreCurso, curso.videosCurso)" data-target="#myModalEditar" class="btn btn-success">
            <span class="glyphicon glyphicon-pencil"> </span> Editar
          </button>
        </td>
        <td> 
          <button data-toggle="modal" ng-click="borrar(curso.idCurso)" data-target="#myModalBorrar" class="btn btn-danger">
          <span class="glyphicon glyphicon-trash"> </span> Borrar</button>
        </td>
      </tr>
    </tbody>
  </table>

         <!-- Modal Editar-->
          <div class="modal fade" id="myModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Editar un Curso</h4>
                </div>
                <div class="modal-body">
                  
              <form ng-submit="submitEditar()" name="myFormEditar" role="form">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="hidden"  ng-model="datos.idEdit"  >
                  <input type="text" name="nombreUEdit" class="form-control" ng-model="datos.nombreEdit" placeholder="Escribe tu nombre" ng-pattern="/^[a-zA-Z ]{1,25}$/" required/>

                  <span class="datosIncorrectos" ng-show="myFormEditar.nombreUEdit.$touched && myFormEditar.nombreUEdit.$invalid">* El nombre es requerido.</span>
                  <span ng-show="myFormEditar.nombreUEdit.$error.pattern" class="datosIncorrectos"><br>* Solo se aceptan letras.</span>

                </div>
                <div class="form-group">
                  <label for="videos">Numero de Videos</label>
                  <input type="text" name="videosUEdit" class="form-control" ng-model="datos.videosEdit" ng-pattern="/^\d{0,3}(\.\d{1,9})?$/"  placeholder="Numero de Videos" required/>

                  <span class="datosIncorrectos" ng-show="myFormEditar.videosUEdit.$touched && myFormEditar.videosUEdit.$invalid">* El numero de videos es requerido.</span>
                  <span ng-show="myFormEditar.videosUEdit.$error.pattern" class="datosIncorrectos"><br>* Solo se aceptan numeros maximo 3.</span>
                </div>
                <div class="form-group">
                  <input ng-disabled="!myFormEditar.$valid" class="btn btn-success" type="submit" name="submit" value="Aceptar" /> 
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
              </form>
                </div>
              </div>
              
            </div>
          </div>


          <!--Modal Borrar -->
        <div class="modal fade" id="myModalBorrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title advertencias-form" id="myModalLabel">¡ADVERTENCIA!</h4>
              </div>
              <div class="modal-body">
                
                <form ng-submit="submitBorrar()" name="myFormBorrar" role="form">
                  <div class="form-group">
                    <label>¿Estás seguro que deseas eliminar este elemento?</label>
                    <input type="hidden" ng-model="datos.idBorrar">
                  </div>
                  <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="Aceptar" /> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>

                </form>

              </div>
             </div>
           </div>
        </div>
        <!--Advertencia -->


</div>
</div>

<script src="http://localhost/CodeIgniterAngular/application/assets/js/cursos/cursos.js"></script>

</body>

</html>
