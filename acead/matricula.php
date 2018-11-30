<?php
    session_start();
    //$_SESSION['id']=1;
    if(!(isset($_SESSION['id']))) {
        header("Location: index.php");
  }



?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricula</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="icon" type="image/png" href="img/logo_mini.png">

    <link rel="stylesheet" href="utilidades/assets/css/normalize.css">
    <link rel="stylesheet" href="utilidades/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="utilidades/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="utilidades/assets/css/themify-icons.css">
    <link rel="stylesheet" href="utilidades/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="utilidades/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="utilidades/assets/scss/style.css">
    <link href="utilidades/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
  <link href="utilidades/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

     <link href="utilidades/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->


    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="home.php"><img src="img/logo_inicio.jpg" alt="Logo"></a>
                <a class="navbar-brand hidden" href="home.php"><img src="img/logo_mini.jpg" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home.php"> <i class="menu-icon fa fa-dashboard"></i>Inicio </a>
                    </li>
                    <h3 class="menu-title">Gesti&oacute;n de Alumnos</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Registro de Alumnos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Productos y Servicios</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Asistencia de Alumnos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Asistencia 1</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Asistencia 2</a></li>
                        </ul>
                    </li>


                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Matricula</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="matricula.php">Pantalla de Matricula</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="secciones.php">Agregar Secciones</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">GESTION DE PERSONAL</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Registro de Personal</a>
                        <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-fort-awesome"></i><a href= "../acead/php/empleado.php">Creacion de Personal</a></li>
                          <li><i class="menu-icon fa fa-fort-awesome"></i><a href= "../acead/php/nuevousuario.php">Creacion de Usuario</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Docentes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Horas Trabajadas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                     <h3 class="menu-title">GESTION ACADEMICA</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Modalidad</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Clases</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Historial Academico</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Calificaciones</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">GESTION DE COBROS Y PAGOS</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Cobro de Mensualidad</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Cobro Matricula</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Planilla</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="cliente.php">Usuarios</a></li>
                        </ul>
                    </li>
					<h3 class="menu-title">Administraci&oacute;n</h3><!-- /.menu-title -->
                   <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Mantenimiento</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="../cead-academia/html/mantenimientousuarios.php">Usuarios</a></li>
                        </ul>
                    </li>

					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Roles</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="roles.php">Roles</a></li>
                        </ul>
                    </li>


                    <li class="active">
                        <a href="bitacora.php"> <i class="menu-icon fa fa-tasks"></i>Bitacora</a>

                    </li>

                    <li class="active">
                       <a href="contrasena.php"> <i class="menu-icon fa fa-tasks"></i>Cambiar Contraseña</a>
                   </li>

                     <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-close"></i>Salir del Sistema</a>
                    </li>


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>



                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Matricula</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><strong>Bienvenido: </strong><?php if(isset($_SESSION['nombre'])){    echo "<strong>".$_SESSION['nombre']."</strong> (".$_SESSION['correo'].")";} ?> | <a href="php/salir.php">Salir</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>



   <div class="container">

      <div class="card-deck mb-3 text-center">

        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Alumnos</h4>
          </div>
          <div class="card-body">
           
           <select class="custom-select" id="alumnos">
               
           </select> 
           
          </div>
        </div>

      </div>

      <div class="card-deck mb-3 text-center">

        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Modalidades</h4>
          </div>
          <div class="card-body">
           
           <select class="custom-select" id="modalidades">
               
           </select> 
           
          </div>
        </div>

      </div>

      <div id="row">
        <div class="card-deck mb-3 text-center">

        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Matricula</h4>
          </div>
          <div class="card-body">
            

            <div class="row">
        
        <div class="col-xl-4 col-sm-6 mb-3">
          <select class="form-control" id="adicionar1" size=9>

          </select>
        </div> 
        
        <div class="col-xl-4 col-sm-6 mb-3">
          <select class="form-control" id="adicionar2" size=9>
            
          </select>
        </div>
        
        <div class="col-xl-4 col-sm-6 mb-3">

             <select class="form-control" id="adicionar3" size=9>
            
              </select>

        </div>

        </div>

           
          </div>

           <div class="card-footer small text-muted">
        <div>
          <button class="btn btn-xs btn-primary" id="btn_matricular" data-toggle="modal" data-target="#matriculamodal" hidden="true"></i> Matricular
            </button>
            <input type="text" value="" id="valorSeccion" hidden="true">
            <label id="error" style="color: red; font-size:large;"></label>
            </div>
        </div>
        </div>

      </div>
      </div>



       <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Matriculados</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ALUMNO</th>
                  <th>MODALIDAD</th>
                  <th>ORIENTACION</th>
                  <th>CLASE</th>
                  <th>SECCION</th>
                  <th>AULA</th>
                  <th>DURACION</th>
                  <th>PAGAR</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ALUMNO</th>
                  <th>MODALIDAD</th>
                  <th>ORIENTACION</th>
                  <th>CLASE</th>
                  <th>SECCION</th>
                  <th>AULA</th>
                  <th>DURACION</th>
                  <th>PAGAR</th>
                </tr>
              </tfoot>
              <tbody id="clasesMatricular">
                
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <center><small class="d-block mb-3 text-muted">&copy; Academia de musica CEAD</small></center>
          </div>
         
        </div>
      </footer>
    </div>


    </div><!-- /#right-panel -->

   <script src="utilidades/jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="utilidades/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="utilidades/datatables/jquery.dataTables.js"></script>
    <script src="utilidades/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/matricula.js"></script>


</body>
</html>
