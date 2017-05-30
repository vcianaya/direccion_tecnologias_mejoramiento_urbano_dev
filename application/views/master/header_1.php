<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistemas | DTMU</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="<?php echo base_url() ?>assets/dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?=base_url()?>assets/logos/icon.png" type="image/png">
    <link href="<?php echo base_url() ?>assets/css/style_general.css" rel="stylesheet" type="text/css">
</head>
<body>
    <di v id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
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
            <ul class="nav navbar-top-links navbar-right" >
                <img src="<?php echo base_url() ?>assets/logos/DTMU.png" alt="..." width="280px">
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
                </li>
            </ul>
        </nav>
    </div>
</div>

