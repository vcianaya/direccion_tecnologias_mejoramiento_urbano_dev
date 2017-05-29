

﻿<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
      ================================================== -->
        <meta charset="utf-8">
        <title>zWebDesign Free Html5 Responsive Template</title>
        <meta name="description" content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
        <meta name="author" content="www.zerotheme.com">

        <!-- Mobile Specific Metas
      ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
      ================================================== -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/zerogrid.css">


        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.maphilight.min.js"></script>


        <style type="text/css">
            <!--
            .centrear {
                text-align: center;
                font-weight: 700;

            }
            .negrita{
                font-weight: 700;
            }
            .fondo{
                background: #E0E2FF;
                //    color: white;
            }
            -->
        </style>
        <script>
            $(document).on("click", ".open-ModalD1", function () {
                var myDNI = $(this).data('id');
                $(".modal-body #DNI").val(myDNI);
            });
        </script> 


        <script type="text/javascript">
            $(document).ready(function ()
            {
                $("input[name=postal]").attr('readonly', 'readonly');
                //al cambiar el select provincias
                $("#provincias2").on("change", function ()
                {
                    //obtenemos la id de la provincia seleccionada
                    var provinciaSelected2 = $("#provincias2 option:selected").attr("value");
                    //hacemos la petición via get contra home/getAjaxPoblacion pasando la provincia
                    $.get("<?php echo base_url('mapa/getAjaxPoblacion2') ?>", {"provincia2": provinciaSelected2}, function (data)
                    {
                        //parseamos el json y recorremos

                        var poblaciones2 = "";
                        var poblacion2 = JSON.parse(data);
                        for (datos in poblacion2.poblaciones2)
                        {
                            poblaciones2 += '<option value="' + poblacion2.poblaciones2[datos].id + '">' +
                                    poblacion2.poblaciones2[datos].nombre_entidad + '</option>';
                        }
                        //populamos el desplegable poblaciones con las poblaciones obtenidas
                        $('select#poblaciones2').html(poblaciones2);
                        $('input[name=postal]').val(poblacion2.postal);
                    });
                });

                //al cambiar el select poblaciones
                $("#poblaciones2").on("change", function ()
                {
                    //obtenemos la id de la población seleccionada
                    var poblacionSelected2 = $("#poblaciones2 option:selected").attr("value"), provincias2 = "";
                    //hacemos la petición via get contra home/getAjaxPostal pasando la población
                    $.get("<?php echo base_url('mapa/getAjaxPostal2') ?>", {"poblacion2": poblacionSelected2}, function (data)
                    {
                        //parseamos la respuesta
                        var data = JSON.parse(data);
                        //pintamos el resultado en el campo de texto
                        $('input[name=postal]').val(data.postal);

                        //como tenemos formateado el array no sirve el for in
                        //pero si el each, que accede a la clave y al valor
                        $.each(data.provincias2, function (k, v)
                        {
                            provincias2 += '<option value="' + k + '">' + v + '</option>';
                        })
                        //populamos el desplegable provincias2 de nuevo con todas las provincias
                        $('select#provincias2').html(provincias2);
                    });
                });
            });
        </script>


        <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
        <!--[if lt IE 9]>
                    <script src="js/html5.js"></script>
                    <script src="js/css3-mediaqueries.js"></script>
            <![endif]-->


        <link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>

    </head>

    <body>


        <section class="content-header">

            <ol class="breadcrumb">

                <li class="h4"> <a href="<?php echo base_url() ?>modulos_policiales/distritos_modulos_policiales"><i class="fa fa-arrow-left"></i> Volver </a> / Distrito 3 / Seleccione un módulo policial </li>

                <input type="submit" name="submit" id="submit" value="RADIO DE ACCION DISTRITO 3" class="btn btn-primary xxlarge punto">

            </ol>
        </section>
        <style>

            @media screen and (min-width: 700px) {

                #myModal .modal-dialog  {width:1200px;}

            }
        </style>



        <style>

            element.style {
                display: block;
                position: relative;
                padding: 0px;
                width: 1000px;
                height: 900px;
                background: url(http://192.168.43.81:9090/observatorio_demo/assets/logos/distrito_mp1.png);
            }
        </style>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-5">

                    <img class="map" src="<?= base_url() ?>assets/logos/distrito_3_a.png" usemap="#usa"  >

                    <map name="usa">


                        <area  shape="poly" id="34" class="ok"
                               title=" 3 - PZ - 013"  href="#_34" 
                               coords="900,199, 900,180, 917,180, 917,199">

                        <area id="6" shape="poly"  class="ok"
                              title="3 - PZ - 019" class="open-ModalD1" href="#_35"
                              coords="601,433, 601,414, 620,415, 620,432">

                        <area id="7" shape="poly"  class="ok"
                              title="3 - PZ - 02" class="open-ModalD1" href="#_35"
                              coords="1270,488, 1270,471, 1289,471, 1289,488">

                        <area id="8" shape="poly"  class="ok"
                              title="3 - PQ - 08" class="open-ModalD1" href="#_35"
                              coords="749,361, 748,343, 766,343, 767,356, 764,359,758,362, 753,361">


                        <area id="10" shape="poly"  class="ok"
                              title="3 - PZ - 08" class="open-ModalD1" href="#_35"
                              coords="1142,426, 1142,408, 1161,408, 1161,426">

                        <area id="11" shape="poly"  class="ok"
                              title="3 - PZ - 024" class="open-ModalD1" href="#_35"
                              coords="1188,538, 1188,521, 1207,521, 1207,538">

                        <area id="12" shape="poly"  class="ok"
                              title="3 - PQ - 07" class="open-ModalD1" href="#_35"
                              coords="755,376, 754,363, 758,362, 762,361, 766,358, 773,359, 773,376">
                        <area id="13" shape="poly"  class="ok"
                              title="3 - PZ - 031" class="open-ModalD1" href="#_35"
                              coords="799,385, 799,368, 817,367, 817,385">
                        <area id="14" shape="poly"  class="ok"
                              title="3 - PZ - 06" class="open-ModalD1" href="#_35"
                              coords="788,413, 786,394, 805,395, 805,413">
                        <area id="15" shape="poly"  class="ok"
                              title="3 - PZ - 20" class="open-ModalD1" href="#_35"
                              coords="749,429, 749,411, 768,411, 768,429">
                        <area id="16" shape="poly"  class="ok"
                              title="3 - PZ - 19" class="open-ModalD1" href="#_35"
                              coords="600,432, 600,415, 619,415, 619,432">
                        <area id="17" shape="poly"  class="ok"
                              title="3 - PQ - 06" class="open-ModalD1" href="#_35"
                              coords="787,412, 787,394, 806,394, 806,412">

                        <area id="18" shape="poly"  class="ok"
                              title="3 - PZ - 35" class="open-ModalD1" href="#_35"
                              coords="737,324, 737,307, 755,307, 755,324">
                        <area id="19" shape="poly"  class="ok"
                              title="3 - PZ - 25" class="open-ModalD1" href="#_35"
                              coords="1060,427, 1060,410, 1079,410, 1079,427">
                        <area id="20" shape="poly"  class="ok"
                              title="3 - PQ - 10" class="open-ModalD1" href="#_35"
                              coords="747,296, 747,278, 764,278, 765,296">
                        <area id="21" shape="poly"  class="ok"
                              title="3 - PQ - 04" class="open-ModalD1" href="#_35"
                              coords="787,412, 787,394, 806,394, 806,412">
                        <area id="22" shape="poly"  class="ok"
                              title="3 - PQ - 02" class="open-ModalD1" href="#_35"
                              coords="612,234, 611,216, 632,216, 632,234">
                        <area id="23" shape="poly"  class="ok"
                              title="3 - PZ - 07" class="open-ModalD1" href="#_35"
                              coords="1194,395, 1194,378, 1212,378, 1212,395">
                        <area id="24" shape="poly"  class="ok"
                              title="3 - PQ - 05" class="open-ModalD1" href="#_35"
                              coords="990,415, 990,397, 1009,397, 1009,415">
                        <area id="25" shape="poly"  class="ok"
                              title="3 - PZ - 15" class="open-ModalD1" href="#_35"
                              coords="1060,427, 1060,410, 1079,410, 1079,427">
                        <area id="26" shape="poly"  class="ok"
                              title="3 - PZ - 29" class="open-ModalD1" href="#_35"
                              coords="912,451, 911,433, 930,433, 930,450">
                        <area id="27" shape="poly"  class="ok"
                              title="3 - PZ - 16" class="open-ModalD1" href="#_35"
                              coords="529,210, 529,193, 548,193, 548,210">
                        <area id="28" shape="poly"  class="ok"
                              title="3 - PZ - 03" class="open-ModalD1" href="#_35"
                              coords="1258,285, 1258,268, 1277,268, 1277,285">
                        <area id="29" shape="poly"  class="ok"
                              title="3 - PZ - 26" class="open-ModalD1" href="#_35"
                              coords="1037,401, 1037,383, 1055,383, 1055,401">
                        <area id="30" shape="poly"  class="ok"
                              title="3 - PZ - 27" class="open-ModalD1" href="#_35"
                              coords="977,492, 977,474, 994,474, 994,492">
                        <area id="31" shape="poly"  class="ok"
                              title="3 - PZ - 22" class="open-ModalD1" href="#_35"
                              coords="1428,225, 1428,207, 1447,207, 1447,225">
                        <area id="32" shape="poly"  class="ok"
                              title="3 - PQ - 03" class="open-ModalD1" href="#_35"
                              coords="1428,225, 1428,207, 1447,207, 1447,225">
                         <area id="33" shape="poly"  class="ok"
                              title="3 - PQ - 39" class="open-ModalD1" href="#_35"
                              coords="">



                    </map>
                    <!--------------Header--------------->


                    <!--------------Content--------------->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                </div>
                                <div class="modal-body" id="modal-bodyku">
                                    <div id="map"></div>
                                </div>
                                <div class="modal-footer" id="modal-footerq">
                                   
                                    <button class="btn btn-primary">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <script>
                $('.open-ModalD1').click(function () {
                    console.log($(this).attr('id'));
                    v = $(this).attr('id');
                    $('.id_modal').attr('id', v);
                });
//END MODIFICAR PRODUCTO
                $(document).ready(function () {
                    _modal = $('#myModal');
                    $('.punto').unbind().bind('click', function (e) {
                        e.preventDefault();

                        console.log('ss')

                        _modal.find('#myModalLabel').html('Detalle de pedido');


                        _modal.modal('show');

                    });//EDN MODIFICAR PRODUCTO
                });

            </script>
            <!-------------- _1_de_marzo   --------------->

            <style>

                @media screen and (min-width: 700px) {

                    #_34 .modal-dialog  {width:1200px;}

                }
            </style>

            <?php $var = '34'; ?>
            <div  id="_35" class="modal fade id_modal"  role="dialog" >
                <div class="modal-dialog">

                    <div class="modal-content">

                        <?php
                        $var = $this->alumbrado_model->distrito_3(34);
                        foreach ($var as $p) {
                            ?>

                        <?php } ?>


                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">×</button>
                            <h4><strong>CODIGO DEL AREA <?php echo $id_felcc = $this->uri->segment(2); ?>
                                    <?php //$p->codigo_area  ?>  
                                </strong></h4>

                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url() ?>assets/uploads/soporte/<?= $p->imagen_area ?> "  width="350px" class="zoom" style="cursor: -webkit-zoom-in; transform: translate(0px, 0px);"/>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h3><strong style="color: #0066FF">FICHA TECNICA </strong>  </h3></div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h5><strong>CODIGO AREA: </strong><?= $p->codigo_area ?>  </h5></div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h5><strong>NOMBRE AREA: </strong><?= $p->nombre_area ?>  </h5></div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h5><strong>TIPO AREA: </strong><?= $p->tipo_area ?>  </h5></div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h5><strong>DIRECCION: </strong><?= $p->direccion ?>  </h5></div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h5><strong>NRO DE POSTES DE LUZ: </strong><?= $p->nro_postes_luz ?>  </h5></div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h5><strong>NRO DE POSTES DE LUZ QUE FUNCIONAN: </strong><?php echo $p->nro_postes_luz - $p->nro_no_funcionan ?>  </h5></div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> <h5><strong>NRO DE POSTES DE LUZ QUE NO FUNCIONAN: </strong><?= $p->nro_no_funcionan ?>  </h5></div>
                                    </div>
                                    <?php if ($p->tipo_area == 'PLAZA') { ?>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">ESTADO DEL AREA PLAZAS </strong>  </h3></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>ESTADO DE LA PLAZA: </strong><?= $p->estado_area_plaza ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>REJAS DESCUBIERTAS: </strong><?= $p->rejas_descubiertas ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>REJAS CERRADAS: </strong><?= $p->rejas_cerradas ?>  </h5></div>
                                        </div>
                                    <?php } else if ($p->tipo_area == 'PARQUE') { ?>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">ESTADO DEL AREA PARQUES </strong>  </h3></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>ESTADO DE LA PARQUES: </strong><?= $p->estado_area_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>REJAS DESCUBIERTAS: </strong><?= $p->rejas_descubiertas_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>REJAS CERRADAS: </strong><?= $p->rejas_cerradas_parques ?>  </h5></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if ($p->tipo_area == 'PLAZA') { ?>
                                    <div class="col-md-4">
                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">EQUIPAMIENTO AREA PLAZAS </strong>  </h3></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>BANQUETAS: </strong><?= $p->banqueta_area ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>BASUREROS: </strong><?= $p->basureros ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>MONUMENTOS: </strong><?= $p->monumentos ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>PLAQUETAS DE CREACION: </strong><?= $p->plaquetas_creacion ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">AREA VERDE EN PLAZAS </strong>  </h3></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>MANTENIMIENTO: </strong><?= $p->mantenimiento ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>LIMPIAS: </strong><?= $p->limpias ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">ACTIVIDADES O SERVICIOS EN PLAZAS </strong>  </h3></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>MODULO POLICIAL: </strong><?= $p->modulo_policial ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>CENTRO DE SALUD: </strong><?= $p->centro_salud ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>PARADA DE TRANSPORTE: </strong><?= $p->parada_trasnporte ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>COMERCIO: </strong><?= $p->comercio ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>VENTA DE COMIDAS: </strong><?= $p->venta_comidas ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>SNACKS: </strong><?= $p->snacks ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>VENTA DE PRODUCTOS: </strong><?= $p->venta_productos ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>OBSERVACIONES: </strong><?= $p->observaciones ?>  </h5></div>
                                        </div>
                                    </div>
                                <?php } else if ($p->tipo_area == 'PARQUE') { ?>
                                    <div class="col-md-4">
                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">EQUIPAMIENTO AREA PARQUES </strong>  </h3></div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>BANQUETAS: </strong><?= $p->banquetas_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>BASUREROS: </strong><?= $p->basureros_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>MONUMENTOS: </strong><?= $p->monumentos_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>PLAQUETAS DE CREACION: </strong><?= $p->plaquetas_creacion_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>JUEGO PARA NINOS: </strong><?= $p->juego_para_nino_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">AREA VERDE EN PARQUES </strong>  </h3></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>MANTENIMIENTO: </strong><?= $p->mantenimiento_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>LIMPIAS: </strong><?= $p->limpias_parques ?>  </h5></div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-12"> <h3><strong style="color: #0066FF">ACTIVIDADES O SERVICIOS EN PARQUES </strong>  </h3></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>MODULO POLICIAL: </strong><?= $p->modulo_policial_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>CENTRO DE SALUD: </strong><?= $p->centro_salud_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>PARADA DE TRANSPORTE: </strong><?= $p->parada_transporte ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>COMERCIO: </strong><?= $p->comercio_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>VENTA DE COMIDAS: </strong><?= $p->venta_comidas_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>SNACKS: </strong><?= $p->snacks_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>VENTA DE PRODUCTOS: </strong><?= $p->venta_productos_parques ?>  </h5></div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> <h5><strong>OBSERVACIONES: </strong><?= $p->observaciones_parques ?>  </h5></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-dm-3">

                                    <div class="row"> 
                                        <div class="col-md-3"> <h3><strong style="color: #0066FF">VIDEO</strong>  </h3></div>
                                        <video controls height="250px" width="350px">   <source src="<?php echo base_url() ?>assets/uploads/SOPORTE/<?= $p->video ?>" type="video/mp4"> </video>
                                    </div>

                                </div>                                
                            </div>
                        </div>

                        <div class="modal-footer">


                        </div>

                    </div>

                </div>
            </div>

            <!-------------- _1_de_mayo   --------------->



            <div class="modal-footer">

            </div>







        </section>
        <!--------------Footer--------------->
        <footer>

        </footer>
    </body></html>












<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">


                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="modal-bodyku">

            </div>
            <div class="modal-footer" id="modal-footerq">
                <button id="enviar" class="btn btn-primary">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
                $(document).ready(function () {
                    _modal = $('#myModal');
                    $('.ok').unbind().bind('click', function (e) {
                        e.preventDefault();
                        ids = $(this).attr('id');
                        console.log(ids);
                        $.ajax({
                            url: "../alumbrado/distritos_4_alumbrado/" + ids,
                            success: function (response) {
                                _modal.find('#myModalLabel').html('ALUMBRADO PUBLICO');
                                _modal.find('.modal-body').html(response);
                                _modal.find('.btn-primary').unbind().bind('click', function (e) {
                                    e.preventDefault();
                                    location.reload(true);
                                    _modal.modal('hide');
                                });
                                _modal.modal('show');
                            }
                        });
                        _modal.modal('show');
                    });
                });
</script>
</body>

</html>
