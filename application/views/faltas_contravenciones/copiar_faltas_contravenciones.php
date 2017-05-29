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

                <li class="h4"> <a href="<?php echo base_url() ?>faltas_contravenciones/registros_faltas_contravenciones" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> /<strong style="color: #E13300">(COPIAR)</strong>  FORMULARIO DE FALTAS Y CONTRAVENCIONES POLICIALES Y CONSUMO DE BEBIDAS ALCOHOLICAS (LEY 259) </li>
            </ol>
        </section>

        <font  color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline">
        <?php echo validation_errors(); ?></font>

        <!--------------Content--------------->
        <?php echo form_open('faltas_contravenciones/guardar_faltas_contravenciones'); ?>
        <?php
        foreach ($edit as $e):

        endforeach;
        ?>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/>
                    </div>
                    <div class="box-body">
                        <?php
                        $rs = mysql_query("SELECT MAX(id_faltas) AS id FROM faltas_contravenciones");
                        if ($row = mysql_fetch_row($rs)) {
                            $id = trim($row[0]);
                        }
                        $total = $id + 1;
                        ?>
                        <div class="form-group supfrm">
                            <label for="curpwd">Nro de Formulario: <span class='ss-required-asterisk'>*</span></label>
                            <input type="number" id="numero_formulario" value="<?= $total ?>" class="form-control"  readonly="true"  name="numero_formulario" placeholder="Nro de Formulario" required="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Codigo Numero:</label>
                            <input type="number" id="cod_num" class="form-control" name="cod_num" placeholder="Codigo Numero"  value="<?= $e->cod_num ?>">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Gestion: </label>
                            <select name="gestion" id="gestion" class="form-control" >
                                <option value="<?= $e->gestion ?>"><?= $e->nombre_gestion ?></option>
                                <?php foreach ($gestion as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_gestion ?></option>
                                <?php } ?>	
                            </select>
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">Fecha del Hecho: <span class='ss-required-asterisk'>*</span></label>
                            <input type="date" id="fecha_hecho" class="form-control" name="fecha_hecho" placeholder="Fecha del Hecho " required="true" value="<?= $e->fecha_hecho ?>">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Hora del Hecho: <span class='ss-required-asterisk'>*</span></label>
                            <input type="time" id="hora_hecho" class="form-control" name="hora_hecho" placeholder="Hora del Hecho" required="true" value="<?= $e->hora_hecho ?>">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Mes: </label>
                            <select name="mes" id="mes" class="form-control" >
                                <option value="<?= $e->mes ?>"><?= $e->nombre_mes ?></option>
                                <?php foreach ($mes as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_mes ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Departamento: </label>
                            <select name="departamento" id="departamento" class="form-control" >
                                <option value="<?= $e->departamento ?>"><?= $e->nombre_departamento ?></option>
                                <?php foreach ($departamento as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_departamento ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Provincia: </label>
                            <select name="provincia" id="provincia" class="form-control" >
                                <option value="<?= $e->provincia ?>"><?= $e->nombre_provincia ?></option>
                                <?php foreach ($provincia as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_provincia ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Municipio: </label>
                            <select name="municipio" id="municipio" class="form-control" >
                                <option value="<?= $e->municipio ?>"><?= $e->nombre_municipio ?></option>
                                <?php foreach ($municipio as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_municipio ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Localidad: </label>
                            <select name="localidad" id="localidad" class="form-control" >
                                <option value="<?= $e->localidad ?>"><?= $e->nombre_localidad ?></option>
                                <?php foreach ($localidad as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_localidad ?></option>
                                <?php } ?>	
                            </select>
                        </div>
                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Epis: </label>
                            <select name="epis" id="epis" class="form-control" >
                                <option value="<?= $e->epis ?>"><?= $e->nombre_epis ?></option>
                                <?php foreach ($epis as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_epis ?></option>
                                <?php } ?>	
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Distrito</label> <span class='ss-required-asterisk'>*</span> 
                            <select name="provincias" id="provincias" class="form-control" required="true">
                                <option value="<?= $e->distrito ?>"><?= $e->nombre_distrito ?></option>
                                <?php foreach ($provincias as $pr) { ?>
                                    <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                <?php } ?>	
                            </select>

                            <?php //echo form_dropdown('provincias', $provincias, '', 'id="provincias" name="provincias"  class="form-control"');   ?>
                        </div>







                    </div>

                </div>

                <div class="col-md-2">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/>
                    </div>
                    <div class="box-body">





                        <div class="form-group">
                            <label>Zona</label>

                            <?php // echo form_dropdown('poblaciones', array('@' => 'Seleccione Zona'), 'Seleccione Zona', 'id="poblaciones" class="form-control" required="true"'); ?>
                            <?php echo form_dropdown('poblaciones', array($e->zona => $e->nombre), $e->zona, 'id="poblaciones" class="form-control" required="true" value="' . $e->zona . '"'); ?>
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">Lugar Hecho  <span class='ss-required-asterisk'>*</span></label>
                            <input type="text" id="lugar_hecho" class="form-control" name="lugar_hecho" placeholder="Lugar Hecho" required="true" value="<?= $e->lugar_hecho ?>">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Denuncia: </label>
                            <select name="denuncia" id="denuncia" class="form-control" >
                                <option value="<?= $e->denuncia ?>"><?= $e->nombre_denuncia ?></option>
                                <?php foreach ($denuncia as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_denuncia ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Nombre de la Victima  </label>
                            <input type="text" id="nombre_victima" class="form-control" name="nombre_victima" placeholder="Nombre de la Victima" value="<?= $e->nombre_victima ?>">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">CI de la Victima  </label>
                            <input type="text" id="ci_victima" class="form-control" name="ci_victima" placeholder="CI de la Victima " value="<?= $e->ci_victima ?>">
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Ciudad de la Victima: </label>
                            <select name="ciudad_victima" id="ciudad_victima" class="form-control" >
                                <option value="<?= $e->ciudad_victima ?>"><?= $e->nombre_ciudad_victima ?></option>
                                <?php foreach ($ciudad_victima as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_ciudad_victima ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Nacionalidad de la Victima: </label>
                            <select name="nacionalidad_victima" id="nacionalidad_victima" class="form-control" >
                                <option value="<?= $e->nacionalidad_victima ?>"><?= $e->nombre_nacionalidad ?></option>
                                <?php foreach ($nacionalidad as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_nacionalidad ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Edad de la Victima  </label>
                            <input type="text" id="edad_victima" class="form-control" name="edad_victima" placeholder="Edad de la Victima " value="<?= $e->edad_victima ?>">
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Sexo de la Victima: </label>
                            <select name="sexo_victima" id="sexo_victima" class="form-control" >
                                <option value="<?= $e->sexo_victima ?>"><?= $e->nombre_genero ?></option>
                                <?php foreach ($genero as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_genero ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Telefono de la Victima  </label>
                            <input type="text" id="telefono_victima" class="form-control" name="telefono_victima" placeholder="Telefono de la Victima " value="<?= $e->telefono_victima ?>">
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Temperancia de la Victima: </label>
                            <select name="temperancia_victima" id="temperancia_victima" class="form-control" >
                                <option value="<?= $e->temperancia_victima ?>"><?= $e->nombre_temperancia ?></option>
                                <?php foreach ($temperancia as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_temperancia ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label>Descripcion de la falta:  <span class='ss-required-asterisk'>*</span></label>
                            <textarea class="form-control" rows="3" name="descripcion_falta" id="descripcion_falta" placeholder="Descripcion de la falta" required="true"  ><?= $e->descripcion_falta ?></textarea>
                        </div>




                    </div>

                </div>

                <div class="col-md-2">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/>
                    </div>
                    <div class="box-body">

                        <div class="form-group supfrm">
                            <label for="curpwd">Nombre del Infractor  </label>
                            <input type="text" id="nombre_infractor" class="form-control" name="nombre_infractor" placeholder="Nombre del Infractor  " value="<?= $e->nombre_infractor ?>">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">CI del Infractor  </label>
                            <input type="text" id="ci_infractor" class="form-control" name="ci_infractor" placeholder="CI del Infractor  " value="<?= $e->ci_infractor ?>">
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Categoria de la licencia: </label>
                            <select name="categoria_licencia" id="categoria_licencia" class="form-control" >
                                <option value="<?= $e->categoria_licencia ?>"><?= $e->nombre_categoria_licencia ?></option>
                                <?php foreach ($categoria_licencia as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_categoria_licencia ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Ciudad de la Infractor: </label>
                            <select name="ciudad_infractor" id="ciudad_infractor" class="form-control" >
                                <option value="<?= $e->ciudad_infractor ?>"><?= $e->nombre_ciudad_infractor ?></option>
                                <?php foreach ($ciudad_infractor as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_ciudad_infractor ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Nacionalidad del Infractor: </label>
                            <select name="nacionalidad_infractor" id="nacionalidad_infractor" class="form-control" >
                                <option value="<?= $e->nacionalidad_infractor ?>"><?= $e->nombre_nacionalidad_infractor ?></option>
                                <?php foreach ($nacionalidad_infractor as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_nacionalidad_infractor ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Edad del Infractor  </label>
                            <input type="text" id="edad_infractor" class="form-control" name="edad_infractor" placeholder="Edad del Infractor " value="<?= $e->edad_infractor ?>">
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Sexo del Infractor: </label>
                            <select name="sexo_infractor" id="sexo_infractor" class="form-control" >
                                <option value="<?= $e->sexo_infractor ?>"><?= $e->nombre_genero_infractor ?></option>
                                <?php foreach ($genero_infractor as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_genero_infractor ?></option>
                                <?php } ?>	
                            </select>
                        </div>



                        <div class="form-group supfrm">
                            <label for="curpwd">Telefono del Infractor  </label>
                            <input type="text" id="telefono_infractor" class="form-control" name="telefono_infractor" placeholder="Telefono del Infractor" value="<?= $e->telefono_infractor ?>">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Tipo de Vehiculo: </label>
                            <select name="tipo_vehiculo" id="tipo_vehiculo" class="form-control" >
                                <option value="<?= $e->tipo_vehiculo ?>"><?= $e->nombre_tipo_vehiculo ?></option>
                                <?php foreach ($tipo_vehiculo as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_tipo_vehiculo ?></option>
                                <?php } ?>	
                            </select>
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">Placa  </label>
                            <input type="text" id="placa" class="form-control" name="placa" placeholder="Placa " value="<?= $e->placa ?>">
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Servicio de la Movilidad: </label>
                            <select name="servicio" id="servicio" class="form-control" >
                                <option value="<?= $e->servicio ?>"><?= $e->nombre_servicio ?></option>
                                <?php foreach ($servicio as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_servicio ?></option>
                                <?php } ?>	
                            </select>
                        </div>



                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Temperancia del Infractor: </label>
                            <select name="temperancia_infractor" id="temperancia_infractor" class="form-control" >
                                <option value="<?= $e->temperancia_infractor ?>"><?= $e->nombre_temperancia_infractor ?></option>
                                <?php foreach ($temperancia_infractor as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_temperancia_infractor ?></option>
                                <?php } ?>	
                            </select>
                        </div>


                    </div>

                </div>

                <div class="col-md-2">
                    <!-- Input addon -->


                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"> </h3> <br/>
                        </div>


                        <div class="box-body">


                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Infractor Arrestado: </label>
                                <select name="arrestado_infractor" id="arrestado_infractor" class="form-control" >
                                    <option value="<?= $e->arrestado_infractor ?>"><?= $e->nombre_arrestado ?> </option>
                                    <?php foreach ($arrestado as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_arrestado ?></option>
                                    <?php } ?>	
                                </select>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Sancion: </label>
                                <select name="sancion" id="sancion" class="form-control" >
                                    <option value="<?= $e->sancion ?>"><?= $e->nombre_sancion ?></option>
                                    <?php foreach ($sancion as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_sancion ?></option>
                                    <?php } ?>	
                                </select>
                            </div>


                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Estado del caso: </label>
                                <select name="estado_caso" id="estado_caso" class="form-control" >
                                    <option value="<?= $e->estado_caso ?>"><?= $e->nombre_estado_caso ?> </option>
                                    <?php foreach ($estado_caso as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_estado_caso ?></option>
                                    <?php } ?>	
                                </select>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Remision del caso: </label>
                                <select name="remision_caso" id="remision_caso" class="form-control" >
                                    <option value="<?= $e->remision_caso ?>"><?= $e->nombre_remision_caso ?></option>
                                    <?php foreach ($remision_caso as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_remision_caso ?></option>
                                    <?php } ?>	
                                </select>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Termino prueba: </label>
                                <select name="termino_prueba" id="termino_prueba" class="form-control" >
                                    <option value="<?= $e->termino_prueba ?>"><?= $e->nombre_termino_prueba ?> </option>
                                    <?php foreach ($termino_prueba as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_termino_prueba ?></option>
                                    <?php } ?>	
                                </select>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Recurso de apelacion: </label>
                                <select name="recurso_apelacion" id="recurso_apelacion" class="form-control" >
                                    <option value="<?= $e->recurso_apelacion ?>"><?= $e->nombre_recurso_apelacion ?></option>
                                    <?php foreach ($recurso_apelacion as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_recurso_apelacion ?></option>
                                    <?php } ?>	
                                </select>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Servicio destacado: </label>
                                <select name="servicio_destacado" id="servicio_destacado" class="form-control" >
                                    <option value="<?= $e->servicio_destacado ?>"><?= $e->nombre_servicio_destacado ?></option>
                                    <?php foreach ($servicio_destacado as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_servicio_destacado ?></option>
                                    <?php } ?>	
                                </select>
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Numero de Caso  </label>
                                <input type="text" id="numero_caso" class="form-control" name="numero_caso" placeholder="Numero de Caso " value="<?= $e->numero_caso ?>">
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Arma Utilizada  </label>
                                <input type="text" id="arma_utilizada" class="form-control" name="arma_utilizada" placeholder="Arma Utilizada" value="<?= $e->arma_utilizada ?>">
                            </div>





                            <div class='errorbox-good'>
                                <div class='ss-item ss-item-required ss-text'>
                                    <div class='ss-form-entry'>
                                        <label class='ss-q-title' for='entry_6'>Latitud
                                            <span class='ss-required-asterisk'>*</span>
                                        </label>
                                        <label class='ss-q-help' for='entry_6'></label>
                                        <input type='text' name='pos_y' value='<?= $e->pos_y ?>'  id='pos_y' placeholder='click en el Mapa' readonly="true" />
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class='errorbox-good'>
                                <div class='ss-item ss-item-required ss-text'>
                                    <div class='ss-form-entry'>
                                        <label class='ss-q-title' for='entry_5'>Longitud
                                            <span class='ss-required-asterisk'>*</span></label>
                                        <label class='ss-q-help' for='entry_5'></label>
                                        <input type='text' name='pos_x' value='<?= $e->pos_x ?>' id='pos_x' placeholder='click en el Mapa' readonly="true" />
                                    </div>
                                </div>
                            </div>








                        </div>




                        <!-- /.box-body -->
                        <div class="box-footer">

                            <br/>
                            <button type="submit" class="btn btn-primary">Guardar Datos </button>
                            <?php echo form_close(); ?>
                            <?php echo form_open('faltas_contravenciones/registros_faltas_contravenciones'); ?>
                            <button type="submit" class="btn btn-default" >Cancelar</button>
                            <?php echo form_close(); ?>


                        </div>


                    </div><!-- /.box -->

                </div><!--/.col (left) -->
                <div class="col-md-3">


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




        <!--------------Footer--------------->

    </body></html>










