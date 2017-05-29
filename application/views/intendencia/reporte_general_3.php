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
                font-size:19px;
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
            <div class="row">
                <div class="col-md-6">
                    <h6 class="centrear"><?= $e->parrafo_2 ?></h6>
                </div>

            </div>
            <table width="1253"  border="1" >
                <tr>
                    <td colspan="13" align="center"> <h6><strong>Tabla </strong>- Cantidad de Clausuras Realizadas por Mes y Tipo de Actividad - Distrito <?= $distrito ?> </h6>  </td>
                </tr>
                <tr>
                    <td colspan="13" align="center"><h6><strong>ACTIVIDADES CLAUSURADAS POR LA INTENDENCIA MUNICIPAL</strong></h6></td>
                </tr>
                <tr>
                    <td width="142" height="48" class="NEGRO">TIPO DE OPERATIVOS</td>
                    <td width="92" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>ENERO</h6></td>
                    <td width="93" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>FEBRERO<h7></td>
                            <td width="86" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>MARZO<h7></td>
                                    <td width="70" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>ABRIL<h7></td>
                                            <td width="70" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>MAYO<h7></td>
                                                    <td width="66" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>JUNIO<h7></td>
                                                            <td width="87" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>JULIO<h7></td>
                                                                    <td width="72" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>AGOSTO<h7></td>
                                                                            <td width="106" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>SEPTIEMBR<h7>E</td>
                                                                                    <td width="79" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>OCUTBRE<h7></td>
                                                                                            <td width="103" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>NOVIEMBRE<h7></td>
                                                                                                    <td width="105" align="center" bgcolor="#CCCCCC" class="NEGRO"><h7>DICIEMBRE<h7></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">BARES, DISCOTECAS Y CANTINAS</td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 1); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 2); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 3); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 4); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 5); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 6); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 7); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 8); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 9); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 10); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 11); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(2, $distrito, 12); ?></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">EXPENDIO Y VENTA DE ALIMENTOS</td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 1); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 2); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 3); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 4); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 5); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 6); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 7); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 8); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 9); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 10); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 11); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(6, $distrito, 12); ?></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">HORNO PANIFICADORA</td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 1); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 2); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 3); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 4); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 5); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 6); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 7); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 8); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 9); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 10); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 11); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(10, $distrito, 12); ?></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">HOTELES, MOTELES Y ALOJAMIENTOS</td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 1); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 2); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 3); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 4); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 5); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 6); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 7); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 8); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 9); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 10); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 11); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(8, $distrito, 12); ?></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">INTERNET</td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 1); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 2); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 3); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 4); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 5); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 6); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 7); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 8); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 9); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 10); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 11); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(14, $distrito, 12); ?></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">LENOCINIO</td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 1); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 2); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 3); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 4); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 5); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 6); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 7); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 8); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 9); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 10); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 11); ?></td>
                                                                                                                <td align="center"><?php echo $this->intendencia_model->tipo_operativo_clausuras(12, $distrito, 12); ?></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">SUB TOTALES</td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 1); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 2); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 3); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 4); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 5); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 6); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 7); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 8); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 9); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 10); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 11); ?></td>
                                                                                                                <td align="center" bgcolor="#CCCCCC" class="negrita"><?php echo $this->intendencia_model->tipo_operativo_clausuras_total($distrito, 12); ?></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="NEGRO">TOTALES</td>
                                                                                                                <td colspan="12" align="center"  class="negrita"> <?php echo $this->intendencia_model->tipo_operativo_total_clausuras($distrito); ?></td>
                                                                                                            </tr>
                                                                                                            </table>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <h6 class="centrear"><?= $e->parrafo_3?></h6>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                            </section>
                                                                                                            </body>
                                                                                                            </html>