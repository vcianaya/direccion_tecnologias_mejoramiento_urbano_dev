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
            .centrear {
                text-align: center;
                font-weight: 700;

            }
            .negrita{
                font-weight: 700;
            }
            .fondo{
                background: #E0E2FF;
                border: 1;
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
                                    poblacion.poblaciones[datos].nombre + '</option>';
                        }
                        //populamos el desplegable poblaciones con las poblaciones obtenidas
                        $('select#poblaciones').html(poblaciones);
                        $('input[name=postal]').val(poblacion.postal);
                    });
                });


                $("#provincias2").on("change", function ()
                {
                    //obtenemos la id de la provincia seleccionada
                    var provinciaSelected2 = $("#provincias2 option:selected").attr("value");
                    //hacemos la petición via get contra home/getAjaxPoblacion pasando la provincia
                    $.get("<?php echo base_url('mapa/getAjaxPoblacion2_camara') ?>", {"provincia2": provinciaSelected2}, function (data)
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
                $("#poblaciones").on("change", function ()
                {
                    //obtenemos la id de la población seleccionada
                    var poblacionSelected = $("#poblaciones option:selected").attr("value"), provincias = "";
                    //hacemos la petición via get contra home/getAjaxPostal pasando la población
                    $.get("<?php echo base_url('mapa/getAjaxPostal') ?>", {"poblacion": poblacionSelected}, function (data)
                    {
                        //parseamos la respuesta
                        var data = JSON.parse(data);
                        //pintamos el resultado en el campo de texto
                        $('input[name=postal]').val(data.postal);

                        //como tenemos formateado el array no sirve el for in
                        //pero si el each, que accede a la clave y al valor
                        $.each(data.provincias, function (k, v)
                        {
                            provincias += '<option value="' + k + '">' + v + '</option>';
                        })
                        //populamos el desplegable provincias2 de nuevo con todas las provincias
                        $('select#provincias2').html(provincias);
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

        <link rel='stylesheet' href='<?php echo base_url() ?>assets/ext/site.css' />
        <link href='http://api.tiles.mapbox.com/mapbox.js/v0.6.6/mapbox.css' rel='stylesheet' />
        <link rel='stylesheet' href='http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css' />
        <link rel='stylesheet' href='<?php echo base_url() ?>assets/ext/jquery.ptTimeSelect.css' />
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


        <?php //echo $map['js']; ?>
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
                        <td>  <li class="h4"> <a href="<?php echo base_url() ?>notas" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / <strong style="color: #E13300">(REGISTRAR)</strong>  GENERACION DE CITES</li></td>
                    <td> <?php echo form_open('felcv/excel_felcv'); ?>




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
        <?php echo form_open('notas/guardar_notas'); ?>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-3">

                    <div class="box-body">
                        <?php
                        foreach ($notas_consulta as $n):

                        endforeach;
                        ?>
                        <?php
                        foreach ($jefaturas_consulta as $j):

                        endforeach;
                        ?>
                        <?php
                        $notas = $this->input->post('notas');
                        $jefaturas = $this->input->post('jefaturas');
                        $rs = mysql_query("SELECT MAX(numero) FROM cite where notas=" . $notas);
                        if ($row = mysql_fetch_row($rs)) {
                            $id = trim($row[0]);
                        }
                        $total = $id + 1;
                        ?>
                        <div class="form-group supfrm">
                            <input type="hidden" id="numero" class="form-control" name="numero" value="<?php echo $total ?>" >
                            <input type="hidden" id="notas" class="form-control" name="notas" value="<?php echo $notas ?>" >
                            <input type="hidden" id="jefaturas" class="form-control" name="jefaturas" value="<?php echo $jefaturas ?>" >
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Cite: </label>
                            <input type="text" id="cite" class="form-control" name="cite" 
                                   placeholder="cite" 
                                   value="<?php echo 'SMSC/DTMU/' . $j->abreviacion_jefaturas . '/' . $n->abreviacion . '/0' . $total . '/2017' ?>"  readonly="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Donde se Envia: </label>
                            <input type="text" id="donde_se_envia" class="form-control" name="donde_se_envia"   placeholder="Donde se envia"  >
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">De quien recibe: </label>
                            <input type="text" id="de_quien_recibe" class="form-control" name="de_quien_recibe"   placeholder="De quien recibe"  >
                        </div>

                    </div>

                </div>
                <div class="col-md-2">
                    <div class="form-group supfrm">
                        <label for="curpwd">Referencia: </label>
                        <input type="text" id="referencia" class="form-control" name="referencia"   placeholder="Referencia"  >
                    </div>



                    <div class="form-group supfrm">
                        <label for="curpwd">Fecha: <span class='ss-required-asterisk'>*</span></label>
                        <input type="date" id="fecha" class="form-control" name="fecha" placeholder="Fecha " required="true">
                    </div>


                    <br/>
                    <button type="submit" class="btn btn-primary">Guardar Datos </button>

                </div>








                <!-- /.box-body -->
                <div class="box-footer">






                </div>


            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <div class="col-md-3">


            <!--   <div id='map'></div>
              <div class='left'>
                  <a id='geojsonLayer' href='#'></a>
              </div>
          </div>-->
            <?php //echo $map['html'];
            ?>

        </div>


    </div>   <!-- /.row -->
    <br/>


</section>
<?php echo form_close(); ?>



<!--------------Footer--------------->


</body></html>










