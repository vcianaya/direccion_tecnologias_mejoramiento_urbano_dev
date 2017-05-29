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
                    $.get("<?php echo base_url('mapa/getAjaxPoblacion3') ?>", {"provincia2": provinciaSelected2}, function (data)
                    {
                        //parseamos el json y recorremos

                        var poblaciones2 = "";
                        var poblacion2 = JSON.parse(data);
                        for (datos in poblacion2.poblaciones2)
                        {
                            poblaciones2 += '<option value="' + poblacion2.poblaciones2[datos].id + '">' +
                                    poblacion2.poblaciones2[datos].nombre_especie + '</option>';
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
        <script>
            $(document).on("click", ".open-ModalD1", function () {
                var myDNI = $(this).data('id');
                $(".modal-body #DNI").val(myDNI);
            });
        </script> 

        <style>

            @media screen and (min-width: 900px) {

                #myModalDistrito .modal-dialog  {width:900px;}

            }
        </style>
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
                        <td> <li class="h4"> <a href="<?php echo base_url() ?>dna/registro_dna" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> /<strong style="color: #E13300">(EDITAR)</strong> Formulario de Seguimiento  &nbsp; </li></td>
                    <td> <?php echo form_open('editor/excel_operativos'); ?>




                        <?php echo form_close(); ?></td>

                    <td>&nbsp;</td>
                    <td><?php echo form_open('editor/excel_decomisos'); ?>




                        <?php echo form_close(); ?></td>
                    </tr>
                </table>




            </ol>
        </section>

        <font  color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline">
        <?php echo validation_errors(); ?></font>

        <!--------------Content--------------->
        <?php echo form_open('dna/update_seguimiento'); ?>
        <?php
        foreach ($edit as $e):

        endforeach;
        ?>
        <section class="content">

            <div class="row">
                <!-- left column -->
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="box-body">
                        <input type="text" name="DNI" id="DNI" value="<?= $e->id ?>"/>
                        <div class="form-group supfrm">
                            <label for="curpwd">  Nro</label>
                            <input type="text" class="form-control" name="nro" id="nro" required value="<?= $e->nro ?>"/>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">  Nro caso</label>
                            <input type="text" class="form-control" name="nro_caso" id="nro_caso" value="<?= $e->nro_caso ?>"/>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">  Nombres Apellidos</label>
                            <input type="text" class="form-control" name="nombres_apellidos" id="nombres_apellidos" value="<?= $e->nombres_apellidos ?>"/>
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd">  Estado de Caso</label><BR>
                            <?php if ($e->estado_caso == 'nuevo') { ?>
                                <input type="radio" name="estado_caso" value="nuevo" id="RadioGroup1_2" checked="CHECKED">
                            <?php } else { ?>
                                <input type="radio" name="estado_caso" value="nuevo" id="RadioGroup1_2">
                            <?php } ?>

                            Nuevo

                            <?php if ($e->estado_caso == 'seguimiento') { ?>
                                <input type="radio" name="estado_caso" value="seguimiento" id="RadioGroup1_3" checked="CHECKED">
                            <?php } else { ?>
                                <input type="radio" name="estado_caso" value="seguimiento" id="RadioGroup1_3">
                            <?php } ?>

                            Seguimiento
                            <br>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Sexo </label> <br>
                            <?php if ($e->sexo == 'masculino') { ?>
                                <input type="radio" name="sexo" value="masculino" id="sexo" checked="CHECKED">
                            <?php } else { ?>
                                <input type="radio" name="sexo" value="masculino" id="sexo">
                            <?php } ?>
                            <label for="curpwd">Masculino </label><br>
                            <?php if ($e->sexo == 'femenino') { ?>
                                <input type="radio" name="sexo" value="femenino" id="sexo" checked="CHECKED">
                            <?php } else { ?>
                                <input type="radio" name="sexo" value="femenino" id="sexo">
                            <?php } ?>
                            <label for="curpwd">Femenino </label><br>
                            <?php if ($e->sexo == 'advientre') { ?>
                                <input type="radio" name="sexo" value="advientre" id="sexo" checked="CHECKED">
                            <?php } else { ?>
                                <input type="radio" name="sexo" value="advientre" id="sexo">
                            <?php } ?>
                            <label for="curpwd">Advientre </label>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">  Edad</label>
                            <input type="text" class="form-control" name="edad" id="edad" value="<?= $e->edad ?>"/>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Acciones por Area </label> <br>
                            <?php if ($e->areas == 1) { ?>
                                <input name="areas" type="radio" id="areas" value="1" checked="CHECKED">
                            <?php } else { ?>
                                <input name="areas" type="radio" id="areas" value="1" >
                            <?php } ?>
                            <label for="curpwd">Area Trabajo Social </label><br>
                            <?php if ($e->areas == 2) { ?>
                                <input type="radio" name="areas" value="2" id="areas" checked="CHECKED">
                            <?php } else { ?>
                                <input type="radio" name="areas" value="2" id="areas">
                            <?php } ?>
                            <label for="curpwd">Area Psicologica </label><br>
                            <?php if ($e->areas == 3) { ?>
                                <input type="radio" name="areas" value="3" id="areas" checked="CHECKED">
                            <?php } else { ?>
                                <input type="radio" name="areas" value="3" id="areas">
                            <?php } ?>
                            <label for="curpwd">Area Legal </label>
                        </div>



                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group supfrm">
                            <label for="curpwd">  Acciones del area de trabajo social (Ultima accion)</label>
                            <input type="text" class="form-control" name="acciones_trabajo_social" id="acciones_trabajo_social" value="<?= $e->acciones_trabajo_social ?>"/>
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd"> Acciones del area psicologica (Ultima accion)</label>
                            <input type="text" class="form-control" name="acciones_area_psicologica" id="acciones_area_psicologica" value="<?= $e->acciones_area_psicologica ?>"/>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd"> Acciones del area psicologica (Ultima accion)</label>
                            <input type="text" class="form-control" name="acciones_area_legal" id="acciones_area_legal" value="<?= $e->acciones_area_legal ?>"/>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">  Ministerio publico nro caso</label>
                            <input type="text" class="form-control" name="ministerio_publico_nro_caso" id="ministerio_publico_nro_caso"  value="<?= $e->ministerio_publico_nro_caso ?>"/>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">  Proceso en jusgado Nro de caso o Nombres</label>
                            <input type="text" class="form-control" name="proceso_jusgado_de_caso_nombres" id="proceso_jusgado_de_caso_nombres"  value="<?= $e->proceso_jusgado_de_caso_nombres ?>"/>
                        </div>


                        <div class="form-group supfrm">
                            <label for="curpwd">  Observaciones:</label>
                            <textarea  class="form-control" name="observaciones"  id="observaciones" height="64px" style="margin: 0px; height: 64px;"><?= $e->observaciones ?> </textarea>
                        </div>

                        <br/>
                        <button type="submit" class="btn btn-primary">Guardar Datos </button>
                        <?php echo form_close(); ?>
                        <?php echo form_open('dna/registro_dna'); ?>
                        <button type="submit" class="btn btn-default" >Cancelar</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>



            </div>






            <div class="box-footer">




            </div>












        </div>   <!-- /.row -->
        <br/>


    </section>
    <!--------------Footer--------------->

</body></html>










