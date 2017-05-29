<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <style>
            .fondo {
                background-image: url(<?php echo base_url() ?>assets/logos/tv1.png);
                background-repeat: no-repeat; 
                background-position-x: 120px;
            }
        </style>
        <style type="text/css">
            body{
                background: #f8f8f8;
                text-align: center;
            }
            #sidebar{
                position: absolute;
                width: 18%;
                height: 590px;
                background: #F0F1E7;
                color: #fff;
                margin-left: 80%;
                margin-top: -600px;
                border: 5px solid #fff;
            }
            ul{
                padding: 0;
                text-align: justify;		
            }

            li{
                cursor: pointer;
                border-top: 1px solid #fff;
                // background: #c3c3c3; 
                list-style: none;
                color: #111
            }
            li:hover{
                background: #fefefe;
            }
        </style>
        <script type="text/javascript">
            function datos_marker(lat, lng, marker)
            {
                var mi_marker = new google.maps.LatLng(lat, lng);

                map.panTo(mi_marker);
                google.maps.event.trigger(marker, 'click');
            }
        </script>




        <style type="text/css">
            a, a:link, a:visited {
                color: #444;
                text-decoration: none;
            }
            a:hover {
                color: #000;
            }
            .left {
                float: left;
            }
            #menu {
                width: 20%;
            }
            #g_render {
                width: 80%;
            }
            li {
                margin-bottom: 1em;

            }
        </style>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.4");
        </script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.maphilight.min.js"></script>
        <script type="text/javascript">$(function () {
                $('.map').maphilight();
            });</script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
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

        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
            }

            #clock {
                position: relative;
                width: 300px;
                height: 300px;
                margin: 20px auto 0 auto;
                background: url(../assets/images/clockface.png);
                list-style: none;
            }

            #sec, #min, #hour {
                position: absolute;
                width: 15px;
                height: 300px;
                top: 0px;
                left: 144px;
            }

            #sec {
                background: url(../assets/images/sechand.png);
                z-index: 3;
            }

            #min {
                background: url(../assets/images/minhand.png);
                z-index: 2;
            }

            #hour {
                background: url(../assets/images/hourhand.png);
                z-index: 1;
            }

            p {
                text-align: center; 
                padding: 10px 0 0 0;
            }
            .rojo {
                color: #F00;
            }
        </style>

        <script type="text/javascript">

            $(document).ready(function () {

                setInterval(function () {
                    var seconds = new Date().getSeconds();
                    var sdegree = seconds * 6;
                    var srotate = "rotate(" + sdegree + "deg)";

                    $("#sec").css({"-moz-transform": srotate, "-webkit-transform": srotate});

                }, 1000);

                setInterval(function () {
                    var hours = new Date().getHours();
                    var mins = new Date().getMinutes();
                    var hdegree = hours * 30 + (mins / 2);
                    var hrotate = "rotate(" + hdegree + "deg)";

                    $("#hour").css({"-moz-transform": hrotate, "-webkit-transform": hrotate});

                }, 1000);


                setInterval(function () {
                    var mins = new Date().getMinutes();
                    var mdegree = mins * 6;
                    var mrotate = "rotate(" + mdegree + "deg)";

                    $("#min").css({"-moz-transform": mrotate, "-webkit-transform": mrotate});

                }, 1000);

            });

        </script>
    </head>
    <body  onload="reloj()">
        <table width="1600" height="800" border="4" align="center">
            <tr>

                <td width="800" height="400" class="">  
                    <div style="color:black; font-family: verdana, arial; font-size:30px; padding:15px;" id ="displayReloj" >   </div>
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


                            </td>
                            <td width="769" class="">
                                <div class="row">
                                    <div class="col-md-2">
                                        <table width="195" border="1" align="center">
                                            <tr>
                                                <td colspan="2" bgcolor="#CCCCCC"><strong>OPERATIVOS POR MES</strong></td>
                                            </tr>

                                            <tr>
                                                <td width="100" bgcolor="#CCCCCC"><strong>MES</strong></td>
                                                <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
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
                                    <div class="col-md-4">
                                        graficoa
                                    </div>
                                </div>


                            </td>
                            </tr>
                            <tr>
                                <td height="400" class="">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <table border="1">
                                                <tr>
                                                    <td colspan="2" bgcolor="#CCCCCC"><strong>OPERATIVOS POR DISTRITOS</strong></td>
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
                                        <div class="col-md-4">
                                            GRAFICOS
                                        </div>
                                    </div>

                                </td>
                                <td class="">&nbsp;</td>
                            </tr>
                            </table>
                            </body>
                            </html>