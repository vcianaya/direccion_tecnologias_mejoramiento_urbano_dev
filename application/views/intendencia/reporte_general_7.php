<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />

        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.4");
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
        <style type="text/css">
            .centrear {
                text-align: justify;
            }
            h5{
                font-family:  Arial, Helvetica, sans-serif;

                line-height: 1.5;
            }
            h6{
                font-family:  Arial, Helvetica, sans-serif;
                font-size:14px;
                line-height: 1.5;
            }
            h7{
                font-family:  Arial, Helvetica, sans-serif;
                font-size:12px;
                line-height: 1.5;
            }
            .NEGRO {
                font-weight: bold;
            }
            .negrita {
                font-weight: bold;
            }
        </style>
    </head>
    <body>


        <section class="content-header">


        </section>


        <section style="padding-left: 130px; padding-right: 40px; padding-top: 120px">
            <?php
            foreach ($reporte as $e):
                ?>
                <?php
            endforeach;
            ?>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="centrear"><?= $e->parrafo_1 ?></h6>
                </div>

            </div>
            <table border="1" >
                <tr>
                    <td height="35" colspan="8" align="center"> <h6><strong>Tabla </strong>-  Actividades Clausuradas - Distrito 
                  <?= $distrito ?></h6></td>
                </tr>
                <tr>
                    <td width="266" height="48" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>ID</h7></td>
                    <td width="266" height="48" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>FECHA</h7></td>
                    <td width="266" height="48" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>DISTRITO</h7></td>
                    <td width="266" height="48" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>URBANIZACIONES / ZONAS</h7></td>
                    <td width="76" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>
                      DIRECCION
                      </h7></td>
                    <td width="165" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>
                      ENTRE</h7></td>
                    <td width="85" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>
                      TIPO OPERATIVO
                      </h7></td>
                    <td align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>ACTIVIDAD ECONOMICA</h7></td>
                    </tr>
                                <?php
                                foreach ($zona as $z):
                                    ?>
                                    <tr>
                                        <?php
                                        $it = $z->id_intervencion;
                                        $zona = $z->id_zona
                                        ?>
                                        <td align="center" class="NEGRO"><?php echo  $z->id_operativo?></td>
                                        <td align="center" class=""><?= $z->fecha ?></td>
                                        <td align="center" class=""><?= $z->id_distrito_operativo ?></td>
                                        <td align="center" class=""><?= $z->nombre_zona ?></td>
                                        <td align="center"><?php echo  $z->direccion_1 ?></td>
                                        <td align="center"><?php echo  $z->direccion_2 ?></td>
                                        <td align="center"><?php echo  $z->nombre_o ?></td>
                                        <td align="center"><?php echo  $z->nombre_intervencion ?></td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>

                                </table>
                                </section>
                                </body>
                                </html>