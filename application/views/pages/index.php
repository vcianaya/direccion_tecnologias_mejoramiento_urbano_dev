<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?= base_url() ?>assets/logos/icon.png" type="image/png">
        <title>Observatorio</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url() ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url() ?>assets/dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url() ?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>">Observatorio Admin v1.0</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->

                    <!-- /.dropdown -->

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('username') ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Bienvenido <?php echo $this->session->userdata('first_name') . ' ' ?><?php echo $this->session->userdata('last_name') ?></a>
                            </li>

                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() ?>login/logout_ci"><i class="fa fa-sign-out fa-fw"></i> Cerrar Session</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">

                                <!-- /input-group -->

                            <li class="nav-header" data-toggle="collapse" data-target="#obras">
                                <a href="#"><i class="fa fa-code-fork fa-music"></i> FORMULARIO FALTAS Y CONTRAVENCIONES POLICIALES Y CONSUMO DE BEBIDAS ALCOHOLICAS <span class="fa arrow"></span></a>
                                <ul class="nav nav-list collapse" id="obras">
                                    <li> <?php echo anchor('admin_crud/faltas_contravenciones', 'Formulario Faltas y Contravenciones '); ?></li>
                                    <li> <?php echo anchor('admin_crud/provincia', 'Registro de Provincia '); ?></li>
                                    <li> <?php echo anchor('admin_crud/municipio', 'Registro de Municipio '); ?></li>
                                    <li> <?php echo anchor('admin_crud/localidad', 'Registro de Localidad '); ?></li>
                                    <li> <?php echo anchor('admin_crud/epis', 'Registro de Epis '); ?></li>
                                    <li> <?php echo anchor('admin_crud/distrito', 'Registro de Distrito '); ?></li>
                                    <li> <?php echo anchor('admin_crud/zona', 'Registro de Zonas '); ?></li>
                                    <li> <?php echo anchor('admin_crud/denuncia', 'Registro de Denuncias '); ?></li>
                                    <li> <?php echo anchor('admin_crud/ciudad_victima', 'Registro de la Ciudad de la Victima '); ?></li>
                                     <li> <?php echo anchor('admin_crud/nacionalidad_victima', 'Registro de la Nacionalidad de la Victima '); ?></li>
                                     <li> <?php echo anchor('admin_crud/sexo_victima', 'Registro del Genero de la Victima '); ?></li>

                                    <li> <?php echo anchor('admin_crud/temperancia', 'Registro de Temperancia de la victima'); ?></li>
                                    
                                    <li> <?php echo anchor('admin_crud/categoria_licencia', 'Registro de Categoria de Licencia '); ?></li>
                                    
                                     <li> <?php echo anchor('admin_crud/ciudad_infractor', 'Registro de la Ciudad del Infractor '); ?></li>
                                     <li> <?php echo anchor('admin_crud/nacionalidad_infractor', 'Registro de la Nacionalidad del Infractor '); ?></li>
                                       <li> <?php echo anchor('admin_crud/sexo_infractor', 'Registro del Genero del Infractor '); ?></li>
                                       
                                    <li> <?php echo anchor('admin_crud/tipo_vehiculo', 'Registro de Tipo de Vehiculo '); ?></li>
                                    <li> <?php echo anchor('admin_crud/servicio_movilidad', 'Registro el Servicion de la Movilidad '); ?></li>
                                     <li> <?php echo anchor('admin_crud/temperancia_infractor', 'Registro de Temperancia del Infractor'); ?></li>
                                     
                                    <li> <?php echo anchor('admin_crud/tipo_arresto', 'Registro de Tipo de Arresto '); ?></li>
                                    <li> <?php echo anchor('admin_crud/sancion', 'Registro de Sanciones '); ?></li>
                                    <li> <?php echo anchor('admin_crud/estado_caso', 'Registro del Estado del Caso '); ?></li>
                                    <li> <?php echo anchor('admin_crud/remision_caso', 'Registro de la Remision del Caso '); ?></li>
                                    <li> <?php echo anchor('admin_crud/termino_prueba', 'Registro de Termino de Prueba '); ?></li>
                                    <li> <?php echo anchor('admin_crud/recurso_apelacion', 'Registro de Recursos de Apelacion '); ?></li>
                                    <li> <?php echo anchor('admin_crud/servicio_destacado', 'Registro de Servicio Destacado '); ?></li>
                                </ul>
                            </li>












                        </ul>


                    </div>
                    <!-- /.sidebar-collapse -->
                </div>


                <!-- /.navbar-static-side -->
            </nav>


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url() ?>assets/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
