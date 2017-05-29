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
                        <i class="fa fa-arrow-left"></i> Volver </a> / REPORTE DE FALTAS Y CONTRAVENCIONES (GENERAL) </li>



            </ol>
        </section>
        <div class="col-md-10">
            <?= $map['html'] ?> 
        </div>
        <div class="col-md-2">

            <img class="map" src="<?= base_url() ?>/assets/logos/felcc_division.png" usemap="#usa" >
            <map name="usa">


                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Corrupcion Publica" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=1"
                      coords="39,183, 24,158, 25,150, 29,144, 34,141, 42,141, 48,144, 52,152, 52,159 ">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Crimen Organizado" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=2"
                      coords="37,237, 22,208, 24,201, 27,197, 34,193, 43,193, 50,198, 53,206, 52,211">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Economico Financiero" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=3"
                      coords="38,288, 25,262, 25,255, 29,249, 35,245, 44,245, 50,251, 52,257, 52,262">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Homicidios" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=4"
                      coords="38,344, 25,318, 25,311, 32,302, 35,301, 44,301, 52,311, 52,319">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Menores y Familia" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=5"
                      coords="38,395, 25,370, 25,363, 31,355, 36,352, 44,354, 51,360, 52,363, 52,370">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Operaciones Especiales" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=6"
                      coords="186,180, 173,156, 174,146, 179,139, 183,138, 191,139, 200,146, 200,155">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Personas" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=7"
                      coords="186,240, 173,216, 173,208, 179,199, 192,198, 200,207, 200,216">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Propiedades" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=8"
                      coords="186,293, 173,268, 173,259, 182,251, 192,251, 200,259, 200,268">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Trata y Trafico " class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=9"
                      coords="186,344, 173,318, 174,310, 182,301, 192,301, 200,310, 200,318">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="Unidad de Solucion Temprana" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=10"
                      coords="186,396, 173,371, 174,361, 182,353, 192,354, 200,365, 200,371">

                <area data-toggle="modal" data-id="1" shape="poly"
                      title="General" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general"
                      coords="107,464, 100,448, 93,437, 93,429, 102,419, 112,419, 119,425, 121,431, 121,438, 114,448">



            </map>

        </div>

        <section>

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
                                <strong>LISTA REGISTROS DE FALTAS Y CONTRAVENCIONES</strong>
                                <br/><br/>
                                <div id="Layer1" style="width:420px; height:240px; overflow: scroll;">
                                    <?php
                                    foreach ($datos as $marker_sidebar) {
                                        ?>

                                        <li onClick="datos_marker(<?= $marker_sidebar->pos_y ?>,<?= $marker_sidebar->pos_x ?>, marker_<?= $marker_sidebar->id_faltas ?>)">
                                            <?= '<strong style="color: #c7254e">✓&nbsp;&nbsp;Numero de Formulario:</strong>  ' . $marker_sidebar->numero_formulario . '<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Calle / Avenida:</strong> ' . $marker_sidebar->lugar_hecho . '<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Fecha del Hecho:</strong>  ' . $marker_sidebar->fecha_hecho ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </ul>


                    </div>



                </div>
            </div>
            <div class="col-md-12">




                <?php if (isset($charts)) echo $charts; ?>
                <?php if (isset($json)): ?>

                    <pre><?php echo print_r($json); ?></pre>
                    <?php
                endif;
                if (isset($array)):
                    ?>

                    <pre><?php echo print_r($array); ?></pre>
                <?php endif; ?>



                <?php if (isset($charts2)) echo $charts2; ?>
                <?php if (isset($json)): ?>

                    <pre><?php echo print_r($json); ?></pre>
                    <?php
                endif;
                if (isset($array)):
                    ?>

                    <pre><?php echo print_r($array); ?></pre>
                <?php endif; ?>




                <?php if (isset($charts3)) echo $charts3; ?>
                <?php if (isset($json)): ?>

                    <pre><?php echo print_r($json); ?></pre>
                    <?php
                endif;
                if (isset($array)):
                    ?>

                    <pre><?php echo print_r($array); ?></pre>
                <?php endif; ?>

                <?php if (isset($charts4)) echo $charts4; ?>
                <?php if (isset($json)): ?>

                    <pre><?php echo print_r($json); ?></pre>
                    <?php
                endif;
                if (isset($array)):
                    ?>

                    <pre><?php echo print_r($array); ?></pre>
                <?php endif; ?>

                <?php if (isset($charts5)) echo $charts5; ?>
                <?php if (isset($json)): ?>

                    <pre><?php echo print_r($json); ?></pre>
                    <?php
                endif;
                if (isset($array)):
                    ?>

                    <pre><?php echo print_r($array); ?></pre>
                <?php endif; ?>
            </div>







        </div>
        <div class="col-md-2">

            <strong>RECOMENDACIONES</strong>



        </div>       </section>


    <section>



    </section>




</body>
</html>