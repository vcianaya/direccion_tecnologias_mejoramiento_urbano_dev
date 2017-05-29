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

                <li class="h4"> <a href="<?php echo base_url() ?>editor/lista_modulos" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / Formulario de Monitoreo </li>
            </ol>
        </section>

        <font  color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline">
        <?php echo validation_errors(); ?></font>

        <!--------------Content--------------->
        <?php echo form_open('monitoreo/guardar_monitoreo'); ?>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/><br/><br/>
                    </div>
                    <div class="box-body">

                        <div class="form-group supfrm">
                            <label for="curpwd">Nro de Formulario: <span class='ss-required-asterisk'>*</span></label>
                            <input type="number" id="nro_caso" class="form-control" name="nro_caso" placeholder="Nro de caso" required="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Fecha ejecucion del Monitoreo: <span class='ss-required-asterisk'>*</span></label>
                            <input type="date" id="fecha" class="form-control" name="fecha" placeholder="Fecha" required="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Hora ejecucion del Monitoreo: <span class='ss-required-asterisk'>*</span></label>
                            <input type="time" id="hora" class="form-control" name="hora" placeholder="Hora" required="true">
                        </div>




                        <div class="form-group supfrm">
                            <label for="curpwd">Se Intervinio  <span class='ss-required-asterisk'>*</span></label>

                            <input type="radio" name="intervension" value="1" id="intervension" required="true"/>
                            SI
                            <input type="radio" name="intervension" value="0" id="intervension" />
                            NO

                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Camara: </label>
                            <select name="provincias2" id="provincias2" class="form-control" >
                                <option value="">Seleccione la camara</option>
                                <?php foreach ($camara as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_camara ?></option>
                                <?php } ?>	
                            </select>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Distrito: <span class='ss-required-asterisk'>*</span></label>
                            <input type="text" id="postal" class="form-control" name="postal" placeholder="Distrito" required="true">
                        </div>

                    </div>

                </div>

                <div class="col-md-3">
                    <!-- Input addon -->


                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">&nbsp;</h3><br/>
                        </div>

                        <div class="box-body">


                            <div class="form-group supfrm">
                                <label for="curpwd">Direccion  <span class='ss-required-asterisk'>*</span></label>
                                <input type="text" id="direccion" class="form-control" name="direccion" placeholder="Direccion 1" required="true">
                            </div>




                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Tipo de Caso: </label>
                                <select name="id_tipo_caso" id="id_tipo_caso" class="form-control" >
                                    <option value="">Seleccione el Caso</option>
                                    <?php foreach ($tipo_caso_monitoreo as $i) { ?>
                                        <option value="<?= $i->id ?>"><?= $i->nombre_monitoreo ?></option>
                                    <?php } ?>	
                                </select>
                            </div>





                            <div class="form-group supfrm">
                                <label for="curpwd">Cantidad de Personas involucradas:</label>
                                <input type="number" id="cantidad_personas" class="form-control" name="cantidad_personas" placeholder="Cantidad de Personas involucradas" >

                            </div>




                            <div class="form-group supfrm">
                                <label>Descripcion del Monitoreo:  <span class='ss-required-asterisk'>*</span></label>
                                <textarea class="form-control" rows="3" name="descripcion_monitoreo" id="descripcion_monitoreo" placeholder="Descripcion del Monitoreo" required="true"></textarea>
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

                            <div >



                            </div>




                        </div><!-- /.box-body -->
                        <div class="box-footer">

                            <br/>
                            <button type="submit" class="btn btn-primary">Guardar Datos </button>




                        </div>


                    </div><!-- /.box -->

                </div><!--/.col (left) -->
                <div class="col-md-5">


                    <!--   <div id='map'></div>
                      <div class='left'>
                          <a id='geojsonLayer' href='#'></a>
                      </div>
                  </div>-->
                    <?php echo $map['html'];
                    ?>

                </div>

                <div class="col-md-4">

                </div>
            </div>   <!-- /.row -->
            <br/>


        </section>
        <?php echo form_close(); ?>



        <!--------------Footer--------------->
        <section>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <?php
                if (!$operativo) {
                    ?>
                    No se encontro ningun registro.
                <?php } else {
                    ?>
                    <table  border="0" align="center" class="gradienttable">
                        <tr>
                            <td colspan="2" ><table  border="2" align="center">
                                    <tr class="fondo">
                                        <td rowspan="2" class="negrita">Nro de Formulario</td>
                                        <td rowspan="2" class="negrita">Fecha Ejecucion </td>
                                        <td rowspan="2" class="negrita">Hora Ejecucion</td>
                                        <td rowspan="2" class="negrita">Nro de Camara</td>
                                        <td rowspan="2" class="negrita">Cantidad de Personas involucradas</td>
                                        <td rowspan="2" class="negrita">Tipo de Caso</td>
                                        <td rowspan="2" class="negrita">Descripcion del Monitoreo</td>
                                        <td rowspan="2" class="negrita">Eliminar Registro </td>
                                        <td rowspan="2" class="negrita"> Aprobar Registro</td>
                                        <td rowspan="2" class="negrita"> Subir Imagen</td>
                                        <td rowspan="2" class="negrita"> Imagenes Subidas</td>

                                    </tr>
                                    <tr class="fondo">

                                    </tr>
                                    <?php
                                    foreach ($operativo as $fila) {
                                        ?>
                                        <tr>
                                            <td ><strong><?= $fila->nro_caso ?>  </strong></td>
                                            <td><?= $fila->fecha ?></td>
                                            <td><?= $fila->hora ?></td>
                                            <td><?= $fila->id_camara ?></td>
                                            <td><?= $fila->cantidad_personas ?></td>
                                            <td> <?php
                                                $tipo_caso = $fila->id_tipo_caso;
                                                $total22 = $this->mapa_model->tipo_caso($tipo_caso);
                                                ?>

                                                <?php
                                                foreach ($total22 as $tip) {
                                                    echo $tip->nombre_monitoreo;
                                                }
                                                ?>

                                            </td>
                                            <td> <?= $fila->descripcion_monitoreo ?></td>
                                            <td><a onClick="if (confirma() == false)
                                                                return false" href="<?= base_url() ?>monitoreo/borrar_monitoreo/<?= $fila->id_monitoreo ?>">
                                                    <img type="image" src="<?= base_url() ?>/assets/img/eliminar.png" height="45px" title="Eliminar Registro" >
                                                </a></td>
                                            <td><a onClick="if (confirma_aprobar() == false)
                                                                return false" href="<?= base_url() ?>monitoreo/aprobar_monitoreo/<?= $fila->id_monitoreo ?>">
                                                    <img type="image" src="<?= base_url() ?>/assets/img/activado3.png" height="50px" title="Aprobar Formulario">
                                                </a></td>
                                            <td>

                                                <!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
                                                <?= @$error ?>
                                                <div id="formulario_imagenes">
                                                    <span><?php echo validation_errors(); ?></span>
                                                    <?= form_open_multipart(base_url() . "monitoreo/do_upload") ?>
                                                    <input type="hidden" name="id_monitoreo" id="id_monitoreo" value="<?= $fila->id_monitoreo ?>"/>
                                                    <input type="hidden" name="titulo" />
                                                    <label>Formato de imagenes: gif,jpg,png,jpeg:</label><input type="file" name="userfile" /><br /><br />
                                                    <input type="submit" value="Subir imágenes" />
                                                    <?= form_close() ?>


                                            </td>
                                            <td>





                                                <table  border="1">
                                                    <tr>
                                                        <?php
                                                        $id_imagen = $fila->id_monitoreo;
                                                        $total22 = $this->provincias_model->imagenes($id_imagen);
                                                        foreach ($total22 as $fi) {
                                                            ?>
                                                            <td>
                                                                <img src="<?php echo base_url() ?>uploads/<?= $fi->ruta ?>" width="80px" />
                                                                <a onclick="if (confirma_eliminar() == false)
                                                                                        return false" href="<?= base_url() ?>monitoreo/borrar_imagen/<?= $fi->id ?>">
                                                                    <img type="image" src="<?= base_url() ?>/assets/img/eliminar.png" height="45px" title="Eliminar Imagen" >
                                                                </a>
                                                            </td>   
                                                            <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                </table>

                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>      <strong></strong></td>
                        </tr>
                    </table>

                    <?php
                }
                ?>
            </div>


        </section>
        <div  id="myModalDistrito" class="modal fade"  role="dialog">
            <div class="modal-dialog">
                <?php echo form_open('editor/guardar_decomisos'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>

                        <h4>Llene los siguientes datos : </h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="DNI" id="DNI" value=""/>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Estado Decomiso:</label>
                            <select name="id_estado_decomiso" id="id_estado_decomiso" class="form-control" required="true">
                                <option value="">Seleccione estado del decomiso</option>
                                <?php foreach ($estado_decomiso as $p) { ?>
                                    <option value="<?= $p->id ?>"><?= $p->nombre_decomiso ?></option>
                                <?php } ?>	
                            </select>


                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">  Cantidad</label>
                            <input type="text" class="form-control" name="cantidad" id="cantidad" required="required" placeholder="Cantidad"/>
                        </div>
                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Estado Decomiso:</label>
                            <select name="id_decomiso_detalle" id="id_decomiso_detalle" class="form-control" required="true">
                                <option value="">Seleccione estado del decomiso</option>
                                <?php foreach ($id_decomiso_detalle as $pa) { ?>
                                    <option value="<?= $pa->id ?>"><?= $pa->nombre_detalle ?></option>
                                <?php } ?>	
                            </select>


                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">  Observacion:</label>
                            <textarea  class="form-control" name="observacion" id="observacion" > </textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Registrar</button>                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </body></html>










