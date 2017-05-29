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
                        <td>  <li class="h4"> <a href="<?php echo base_url2() ?>editor/lista_modulos" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / <strong style="color: #E13300">(REGISTRAR)</strong>  FORMULARIO DEFENSORIA DE LA NIÑEZ Y ADOLECENCIA</li></td>
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
        <?php echo form_open('dna/guardar_dna'); ?>

        <section class="content ">
            <div class="board col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <!-- left column -->

                <div class="col-md-4 ">


                    <div class="nufon">
                        <h4><strong>DATOS GENERALES - TIPOLOGIA (PROBLEMATICA)</strong></h4>

                        <div class="form-group supfrm">
                            <label for="curpwd">Fecha </label>
                            <input type="date" id="fecha" class="form-control" name="fecha" placeholder="Fecha">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Codigo DNA </label>
                            <input type="text" id="codigo_dna" class="form-control" name="codigo_dna" placeholder="Codigo DNA ">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Nro Atencion </label>
                            <input type="text" id="nro_atencion" class="form-control" name="nro_atencion" placeholder="Nro Atencion">
                        </div>

                        <div class="form-group celfrm opt2">
                            <label for="curpwd" >Seleccione Tipologia Principal:</label>
                            <select name="provincias2" id="provincias2" class="form-control" required="true">
                                <option value="">Seleccione Tipologia Principal</option>

                                <?php foreach ($tipologia_principal as $p) { ?>
                                    <option value="<?= $p->id ?>"><?= $p->nombre_tipologia_primaria ?></option>
                                <?php } ?>	
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tipologia Secundaria</label>

                            <?php echo form_dropdown('poblaciones2', array('@' => 'Seleccione Tipologia Secundaria'), 'Seleccione Tipologia Secundaria', 'id="poblaciones2" class="form-control" required="true"'); ?>
                        </div>




                    </div>

                    <div class="nufon">
                        <h4><strong>DATOS DEL NIÑO, NIÑA ADOLESCENTE (DIRECCION)</strong></h4>

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
                            <label for="curpwd">Domicilio </label>
                            <input type="text" id="domicilio" class="form-control" name="domicilio" placeholder="Domicilio">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Procedencia </label>
                            <select name="procedencia" id="procedencia" class="form-control">
                                <option value="0">SELECCIONE...</option>
                                <option value="URBANO">URBANO</option>
                                <option value="RURAL">RURAL</option>
                            </select>
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Telefono </label>
                            <input type="number" id="telefono" class="form-control" name="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group supfrm">
                            <label for="curpwd">Otra direccion </label>
                            <input type="text" id="domicilio2" class="form-control" name="domicilio2" placeholder="Domicilio">
                        </div>

                        <div class="form-group supfrm">
                            <label for="curpwd">Otro Telefono </label>
                            <input type="number" id="telefono2" class="form-control" name="telefono2" placeholder="Telefono">
                        </div>



                    </div>
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

                        <?php echo $map['html'];
                        ?>
                    </div>








                </div>

                <div class="col-md-8">
                    <div class="nufon">
                        <h4><strong>DATOS DEL NIÑO, NIÑA ADOLESCENTE</strong></h4>

                        <div class="form-group supfrm">
                            <table  border="1">
                                <tr>
                                    <td width="26" rowspan="2"><strong>Nro</strong></td>
                                    <td width="162" rowspan="2"><strong>Nombres y Apellidos</strong></td>
                                    <td colspan="2" align="center"><strong>Gestante</strong></td>
                                    <td colspan="2" align="center"><strong>Edad</strong></td>
                                    <td colspan="3" align="center"><strong>Sexo</strong></td>
                                    <td colspan="2" align="center"><strong>C.Nac.</strong></td>
                                    <td colspan="2" align="center"><strong>Estudia</strong></td>
                                    <td width="70" rowspan="2" align="center"><strong>Ultimo curso</strong></td>
                                    <td width="68" rowspan="2" align="center"><strong>Tipo de Trabajo</strong></td>
                                </tr>
                                <tr>
                                    <td width="15" align="center"><strong>SI</strong></td>
                                    <td width="24" align="center"><strong>NO</strong></td>
                                    <td width="35" align="center"><strong>ANO</strong></td>
                                    <td width="35" align="center"><strong>MES</strong></td>
                                    <td width="17" align="center"><strong>M</strong></td>
                                    <td width="7" align="center"><strong>F</strong></td>
                                    <td width="7" align="center"><strong>ADV</strong></td>
                                    <td width="17" align="center"><strong>SI</strong></td>
                                    <td width="24" align="center"><strong>NO</strong></td>
                                    <td width="17" align="center"><strong>SI</strong></td>
                                    <td width="24" align="center"><strong>NO</strong></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <input type="text" id="nombre_apellidos_1" class="form-control" name="nombre_apellidos_1" placeholder="Nombres y apellidos">
                                    </td>
                                    <td align="center"><input type="radio" name="gestante_1" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="gestante_1" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"> <input type="text" id="edada1" class="form-control" name="edada1" placeholder="Anos"></td>
                                    <td align="center"> <input type="text" id="edadm1" class="form-control" name="edadm1" placeholder="Meses"></td>
                                    <td align="center"><input type="radio" name="sexo1" value="masculino" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="sexo1" value="femenino" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="sexo1" value="advientre" id="RadioGroup1_4"></td>
                                    <td align="center"><input type="radio" name="c_na1" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="c_na1" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="estudia1" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="estudia1" value="no" id="RadioGroup1_1"></td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="grado_instruccion_1" id="grado_instruccion_1" class="form-control">
                                                <option value="">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="tipo_trabajo_1" id="tipo_trabajo_1" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <input type="text" id="nombre_apellidos_2" class="form-control" name="nombre_apellidos_2" placeholder="Nombres y apellidos">
                                    </td>
                                    <td align="center"><input type="radio" name="gestante_2" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="gestante_2" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"> <input type="text" id="edada2" class="form-control" name="edada2" placeholder="Anos"></td>
                                    <td align="center"> <input type="text" id="edadm2" class="form-control" name="edadm2" placeholder="Meses"></td>
                                    <td align="center"><input type="radio" name="sexo2" value="masculino" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="sexo2" value="femenino" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="sexo2" value="advientre" id="RadioGroup1_5"></td>
                                    <td align="center"><input type="radio" name="c_na2" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="c_na2" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="estudia2" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="estudia2" value="no" id="RadioGroup1_1"></td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="grado_instruccion_2" id="grado_instruccion_2" class="form-control">
                                                <option value="">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="tipo_trabajo_2" id="tipo_trabajo_2" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <input type="text" id="nombre_apellidos_3" class="form-control" name="nombre_apellidos_3" placeholder="Nombres y apellidos">
                                    </td>
                                    <td align="center"><input  type="radio" name="gestante_3" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="gestante_3" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"> <input type="text" id="edada3" class="form-control" name="edada3" placeholder="Anos"></td>
                                    <td align="center"> <input type="text" id="edadm3" class="form-control" name="edadm3" placeholder="Meses"></td>
                                    <td align="center"><input type="radio" name="sexo3" value="masculino" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="sexo3" value="femenino" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="sexo3" value="advientre" id="RadioGroup1_6"></td>
                                    <td align="center"><input type="radio" name="c_na3" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="c_na3" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="estudia3" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="estudia3" value="no" id="RadioGroup1_1"></td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="grado_instruccion_3" id="grado_instruccion_3" class="form-control">
                                                <option value="">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="tipo_trabajo_3" id="tipo_trabajo_3" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <input type="text" id="nombre_apellidos_4" class="form-control" name="nombre_apellidos_4" placeholder="Nombres y apellidos">
                                    </td>
                                    <td align="center"><input type="radio" name="gestante_4" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="gestante_4" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"> <input type="text" id="edada4" class="form-control" name="edada4" placeholder="Anos"></td>
                                    <td align="center"> <input type="text" id="edadm4" class="form-control" name="edadm4" placeholder="Meses"></td>
                                    <td align="center"><input type="radio" name="sexo4" value="masculino" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="sexo4" value="femenino" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="sexo4" value="advientre" id="RadioGroup1_7"></td>
                                    <td align="center"><input type="radio" name="c_na4" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="c_na4" value="no" id="RadioGroup1_1"></td>
                                    <td align="center"><input type="radio" name="estudia4" value="si" id="RadioGroup1_0"></td>
                                    <td align="center"><input type="radio" name="estudia4" value="no" id="RadioGroup1_1"></td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="grado_instruccion_4" id="grado_instruccion_4" class="form-control">
                                                <option value="">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <div class="form-group">
                                            <select name="tipo_trabajo_4" id="tipo_trabajo_4" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>



                    </div>

                    <div class="box-body">
                        <div class="nufon">
                            <h4><strong>DATOS DEL GRUPO FAMILIAR</strong></h4>
                            <table  border="1">
                                <tr>
                                    <td width="26" rowspan="2"><strong>Nro</strong></td>
                                    <td width="162" rowspan="2"><strong>Nombres y Apellidos</strong></td>
                                    <td width="35" rowspan="2" align="center"><strong>Parentesco</strong></td>
                                    <td width="35" rowspan="2" align="center"><strong>Edad</strong></td>
                                    <td colspan="3" align="center"><strong>Sexo</strong></td>
                                    <td width="70" rowspan="2" align="center"><strong>Grado Instruccion</strong></td>
                                    <td width="68" rowspan="2" align="center"><strong>Ocupacion</strong></td>
                                </tr>
                                <tr>
                                    <td width="17" align="center"><strong>M</strong></td>
                                    <td width="7" align="center"><strong>F</strong></td>
                                    <td width="7" align="center"><strong>ADV</strong></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><input type="text" id="fam_nombre_apellidos_1" class="form-control" name="fam_nombre_apellidos_1" placeholder="Nombres y apellidos"></td>
                                    <td align="center">
                                        <select name="parentesco_1" id="parentesco_1" class="form-control">
                                            <option value="" selected="selected">SELECCIONE...</option>
                                            <option value="PAPA">PAPA</option>
                                            <option value="MAMA">MAMA</option>
                                            <option value="FAMILIAR">FAMILIAR</option>
                                            <option value="OTROS">OTROS (TERCEROS)</option>
                                        </select>
                                    </td>
                                    <td align="center"><input type="text" id="fam_edad_1" class="form-control" name="fam_edad_1" placeholder="Edad"></td>
                                    <td align="center"><input type="radio" name="fam_sexo1" value="masculino" id="fam_sexo1"></td>
                                    <td align="center"><input type="radio" name="fam_sexo1" value="femenino" id="fam_sexo1"></td>
                                    <td align="center"><input type="radio" name="fam_sexo1" value="advientre" id="fam_sexo1"></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_grado_instruccion_1" id="fam_grado_instruccion_1" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_ocupacion_1" id="fam_ocupacion_1" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><input type="text" id="fam_nombre_apellidos_2" class="form-control" name="fam_nombre_apellidos_2" placeholder="Nombres y apellidos"></td>
                                    <td align="center">
                                        <select name="parentesco_2" id="parentesco_2" class="form-control">
                                            <option value="" selected="selected">SELECCIONE...</option>
                                            <option value="PAPA">PAPA</option>
                                            <option value="MAMA">MAMA</option>
                                            <option value="FAMILIAR">FAMILIAR</option>
                                            <option value="OTROS">OTROS (TERCEROS)</option>
                                        </select>    
                                    </td>
                                    <td align="center"><input type="text" id="fam_edad_2" class="form-control" name="fam_edad_2" placeholder="Edad"></td>
                                    <td align="center"><input type="radio" name="fam_sexo2" value="masculino" id="fam_sexo2"></td>
                                    <td align="center"><input type="radio" name="fam_sexo2" value="femenino" id="fam_sexo2"></td>
                                    <td align="center"><input type="radio" name="fam_sexo2" value="advientre" id="fam_sexo2"></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_grado_instruccion_2" id="fam_grado_instruccion_2" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_ocupacion_2" id="fam_ocupacion_2" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><input type="text" id="fam_nombre_apellidos_3" class="form-control" name="fam_nombre_apellidos_3" placeholder="Nombres y apellidos"></td>
                                    <td align="center">
                                        <select name="parentesco_3" id="parentesco_3" class="form-control">
                                            <option value="" selected="selected">SELECCIONE...</option>
                                            <option value="PAPA">PAPA</option>
                                            <option value="MAMA">MAMA</option>
                                            <option value="FAMILIAR">FAMILIAR</option>
                                            <option value="OTROS">OTROS (TERCEROS)</option>
                                        </select>    
                                    </td>
                                    <td align="center"><input type="text" id="fam_edad_3" class="form-control" name="fam_edad_3" placeholder="Edad"></td>
                                    <td align="center"><input type="radio" name="fam_sexo3" value="masculino" id="fam_sexo3"></td>
                                    <td align="center"><input type="radio" name="fam_sexo3" value="femenino" id="fam_sexo3"></td>
                                    <td align="center"><input type="radio" name="fam_sexo3" value="advientre" id="fam_sexo3"></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_grado_instruccion_3" id="fam_grado_instruccion_3" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_ocupacion_3" id="fam_ocupacion_3" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><input type="text" id="fam_nombre_apellidos_4" class="form-control" name="fam_nombre_apellidos_4" placeholder="Nombres y apellidos"></td>
                                    <td align="center">
                                        <select name="parentesco_4" id="parentesco_4" class="form-control">
                                            <option value="" selected="selected">SELECCIONE...</option>
                                            <option value="PAPA">PAPA</option>
                                            <option value="MAMA">MAMA</option>
                                            <option value="FAMILIAR">FAMILIAR</option>
                                            <option value="OTROS">OTROS (TERCEROS)</option>
                                        </select>
                                    </td>
                                    <td align="center"><input type="text" id="fam_edad_4" class="form-control" name="fam_edad_4" placeholder="Edad"></td>
                                    <td align="center"><input type="radio" name="fam_sexo4" value="masculino" id="fam_sexo4"></td>
                                    <td align="center"><input type="radio" name="fam_sexo4" value="femenino" id="fam_sexo4"></td>
                                    <td align="center"><input type="radio" name="fam_sexo4" value="advientre" id="fam_sexo4"></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_grado_instruccion_4" id="fam_grado_instruccion_4" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="PRIMARIA">PRIMARIA</option>
                                                <option value="SECUNDARIA">SECUNDARIA</option>
                                                <option value="DESERCION ESCOLAR">DESERCION ESCOLAR</option>
                                            </select>
                                        </div></td>
                                    <td align="center"><div class="form-group">
                                            <select name="fam_ocupacion_4" id="fam_ocupacion_4" class="form-control">
                                                <option value="0">SELECCIONE...</option>
                                                <option value="VENDEDOR">VENDEDOR</option>
                                                <option value="AYUDANTES">AYUDANTES</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div></td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                        </div>
                        <div class="nufon">
                            <h4><strong>DATOS DEL DENUNCIANTE</strong> 
                                <strong>→</strong> <strong>ANONIMO</strong> (
                                <input name="anonimo" type="checkbox" id="anonimo" value="anonimo">
                                ) </h4>

                            <div class="form-group supfrm">
                                <label for="curpwd">Nombre y Apellidos </label>
                                <input type="text" id="denunciante_nombre" class="form-control" name="denunciante_nombre" placeholder="Nombre y Apellidos">
                            </div>


                            <div class="form-group supfrm">
                                <label for="curpwd">CI </label>
                                <input type="text" id="denunciante_ci" class="form-control" name="denunciante_ci" placeholder="CI">
                            </div>


                            <div class="form-group supfrm">
                                <label for="curpwd">Domicilio </label>
                                <input type="text" id="denunciante_domicilio" class="form-control" name="denunciante_domicilio" placeholder="Domicilio">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Lugar de trabajo </label>
                                <input type="text" id="denunciante_lugar_trabajo" class="form-control" name="denunciante_lugar_trabajo" placeholder="Lugar de Trabajo">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Telefono </label>
                                <input type="text" id="denunciante_telefono" class="form-control" name="denunciante_telefono" placeholder="Telefono">
                            </div>


                            <div class="form-group">
                                <label for="curpwd">Parentesco tipo de relacion o Institucion </label>
                                <select name="denunciante_parentesco" id="denunciante_parentesco" class="form-control">
                                    <option value="" selected="selected">SELECCIONE...</option>
                                    <option value="PAPA">PAPA</option>
                                    <option value="MAMA">MAMA</option>
                                    <option value="FAMILIAR">FAMILIAR</option>
                                    <option value="OTROS">OTROS (TERCEROS)</option>
                                </select>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Ocupacion </label>
                                <select name="denunciante_ocupacion" id="denunciante_ocupacion" class="form-control">
                                    <option value="">SELECCIONE...</option>
                                    <option value="ASALARIADO">ASALARIADO</option>
                                    <option value="CUENTA PROPIA">CUENTA PROPIA</option>
                                    <option value="OTROS">OTROS</option>
                                </select>
                            </div>





                        </div>

                        <div class="nufon">
                            <h4><strong>DATOS DE LA(S) PERSONA(S) DENUNCIADA(S) </strong><strong>→ SE DESCONOCE</strong> (
                                <input name="se_desconoce" type="checkbox" id="se_desconoce" value="se_desconoce">
                                )</h4>

                            <div class="form-group supfrm">
                                <label for="curpwd">Nombre y Apellidos </label>
                                <input type="text" id="denunciado_nombre" class="form-control" name="denunciado_nombre" placeholder="Nombre y Apellidos">
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Edad </label>
                                <input type="number" id="denunciado_edad" class="form-control" name="denunciado_edad" placeholder="Edad">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Sexo </label> <br>
                                <label for="curpwd">Masculino </label>
                                <input type="radio" name="denunciado_sexo" value="masculino" id="denunciado_sexo">
                                <label for="curpwd">Femenino </label>
                                <input type="radio" name="denunciado_sexo" value="femenino" id="denunciado_sexo">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Domicilio </label>
                                <input type="text" id="denunciado_domicilio" class="form-control" name="denunciado_domicilio" placeholder="Domicilio">
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Lugar de trabajo </label>
                                <input type="text" id="denunciado_lugar_trabajo" class="form-control" name="denunciado_lugar_trabajo" placeholder="Lugar de Trabajo">
                            </div>

                            <div class="form-group">
                                <label for="curpwd">Grado de Instruccion  </label>
                                <select name="denunciado_grado_instruccion" id="denunciado_grado_instruccion" class="form-control">
                                    <option value="0">SELECCIONE...</option>
                                    <option value="NINGUNO">NINGUNO</option>
                                    <option value="PRIMARIA">PRIMARIA</option>
                                    <option value="SECUNDARIA">SECUNDARIA</option>
                                    <option value="TECNICO">TECNICO</option>
                                    <option value="SUPERIOR">SUPERIOR</option>
                                </select>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Telefono </label>
                                <input type="text" id="denunciado_telefono" class="form-control" name="denunciado_telefono" placeholder="Telefono">
                            </div>


                            <div class="form-group">
                                <label for="curpwd">Parentesco tipo de relacion o Institucion </label>
                                <select name="denunciado_parentesco" id="denunciado_parentesco" class="form-control">
                                    <option value="" selected="selected">SELECCIONE...</option>
                                    <option value="PAPA">PAPA</option>
                                    <option value="MAMA">MAMA</option>
                                    <option value="FAMILIAR">FAMILIAR</option>
                                    <option value="OTROS">OTROS (TERCEROS)</option>
                                </select>
                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Ocupacion </label>
                                <select name="denunciado_ocupacion" id="denunciado_ocupacion" class="form-control">
                                    <option value="" selected="selected">SELECCIONE...</option>
                                    <option value="ASALARIADO">ASALARIADO</option>
                                    <option value="CUENTA PROPIA">CUENTA PROPIA</option>
                                    <option value="OTROS">OTROS</option>
                                </select>
                            </div>

                            <div class="form-group celfrm opt2">
                                <label for="curpwd" >Denuncias Anteriores: </label>
                                <select name="denuncias_anteriores" id="denuncias_anteriores" class="form-control" >
                                    <option value="0">SELECCIONE...</option>
                                    <option value="si">SI</option>
                                    <option value="no">NO</option>
                                </select>

                            </div>
                            <div class="form-group supfrm">
                                <label for="curpwd">Donde fue denunciado anteriormente? </label>
                                <input type="text" id="anteriormente" class="form-control" name="anteriormente" placeholder="Donde fue denunciado anteriormente? ">
                            </div>


                        </div>


                        <div class="nufon">
                            <h4><strong>DESCRIPCION DE LA DENUNCIA </strong></h4>

                            <div class="form-group supfrm">

                                <textarea name="descripcion" id="descripcion" class="form-control" placeholder="DESCRIPCION DE LA DENUNCIA"></textarea>
                            </div>

                            <div class="form-group supfrm">
                                <label for="curpwd">Durante la denunica del nino, nina, o adolescente manifesto su opinion?  </label>
                                <label for="curpwd">SI</label>
                                <input type="radio" name="opinion" value="si" id="RadioGroup1_0">
                                <label for="curpwd">NO</label>
                                <input type="radio" name="opinion" value="no" id="RadioGroup1_1">
                            </div>

                        </div>

                        <div class="nufon">
                            <h4><strong>DINAMICA FAMILIAR E HISTORICA INDIVIDUAL DEL NINO, NINA O ADOLESCENTE</strong></h4>

                            <div class="form-group supfrm">

                                <textarea name="dinamica" id="dinamica" class="form-control" placeholder="ACCIONES INMEDIATAS A SEGUIR"></textarea>
                            </div>
                        </div>

                        <div class="nufon">
                            <h4><strong>ACCIONES INMEDIATAS A SEGUIR </strong></h4>

                            <div class="form-group supfrm">

                                <textarea name="acciones" id="acciones" class="form-control" placeholder="ACCIONES INMEDIATAS A SEGUIR"></textarea>
                            </div>

                            <input type="submit" name="submit" id="submit" value="Guardar Formulario" class="btn btn-primary">  

                        </div>

                    </div>

                </div>




                <div class="col-md-3">


                    <!--   <div id='map'></div>
                      <div class='left'>
                          <a id='geojsonLayer' href='#'></a>
                      </div>
                  </div>-->

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
            <div  id="myModalDistrito" class="modal fade"  role="dialog">
                <div class="modal-dialog">
                    <?php echo form_open('dna/guardar_seguimiento'); ?>
                    <div class="modal-content">

                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">×</button>

                            <h4>Llene los siguientes datos : </h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-6">
                                <br>
                                <input type="hidden" name="DNI" id="DNI" value=""/>                         
                                <div class="form-group supfrm">
                                    <label for="curpwd">  Nro</label>
                                    <input type="text" class="form-control" name="nro" id="nro" required placeholder="nro"/>
                                </div>
                                <div class="form-group supfrm">
                                    <label for="curpwd">  Nro caso</label>
                                    <input type="text" class="form-control" name="nro_caso" id="nro_caso" required placeholder="nro_caso"/>
                                </div>

                                <div class="form-group supfrm">
                                    <label for="curpwd">  Nombres Apellidos</label>
                                    <input type="text" class="form-control" name="nombres_apellidos" id="nombres_apellidos"  placeholder="nombres_apellidos"/>
                                </div>
                                <div class="form-group celfrm opt2">
                                    <label for="curpwd">  Estado de Caso</label><BR>
                                    <input type="radio" name="estado_caso" value="nuevo" id="RadioGroup1_2">
                                    Nuevo


                                    <input type="radio" name="estado_caso" value="seguimiento" id="RadioGroup1_3">
                                    Seguimiento
                                    <br>
                                </div>
                                <div class="form-group supfrm">
                                    <label for="curpwd">Sexo </label> <br>

                                    <input type="radio" name="sexo" value="masculino" id="sexo">
                                    <label for="curpwd">Masculino </label><br>
                                    <input type="radio" name="sexo" value="femenino" id="sexo">
                                    <label for="curpwd">Femenino </label><br>
                                    <input type="radio" name="sexo" value="advientre" id="sexo">
                                    <label for="curpwd">Advientre </label>
                                </div>
                                <div class="form-group supfrm">
                                    <label for="curpwd">  Edad</label>
                                    <input type="text" class="form-control" name="edad" id="edad"  placeholder="edad"/>
                                </div>

                                <div class="form-group supfrm">
                                    <label for="curpwd">Acciones por Area </label> <br>
                                    <input type="radio" name="areas" value="1" id="areas">
                                    <label for="curpwd">Area Trabajo Social </label><br>
                                    <input type="radio" name="areas" value="2" id="areas">
                                    <label for="curpwd">Area Psicologica </label><br>
                                    <input type="radio" name="areas" value="3" id="areas">
                                    <label for="curpwd">Area Legal </label>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <br>

                                <div class="form-group supfrm">
                                    <label for="curpwd">  Acciones del area de trabajo social (Ultima accion)</label>
                                    <input type="text" class="form-control" name="acciones_trabajo_social" id="acciones_trabajo_social" placeholder="acciones_trabajo_social"/>
                                </div>

                                <div class="form-group supfrm">
                                    <label for="curpwd"> Acciones del area psicologica (Ultima accion)</label>
                                    <input type="text" class="form-control" name="acciones_area_psicologica" id="acciones_area_psicologica"  placeholder="acciones_area_psicologica"/>
                                </div>
                                <div class="form-group supfrm">
                                    <label for="curpwd"> Acciones del area psicologica (Ultima accion)</label>
                                    <input type="text" class="form-control" name="acciones_area_legal" id="acciones_area_legal"  placeholder="acciones_area_legal"/>
                                </div>
                                <div class="form-group supfrm">
                                    <label for="curpwd">  Ministerio publico nro caso</label>
                                    <input type="text" class="form-control" name="ministerio_publico_nro_caso" id="ministerio_publico_nro_caso"  placeholder="ministerio_publico_nro_caso"/>
                                </div>
                                <div class="form-group supfrm">
                                    <label for="curpwd">  Proceso en jusgado Nro de caso o Nombres</label>
                                    <input type="text" class="form-control" name="proceso_jusgado_de_caso_nombres" id="proceso_jusgado_de_caso_nombres"  placeholder="proceso_jusgado_de_caso_nombres"/>
                                </div>

                                <div class="form-group supfrm">
                                    <label for="curpwd">  Observaciones:</label>
                                    <textarea  class="form-control" name="observaciones" id="observaciones" > </textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" >Registrar</button>                            
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>





                        </div>
                        <div class="modal-footer">

                        </div>

                    </div>
                    <?php echo form_close(); ?>

                </div>
            </div>

        </section>

    </body></html>










