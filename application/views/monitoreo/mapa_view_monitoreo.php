<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

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

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>


    </head>
    <body>


        <section class="content-header">

            <ol class="breadcrumb">
                <?php
                foreach ($tipo_operativo as $tip):
                    $tipOp = $tip->nombre_monitoreo;
                    ?>

                <?php endforeach; ?>
                <?php if (!$datos) { ?>

                    <?php
                } else {
                    ?>
                    <?php foreach ($operativos as $fila) : ?>
                    <?php endforeach; ?>

                <?php }
                ?>

                <li class="h4"> <a href="javascript:history.back(1)" style="color: #337ab7">
                        <i class="fa fa-arrow-left"></i> Volver </a> / REPORTE DE MONITOREO (<?php  $tipOp ?>) </li>
                <?php echo form_open('editor/ver_pdf_operativos'); ?>
                <input type="hidden" name="fecha_inicio" id="fecha" value="<?= $_POST['fecha_inicio'] ?>" />
                <input type="hidden" name="fecha_fin" id="fecha" value="<?= $_POST['fecha_fin'] ?>" />
                <input type="hidden" name="id_distrito" id="id_distrito" 
                       value="<?php
                       if (isset($fila->id_distrito_operativo)) {
                           echo $var = $fila->id_distrito_operativo;
                       } else {
                           
                       }
                       ?>" />

                <input type="hidden" name="id_tipo_operativo" id="id_tipo_operativo" value="<?php
                if (isset($fila->id_tipo_operativo)) {
                    echo $var = $fila->id_tipo_operativo;
                } else {
                    
                }
                ?>" />
                       <?php if (!$datos) { ?>

                    <?php
                } else {
                    ?>
                    <input type="submit" name="submit" id="submit" value="Generar Mapa" class="btn btn-danger xxlarge">
                <?php }
                ?>
                <?php echo form_close(); ?>
                <?php echo form_open('monitoreo/ver_informe_monitoreo'); ?>
                <input type="hidden" name="fecha_inicio" id="fecha" value="<?= $_POST['fecha_inicio'] ?>" />
                <input type="hidden" name="fecha_fin" id="fecha" value="<?= $_POST['fecha_fin'] ?>" />
                <input type="hidden" name="id_distrito" id="id_distrito" 
                       value="<?php
                       if (isset($fila->id_distrito_monitoreo)) {
                           echo $var = $fila->id_distrito_monitoreo;
                       } else {
                           
                       }
                       ?>" />

                <input type="hidden" name="id_tipo_operativo" id="id_tipo_operativo" value="<?php
                if (isset($fila->id_tipo_caso)) {
                    echo $var = $fila->id_tipo_caso;
                } else {
                    
                }
                ?>" />
                       <?php if (!$datos) { ?>

                    <?php
                } else {
                    ?>
                    <input type="submit" name="submit" id="submit" value="Generar Informe" class="btn btn-primary xxlarge">
                <?php }
                ?>
                <?php echo form_close(); ?>
            </ol>
        </section>
        <?= $map['html'] ?> 
        <section>

            <div class="col-md-4">

                <div class="container">
                    <div id="sidebars" >
                        <ul>
                            <?php if (!$datos) { ?>
                                <font  color="black" style="font-weight: bold; font-size: 14px; text-decoration: underline">
                                No se encontraron registros.
                                </font>


                            <?php } else {
                                ?>
                                <div id="Layer1" style="width:430px; height:140px; overflow: scroll;">
                                    <?php
                                    foreach ($datos as $marker_sidebar) {
                                        ?>

                                        <li onClick="datos_marker(<?= $marker_sidebar->pos_y ?>,<?= $marker_sidebar->pos_x ?>, marker_<?= $marker_sidebar->id_monitoreo ?>)">
                                            <?= '<strong style="color: #c7254e">✓&nbsp;&nbsp;Zona:</strong>  ' . $marker_sidebar->nombre . '<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Calle / Avenida:</strong> ' . $marker_sidebar->direccion . '<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Fecha:</strong>  ' . $marker_sidebar->fecha ?></li>
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