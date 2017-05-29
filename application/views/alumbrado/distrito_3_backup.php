<!DOCTYPE html>
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
        <script type="text/javascript">$(function () {
                $('.map').maphilight();
            });</script>


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

                #_013 .modal-dialog  {width:1200px;}

            }
        </style>
        <style>

            @media screen and (min-width: 768px) {

                #_1_de_mayo .modal-dialog  {width:1200px;}

            }
        </style>
        <style>

            @media screen and (min-width: 768px) {

                #_3_de_mayo .modal-dialog  {width:1200px;}

            }
        </style>
        <style>

            @media screen and (min-width: 768px) {

                #cosmos .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #cruz_del_sur .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #jaime_paz_zamora .modal-dialog  {width:1200px;}

            }
        </style>
        <style>

            @media screen and (min-width: 768px) {

                #pacajes_caluyo .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #paraiso_1 .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #primavera .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #romero_pampa .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #san_luis_pampa .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #san_luis_taza .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #san_pablo .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #villa_adela_yunguyo .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #villa_alemania .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #villa_kiswaras .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #villa_doleres_f .modal-dialog  {width:1200px;}

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


                        <area  shape="poly" id="_34" class="punto"
                               title=" 3 - PZ - 013"  href="#_34" 
                               coords="891,207, 891,225, 915,225, 915,207">
                        <area data-toggle="modal" data-id="2" shape="poly"
                              title="3 - PZ ' 013" class="open-ModalD1" href="#_35"
                              coords="952,190, 952,168, 974,170, 975,192">
                        <area data-toggle="modal" data-id="3"  shape="poly"
                              title=" 3 de mayo" class="open-ModalD1" href="#_3_de_mayo"
                              coords="875,1178, 856,1177, 856,1144, 878,1144, 878,1152, 898,1153, 899,1185, 875,1185">

                        <area data-toggle="modal" data-id="4"  shape="poly"
                              title="Cosmos" class="open-ModalD1" href="#cosmos"
                              coords="278,927, 260,927, 261,895, 282,895, 282,903, 302,903, 302,934, 279,934">

                        <area data-toggle="modal" data-id="5"  shape="poly"
                              title="Cruz del sur" class="open-ModalD1" href="#cruz_del_sur"
                              coords="666,1195, 648,1195, 648,1160, 670,1160, 670,1169, 689,1169, 689,1200, 666,1200">

                        <area data-toggle="modal" data-id="6"  shape="poly"
                              title="Jaime paz zamora" class="open-ModalD1" href="#jaime_paz_zamora"
                              coords="784,767, 766,766, 766,733, 788,733, 788,741, 808,741, 808,774, 784,774
                              ">

                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Pacajes caluyo" class="open-ModalD1" href="#pacajes_caluyo"
                              coords="1480,681, 1463,681, 1463,651, 1485,650, 1485,657, 1506,657, 1506,688, 1483,688">


                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Paraiso 1" class="open-ModalD1" href="#paraiso_1"
                              coords="818,474, 799,474, 799,441, 823,441, 823,448, 842,448, 842,480, 820,480">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Primavera" class="open-ModalD1" href="#primavera"
                              coords="1384,830, 1369,830, 1369,797, 1391,797, 1391,804, 1408,804, 1408,836, 1386,837">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Romero pampa" class="open-ModalD1" href="#romero_pampa"
                              coords="1040,1048, 1021,1047, 1021,1016, 1045,1016, 1046,1023, 1063,1023, 1066,1055, 1040,1056">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="San luis pampa" class="open-ModalD1" href="#san_luis_pampa"
                              coords="1115,879, 1097,878, 1097,845, 1119,845, 1119,853, 1139,853, 1139,885, 1116,885">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="San luis taza" class="open-ModalD1" href="#san_luis_taza"
                              coords="1308,545, 1288,545, 1288,512, 1311,513, 1311,520, 1330,520, 1330,553, 1308,553">

                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="San pablo" class="open-ModalD1" href="#san_pablo"
                              coords="1483,500, 1465,501, 1465,469, 1485,469, 1485,477, 1505,477, 1505,510, 1483,510">

                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Villa adela yunguyo" class="open-ModalD1" href="#villa_adela_yunguyo"
                              coords="767,124, 748,123, 748,91, 770,91, 770,98, 788,98, 788,129, 767,130, ">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Villa alemania" class="open-ModalD1" href="#villa_alemania"
                              coords="1156,273, 1137,273, 1137,240, 1161,240, 1161,248, 1179,248, 1179,280, 1179,275">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Villa doleres f" class="open-ModalD1" href="#villa_doleres_f"
                              coords="1599,472, 1582,473, 1582,440, 1604,440, 1604,448, 1623,448, 1623,480, 1602,477">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Villa kiswaras" class="open-ModalD1" href="#villa_kiswaras"
                              coords="281,1002, 261,1002, 261,968, 286,968, 286,977, 305,977, 305,1009, 282,1009">




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
                                    <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button class="btn btn-primary">Aceptar</button>
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