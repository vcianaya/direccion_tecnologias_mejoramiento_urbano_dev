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

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">

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

                <li class="h4"> <a href="<?php echo base_url() ?>editor/listas_equipamiento_reporte"><i class="fa fa-arrow-left"></i> Volver </a> / Módulos  Policiales / Seleccione un distrito para su busqueda </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h1> BÚSQUEDA POR DISTRITOS </h1> <?php echo form_open('modulos_policiales/ver_informe_modulos_policiales'); ?>
                        <input type="submit" name="submit" id="submit" value="Generar Informe" class="btn btn-primary xxlarge">

                        <?php echo form_close(); ?>
                    <img class="map" src="<?= base_url() ?>/assets/logos/general_modulos_policiales.png" usemap="#usa" >
                    <map name="usa">


                        <area data-toggle="modal" data-id="1" shape="poly"
                              title="Distrito 1" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_1_modulos_policiales"
                              coords="708,755, 684,747, 778,453, 753,447, 795,404, 803,383, 
                              814,397, 844,421, 847,418, 868,453, 880,489,880,500, 890,509, 897,517, 921,568, 
                              890,604, 914,622, 912,639, 909,645, 885,658, 852,658, 815,661, 780,704,
                              748,694, 746,681, 727,693, 723,749">
                        <area data-toggle="modal" data-id="2" shape="poly"
                              title="Distrito 2" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_2_modulos_policiales"
                              coords="645,878, 642,857, 604,828, 593,845, 593,849,591,878, 551,870, 554,867, 537,847, 
                              588,796, 481,748, 723,480, 769,479, 683,746, 709,757, 679,801, 680,836, 660,854">
                        <area data-toggle="modal" data-id="3"  shape="poly"
                              title="Distrito 3" class="open-ModalD1" href="<?php echo base_url() ?>alumbrado/distritos_3_alumbrado"
                              coords="482,748, 302,669, 288,571, 311,555, 350,541, 364,518, 387,505,
                              438,456, 455,458, 463,463, 464,470, 607,476, 585,500, 600,517, 628,488,
                              661,489, 663,478, 723,480">
                        <area data-toggle="modal" data-id="4"  shape="poly"
                              title="Distrito 4" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_4_modulos_policiales"
                              coords="300,669, 200,566, 175,569, 137,516, 202,453, 225,446, 231,421, 
                              293,379, 313,346, 349,319, 359,267, 538,304, 629,342, 626,359, 579,389,
                              557,385, 503,439, 465,440, 435,461, 387,504, 387,508, 364,520, 342,545, 
                              313,557, 287,571">
                        <area data-toggle="modal" data-id="5"  shape="poly"
                              title="Distrito 5" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_5_modulos_policiales"
                              coords="589,326, 534,303, 358,266, 372,220, 406,180, 421,190, 440,159, 
                              594,111, 740,3, 836,3, 822,63, 816,69, 805,72, 798,68, 603,273, ">
                        <area data-toggle="modal" data-id="6"  shape="poly"
                              title="Distrito 6" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_6_modulos_policiales"
                              coords=" 771,481, 663,477, 662,490, 630,488, 601,519, 582,502, 606,476,
                              464,471, 464,464, 455,459, 372,457, 383,444, 444,448, 458,433, 460,438,
                              502,439, 556,385, 579,389, 585,386, 626,358, 630,341, 589,327, 605,273, 793,72, 
                              827,45, 817,68, 806,72, 765,158, 779,217, 793,227, 795,242, 788,246, 
                              770,232, 771,242, 745,299, 770,334, 790,347, 797,364, 801,381, 798,400,
                              786,412, 754,448, 780,452
                              ">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Distrito 7" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_7_modulos_policiales"
                              coords="247,2, 344,76, 299,106, 271,136, 261,158, 230,181, 256,200, 253,239, 
                              219,233, 246,253, 232,300, 200,354, 40,316, 29,334, 2,313, 1,3">
                        <area data-toggle="modal" data-id="8"  shape="poly"
                              title="Distrito 8" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_8_modulos_policiales"
                              coords="812,1244, 791,1197, 911,1150, 855,1101, 825,1050, 766,1023, 751,971,
                              726,956, 713,935, 686,925, 670,901, 648,881, 643,881, 643,858, 604,829, 592,849,
                              559,880, 551,870, 555,866, 538,847, 589,798, 483,751, 388,856, 504,880,
                              327,1081, 339,1095, 372,1066, 385,1080, 421,1048, 544,1243">
                        <area data-toggle="modal" data-id="9"  shape="poly"
                              title="Distrito 9" class="open-ModalD1" href="#myModalDistrito"
                              coords="3,372, 29,335, 2,315">

                        <area data-toggle="modal" data-id="10"  shape="poly"
                              title="Distrito 10" class="open-ModalD1" href="#myModalDistrito"
                              coords="494,1246, 279,1132, 327,1082, 339,1094, 372,1064, 386,1080, 421,1048,
                              543,1242, 813,1244,789,1198, 916,1152, 940,1169,939,1246">

                        <area data-toggle="modal" data-id="11"  shape="poly"
                              title="Distrito 11" class="open-ModalD1" href="#myModalDistrito"
                              coords="7,639, 2,635, 2,372, 41,317, 99,335, 104,412, 63,423, 136,517">

                        <area data-toggle="modal" data-id="12"  shape="poly"
                              title="Distrito 12" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_12_modulos_policiales"
                              coords=" 376,869, 149,788, 202,779, 243,722, 302,669, 482,750 ">

                        <area data-toggle="modal" data-id="13"  shape="poly"
                              title="Distrito 13" class="open-ModalD1" href="#myModalDistrito"
                              coords="739,2, 656,69, 578,117, 571,96, 563,113, 553,100, 562,78, 544,67, 
                              547,53, 535,47, 534,55, 512,51, 505,40, 499,54, 493,50, 494,43, 488,43, 
                              484,53, 458,45,457,114, 358,65, 343,73, 248,3">
                        <area data-toggle="modal" data-id="14"  shape="poly"
                              title="Distrito 14" class="open-ModalD1" href="<?php echo base_url() ?>modulos_policiales/distritos_14_modulos_policiales"
                              coords=" 137,514, 64,424, 104,410, 96,332, 200,356, 232,309, 233,298, 248,252, 
                              219,236, 253,240, 255,200, 231,182, 259,158, 303,102, 356,65,  459,114, 
                              460,47, 484,53, 487,43, 494,43, 493,49, 500,55, 503,39, 512,51, 534,54, 535,49,
                              547,54, 544,67, 558,75, 559,84, 553,100, 564,113, 572,95, 580,117, 441,158, 
                              421,189, 406,180, 371,220, 349,320, 304,356, 298,372, 291,383, 230,423, 225,450, 
                              200,455, 167,483">



                    </map>
                    <!--------------Header--------------->


                    <!--------------Content--------------->

                </div>
               
            </div>



            <div  id="myModalDistrito" class="modal fade"  role="dialog">
                <div class="modal-dialog">
                    <?php echo form_open('monitoreo/reporte_monitoreo'); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">×</button>

                            <h4>No Existe Modulos Policiales: </h4>
                        </div>
                       
                        <div class="modal-footer">
                                  
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>





        </section>
        <!--------------Footer--------------->
        <footer>

        </footer>
    </body></html>