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
        $total22 = $this->cim_model->defensoria($id);
        ?>
        <?php foreach ($total22 as $filas) :
            ?> 
        <?php endforeach; ?> 
     <!---   <a class="btn btn-primary" href="javascript:imprSelec('muestra')">Imprimir</a> -->
        <div id="muestra">
            <section class="content-header">

                <ol class="breadcrumb">
                    <table width="1000" border="0">
                        <tr>
                            <td width="257" align="center"><h2>GOBIERNO MUNICIPAL </h2>
                                <h2>Defensoria de la Ninez y Adolescencia</h2></td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="14" align="center"><h2>GOBIERNO MUNICIPAL </h2>
                                <h2>Defensoria de la Ninez y Adolescencia</h2></td>
                        </tr>
                        <tr>
                            <td width="179" rowspan="3" align="center"><h1>SID</h1>
                                <p>Sistema de Informacion de Defensorias</p></td>
                            <td colspan="10" rowspan="3" align="center"><h2>Registro de Atencion y/o Denuncia</h2>
                                <p>(Establecido en el Reglamento del </p>
                                <p>Codigo de Nino, Nina y Adolecente - Art.88)</p></td>
                            <td width="257">Fecha: <?php echo $filas->fecha; ?></td>
                        </tr>
                        <tr>
                            <td>Codigo DNA: <?php echo $filas->codigo_dna; ?></td>
                        </tr>
                        <tr>
                            <td>Nro Atencion: <?php echo $filas->nro_atencion; ?></td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td width="257" align="left">EL FORMULARIO DEBE SER LLENADO SEGUN LA GUIA DE FUNCIONAMIENTO DE DEFENSORIAS PROCURE REGISTRAR LOS DATOS DE LA FORMA MAS LEGIBLE POSIBLE. EN CASO DE NO CONTAR CON ALGUNO, MARQUE CON UNA RAYA</td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="13"><strong>1.</strong> <strong>DATOS GENERALES - TIPOLOGIA (PROBLEMATICA)</strong></td>
                        </tr>
                        <tr>
                            <td width="498"><p>Principal: <?php echo $filas->nombre_tipologia_primaria; ?>" 
                                </p>
                                <p>Secundaria: <?php echo $filas->nombre_tipologia_secundaria; ?></p></td>
                            <td width="110">Llenar al final de la atencion</td>
                            <td width="370" colspan="8">Las Tipologias deben definirse de acuerdo al Clasificador o Guia del Funcionamiento de Defensorias </td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="16"><strong>2. DATOS DEL NIÑO, NIÑA ADOLESCENTE </strong>(incluir solo a ninos, ninas y adolescentes cuyos derechos son protegidos o definidos por la DNA)</td>
                        </tr>
                        <tr>
                            <td width="19" rowspan="2">N</td>
                            <td width="205" colspan="2" rowspan="2">Nombres y Apellidos (Si se trata de gestantes, colocar NN y el nombre de la madre)</td>
                            <td colspan="2" align="center">Gestante</td>
                            <td colspan="2" align="center">Edad</td>
                            <td colspan="3" align="center">Sexo</td>
                            <td colspan="2" align="center">C. Nac.</td>
                            <td colspan="2" align="center">Estudia</td>
                            <td width="136" rowspan="2">Ultimo curso</td>
                            <td width="180" rowspan="2">Tipo de trabajo</td>
                        </tr>
                        <tr>
                            <td width="43" align="center">SI</td>
                            <td width="40" align="center">NO</td>
                            <td width="42" align="center">Ano</td>
                            <td width="46" align="center">Mes</td>
                            <td width="24" align="center">M</td>
                            <td width="22" align="center">F</td>
                            <td width="22" align="center">ADV</td>
                            <td width="24" align="center">SI</td>
                            <td width="46" align="center">NO</td>
                            <td width="52" align="center">SI </td>
                            <td width="48" align="center">NO</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td colspan="2"><?php echo $filas->nombre_apellidos_1; ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_1 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_1 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edada1 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edada1;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edadm1 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edadm1;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo1 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo1 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo1 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na1 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na1 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia1 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia1 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php echo $filas->grado_instruccion_1; ?></td>
                            <td><?php
                                if ($filas->tipo_trabajo_2 == '') {
                                    echo '';
                                } else if ($filas->tipo_trabajo_2 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->tipo_trabajo_2;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td colspan="2"><?php echo $filas->nombre_apellidos_2; ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_2 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_2 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edada2 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edada2;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edadm2 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edadm2;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo2 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo2 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo2 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na2 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na2 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia2 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia2 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php echo $filas->grado_instruccion_2; ?></td>
                            <td><?php
                                if ($filas->tipo_trabajo_2 == '') {
                                    echo '';
                                } else if ($filas->tipo_trabajo_2 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->tipo_trabajo_2;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td colspan="2"><?php echo $filas->nombre_apellidos_3; ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_3 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_3 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edada3 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edada3;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edadm3 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edadm3;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo3 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo3 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo3 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na3 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na3 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia3 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia3 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php echo $filas->grado_instruccion_3; ?></td>
                            <td><?php
                                if ($filas->tipo_trabajo_3 == '') {
                                    echo '';
                                } else if ($filas->tipo_trabajo_3 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->tipo_trabajo_3;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td colspan="2"><?php echo $filas->nombre_apellidos_4; ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_4 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->gestante_4 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edada4 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edada4;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->edadm4 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->edadm4;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo4 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo4 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->sexo4 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na4 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->c_na4 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia4 == 'si') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->estudia3 == 'no') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php echo $filas->grado_instruccion_4; ?></td>
                            <td><?php
                                if ($filas->tipo_trabajo_4 == '') {
                                    echo '';
                                } else if ($filas->tipo_trabajo_4 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->tipo_trabajo_4;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td colspan="12">Domicilio: <?php echo $filas->domicilio; ?></td>
                            <td colspan="4">Telefono: <?php echo $filas->telefono; ?></td>
                        </tr>
                        <tr>
                            <td colspan="12">Distrito: Distrito <?php echo $filas->distrito; ?></td>
                            <td colspan="4">Zona: <?php echo $filas->nombre_zona; ?></td>
                        </tr>
                        <tr>
                            <td colspan="12">Otra Direccion (Escuela, trabajo, algun familiar): <?php echo $filas->domicilio2; ?></td>
                            <td colspan="4">Telefono: <?php echo $filas->telefono2; ?></td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="11"><strong>3. DATOS DEL GRUPO FAMILIAR</strong></td>
                        </tr>
                        <tr>
                            <td rowspan="2">N</td>
                            <td width="205" colspan="2" rowspan="2" align="center">Nombres y Apellidos</td>
                            <td width="83" colspan="2" rowspan="2" align="center">Parentesco</td>
                            <td width="182" rowspan="2" align="center">Edad</td>
                            <td width="146" colspan="3" align="center">Sexo</td>
                            <td rowspan="2" align="center">Grado Instruccion</td>
                            <td rowspan="2" align="center">Ocupacion</td>
                        </tr>
                        <tr>
                            <td align="center">M</td>
                            <td align="center">F</td>
                            <td align="center">ADV</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td colspan="2"><?php echo $filas->fam_nombre_apellidos_1; ?></td>
                            <td colspan="2"><?php echo $filas->parentesco_1; ?></td>
                            <td><?php
                                if ($filas->fam_edad_1 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->fam_edad_1;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo1 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo1 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo1 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_grado_instruccion_1 == '') {
                                    echo '';
                                } else if ($filas->fam_grado_instruccion_1 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_grado_instruccion_1;
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_ocupacion_1 == '') {
                                    echo '';
                                } else if ($filas->fam_ocupacion_1 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_ocupacion_1;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td colspan="2"><?php echo $filas->fam_nombre_apellidos_2; ?></td>
                            <td colspan="2"><?php echo $filas->parentesco_2; ?></td>
                            <td><?php
                                if ($filas->fam_edad_2 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->fam_edad_2;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo2 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo2 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo2 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_grado_instruccion_2 == '') {
                                    echo '';
                                } else if ($filas->fam_grado_instruccion_2 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_grado_instruccion_2;
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_ocupacion_2 == '') {
                                    echo '';
                                } else if ($filas->fam_ocupacion_2 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_ocupacion_2;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td colspan="2"><?php echo $filas->fam_nombre_apellidos_3; ?></td>
                            <td colspan="2"><?php echo $filas->parentesco_3; ?></td>
                            <td><?php
                                if ($filas->fam_edad_3 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->fam_edad_3;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo3 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo3 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo3 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_grado_instruccion_3 == '') {
                                    echo '';
                                } else if ($filas->fam_grado_instruccion_3 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_grado_instruccion_3;
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_ocupacion_3 == '') {
                                    echo '';
                                } else if ($filas->fam_ocupacion_3 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_ocupacion_3;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td colspan="2"><?php echo $filas->fam_nombre_apellidos_4; ?></td>
                            <td colspan="2"><?php echo $filas->parentesco_4; ?></td>
                            <td><?php
                                if ($filas->fam_edad_4 == 0) {
                                    echo '';
                                } else {
                                    echo $filas->fam_edad_4;
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo4 == 'masculino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo4 == 'femenino') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td align="center"><?php
                                if ($filas->fam_sexo4 == 'advientre') {
                                    echo 'X';
                                } else {
                                    
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_grado_instruccion_4 == '') {
                                    echo '';
                                } else if ($filas->fam_grado_instruccion_4 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_grado_instruccion_4;
                                }
                                ?></td>
                            <td><?php
                                if ($filas->fam_ocupacion_4 == '') {
                                    echo '';
                                } else if ($filas->fam_ocupacion_4 == '0') {
                                   echo '';
                                } else {
                                     echo $filas->fam_ocupacion_4;
                                }
                                ?></td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="2"><strong>4. DATOS DEL DENUNCIANTE</strong> (Especificar la institucion si corresponde)</td>
                            <td width="177">ANONIMO <?php
                                if ($filas->anonimo == 'anonimo') {
                                    echo '<input name="anonimo3" type="checkbox" id="anonimo4" value="" checked="CHECKED">';
                                } else {
                                    echo '<input name="anonimo3" type="checkbox" id="anonimo4" value="" >';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="419">Nombre y Apellidos: <?php echo $filas->denunciante_nombre; ?></td>
                            <td colspan="2">Parentesco tipo de relacion o Institucion: <?php echo $filas->denunciante_parentesco; ?></td>
                        </tr>
                        <tr>
                            <td>Domicilio(Zona/ comunidad): <?php echo $filas->denunciante_domicilio; ?></td>
                            <td width="382">Telefono: <?php echo $filas->denunciante_telefono; ?></td>
                            <td>C.I.: <?php echo $filas->denunciante_ci; ?></td>
                        </tr>
                        <tr>
                            <td>Lugar de trabajo: <?php echo $filas->denunciante_lugar_trabajo; ?></td>
                            <td colspan="2">Ocupacion: <?php echo $filas->denunciante_ocupacion; ?></td>
                        </tr>
                    </table>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="13"><strong>5. DATOS DE LA(S) PERSONA(S) DENUNCIADA(S) </strong>(No llenar si se trata de Adolescentes en conflicto con la ley)</td>
                            <td width="182">SE DESCONOCE

                                <?php
                                if ($filas->se_desconoce == 'se_desconoce') {
                                    echo '<input name="anonimo2" type="checkbox" id="anonimo5" value="1" checked="CHECKED">';
                                } else {
                                    echo '<input name="anonimo2" type="checkbox" id="anonimo5" value="1" >';
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td width="414">Nombre y Apellidos: <?php echo $filas->denunciado_nombre; ?></td>
                            <td colspan="13">Parentesco tipo de relacion o Institucion: <?php echo $filas->denunciado_parentesco; ?></td>
                        </tr>
                        <tr>
                            <td>Domicilio (zona/comunidad): <?php echo $filas->denunciado_domicilio; ?></td>
                            <td width="311">Sexo: <?php echo $filas->denunciado_sexo; ?></td>
                            <td colspan="12">Telefono: <?php echo $filas->denunciado_telefono; ?></td>
                        </tr>
                        <tr>
                            <td>Lugar de Trabajo: <?php echo $filas->denunciado_lugar_trabajo; ?></td>
                            <td>Edad: <?php echo $filas->denunciado_edad; ?></td>
                            <td colspan="12">Ocupacion: <?php echo $filas->denunciado_ocupacion; ?></td>
                        </tr>
                        <tr>
                            <td colspan="14">Denuncias anteriores? SI<span class="form-group supfrm">

                                    <?php
                                    if ($filas->denuncias_anteriores == 'si') {
                                        echo '<input name="denuncias_anteriores" type="radio" id="RadioGroup1_2" value="1" checked=>';
                                    } else {
                                        echo '<input name="denuncias_anteriores" type="radio" id="RadioGroup1_2" value="1" ';
                                    }
                                    ?>

                                </span> NO<span class="form-group supfrm">
                                    <?php
                                    if ($filas->denuncias_anteriores == 'no') {
                                        echo '<input name="denuncias_anteriores" type="radio" id="RadioGroup1_2" value="1" checked=>';
                                    } else {
                                        echo '<input name="denuncias_anteriores" type="radio" id="RadioGroup1_2" value="1" ';
                                    }
                                    ?>
                                </span> Donde Fue denunciado anteriormente?: <?php echo $filas->anteriormente; ?></td>
                        </tr>
                    </table>
                     <p>&nbsp;</p>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="14"><strong>6. DESCRIPCION DE LA DENUNCIA</strong> (Llegar con letra clara - imprenta)</td>
                        </tr>
                        <tr>
                            <td colspan="14"><p><?php echo $filas->anteriormente; ?></p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                 <p>&nbsp;</p>
                                  <p>&nbsp;</p>
                                <p>&nbsp;</p></td>
                        </tr>
                        <tr>
                            <td colspan="14">Durante la denuncia el nino, nina o adolescente manifesto su opinion? SI <span class="form-group supfrm">
                                    <?php
                                    if ($filas->opinion == 'si') {
                                        echo '<input name="opinion" type="radio" id="RadioGroup1_2" value="1" checked=>';
                                    } else {
                                        echo '<input name="opinion" type="radio" id="RadioGroup1_2" value="1" ';
                                    }
                                    ?>
                                </span>NO<span class="form-group supfrm">
                                    <?php
                                    if ($filas->opinion == 'no') {
                                        echo '<input name="opinion" type="radio" id="RadioGroup1_2" value="1" checked=>';
                                    } else {
                                        echo '<input name="opinion" type="radio" id="RadioGroup1_2" value="1" ';
                                    }
                                    ?>
                                </span></td>
                        </tr>
                    </table>
                     <p>&nbsp;</p>
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="14"><strong>7. DINAMICA FAMILIAR E HISTORICA INDIVIDUAL DEL NINO, NINA O ADOLESCENTE</strong></td>
                        </tr>
                        <tr>
                            <td colspan="14"><p><?php echo $filas->dinamica; ?></p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p></td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                 
                    <table width="1000" border="1">
                        <tr>
                            <td colspan="14"><strong>8. ACCIONES INMEDIATAS A SEGUIR</strong> (Sugeridas por el personal que percibe el caso/denuncia)</td>
                        </tr>
                        <tr>
                            <td colspan="14"><p><?php echo $filas->acciones; ?></p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p></td>
                        </tr>
                    </table>

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










