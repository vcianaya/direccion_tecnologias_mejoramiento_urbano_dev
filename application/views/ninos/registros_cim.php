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
                        <td>  <li class="h4"> <a href="<?php echo base_url2() ?>editor/lista_modulos" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / <strong style="color: #E13300">(REGISTRAR)</strong>  FORMULARIO DE CENTRO INFANTIL</li></td>
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
        <?php echo form_open('centro_infantil/guardar_cim'); ?>

        <section class="content ">
            <div class="board col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-3 ">


                    <div class="nufon">
                        <h4><strong>Identificación del Centro Infantil</strong></h4>

                        <div class="form-group supfrm">
                            <label for="curpwd">Código del Centro Infantil  </label>
                            <input type="text" id="id_cim" class="form-control" name="id_cim" placeholder="Código del Centro Infantil ">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Nombre </label>
                            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre ">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Responsable </label>
                            <input type="text" id="responsable" class="form-control" name="Responsable" placeholder="responsable ">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Fecha de Inauguracion: <span class='ss-required-asterisk'>*</span></label>
                            <input type="date" id="fecha_inauguracion" class="form-control" name="fecha_inauguracion" placeholder="Fecha del Hecho " required>
                        </div>
                    </div>

                    <div class="nufon">
                        <h4><strong>Dirección del Centro Infantil</strong></h4>

                        <div class="form-group">
                            <label>Distrito</label>
                            <select name="provincias" id="provincias" class="form-control" required="true">
                                <option value="">Seleccione un distrito</option>
                                <?php foreach ($provincias as $pr) { ?>
                                    <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                <?php } ?>	
                            </select>

                            <?php //echo form_dropdown('provincias', $provincias, '', 'id="provincias" name="provincias"  class="form-control"');   ?>
                        </div>


                        <div class="form-group">
                            <label>Zona</label>

                            <?php echo form_dropdown('poblaciones', array('@' => 'Seleccione Zona'), 'Seleccione Zona', 'id="poblaciones" class="form-control" required="true"'); ?>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Calle </label>
                            <input type="text" id="calle" class="form-control" name="calle" placeholder="Calle">
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">Numero  </label>
                            <input type="number" id="numero" class="form-control" name="numero" placeholder=" Numero   ">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Telefono </label>
                            <input type="number" id="telf" class="form-control" name="telf" placeholder="Telefono">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Email </label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                        </div>



                    </div>


                    <div class="nufon">
                        <h4><strong>Identificación del Centro Infantil</strong></h4>

                        <div class="form-group supfrm">
                            <label for="curpwd">Cobertura, (Nro. de niños)</label>
                            <input type="number" id="numero_ninos" class="form-control" name="numero_ninos" placeholder="Cobertura, (Nro. de niños) ">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Aporte económico establecido para los padres de familia (Bs) </label>
                            <input type="number" id="aportes_ppff" class="form-control" name="aportes_ppff" placeholder="Aporte económico establecido para los padres de familia ">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd">Administración/convenio </label>

                            <select name="administracion" id="administracion" class="form-control" >
                                <option value="DIRECTA">DIRECTA</option>
                                <option value="ALDEA SOS">ALDEA SOS</option>
                                <option value="OBISPADO">OBISPADO</option>
                            </select>
                        </div>


                    </div>

                    <div class="nufon">
                        <h4><strong>Infraestructura</strong></h4>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >La infraestructura pertenece a: </label>
                            <select name="infraestructura_pertenece" id="infraestructura_pertenece" class="form-control" >
                                <option value="">Seleccione el infraestructura</option>
                                <?php foreach ($infraestructura_pertenece as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_infraestrutura_pertenece ?></option>
                                <?php } ?>	
                            </select>
                        </div>


                    </div>






                </div>

                <div class="col-md-2">

                    <div class="box-body">
                        <div class="nufon">
                            <h4><strong>Otros datos</strong></h4>

                            <div class="form-group supfrm">
                                <label for="curpwd">Cant. familias beneficiadas </label>
                                <input type="number" id="familias_beneficiadas" class="form-control" name="familias_beneficiadas" placeholder="Cant. familias beneficiadas ">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Cantidad de niños becados </label>
                                <input type="number" id="ninos_becados" class="form-control" name="ninos_becados" placeholder="Cantidad de niños becados">
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Cantidad educadoras</label>
                                <input type="number" id="cantidad_educadoras" class="form-control" name="cantidad_educadoras" placeholder="Cantidad educadoras ">
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Cantidad de manipuladoras </label>
                                <input type="number" id="cantidad_manipuladoras" class="form-control" name="cantidad_manipuladoras" placeholder="Cantidad de manipuladoras">
                            </div>



                        </div>
                        <div class="nufon">
                            <h4><strong>Ambientes</strong></h4>

                            <div class="form-group supfrm">
                                <label for="curpwd">Cocina </label>
                                <input type="number" id="cocina" class="form-control" name="cocina" placeholder="Cocina">
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Baño </label>
                                <input type="number" id="bano" class="form-control" name="bano" placeholder="Baño">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Patio </label>
                                <input type="number" id="patio" class="form-control" name="patio" placeholder="Patio">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Muro perimetral </label>
                                <input type="number" id="muro_perimetral" class="form-control" name="muro_perimetral" placeholder="Muro perimetral">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Almacén</label>
                                <input type="number" id="almacen" class="form-control" name="almacen" placeholder="Almacén ">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Comedor </label>
                                <input type="number" id="comedor" class="form-control" name="comedor" placeholder="Comedor ">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Sala psicomotricidad</label>
                                <input type="number" id="sala_psicomotricidad" class="form-control" name="sala_psicomotricidad" placeholder="Sala psicomotricidad">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Otro ambiente (especifique) </label>
                                <input type="number" id="otro_ambiente" class="form-control" name="otro_ambiente" placeholder="Otro ambiente (especifique) ">
                            </div>
                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >El Centro cuenta con aulas independiente: </label>
                                <select name="aulas_independientes" id="aulas_independientes" class="form-control" >
                                    <option value="">Seleccione </option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>

                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Cantidad aulas</label>
                                <input type="number" id="cantidad_aulas" class="form-control" name="cantidad_aulas" placeholder="Cantidad aulas">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Observaciones Aulas </label>
                                <input type="text" id="aulas_detalle" class="form-control" name="aulas_detalle" placeholder="Observaciones Aulas ">
                            </div>

                            <br/><br/>

                        </div>





                    </div>

                </div>

                <div class="col-md-2">

                    <div class="box-body">
                        <div class="nufon">

                            <h4><strong>Georeferenciacion</strong></h4>
                            <div class="form-group supfrm">
                                <label for="curpwd">Latitud   <span class='ss-required-asterisk'> * </span> </label>
                                <input type='text' name='pos_y' value='' class="form-control" id='pos_y' placeholder='click en el Mapa'  />
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Longitud <span class='ss-required-asterisk'>*</span> </label>
                                <input type='text' name='pos_x' value='' id='pos_x' class="form-control" placeholder='click en el Mapa' />
                            </div>


                        </div>

                        <div class="nufon">
                            <h4><strong>Servicios basicos</strong></h4>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Agua potable: </label>
                                <select name="agua" id="agua" class="form-control" >
                                    <option value="">Seleccione el infraestructura</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Observaciones Agua </label>
                                <input type="text" id="agua_detalle" class="form-control" name="agua_detalle" placeholder="Observaciones Agua ">
                            </div>
                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Energía eléctrica: </label>
                                <select name="electricidad" id="electricidad" class="form-control" >
                                    <option value="">Seleccione el infraestructura</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Observaciones Energía eléctrica </label>
                                <input type="text" id="electricidad_detalle" class="form-control" name="electricidad_detalle" placeholder="Observaciones Energía eléctrica ">
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Alcantarillado: </label>
                                <select name="alcantarillado" id="alcantarillado" class="form-control" >
                                    <option value="">Seleccione el infraestructura</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Observaciones Alcantarillado </label>
                                <input type="text" id="alcantarillado_detalle" class="form-control" name="alcantarillado_detalle" placeholder="Observaciones Alcantarillado ">
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Gas domiciliario: </label>
                                <select name="gas" id="gas" class="form-control" >
                                    <option value="">Seleccione el infraestructura</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>	
                                </select>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Observaciones Gas domiciliario </label>
                                <input type="text" id="gas_detalle" class="form-control" name="gas_detalle" placeholder="Observaciones Gas domiciliario ">
                            </div>


                        </div>


                        <div class="nufon">
                            <h4><strong>Cierre del Centro Infantil</strong></h4>

                            <div class="form-group supfrm">
                                <label for="curpwd">Fecha de cierre </label>
                                <input type="date" id="fecha_cierre" class="form-control" name="fecha_cierre" placeholder="Cant. familias beneficiadas ">
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >¿Se recogío todo el equipamiento del centro cerrado? </label>
                                <select name="se_recojio_material" id="se_recojio_material" class="form-control" >
                                    <option value="">Seleccione el infraestructura</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Motivo de cierre: </label>
                                <select name="motivo_cierre" id="motivo_cierre" class="form-control" >
                                    <option value="">Seleccione el infraestructura</option>
                                    <option value="BAJA COBERTURA">BAJA COBERTURA</option>
                                    <option value="INCUMPLIMIENTO DE CONVENIO">INCUMPLIMIENTO DE CONVENIO</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Otro motivo de cierre </label>
                                <input type="text" id="otro_motivo_cierre" class="form-control" name="otro_motivo_cierre" placeholder="Observaciones Gas domiciliario ">
                            </div>


                        </div>
                        <div class="box-footer">
                            <br/>
                            <button type="submit" class="btn btn-primary">Guardar Datos </button>
                        </div>




                    </div>

                </div>


                <div class="col-md-4">


                    <!--   <div id='map'></div>
                      <div class='left'>
                          <a id='geojsonLayer' href='#'></a>
                      </div>
                  </div>-->
                    <?php echo $map['html'];
                    ?>

                </div>


            </div>   <!-- /.row -->
            <br/>


        </section>
        <?php echo form_close(); ?>



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
            </div>
            <div class="col-md-1">

            </div>


        </section>

    </body></html>










