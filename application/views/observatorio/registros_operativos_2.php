<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    </head>
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

    <section>
        <div class="col-md-1">
            
        </div>
       
        <div class="col-md-9">


            <?php echo $output; ?>
        </div>
    </section>
</body>
</html>
