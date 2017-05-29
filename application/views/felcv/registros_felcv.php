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
                        <td>  <li class="h4"> <a href="<?php echo base_url() ?>editor/lista_modulos" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / <strong style="color: #E13300">(REGISTRAR)</strong>  FORMULARIO DE FELCV (DELITOS  ATENDIDOS  POR  LA  POLICIA  BOLIVIANA)</li></td>
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
        <?php echo form_open('felcv/guardar_felcv'); ?>
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
                        $rs = mysql_query("SELECT MAX(id_felcv) AS id FROM felcv");
                        if ($row = mysql_fetch_row($rs)) {
                            $id = trim($row[0]);
                        }
                        $total = $id + 1;
                        ?>
                        <div class="form-group supfrm">
                            <label for="curpwd">Nro de Formulario: </label>
                            <input type="text" id="numero" class="form-control" name="numero"  readonly="true" placeholder="Nro de Formulario" value="<?php echo $total ?>" >
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Codigo numero: </label>
                            <input type="text" id="cod_numero" class="form-control" name="cod_numero"   placeholder="Codigo numero"  >
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Departamento: </label>
                            <select name="departamento" id="departamento" class="form-control" >
                                <option value="">Seleccione el Departamento</option>
                                <?php foreach ($departamento as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_departamento ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Provincia: </label>
                            <select name="provincia" id="provincia" class="form-control" >
                                <option value="">Seleccione la provincia</option>
                                <?php foreach ($provincia as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_provincia ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Municipio: </label>
                            <select name="municipio" id="municipio" class="form-control" >
                                <option value="">Seleccione el municipio</option>
                                <?php foreach ($municipio as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_municipio ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Unidades, Epis, Modulos: </label>
                            <select name="unidades_epis_modulos" id="unidades_epis_modulos" class="form-control" >
                                <option value="">Seleccione la unidad, epi o modulo</option>
                                <?php foreach ($unidades_epis_modulos as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_unidades_epis_modulos ?></option>
                                <?php } ?>	
                            </select>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Fecha  Denuncia: <span class='ss-required-asterisk'>*</span></label>
                            <input type="date" id="fecha_denuncia" class="form-control" name="fecha_denuncia" placeholder="Fecha Denuncia " required="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Hora Denuncia: <span class='ss-required-asterisk'>*</span></label>
                            <input type="time" id="hora_denuncia" class="form-control" name="hora_denuncia" placeholder="Hora Denuncia" required="true">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Mes: </label>
                            <select name="mes_registro" id="mes_registro" class="form-control" >
                                <option value="">Seleccione el Mes</option>
                                <?php foreach ($mes as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_mes ?></option>
                                <?php } ?>	
                            </select>
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">Fecha del Hecho: <span class='ss-required-asterisk'>*</span></label>
                            <input type="date" id="fecha_hecho" class="form-control" name="fecha_hecho" placeholder="Fecha del Hecho " required="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Hora del Hecho: <span class='ss-required-asterisk'>*</span></label>
                            <input type="time" id="hora_hecho" class="form-control" name="hora_hecho" placeholder="Hora del Hecho" required="true">
                        </div>



                        <div class="form-group supfrm">
                            <label for="curpwd"> Numero Caso: <span class='ss-required-asterisk'>*</span></label>
                            <input type="number" id="n_caso" class="form-control" name="n_caso" placeholder="Numero Caso" required="true">
                        </div>










                    </div>

                </div>

                <div class="col-md-2">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/>
                    </div>
                    <div class="box-body">

                        <div class="form-group supfrm">
                            <label for="curpwd">Descargo Policia <span class='ss-required-asterisk'>*</span></label>
                            <input type="text" id="descargo_policia" class="form-control" name="descargo_policia" placeholder="Descargo Policia">
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Division: </label>
                            <select name="division" id="division" class="form-control" >
                                <option value="">Seleccione la Division</option>
                                <?php foreach ($division as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_division ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Casos de Atencion: </label>
                            <select name="casos_atencion" id="casos_atencion" class="form-control" >
                                <option value="">Seleccione el caso </option>
                                <?php foreach ($casos_atencion as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_casos_atencion ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Delitos: </label>
                            <select name="delitos" id="delitos" class="form-control" >
                                <option value="">Seleccione el Delito</option>
                                <?php foreach ($delito as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_delito ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Nombre Denunciante </label>
                            <input type="text" id="nombre_denunciante" class="form-control" name="nombre_denunciante" placeholder="Nombre Denunciante ">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Nombre Victima   </label>
                            <input type="text" id="nombre_victima" class="form-control" name="nombre_victima" placeholder="Nombre Victima ">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">CI de la Victima  </label>
                            <input type="text" id="ci_victima" class="form-control" name="ci_victima" placeholder="CI de la Victima ">
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">Lugar de Nacimiento </label>
                            <input type="text" id="lugar_nacimiento" class="form-control" name="lugar_nacimiento" placeholder="Lugar de Nacimiento  ">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Sexo de la Victima: </label>
                            <select name="genero" id="genero" class="form-control" >
                                <option value="">Seleccione el sexo</option>
                                <?php foreach ($genero as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_genero ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Edad de la Victima </label>
                            <input type="text" id="edad" class="form-control" name="edad" placeholder="Edad de la Victima ">
                        </div>



                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Temperancia de la Victima: </label>
                            <select name="temperancia_victima" id="temperancia_victima" class="form-control" >
                                <option value="">Seleccione la Temperancia</option>
                                <?php foreach ($temperancia_victima as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_temperancia ?></option>
                                <?php } ?>	
                            </select>
                        </div>



                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Nivel instruccion: </label>
                            <select name="nivel_instruccion" id="nivel_instruccion" class="form-control" >
                                <option value="">Seleccione el Nivel instruccion</option>
                                <?php foreach ($nivel_instruccion as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_nivel_instruccion ?></option>
                                <?php } ?>	
                            </select>
                        </div>




                    </div>

                </div>

                <div class="col-md-2">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/>
                    </div>
                    <div class="box-body">




                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Motivo de la violencia: </label>
                            <select name="motivo_violencia" id="motivo_violencia" class="form-control" >
                                <option value="">Seleccione el Motivo de la violencia</option>
                                <?php foreach ($motivo_violencia as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_motivo_violencia ?></option>
                                <?php } ?>	
                            </select>
                        </div>


                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Lugar hecho: </label>
                            <select name="lugar_hecho" id="lugar_hecho" class="form-control" >
                                <option value="">Seleccione el lugar hecho</option>
                                <?php foreach ($lugar_hecho as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_lugar_hecho ?></option>
                                <?php } ?>	
                            </select>
                        </div>

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
                            <label for="curpwd">Avenida  </label>
                            <input type="text" id="avenida" class="form-control" name="avenida" placeholder="Avenida">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Nombre del Agresor  </label>
                            <input type="text" id="nombre_agresor" class="form-control" name="nombre_agresor" placeholder="Nombre del Agresor">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">CI del Agresor  </label>
                            <input type="text" id="ci_agresor" class="form-control" name="ci_agresor" placeholder="CI del Agresor ">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Lugar nacimiento Agresor  </label>
                            <input type="text" id="lugar_nacimiento_agresor" class="form-control" name="lugar_nacimiento_agresor" placeholder="CI del Agresor ">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Arma  </label>
                            <input type="text" id="arma" class="form-control" name="arma" placeholder="Alias ">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Edad del Agresor  </label>
                            <input type="text" id="edad_agresor" class="form-control" name="edad_agresor" placeholder="Edad del Agresor">
                        </div>





                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Sexo del Agresor: </label>
                            <select name="genero_agresor" id="genero_agresor" class="form-control" >
                                <option value="">Seleccione el sexo</option>
                                <?php foreach ($genero_infractor as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_genero_infractor ?></option>
                                <?php } ?>	
                            </select>
                        </div>



                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Temperancia del Agresor: </label>
                            <select name="temperancia_agresor" id="temperancia_agresor" class="form-control" >
                                <option value="">Seleccione la Temperancia</option>
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







                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Nivel instruccion agresor: </label>
                            <select name="nivel_instruccion_agresor" id="nivel_instruccion_agresor" class="form-control" >
                                <option value="">Seleccione el Nivel instruccion agresor</option>
                                <?php foreach ($nivel_instruccion_agresor as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_nivel_instruccion_agresor ?></option>
                                <?php } ?>	
                            </select>
                        </div>




                        <div class="box-body">
                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Medios comunicacion: </label>
                                <select name="medios_comunicacion" id="medios_comunicacion" class="form-control" >
                                    <option value="">Seleccione los Medios comunicacion</option>
                                    <?php foreach ($medios_comunicacion as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_medios_comunicacion ?></option>
                                    <?php } ?>	
                                </select>
                            </div>






                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Situacion Agresor: </label>
                                <select name="situacion_agresor" id="situacion_agresor" class="form-control" >
                                    <option value="">Seleccione la Situacion Agresor </option>
                                    <?php foreach ($situacion_agresor as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_situacion_agresor ?></option>
                                    <?php } ?>	
                                </select>
                            </div>



                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Servicio : </label>
                                <select name="servicio_felcv" id="servicio_felcv" class="form-control" >
                                    <option value="">Seleccione el servicio </option>
                                    <?php foreach ($servicio_felcv as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_servicio_felcv ?></option>
                                    <?php } ?>	
                                </select>
                            </div>



                            <div class="form-group supfrm">
                                <label for="curpwd">Certificado medico </label>
                                <input type="text" id="certificado_medico" class="form-control" name="certificado_medico" placeholder="Certificado medico ">
                            </div>
                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Derivado: </label>
                                <select name="derivado" id="derivado" class="form-control" >
                                    <option value="">Seleccione el derivado </option>
                                    <?php foreach ($derivado as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_derivado ?></option>
                                    <?php } ?>	
                                </select>
                            </div>


                            <div class="form-group supfrm">
                                <label for="curpwd">Tiempo seguimiento caso </label>
                                <input type="text" id="tiempo_seguimiento_caso" class="form-control" name="tiempo_seguimiento_caso" placeholder="Tiempo seguimiento caso  ">
                            </div>

                            <div class='errorbox-good'>
                                <div class='ss-item ss-item-required ss-text'>
                                    <div class='ss-form-entry'>
                                        <label class='ss-q-title' for='entry_6'>Latitud
                                            <span class='ss-required-asterisk'>*</span>
                                        </label>
                                        <label class='ss-q-help' for='entry_6'></label>
                                        <input type='text' name='pos_y' value=''  id='pos_y' placeholder='click en el Mapa' readonly="true" />
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
                                        <input type='text' name='pos_x' value='' id='pos_x' placeholder='click en el Mapa' readonly="true" />
                                    </div>
                                </div>
                            </div>








                        </div>




                        <!-- /.box-body -->
                        <div class="box-footer">

                            <br/>
                            <button type="submit" class="btn btn-primary">Guardar Datos </button>




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










