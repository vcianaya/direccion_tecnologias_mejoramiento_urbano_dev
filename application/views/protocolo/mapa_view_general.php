<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />

        <style type="text/css">
            body{
                background: #f8f8f8;
                text-align: center;
            }
            #sidebar{
                position: absolute;
                width: 18%;
                height: 590px;
                background: #F0F1E7;
                color: #fff;
                margin-left: 80%;
                margin-top: -600px;
                border: 5px solid #fff;
            }
            ul{
                padding: 0;
                text-align: justify;		
            }

            li{
                cursor: pointer;
                border-top: 1px solid #fff;
                // background: #c3c3c3; 
                list-style: none;
                color: #111
            }
            li:hover{
                background: #fefefe;
            }
        </style>
        <script type="text/javascript">
            function datos_marker(lat, lng, marker)
            {
                var mi_marker = new google.maps.LatLng(lat, lng);

                map.panTo(mi_marker);
                google.maps.event.trigger(marker, 'click');
            }
        </script>

        <?= $map['js'] ?>

        <style type="text/css">
            a, a:link, a:visited {
                color: #444;
                text-decoration: none;
            }
            a:hover {
                color: #000;
            }
            .left {
                float: left;
            }
            #menu {
                width: 20%;
            }
            #g_render {
                width: 80%;
            }
            li {
                margin-bottom: 1em;

            }
        </style>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.4");
        </script>


        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.maphilight.min.js"></script>
        <script type="text/javascript">$(function () {
                $('.map').maphilight();
            });</script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>


    </head>
    <body>


        <section class="content-header">

            <ol class="breadcrumb">


                <li class="h4"> <a href="javascript:history.back(1)" style="color: #337ab7">
                        <i class="fa fa-arrow-left"></i> Volver </a> / REPORTE DE CENTRO INFANTILES (GENERAL) </li>


                <?php if (!$datos) { ?>

                    <?php
                } else {
                    ?>

                <?php }
                ?>


            </ol>
        </section>
        

        <section>
<div class="col-md-9">
            <?= $map['html'] ?> 
        </div>
      
            <div class="col-md-3">

                <div class="container">
                    <div id="sidebars" >

                        <ul>
                            <?php if (!$datos) { ?>
                                <font  color="black" style="font-weight: bold; font-size: 14px; text-decoration: underline">
                                No se encontraron registros.
                                </font>


                            <?php } else {
                                ?>
                                <strong>LISTA DE CENTROS INFANTILES</strong>
                                <br/><br/>
                                <div id="Layer1" style="width:420px; height:800px; overflow: scroll;">
                                    <?php
                                    foreach ($datos as $marker_sidebar) {
                                        ?>

                                        <li onClick="datos_marker(<?= $marker_sidebar->pos_y ?>,<?= $marker_sidebar->pos_x ?>, marker_<?= $marker_sidebar->id ?>)">
                                            <?= '<strong style="color: #c7254e">✓&nbsp;&nbsp;Nombre Centro Infantil:</strong>  ' . $marker_sidebar->nombre . '<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Calle / Avenida:</strong> ' . $marker_sidebar->zona . '<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Numero de Ninos:</strong>  ' . $marker_sidebar->numero_ninos ?></li>
                                            <?php
                                    }
                                }
                                ?>
                            </div>
                        </ul>


                    </div>



                </div>
            </div>

            








        </section>





    </body>
</html>