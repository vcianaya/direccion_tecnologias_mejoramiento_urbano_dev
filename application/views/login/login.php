<!DOCTYPE HTML>
<!--
        Aerial by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>O.M.S.C</title>
         <link rel="icon" href="<?=base_url()?>assets/logos/icon.png" type="image/png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/template.css" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>


        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    </head>
    <body class="loading">
        <?php
        $username = array('name' => 'username', 'placeholder' => 'nombre de usuario');
        $password = array('name' => 'password', 'placeholder' => 'introduce tu password');
        $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión');
        ?>
        <div id="wrapper">
            <div id="bg"></div>
            <div id="overlay"></div>
            <div id="main">

                <!-- Header -->
                
                <header id="header">
                    <IMG SRC="<?= base_url() ?>assets/logos/mariposa.png" ALT="ESTADO PLURINACIONAL DE BOLIVIA" width="150" >
                    <br/>
                    <IMG SRC="<?= base_url() ?>assets/logos/omsc3.png" alt="s" width="650" >
                   

                    <nav>
                        <div class="grid_12" id="login">
                            <div class="grid_8 push_2" id="formulario_login">
                                <div class="grid_6 push_1" id="campos_login">
                                    <?= form_open(base_url2() . 'login/new_user') ?>
                                    <label for="username" style="color: #ffffff; font-size: 20px">Nombre de usuario:</label>
                                    <input type="text" name="username" class="username" placeholder="Usuario" required="true" style="width:200px;height:27px"><p><?= form_error('username') ?></p>
                                    <label for="password" style="color: #ffffff; font-size: 20px">Introduce tu password:</label>
                                    <input type="password" name="password" class="password" placeholder="Password" required="true" style="width:200px;height:27px"><p><?= form_error('password') ?></p>
                                    <?= form_hidden('token', $token) ?>
                                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>

                                    <?= form_close() ?>
                                    <?php
                                    if ($this->session->flashdata('usuario_incorrecto')) {
                                        ?>
                                        <div class="alert alert-error">
                                            
                                            <p ><?= $this->session->flashdata('usuario_incorrecto') ?></p>
                                        </div>


                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </nav>
                </header>
                 

             

            </div>
        </div>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script>
            window.onload = function () {
                document.body.className = '';
            }
            window.ontouchmove = function () {
                return false;
            }
            window.onorientationchange = function () {
                document.body.scrollTop = 0;
            }
        </script>
    </body>
</html>