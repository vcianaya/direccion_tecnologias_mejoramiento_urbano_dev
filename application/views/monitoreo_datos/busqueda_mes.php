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

                <li class="h4"> <a href="<?php echo base_url() ?>editor"><i class="fa fa-arrow-left"></i> Volver </a> / Monitoreo / Seleccione el mes y año para su busqueda </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">

                <!-- left column -->
                <div class="col-md-1"></div>

                <div class="col-md-4">

                    <?php echo form_open('monitoreo_datos/reporte_por_mes'); ?>

                    <div class="modal-header">


                        <h1>BUSQUEDA POR MES Y AÑO: </h1>
                    </div>
                    <div class="modal-body">


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Mes:</label>
                            <select name="mes" id="mes" class="form-control" required="true">
                                <option value="">Seleccione el mes</option>

                                <?php foreach ($mes as $p) { ?>
                                    <option value="<?= $p->id ?>"><?= $p->nombre ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Gestion:</label>
                            <select name="gestion" id="gestion" class="form-control" required="true">
                                <option value="">Seleccione la Gestion</option>
                                <?php foreach ($gestion as $p) { ?>
                                    <option value="<?= $p->nombre_gestion ?>"><?= $p->nombre_gestion ?></option>
                                <?php } ?>	
                            </select>
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" id="submit" value="Buscar" class="btn btn-primary">                            

                    </div>

                    <?php echo form_close(); ?>
                </div>

            </div>



            <div  id="myModalDistrito" class="modal fade"  role="dialog">
                <div class="modal-dialog">
                    <?php echo form_open('monitoreo/reporte_monitoreo'); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">×</button>

                            <h4>Llene los siguientes datos : </h4>
                        </div>
                        <div class="modal-body">


                            <input type="hidden" name="DNI" id="DNI" value=""/>
                            <div class="form-group supfrm">
                                <label for="curpwd">  Fecha de Incio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required="required"/>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">  Fecha de Fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required="required"/>
                            </div>
                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Tipo Operativo:</label>
                                <select name="id_tipo_caso" id="id_tipo_caso" class="form-control" required="true">
                                    <option value="">Seleccione un tipo de Operativo</option>
                                    <?php foreach ($tipo_operativo as $p) { ?>
                                        <option value="<?= $p->id ?>"><?= $p->nombre_monitoreo ?></option>
                                    <?php } ?>	
                                </select>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" id="submit" value="Buscar" class="btn btn-primary">                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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