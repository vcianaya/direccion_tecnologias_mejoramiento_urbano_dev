<head>
    <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1.4.4");
    </script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
    <style>
        .rcorners1 {
            //  border-radius: 25px;
            border-color: #000000;
            padding: 20px; 
            border:1px solid black;
            height: 430px;

        }
    </style>
    <style type="text/css">
        .centrear {
            text-align: justify;
        }
        h5{
            font-family:  Arial, Helvetica, sans-serif;

            line-height: 1.5;
        }
        h6{
            font-family:  Arial, Helvetica, sans-serif;
            font-size:18px;
            line-height: 1.5;
        }
        table {
            width:90%;
            border-top:3px solid #002a80;
            border-right:3px solid #003399;
            margin:1em auto;
            border-collapse:collapse;
        }
        td {
            color:#3f3f3f;
            border-bottom:2px solid #002a80;
            border-left:2px solid #002a80;
            //    padding:.3em 1em;
            background: #e8edff; 
            text-align:center;
        }
        tr:hover td { background: #d0dafd; color: #339; }
        th {        background: #b9c9fe;
                    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }
        </style>
        <script type="text/javascript">

        function reloj() {
            var hoy = new Date();
            var h = hoy.getHours();
            var m = hoy.getMinutes();
            var s = hoy.getSeconds();
            m = actualizarHora(m);
            s = actualizarHora(s);
            document.getElementById('displayReloj').innerHTML = h + ":" + m + ":" + s;
            var t = setTimeout(function () {
                reloj()
            }, 500);
        }

        function actualizarHora(i) {
            if (i < 10) {
                i = "0" + i
            }
            ;  // Añadir el cero en números menores de 10
            return i;
        }
        </script>
        <style>
       .fond{
background: rgba(172,195,215,1);
background: -moz-linear-gradient(45deg, rgba(172,195,215,1) 0%, rgba(155,180,207,0.26) 43%, rgba(149,175,204,0) 58%, rgba(131,161,195,0) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(172,195,215,1)), color-stop(43%, rgba(155,180,207,0.26)), color-stop(58%, rgba(149,175,204,0)), color-stop(100%, rgba(131,161,195,0)));
background: -webkit-linear-gradient(45deg, rgba(172,195,215,1) 0%, rgba(155,180,207,0.26) 43%, rgba(149,175,204,0) 58%, rgba(131,161,195,0) 100%);
background: -o-linear-gradient(45deg, rgba(172,195,215,1) 0%, rgba(155,180,207,0.26) 43%, rgba(149,175,204,0) 58%, rgba(131,161,195,0) 100%);
background: -ms-linear-gradient(45deg, rgba(172,195,215,1) 0%, rgba(155,180,207,0.26) 43%, rgba(149,175,204,0) 58%, rgba(131,161,195,0) 100%);
background: linear-gradient(45deg, rgba(172,195,215,1) 0%, rgba(155,180,207,0.26) 43%, rgba(149,175,204,0) 58%, rgba(131,161,195,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#acc3d7', endColorstr='#83a1c3', GradientType=1 );


        </style>
    </head>

    <body  onload="reloj()"></body>
    <div class="container-fluid">
    <div class="row" >
        <div class="col-md-6 rcorners1"  >

            <?php echo '<h2> Numero de operativos registrados en la gestion 2017: <strong style="color:red; font-family: verdana, arial; font-size:30px; padding:15px;" > ' . $tipTotal = $this->intendencia_model->mumero_casos_registrados_intendencia() . '</strong>  Operativos</h2>'; ?>
            <?php
            foreach ($fecha as $f):

            endforeach;
            ?> 
            <h3><strong>FECHA DEL ULTIMO VACIADO DE OPERATIVOS AL SISTEMA:</strong> <span class="rojo"><?php echo $f->fecha_ultimo; ?></span></p>
                <?php
                foreach ($fecha_decomisos as $fe):

                endforeach;
                ?>
                <h3><strong>FECHA DEL ULTIMO VACIADO DE DECOMISOS AL SISTEMA: </strong><span class="rojo"><?php echo $fe->fecha_ultimo; ?></span></p>
                    <div style="font-style:normal ; font-family: verdana, arial; font-size:80px; padding:45px;" id ="displayReloj" >   </div>

                    </div>
                    <div class="col-md-6 rcorners1" >
                        <div class="row" >
                            <div class="col-md-3">
                                <table width="195" border="1" align="center">
                                    <tr>
                                        <th colspan="2" align="center" valign="middle" bgcolor="#B9C9FE"><strong>OPERATIVOS POR MES</strong></th>
                                    </tr>

                                    <tr>
                                        <td width="100" bgcolor="#B9C9FE"><strong>MES</strong></td>
                                        <td width="79" bgcolor="#B9C9FE"><strong>CANTIDAD</strong></td>
                                    </tr>
                                    <tr>
                                        <td>ENERO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(1); ?></td>
                                    </tr>
                                    <tr>
                                        <td>FEBRERO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>MARZO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(3); ?></td>
                                    </tr>
                                    <tr>
                                        <td>ABRIL </td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(4); ?></td>
                                    </tr>
                                    <tr>
                                        <td>MAYO </td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(5); ?></td>
                                    </tr>
                                    <tr>
                                        <td>JUNIO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(6); ?></td>
                                    </tr>
                                    <tr>
                                        <td>JULIO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(7); ?></td>
                                    </tr>
                                    <tr>
                                        <td>AGOSTO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(8); ?></td>
                                    </tr>
                                    <tr>
                                        <td>SEPTIEMBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(9); ?></td>
                                    </tr>
                                    <tr>
                                        <td>OCTUBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(10); ?></td>
                                    </tr>
                                    <tr>
                                        <td>NOVIEMBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(11); ?></td>
                                    </tr>
                                    <tr>
                                        <td>DICIEMBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(12); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-9">

                                <?php if (isset($charts2)) echo $charts2; ?>
                                <?php if (isset($json)): ?>
                                    <?php
                                endif;
                                if (isset($array)):
                                    ?>
                                <?php endif; ?>

                            </div>                
                        </div>
                    </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 rcorners1">
                            <div class="row">
                                <div class="col-md-3">
                                    <table border="1">
                                        <tr>
                                            <th colspan="2" align="center" bgcolor="#CCCCCC"><strong>OPERATIVOS POR DISTRITOS</strong></th>
                                        </tr>
                                        <tr>
                                            <td width="152" bgcolor="#CCCCCC"><strong>DISTRITOS  </strong></td>
                                            <td width="139" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                                        </tr>
                                        <tr>
                                            <td>D1</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(1); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D2</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(2); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D3</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(3); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D4</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(4); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D5</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(5); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D6</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(6); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D7</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(7); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D8</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(8); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D9</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(9); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D10</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(10); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D11</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(11); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D12</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(12); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D13</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(13); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D14</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(14); ?></span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-9">

                                    <?php if (isset($charts3)) echo $charts3; ?>
                                    <?php if (isset($json)): ?>
                                        <?php
                                    endif;
                                    if (isset($array)):
                                        ?>
                                    <?php endif; ?>

                                </div>                
                            </div>
                        </div>
                        <div class="col-md-6 rcorners1">
                            <div class="row">
                                <div class="col-md-4">
                                    <table width="286"  border="1" align="center">
                                        <tr>
                                            <th colspan="2" bgcolor="#CCCCCC"><strong>TIPO DE OPERATIVOS</strong></th>
                                        </tr>
                                        <tr>
                                            <td width="184" bgcolor="#CCCCCC"><strong>NOMBRE DEL TIPO DE OPERATIVO</strong></td>
                                            <td width="86" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                                        </tr>
                                        <tr>
                                            <td>BARES, DISCOTECAS Y CANTINAS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>EXPENDIO Y VENTA DE ALIMENTOS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(6); ?></td>
                                        </tr>
                                        <tr>
                                            <td>GRANJAS, CRIADEROS Y FABRICAS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(5); ?></td>
                                        </tr>
                                        <tr>
                                            <td>HOTELES, MOTELES Y ALOJAMIENTOS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(8); ?></td>
                                        </tr>
                                        <tr>
                                            <td>MATADEROS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(9); ?></td>
                                        </tr>
                                        <tr>
                                            <td>HORNO PANIFICADORA</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(10); ?></td>
                                        </tr>
                                        <tr>
                                            <td>ASENTAMIENTOS EN VIAS PUBLICAS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(11); ?></td>
                                        </tr>
                                        <tr>
                                            <td>LENOCINIO</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(12); ?></td>
                                        </tr>
                                        <tr>
                                            <td>PUESTOS DE VENTA</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(13); ?></td>
                                        </tr>
                                        <tr>
                                            <td>INTERNET</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(14); ?></td>
                                        </tr>
                                        <tr>
                                            <td>OTROS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(15); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-8">

                                    <?php if (isset($charts4)) echo $charts4; ?>
                                    <?php if (isset($json)): ?>
                                        <?php
                                    endif;
                                    if (isset($array)):
                                        ?>
                                    <?php endif; ?>

                                </div>          
                            </div>
                        </div>

                    </div>
                    </div>