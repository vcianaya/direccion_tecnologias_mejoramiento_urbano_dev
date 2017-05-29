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


        <?php // echo $map['js']; ?>
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
        <?php
        $id = $this->uri->segment(3);
        $total22 = $this->cim_model->ver_informe($id);
        ?>
        <?php foreach ($total22 as $filas) :
            ?> 
        <?php endforeach; ?> 
    
        <div id="muestra">
            <section class="content-header">

                <ol class="breadcrumb">
                    <table width="1000" border="1">
                        <tr>
                            <td width="257" align="center"><h2>GOBIERNO AUTONOMO MUNICIPAL DE EL ALTO </h2>
                          <h2>SECRETARIA MUNICIPAL DE SEGURIDAD CIUDADANA</h2> <img type="image" src=" <?= base_url()?>/assets/logos/alcaldia.png" height="85px" title="GAMEA" ></td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td width="257" align="center"><h4> FORMULARIO DE REGISTRO DE ACTIVIDADES ECONÓMICAS DE DISTRIBUCIÓN   Y O COMERCIALIZACIÓN DE BEBIDAS EN LA CIUDAD DE EL ALTO</h4></td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td width="127" align="left"><strong>FECHA DE REGISTRO: </strong></td>
                            <td colspan="3" align="left"><?php echo $filas->fecha_registro; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>FICHA NRO:</strong></td>
                          <td colspan="3" align="left"><?php echo $filas->ficha_nro; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>NOMBRE Y APELLIDO:</strong></td>
                          <td width="128" align="left"><?php echo $filas->nombre_apellido; ?></td>
                          <td width="128" align="left"><strong>C.I. :</strong></td>
                          <td width="128" align="left"><?php echo $filas->ci; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>NUMERO DE CELULAR:</strong></td>
                          <td align="left"><?php echo $filas->nro_celular; ?></td>
                          <td align="left"><strong>EMAIL:</strong></td>
                          <td align="left"><?php echo $filas->email; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>NRO DE LICENCIA DE FUNCIONAMIENTO:</strong></td>
                          <td align="left"><?php echo $filas->nro_licencia_funcionamiento; ?></td>
                          <td align="left"><strong>NRO PMC:</strong></td>
                          <td align="left"><?php echo $filas->nro_pmc; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>PATENTE:</strong></td>
                          <td colspan="3" align="left"><?php echo $filas->patente; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>FECHA DE AUTORIZACION</strong></td>
                          <td align="left"><?php echo $filas->fecha_autorizacion; ?></td>
                          <td align="left"><strong>VIGENCIA:</strong></td>
                          <td align="left"><?php echo $filas->fecha_autorizacion; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>NOMBRE DE LA ACTIVIDAD ECONOMICA:</strong></td>
                          <td colspan="3" align="left"><?php echo $filas->nombre_actividad_economica; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>DIRECCION:</strong></td>
                          <td align="left"><?php echo $filas->direccion; ?></td>
                          <td align="left"><strong>DISTRITO:</strong></td>
                          <td align="left"><?php echo $filas->distrito; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>ZONA:</strong></td>
                          <td colspan="3" align="left"><?php echo $filas->nombre; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>GEOREFERENCIACION :</strong></td>
                          <td align="left"><?php echo $filas->pos_x; ?></td>
                          <td colspan="2" align="left"><?php echo $filas->pos_y; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>TIPO DE BIEN INMUEBLE:</strong></td>
                          <td colspan="3" align="left"><?php echo $filas->nombre_tipo_bien_inmueble; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>PRODUCTOS QUE DISTRIBUYE Y O COMERCIALIZACION:</strong></td>
                          <td colspan="3" align="left"><?php echo $filas->producto_distribuye_comercializacion; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>FORMA O PROCEDIMIENTO DE DISTRIBUCION:</strong></td>
                          <td colspan="3" align="left"><?php echo $filas->nombre_forma_procedimiento_distribucion; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong># DE VEHICULOS:</strong></td>
                          <td align="left"><?php echo $filas->numero_vehiculos; ?></td>
                          <td align="left"><strong>MARCA:</strong></td>
                          <td align="left"><?php echo $filas->marca; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>MODELO :</strong></td>
                          <td align="left"><?php echo $filas->modelo; ?></td>
                          <td align="left"><strong>COLOR</strong>:</td>
                          <td align="left"><?php echo $filas->color; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>SECTOR DE DISTRIBUCION:</strong></td>
                          <td align="left"><?php echo $filas->sector_distribucion; ?></td>
                          <td align="left"><strong>PLACA DE CONTROL: </strong></td>
                          <td align="left"><?php echo $filas->placa_control; ?></td>
                        </tr>
                        <tr>
                          <td align="left"><strong>DISTINTIVO: (SI/NO)</strong></td>
                          <td align="left"><?php echo $filas->distintivo; ?></td>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left"><strong>DESCRIPCION DISTINTIVO</strong></td>
                          <td align="left"><?php echo $filas->descripcion_distintivo; ?></td>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left"><strong>OBSERVACIONES :</strong></td>
                          <td align="left"><?php echo $filas->observaciones; ?></td>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                      <tr>
                        <td width="257" align="center"><h4> ENTREGA Y RECEPCION DE LA GEOREFERENCIACION DE UNIDADES EDUCATIVAS Y NORMATIVA DE RESPALDO (IMPRESO)</h4></td>
                      </tr>
                    </table>
                    <p>&nbsp;</p>
                </ol>
            </section>
        </div>
        <!--------------Content--------------->
        <script type="text/javascript">
            function imprSelec(muestra)
            {
                var ficha = document.getElementById(muestra);
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write(ficha.innerHTML);
                ventimp.document.close();
                ventimp.print();
                ventimp.close();
            }
        </script>

        <section class="content "><!-- /.row -->



        </section>

        <!--------------Footer--------------->


    </body></html>










