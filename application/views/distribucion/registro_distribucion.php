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


        <!-- Mobile Specific Metas
      ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
      ================================================== -->

        <script type="text/javascript">
            function confirma() {
                if (confirm("¿Realmente desea eliminarlo?")) {
                    alert("El registro ha sido eliminado.")
                }
                else {
                    return false
                }
            }
        </script>
        <script type="text/javascript">
            function confirma_aprobar() {
                if (confirm("¿Realmente desea Aprobarlo?")) {
                    alert("El registro ha sido aprobado.")
                }
                else {
                    return false
                }
            }
        </script>
        <script type="text/javascript">
            function confirma_editar() {
                if (confirm("¿Realmente desea Editar?")) {
                    alert("El registro le llevara al Formulario de Edicion.")
                }
                else {
                    return false
                }
            }
        </script>
        <script type="text/javascript">
            function confirma_eliminar() {
                if (confirm("¿Realmente desea eliminarlo?")) {
                    alert("El registro ha sido eliminado.")
                }
                else {
                    return false
                }
            }
        </script>
        <style type="text/css">
            <!--


            .nufon {
                -webkit-box-shadow: 10px 10px 99px 17px rgba(0,0,0,0.41);
                -moz-box-shadow: 10px 10px 99px 17px rgba(0,0,0,0.41);
                box-shadow: 10px 10px 99px 17px rgba(0,0,0,0.41);
                margin:8px;
                border:1px solid #000;
                padding:8px;
                border-radius:4px; 
            }
            -->
        </style>

        <script>
            $(document).on("click", ".open-ModalD1", function () {
                var myDNI = $(this).data('id');
                $(".modal-body #DNI").val(myDNI);
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


        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $("input[name=postal]").attr("value");
                //al cambiar el select provincias
                $("#provincias").on("change", function ()
                {
                    //obtenemos la id de la provincia seleccionada
                    var provinciaSelected = $("#provincias option:selected").attr("value");
                    //hacemos la petición via get contra home/getAjaxPoblacion pasando la provincia
                    $.get("<?php echo base_url('mapa/getAjaxPoblacion') ?>", {"provincia": provinciaSelected}, function (data)
                    {
                        //parseamos el json y recorremos

                        var poblaciones = "";
                        var poblacion = JSON.parse(data);
                        for (datos in poblacion.poblaciones)
                        {
                            poblaciones += '<option value="' + poblacion.poblaciones[datos].id + '">' +
                                    poblacion.poblaciones[datos].nombre_zona + '</option>';
                        }
                        //populamos el desplegable poblaciones con las poblaciones obtenidas
                        $('select#poblaciones').html(poblaciones);
                        $('input[name=postal]').val(poblacion.postal);
                    });
                });


            });
        </script>

        <script type="text/javascript">
            $(document).ready(function ()
            {
                $("input[name=postal]").attr("value");
                //al cambiar el select provincias
                $("#provincias2").on("change", function ()
                {
                    //obtenemos la id de la provincia seleccionada
                    var provinciaSelected = $("#provincias2 option:selected").attr("value");
                    //hacemos la petición via get contra home/getAjaxPoblacion pasando la provincia
                    $.get("<?php echo base_url('mapa/getAjaxPoblacion_2') ?>", {"provincia": provinciaSelected}, function (data)
                    {
                        //parseamos el json y recorremos

                        var poblaciones2 = "";
                        var poblacion2 = JSON.parse(data);
                        for (datos in poblacion2.poblaciones2)
                        {
                            poblaciones2 += '<option value="' + poblacion2.poblaciones2[datos].id + '">' +
                                    poblacion2.poblaciones2[datos].nombre_tipologia_secundaria + '</option>';
                        }
                        //populamos el desplegable poblaciones con las poblaciones obtenidas
                        $('select#poblaciones2').html(poblaciones2);
                        $('input[name=postal]').val(poblacion2.postal);
                    });
                });


            });
        </script>
        <script>
            //script of form  from google
            /*      (function () {
             var divs = document.getElementById('ss-form').
             getElementsByTagName('div');
             var numDivs = divs.length;
             for (var j = 0; j < numDivs; j++) {
             if (divs[j].className == 'errorbox-bad') {
             divs[j].lastChild.firstChild.lastChild.focus();
             return;
             }
             }
             
             for (var i = 0; i < numDivs; i++) {
             var div = divs[i];
             if (div.className == 'ss-form-entry' &&
             div.firstChild && div.firstChild.className == 'ss-q-title') {
             div.lastChild.focus();
             return;
             }
             }
             })();*/

        </script>




        <!--Scripts-->	




        <script>
            var submitted = false;
        </script>

        <script src='http://api.tiles.mapbox.com/mapbox.js/v0.6.6/mapbox.js'></script>
        <script src='http://code.jquery.com/jquery-1.8.2.js'></script>
        <script src='http://code.jquery.com/ui/1.9.0/jquery-ui.js'></script>
        <script src='<?php echo base_url() ?>assets/ext/jquery.ptTimeSelect.js'></script>
        <script src='<?php echo base_url() ?>assets/ext/jquery.validate.js'></script>
        <script src='<?php echo base_url() ?>assets/ext/leaflet.js'></script>
        <script src='<?php echo base_url() ?>assets/ext/form.js'></script>
        <script src='<?php echo base_url() ?>assets/ext/site.js'></script>

        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function updateDatabase(newLat, newLng)
            {
                // make an ajax request to a PHP file
                // on our site that will update the database
                // pass in our lat/lng as parameters
                $.post(
                        "/my_controller/update_coords",
                        {'newLat': newLat, 'newLng': newLng, 'var1': 'value1'}
                )
                        .done(function (data) {
                            alert("Database updated");
                        });
            }
        </script>

        <script type="text/javascript">
            function showCoords(newLat, newLng)
            {
                $('.long').html(newLat);
                $('.lati').html(newLng);
                $('input[name=pos_y]').val(newLat).attr('readonly', 'readonly');
                $('input[name=pos_x]').val(newLng).attr('readonly', 'readonly');
            }
        </script>


        <?php echo $map['js']; ?>
    </head>
    <body>
        <!--------------Header--------------->
        <?php
        $correcto = $this->session->flashdata('correcto');
        if ($correcto) {
            ?>
            <div class="alert alert-success">
                <?= $correcto ?>
            </div>


            <?php
        }
        ?>
        <section class="content-header">

            <ol class="breadcrumb">
                <table border="0">
                    <tr>
                        <td>  <li class="h4"> <a href="<?php echo base_url2() ?>editor/lista_modulos" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / <strong style="color: #E13300">(REGISTRAR)</strong>  FORMULARIO SOPORTE TECNICO</li></td>
                    <td> <?php echo form_open('felcc/excel_felcc'); ?>




                        <?php echo form_close(); ?></td>

                    <td>&nbsp;</td>
                    <td></td>
                    </tr>
                </table>



            </ol>
        </section>

        <font  color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline">
        <?php echo validation_errors(); ?></font>

        <!--------------Content--------------->
     


        <!--------------Footer--------------->
        <section>

            <?php foreach ($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
            <?php foreach ($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>
            <style type='text/css'>
                body
                {
                    font-family: Arial;
                    font-size: 14px;
                }
                a {
                    color: blue;
                    text-decoration: none;
                    font-size: 14px;
                }
                a:hover
                {
                    text-decoration: underline;
                }
            </style>
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <?php echo $output; ?>
                  <?php echo $map['html'];  ?>
            </div>
            <div class="col-md-1">

            </div>
           
       

        </section>

    </body></html>










