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

                <li class="h4"> <a href="<?php echo base_url() ?>editor/lista_modulos_reportes"><i class="fa fa-arrow-left"></i> Volver </a> / Monitoreo / Seleccione un distrito para su busqueda </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <h1> BUSQUEDA POR DISITRITOS </h1>
                    <img class="map" src="<?= base_url() ?>/assets/logos/distrito_1.png" usemap="#usa" >
                    <map name="usa">


                        <area data-toggle="modal" data-id="1" shape="poly"
                              title="Distrito 1" class="open-ModalD1" href="#myModalDistrito"
                              coords="349,201,321,288,327,291,331,290,335,271,339,267,351,276,363,260,389,258,394,252,
                              394,247,387,241,396,232,397,228,381,195,374,181,359,168,
                              358,174,343,190,352,191,349,201,
                              ">
                        <area data-toggle="modal" data-id="2" shape="poly"
                              title="Distrito 2" class="open-ModalD1" href="#myModalDistrito"
                              coords="309,329,306,324,294,314,290,323,287,323,280,330,273,320,289,304,254,289,
                              334,201,
                              349,201,321,288,327,291,
                              318,303,320,315,309,329">
                        <area data-toggle="modal" data-id="3"  shape="poly"
                              title="Distrito 3" class="open-ModalD1" href="#myModalDistrito"
                              coords="254,289,
                              334,201,312,201,312,203,301,203,292,214,288,208,295,200,249,198,246,194,242,192,
                              234,199,228,204,220,212,215,212,210,221,195,227,192,230,194,262,
                              254,289">
                        <area data-toggle="modal" data-id="4"  shape="poly"
                              title="Distrito 4" class="open-ModalD1" href="#myModalDistrito"
                              coords="194,262,192,230,195,227,210,221,215,212,220,212,228,204,234,199,242,192,
                              246,191,248,189,249,187,262,188,278,171,287,171,302,160,302,155,289,151,
                              289,151,
                              252,140,214,132,
                              211,148,200,157,190,170,171,183,170,191,163,193,
                              142,213,
                              154,230,162,228,194,262">
                        <area data-toggle="modal" data-id="5"  shape="poly"
                              title="Distrito 5" class="open-ModalD1" href="#myModalDistrito"
                              coords="
                              289,151, 294,133, 300,129, 368,58,
                              371,47, 371,36, 348,34, 322,60, 302,76, 288,82,
                              288,82, 241,97, 235,107,229,103,218,116,214,131,
                              289,151,
                              ">
                        <area data-toggle="modal" data-id="6"  shape="poly"
                              title="Distrito 6" class="open-ModalD1" href="#myModalDistrito"
                              coords="   242,192, 248,189, 249,187, 262,187, 278,170, 287,170, 302,160, 302,155, 289,151,
                              294,133, 300,129, 368,58,
                              358,70, 348,95, 348,108, 356,120, 356,124, 352,126, 349,123, 344,130, 339,143, 347,154, 351,154,
                              358,174,343,190,352,191,349,201,
                              334,201,
                              312,201,312,203,301,203,292,214,288,208,295,200,249,198,246,194,242,192,
                              ">
                        <area data-toggle="modal" data-id="7"  shape="poly"
                              title="Distrito 7" class="open-ModalD1" href="#myModalDistrito"
                              coords=" 68,88,82,97,76,106,84,111,84,122,76,134,87,142,91,140,107,152,111,146,132,154,
                              163,161,173,145,178,127,169,121,180,122,181,110,172,103,181,97,190,83,
                              209,68,138,9,128,4,95,49,68,88">
                        <area data-toggle="modal" data-id="8"  shape="poly"
                              title="Distrito 8" class="open-ModalD1" href="#myModalDistrito"
                              coords=" 203,397,208,402,218,392,223,396,234,386,280,459,305,481,314,490,319,491,329,497,331,492,336,492,345,468,371,468,367,456,360,446,357,442,354,434,395,419
                              ,364,385,359,384,346,377,343,361,336,358,331,349,323,346,
                              309,329,306,324,294,314,290,323,287,323,280,330,273,320,289,304,254,289,
                              224,323,261,330,203,397 ">
                        <area data-toggle="modal" data-id="9"  shape="poly"
                              title="Distrito 9" class="open-ModalD1" href="#myModalDistrito"
                              coords="
                              68,87, 83,96, 76,105, 84,111, 81,117, 83,124, 75,134, 85,141, 90,139, 106,152,
                              83,185, 61,188, 39,192, 11,166, 37,111, 54,89, 62,97">

                        <area data-toggle="modal" data-id="10"  shape="poly"
                              title="Distrito 10" class="open-ModalD1" href="#myModalDistrito"
                              coords="395,419,432,440,426,470,476,473,445,491,442,491,413,519,389,530,354,544,335,525,322,520,319,520,265,456,188,414,
                              203,397,208,402,218,392,223,396,234,386,280,459,305,481,314,490,319,491,329,497,331,492,336,492,345,468,371,468,367,456,360,446,357,442,354,434,395,419">

                        <area data-toggle="modal" data-id="11"  shape="poly"
                              title="Distrito 11" class="open-ModalD1" href="#myModalDistrito"
                              coords="99,254, 70,217,83,187, 110,147, 
                              130,153, 132,178, 118,182,  143,214, 
                              143,214">

                        <area data-toggle="modal" data-id="12"  shape="poly"
                              title="Distrito 12" class="open-ModalD1" href="#myModalDistrito"
                              coords=" 145,301, 163,299, 176,279, 195,262, 195,262, 253,289, 218,328 ">

                        <area data-toggle="modal" data-id="13"  shape="poly"
                              title="Distrito 13" class="open-ModalD1" href="#myModalDistrito"
                              coords="
                              138,9,209,68,213.65.225,70,242,80,246,81,248,77,245,74,247,66,247,59,256,62,260,61,262,58,265,62,272,62,273,61,275,63,279,68,281,72,278,78,281,81,284,75,288,82,
                              288,82,302,76,322,60,348,34,371,36,371,47,
                              372,13,390,1,142,1,138,9">
                        <area data-toggle="modal" data-id="14"  shape="poly"
                              title="Distrito 14" class="open-ModalD1" href="#myModalDistrito"
                              coords="
                              143,214,118,182,132,178,130,153,
                              163,161,173,145,178,127,169,121,180,122,181,110,172,103,181,97,190,83,209,68,
                              213,65,225,70,242,80,246,81,248,77,245,74,247,66,247,59,256,62,260,61,262,58,265,62,272,62,273,61,275,63,279,68,281,72,278,78,281,81,284,75,288,82,
                              241,97,235,107,229,103,218,116,214,131,
                              211,148,200,157,190,170,171,183,170,191,163,193,143,214,
                              ">



                    </map>
                    <!--------------Header--------------->


                    <!--------------Content--------------->

                </div>
                    <div class="col-md-4">
                
                        <?php echo form_open('monitoreo/reporte_monitoreo_fecha'); ?>
               
                    <div class="modal-header">
                      

                        <h1>BUSQUEDA POR FECHA Y TIPO OPERATIVO: </h1>
                    </div>
                    <div class="modal-body">


                       
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
                                  <option value="0">SELECCIONE TODOS LOS OPERATIVOS</option>
                                <?php foreach ($tipo_operativo as $p) { ?>
                                    <option value="<?= $p->id ?>"><?= $p->nombre_monitoreo ?></option>
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