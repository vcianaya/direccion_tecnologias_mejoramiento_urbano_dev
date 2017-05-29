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

        <style type="text/css">


        </style>

    </head>

    <body>


        <section class="content-header">

            <ol class="breadcrumb">

                <li class="h4"> <a  href="<?php echo base_url() ?>modulos_policiales/distritos_3_modulos_policiales"><i class="fa fa-arrow-left"></i> Volver </a> / Distrito 3 / Radio de Accion </li>

            </ol>
        </section>
        <style>

            @media screen and (min-width: 700px) {

                #m12octubre .modal-dialog  {width:1200px;}

            }
        </style>
        <style>

            @media screen and (min-width: 768px) {

                #villaBolivar .modal-dialog  {width:1200px;}

            }
        </style>
        <style>

            @media screen and (min-width: 768px) {

                #tejada_rectangular .modal-dialog  {width:1200px;}

            }
        </style>
        <style>

            @media screen and (min-width: 768px) {

                #plan_45 .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #villa_exaltacion .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #tejada_alpacoma .modal-dialog  {width:1200px;}

            }
        </style>

        <style>

            @media screen and (min-width: 768px) {

                #plan_405B .modal-dialog  {width:1200px;}

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

                    <img class="map" src="<?= base_url() ?>assets/logos/distrito_mpr3.png" usemap="#usa"  >

                    <map name="usa">


                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Plan 50 B" class="open-ModalD1" href="#plan_45"
                              coords="">




                    </map>
                    <!--------------Header--------------->


                    <!--------------Content--------------->

                </div>

            </div>


            <script src="<?php echo base_url() ?>assets/js/zoomerang.js"></script>
            <script>
            Array.prototype.forEach.call(document.querySelectorAll('p'), function (p, i) {
                p.style.marginLeft = i * 6 + '%'
            })
            Zoomerang
                    .config({
                        maxHeight: 900,
                        maxWidth: 900,
                        bgColor: '#000',
                        bgOpacity: .15,
                        ///    onOpen: openCallback,
                        // onClose: closeCallback,
                        ///  onBeforeOpen: beforeOpenCallback,
                        ///   onBeforeClose: beforeCloseCallback
                    })
                    .listen('.zoom')

            function openCallback(el) {
                console.log('zoomed in on: ')
                console.log(el)
            }

            function closeCallback(el) {
                console.log('zoomed out on: ')
                console.log(el)
            }

            function beforeOpenCallback(el) {
                console.log('on before zoomed in on:')
                console.log(el)
            }

            function beforeCloseCallback(el) {
                console.log('on before zoomed out on:')
                console.log(el)
            }

            </script>


        </section>
        <!--------------Footer--------------->
        <footer>

        </footer>
    </body></html>