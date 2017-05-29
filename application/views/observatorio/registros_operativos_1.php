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
                $("input[name=postal]").attr('readonly', 'readonly');
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

                <li class="h4"> <a href="<?php echo base_url() ?>editor/lista_modulos" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / Formulario de Operativos </li>
            </ol>
        </section>

        <font  color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline">
        <?php echo validation_errors(); ?></font>

        <!--------------Content--------------->
        <?php echo form_open('editor/guardar_operativos'); ?>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/><br/>
                    </div>
                    <div class="box-body">

                        <div class="form-group supfrm">
                            <label for="curpwd">Nro hoja de ruta: <span class='ss-required-asterisk'>*</span></label>
                            <input type="number" id="hoja_ruta" class="form-control" name="hoja_ruta" placeholder="Nro Hoja de Ruta" required="true">
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">Responsables: <span class='ss-required-asterisk'>*</span></label>
                            <input type="text" id="responsable" class="form-control" name="responsable" placeholder="Persona Asignada" required="true">

                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Fecha ejecucion de Operativo: <span class='ss-required-asterisk'>*</span></label>
                            <input type="date" id="fecha" class="form-control" name="fecha" placeholder="Fecha" required="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Hora ejecucion de Operativo: <span class='ss-required-asterisk'>*</span></label>
                            <input type="time" id="hora" class="form-control" name="hora" placeholder="Hora" required="true">
                        </div>


                        <div class="form-group">
                            <label>Distrito <span class='ss-required-asterisk'>*</span></label>
                            <select name="provincias" id="provincias" class="form-control" required="true">
                                <option value="">Seleccione un distrito</option>
                                <?php foreach ($provincias as $pr) { ?>
                                    <option value="<?= $pr->id ?>"><?= $pr->nombre ?></option>
                                <?php } ?>	
                            </select>

                            <?php //echo form_dropdown('provincias', $provincias, '', 'id="provincias" name="provincias"  class="form-control"'); ?>
                        </div>



                        <div class="form-group">
                            <label>Zona <span class='ss-required-asterisk'>*</span></label>

                            <?php echo form_dropdown('poblaciones', array('@' => 'Seleccione Zona'), 'Seleccione Zona', 'id="poblaciones" class="form-control" required="true"'); ?>
                        </div>





                    </div>

                </div>
                <div class="col-md-3">
                    <div class="box-header">
                        <h3 class="box-title"> </h3> <br/><br/>
                    </div>
                    <div class="box-body">





                        <div class="form-group supfrm">
                            <label for="curpwd">Direccion 1  <span class='ss-required-asterisk'>*</span></label>
                            <input type="text" id="direccion_1" class="form-control" name="direccion_1" placeholder="Direccion 1" required="true">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Direccion 2</label>
                            <input type="text" id="direccion_2" class="form-control" name="direccion_2" placeholder="Direccion 2" >
                        </div>


                        <div class="form-group">
                            <label>Tipo Operativo <span class='ss-required-asterisk'>*</span></label>
                            <select name="provincias2" id="provincias2" class="form-control" required="true">
                                <option value="">Seleccione tipo Operativo</option>
                                <?php foreach ($provincias2 as $pra) { ?>
                                    <option value="<?= $pra->id ?>"><?= $pra->nombre_o ?></option>
                                <?php } ?>	
                            </select>
                            <?php //echo form_dropdown('provincias', $provincias, '', 'id="provincias" name="provincias"  class="form-control"'); ?>
                        </div>



                        <div class="form-group">
                            <label>Nombre del Sitio Intervenido <span class='ss-required-asterisk'>*</span></label>

                            <?php echo form_dropdown('poblaciones2', array('@' => 'Seleccione Sitio'), 'Seleccione Sitio', 'id="poblaciones2" class="form-control" required="true"'); ?>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Observacion del Sitio: </label>
                            <select name="id_intervencion" id="id_intervencion" class="form-control" >
                                <option value="">Seleccione Intervencion</option>
                                <?php foreach ($tipo_intervencion as $i) { ?>
                                    <option value="<?= $i->id ?>"><?= $i->nombre_intervencion ?></option>
                                <?php } ?>	
                            </select>
                        </div>





                        <div class="form-group supfrm">
                            <label for="curpwd">Propietario Establecimiento:</label>
                            <input type="text" id="propietario" class="form-control" name="propietario" placeholder="Propietario Establecimiento" >

                        </div>






                    </div>

                </div>
                <div class="col-md-3">
                    <!-- Input addon -->


                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">&nbsp;</h3>
                        </div>

                        <div class="box-body">


                            <div class="form-group supfrm">
                                <label for="curpwd">Encargado Establecimiento: </label>
                                <input type="text" id="encargado" class="form-control" name="encargado" placeholder="Encargado Establecimiento" >

                            </div>


                            <div class="form-group supfrm">
                                <label for="curpwd">Encargado Decomisos: </label>
                                <input type="text" id="encargado_decomisos" class="form-control" name="encargado_decomisos" placeholder="Encargado Decomisos" >

                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Nro Formulario: </label>
                                <input type="text" id="nro_formulario" class="form-control" name="nro_formulario" placeholder="Nro Formulario" >

                            </div>
                            <div class="form-group supfrm">
                                <label>Motivo de Decomiso Operativo:  <span class='ss-required-asterisk'>*</span></label>
                                <textarea class="form-control" rows="3" name="descripcion_operativo" id="descripcion_operativo" placeholder="Descripcion Operativo" required="true"></textarea>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Almacen </label>
                                <select name="almacen" id="almacen" class="form-control" >
                                    <option value="">Seleccione Alamacen</option>
                                    <option value="Almacen">Almacen</option>
                                    <option value="Alcaldia Quemada">Alcaldia Quemada</option>
                                    <option value="Central">Central</option>
                                    <option value="Otros">Otros</option>
                                </select>
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

                                        <td rowspan="2" class="negrita">Hoja de Ruta</td>
                                        <td rowspan="2" class="negrita">Fecha</td>
                                        <td rowspan="2" class="negrita">Descripcion</td>
                                        <td rowspan="2" class="negrita">Responsable</td>
                                        <td rowspan="2" class="negrita">Cantidad decomisos</td>

                                        <td rowspan="2" class="negrita">Agregar Decomiso </td>
                                        <td rowspan="2" class="negrita">Eliminar Decomiso </td>
                                        <td rowspan="2" class="negrita"> Aprobar Formulario</td>

                                    </tr>
                                    <tr class="fondo">

                                    </tr>
                                    <?php
                                    foreach ($operativo as $fila) {
                                        ?>
                                        <tr>
                                            <td><strong><?= $fila->hoja_ruta ?>  </strong></td>
                                            <td><?= $fila->fecha ?></td>
                                            <td><?= $fila->descripcion_operativo ?></td>
                                            <td><?= $fila->responsable ?></td>
                                            <?php
                                            $total = mysql_num_rows(mysql_query("SELECT * FROM decomiso where id_operativo = "
                                                            . $fila->id_operativo));
                                            if ($total == 0) {
                                                $total = 0;
                                            }
                                            ?>

                                            <td><?php
                                                $total2 = mysql_query("SELECT * FROM decomiso where id_operativo = " . $fila->id_operativo);
                                                $vst = $fila->id_operativo;
                                                $total22 = $this->mapa_model->get_markers_decomisos($vst);
                                                ?>

                                                <table  border="1" >
                                                    <?php
                                                    if (!$total22) {
                                                        // echo $total;
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td><strong>Decomisos</strong></td>
                                                            <td><strong>Cantidad</strong></td>
                                                            <td><strong>Nombre</strong></td>
                                                            <td><strong>Estado Decomiso</strong></td>
                                                            <td><strong>Eliminar</strong></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php
                                                    if (!$total22) {
                                                        echo $total;
                                                    } else {
                                                        ?>
                                                        <?php foreach ($total22 as $filas) {
                                                            ?>                                            
                                                            <tr>
                                                                 <td> <?php echo $total; ?></td>
                                                                <td> <?php echo $filas->cantidad; ?></td>
                                                                <td> <?php echo $filas->nombre_detalle; ?></td>
                                                                <td> <?php echo $filas->nombre_decomiso; ?></td>
                                                                <td><a onclick="if (confirma() == false)
                                                                                            return false" href="<?= base_url() ?>editor/borrar_decomiso/<?= $filas->id_decomiso ?>">
                                                                        <img type="image" src="<?= base_url() ?>/assets/img/eliminar.png" height="45px" title="Eliminar Decomiso" >
                                                                    </a></td>
                                                            </tr>
                                                        <?php } ?>   
                                                    <?php } ?>
                                                </table></td>
                                            <td>

                                                <a data-toggle="modal" data-id="<?= $fila->id_operativo ?>" shape="poly"
                                                   href="#myModalDistrito" class="open-ModalD1">
                                                    <img type="image" src="<?= base_url() ?>/assets/img/agregar.png" height="35px" title="Agregar Decomiso">
                                                </a>

                                            </td>
                                            <td><a onclick="if (confirma() == false)
                                                                return false" href="<?= base_url() ?>editor/borrar_operativo/<?= $fila->id_operativo ?>">
                                                    <img type="image" src="<?= base_url() ?>/assets/img/eliminar.png" height="45px" title="Eliminar Decomiso" >
                                                </a></td>
                                            <td><a onclick="if (confirma_aprobar() == false)
                                                                return false" href="<?= base_url() ?>editor/aprobar_operativo/<?= $fila->id_operativo ?>">
                                                    <img type="image" src="<?= base_url() ?>/assets/img/activado.png" height="35px" title="Aprobar Formulario">
                                                </a></td>



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
        <br/>
         <div style='height:20px;'></div>  
        <div>
            <?php echo $output; ?>
        </div>
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
                            <label for="curpwd" >Unidad de Medida:</label>
                            <select name="id_medida" id="id_medida" class="form-control" required="true">
                                <option value="">Seleccione Unidad de Medida</option>
                                <?php foreach ($id_medida as $pa) { ?>
                                    <option value="<?= $pa->id ?>"><?= $pa->nombre_medida ?></option>
                                <?php } ?>	
                            </select>


                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Producto Decomisado (Especie):</label>
                            <select name="id_decomiso_detalle" id="id_decomiso_detalle" class="form-control" required="true">
                                <option value="">Seleccione estado del decomiso</option>
                                <?php foreach ($id_decomiso_detalle as $pa) { ?>
                                    <option value="<?= $pa->id ?>"><?= $pa->nombre_detalle . ' (' . $pa->nombre_especie . ' )' ?></option>
                                <?php } ?>	
                            </select>


                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">  Marca</label>
                            <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca"/>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">  Serie / Modelo / Color</label>
                            <input type="text" class="form-control" name="serie_modelo" id="serie_modelo"  placeholder=" Serie / Modelo / Color"/>
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










