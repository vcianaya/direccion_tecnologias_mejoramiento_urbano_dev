<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>D.T.M.U.</title>

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

  <!--DATATABLE-->
  <link href="<?php echo base_url() ?>assets/datatable/datatables.min.css" rel="stylesheet" type="text/css">

  <link rel="icon" href="<?=base_url()?>assets/logos/icon2.png" type="image/png">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>


  .brillo{
    position:relative;
    display: block;
    //height: 133px;
    // width: 132px;
    text-decoration:none;
    overflow:hidden;
  }
  .brillo span{
    position:relative;
    display: block;
    background:url(<?php echo base_url() ?>/assets/imagenes/brillog.png) no-repeat;
    background-position: -300px 0px;
    margin-top:-250px;
    height: 260px;
    width: 256px;
  }
  .brillo:hover span{

    background-position: 300px 0px;
    -webkit-transition-property: all;
    -webkit-transition-duration: 1.5s;
    transition-property: all;
    transition-duration: 1.5s;
  }
  </style>

  <style>


  .brillo2{
    position:relative;
    display: block;
    //height: 133px;
    // width: 132px;
    text-decoration:none;
    overflow:hidden;
  }
  .brillo2 span{
    position:relative;
    display: block;
    background:url(<?php echo base_url() ?>/assets/imagenes/brillog01.png) no-repeat;
    background-position: -300px 0px;
    margin-top:-580px;
    height: 600px;
    width: 324px;
  }
  .brillo2:hover span{

    background-position: 300px 0px;
    -webkit-transition-property: all;
    -webkit-transition-duration: 1s;
    transition-property: all;
    transition-duration: 1s;
  }
  </style>

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
        <a href="<?php echo base_url2() ?>" class="brillo">
          <img src="<?php echo base_url() ?>assets/logos/alcaldia.png" width="240px"/><span></span>
        </a>

      </div>
      <!-- /.navbar-header --  navbar-brand >



      <!-- /.dropdown -->

      <!-- /.dropdown -->

      <!-- /.dropdown -->
      <ul class="nav navbar-top-links navbar-right" >
        <?php ?>
        <img src="<?php echo base_url() ?>assets/logos/dtmu.png" alt="..." width="280px">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i><?php echo $this->session->userdata('username') ?> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">

            <li><a href="#"><i class="fa fa-user fa-fw"></i> Bienvenido  <?php echo $this->session->userdata('first_name').' ' ?><?php echo $this->session->userdata('last_name') ?></a>
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


      <!-- /.navbar-static-side -->
    </nav>


    <!-- /.row -->
  </div>
  <!-- /#page-wrapper -->

<!-- /#wrapper -->

<!-- jQuery -->
