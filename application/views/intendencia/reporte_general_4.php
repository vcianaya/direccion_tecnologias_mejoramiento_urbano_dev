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
                    <td height="35" colspan="4" align="center"> <h6><strong>Tabla </strong>- Situacion Legal de las Actividades Comerciales - Distrito <?= $distrito ?></h6></td>
                </tr>
                <tr>
                    <td width="266" height="48" align="center" class="NEGRO">URBANIZACIONES / ZONAS</td>
                    <td width="76" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>
                    LEGAL                      </h6></td>
                    <td width="165" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>
                        CLANDESTINO</td>
                        <td width="85" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>
                            OTROS
                            <h7></td>
                                </tr>
                                <?php
                                foreach ($zona as $z):
                                    ?>
                                    <tr>
                                        <?php
                                        $it = $z->id_intervencion;
                                        $zona = $z->id_zona
                                        ?>
                                        <td class="NEGRO"><?= $z->nombre_zona ?></td>
                                        <td align="center"><?php echo $this->intendencia_model->situacion_legal($zona, $distrito, 2); ?></td>
                                        <td align="center"><?php echo $this->intendencia_model->situacion_legal($zona, $distrito, 1); ?></td>
                                        <td align="center"><?php echo $this->intendencia_model->situacion_legal($zona, $distrito, 3); ?></td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                <tr>
                                    <td class="NEGRO">SUB TOTALES</td>
                                    <td align="center"><span class="negrita"><?php echo $this->intendencia_model->situacion_legal_total($distrito, 2); ?></span></td>
                                    <td align="center"><span class="negrita"><?php echo $this->intendencia_model->situacion_legal_total($distrito, 1); ?></span></td>
                                    <td align="center"><span class="negrita"><?php echo $this->intendencia_model->situacion_legal_total($distrito, 3); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="NEGRO">TOTALES</td>
                                    <td colspan="3" align="center"><span class="negrita"><?php echo $this->intendencia_model->situacion_legal_total_general($distrito); ?></span></td>
                                </tr>

                                </table>
                                </section>
                                </body>
                                </html>