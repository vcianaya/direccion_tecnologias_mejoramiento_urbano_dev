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
        <?php //echo $map_two['js']; ?>

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

        <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />

        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.4");
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>


    </head>
    <body>


        <section class="content-header">

            <ol class="breadcrumb">

                <li class="h4"> <a href="<?= base_url() ?>capas_ubicacion" style="color: #337ab7">
                        <i class="fa fa-arrow-left"></i> Volver </a> / Alumbrado Publico </li>
                <?php //echo print_r($_POST); ?>
            </ol>
        </section>
        <div class="row">
            <div class="col-md-10">
                <?= $map['html'] ?> 

                <?php //echo $map_two['html']; ?>

            </div>
            <div class="col-md-2">

                <img class="map" src="<?= base_url() ?>/assets/logos/capas_division.png" usemap="#usa" >
                <map name="usa">


                    <area data-toggle="modal" data-id="1" shape="poly"
                          title="Corrupcion Publica" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=1"
                          coords=" ">

                    <area data-toggle="modal" data-id="1" shape="poly"
                          title="Crimen Organizado" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=2"
                          coords="">

                    <area data-toggle="modal" data-id="1" shape="poly"
                          title="Economico Financiero" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=3"
                          coords="">

                    <area data-toggle="modal" data-id="1" shape="poly"
                          title="Homicidios" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=4"
                          coords="">

                    <area data-toggle="modal" data-id="1" shape="poly"
                          title="Menores y Familia" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=5"
                          coords="">

                    <area data-toggle="modal" data-id="1" shape="poly"
                          title="Operaciones Especiales" class="open-ModalD1" href="<?php echo base_url() ?>felcc/reporte_felcc_general?variable1=6"
                          coords="">



                </map>

            </div>
        </div>

        <section>
            <div class="row">
                <div class="col-md-12">

                    <div class="accordion" id="reports">
                        <div class="panel panel-default" id="area-1">
                            <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-1" data-parent="#reports" aria-expanded="false">1. Cantidad de Plazas o Parques </div>
                            <div id="report-1" class="collapse panel-body display" >
                                <?php foreach ($css_files as $file): ?>
                                    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                                <?php endforeach; ?>
                                <?php foreach ($js_files as $file): ?>
                                    <script src="<?php echo $file; ?>"></script>
                                <?php endforeach; ?>

                                <div class="col-md-12">
                                    <?php echo $output; ?>
                                </div>


                            </div>
                        </div>
                        <div class="panel panel-default" id="area-2">
                            <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-2" data-parent="#reports" aria-expanded="false">2. Cantidad de datos de Plazas o Parques por Distrito</div>
                            <div id="report-2" class="collapse panel-body display" aria-expanded="false">
                                <div class="col-md-4">
                                    <table class="display table table-responsive table-bordered dataTable" id="table-" role="grid" aria-describedby="table-5_info" style="width: 0px;">
                                        <thead>
                                            <tr class="inner-30" role="row">
                                                <th class="text-center " tabindex="0" aria-controls="table-5" colspan="1" aria-label="Servicio: activate to sort column descending" style="width: 0px;" aria-sort="ascending">DISTRITOS</th>
                                                <th class="text-center">Cantidades</th>
                                                <th class="text-center">Porcentaje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="inner-30 odd" role="row">
                                                <td bgcolor="#f9f9f9" class="text-right ">DISTRITO 1</td>
                                                <td bgcolor="#f9f9f9" class="text-right"><?php echo $this->mapa_model->distritos(1); ?></td>
                                                <td bgcolor="#f9f9f9" class="text-right"><?php echo round($r = $this->mapa_model->distritos(1) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 2</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(2); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(2) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 odd" role="row">
                                                <td bgcolor="#f9f9f9" class="text-right ">DISTRITO 3</td>
                                                <td bgcolor="#f9f9f9" class="text-right"><?php echo $this->mapa_model->distritos(3); ?></td>
                                                <td bgcolor="#f9f9f9" class="text-right"><?php echo round($r = $this->mapa_model->distritos(3) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 4</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(4); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(4) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 5</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(5); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(5) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 6</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(6); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(6) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 7</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(7); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(7) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 8</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(8); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(8) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 12</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(12); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(12) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">DISTRITO 14</td>
                                                <td class="text-right"><?php echo $this->mapa_model->distritos(14); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->distritos(14) * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right "><strong>TOTAL</strong></td>
                                                <td class="text-right"><?php echo $this->mapa_model->total_registros(); ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->total_registros() * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <?php if (isset($charts2)) echo $charts2; ?>
                                    <?php if (isset($json)): ?>
                                        <?php
                                    endif;
                                    if (isset($array)):
                                        ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3"> Son <?php echo $this->mapa_model->total_registros(); ?> datos registrados en Plazas y Parques
                                </div>
                            </div>
                        </div>



                        <div class="panel panel-default" id="area-3">
                            <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-3" data-parent="#reports" aria-expanded="false">3. Cantidad de datos de Plazas o Parques por Postes</div>
                            <div id="report-3" class="collapse panel-body display" aria-expanded="false">
                                <div class="col-md-4">
                                    <table class="display table table-responsive table-bordered dataTable" id="table-" role="grid" aria-describedby="table-5_info" style="width: 0px;">
                                        <thead>
                                            <tr class="inner-30" role="row">
                                                <th class="text-center " tabindex="0" aria-controls="table-5" colspan="1" aria-label="Servicio: activate to sort column descending" style="width: 0px;" aria-sort="ascending">POSTES</th>
                                                <th class="text-center">Cantidades</th>
                                                <th class="text-center">Porcentaje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="inner-30 odd" role="row">
                                                <td bgcolor="#f9f9f9" class="text-right ">FUNCIONAN</td>
                                                <td bgcolor="#f9f9f9" class="text-right"><?php
                                                    $result = mysql_query("SELECT SUM(nro_postes_luz) as total FROM luminarias");
                                                    $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                                    $var1 = $row["total"];
                                                    $result = mysql_query("SELECT SUM(nro_no_funcionan) as total2 FROM luminarias");
                                                    $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                                    $var2 = $row["total2"];
                                                    echo $tot = $var1 - $var2;
                                                    $total = $tot + $var2
                                                    ?></td>
                                                <td bgcolor="#f9f9f9" class="text-right"><?php echo round($tot * 100 / $total) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right ">NO FUNCIONAN</td>
                                                <td class="text-right"><?php echo $var2;
                                                    ?></td>
                                                <td class="text-right"><?php echo round($r = $var2 * 100 / $total) . ' %'; ?></td>
                                            </tr>
                                            <tr class="inner-30 even" role="row">
                                                <td class="text-right "><strong>TOTAL</strong></td>
                                                <td class="text-right"><?php
                                                    echo $total;
                                                    ?></td>
                                                <td class="text-right"><?php echo round($r = $this->mapa_model->total_registros() * 100 / $this->mapa_model->total_registros()) . ' %'; ?></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <?php if (isset($charts3)) echo $charts3; ?>
                                    <?php if (isset($json)): ?>
                                        <?php
                                    endif;
                                    if (isset($array)):
                                        ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3"> EL <?php echo round($tot * 100 / $total) . ' %'; ?> FUNCIONA CORRECTAMENTE Y EL <?php echo round($r = $var2 * 100 / $total) . ' %'; ?> NO FUNCIONA 
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </section>





    </body>
</html>