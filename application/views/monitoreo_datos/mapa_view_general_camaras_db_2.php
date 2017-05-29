<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

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
        <?php
        // $self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
        //  header("refresh:10; url=$self");
        ?>



        <div class="col-md-11">
            <?php echo '<h2> Numero de operativos registrados en la gestion 2017: <srtong style="color:red; font-family: verdana, arial; font-size:30px; padding:15px;" > ' . $tipTotal = $this->intendencia_model->mumero_casos_registrados_intendencia() . '</srtong>  Operativos</h2>'; ?>
        </div>
        <div style="color:black; font-family: verdana, arial; font-size:30px; padding:15px;" id ="displayReloj" >   </div>


        <section>
            <div class="col-md-2">
                <strong>OPERATIVOS POR MES            </strong>
                <table width="195" border="1" align="center">
                    <tr>
                        <td width="100" bgcolor="#CCCCCC"><strong>MES</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                    </tr>

                    <tr>
                        <td>ENERO</td>
                        <td class="rojo"> <?php echo $this->intendencia_model->mumero_casos_registrados_mes(1); ?></td>
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

                <p>&nbsp;</p>
                <?php
                foreach ($fecha as $f):

                endforeach;
                ?>
                <p>FECHA DEL ULTIMO VACIADO DE OPERATIVOS AL SISTEMA: <span class="rojo"><?php echo $f->fecha_ultimo; ?></span></p>
            </div>
            <div class="col-md-2">
                <strong>OPERATIVOS POR DISTRITOS </strong>
                <table width="160" border="1">
                    <tr>
                        <td width="17" bgcolor="#CCCCCC"><strong>D.</strong></td>
                        <td width="46" bgcolor="#CCCCCC"><strong>CANT.</strong></td>
                        <td width="25" bgcolor="#CCCCCC"><strong>D.</strong></td>
                        <td width="103" bgcolor="#CCCCCC"><strong>CANT.</strong></td>
                    </tr>
                    <tr>
                        <td>D1</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(1); ?></span></td>
                        <td>D8</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(8); ?></span></td>
                    </tr>
                    <tr>
                        <td>D2</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(2); ?></span></td>
                        <td>D9</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(9); ?></span></td>
                    </tr>
                    <tr>
                        <td>D3</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(3); ?></span></td>
                        <td>D10</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(10); ?></span></td>
                    </tr>
                    <tr>
                        <td>D4</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(4); ?></span></td>
                        <td>D11</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(11); ?></span></td>
                    </tr>
                    <tr>
                        <td>D5</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(5); ?></span></td>
                        <td>D12</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(12); ?></span></td>
                    </tr>
                    <tr>
                        <td>D6</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(6); ?></span></td>
                        <td>D13</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(13); ?></span></td>
                    </tr>
                    <tr>
                        <td>D7</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(7); ?></span></td>
                        <td>D14</td>
                        <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(14); ?></span></td>
                    </tr>
                </table>

            </div>     
            <div class="col-md-4"><strong>TIPO DE OPERATIVOS
                </strong>
                <table width="373" border="1" align="center">
                    <tr>
                        <td width="278" bgcolor="#CCCCCC"><strong>NOMBRE DEL TIPO DE OPERATIVO</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
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
            <div class="col-md-4">


            </div>


        </section>

        <section>
            <div class="col-md-2">
                <?php
                foreach ($fecha_decomisos as $fe):

                endforeach;
                ?>
                <p>FECHA DEL ULTIMO VACIADO DE DECOMISOS AL SISTEMA: <span class="rojo"><?php echo $fe->fecha_ultimo; ?></span></p>
            </div>
            <div class="col-md-4">
                <strong>DECOMISOS POR ITEM          </strong>
                <table width="400" border="1" align="center">
                    <tr>
                        <td width="100" bgcolor="#CCCCCC"><strong>NOMBRE DEL ITEM</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                    </tr>

                    <tr>
                        <td>ALIMENTOS PERECEDEROS (AP)</td>
                        <td class="rojo"> <?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(1); ?></td>
                    </tr>
                    <tr>
                        <td>ALIMENTOS NO PERECEDEROS (ANP)</td>
                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(2); ?></td>
                    </tr>
                    <tr>
                        <td>BEBIDAS ALCOHOLICAS (BA)</td>
                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(3); ?></td>
                    </tr>
                    <tr>
                        <td>BEBIDAS ANALCOLICAS (BNA) </td>
                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(4); ?></td>
                    </tr>
                    <tr>
                        <td>BIENES Y MUEBLES (BM) </td>
                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(5); ?></td>
                    </tr>
                    <tr>
                        <td>EQUIPOS ELECTRONICOS (EE)</td>
                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(6); ?></td>
                    </tr>
                    <tr>
                        <td>MATERIALES Y OTROS</td>
                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(7); ?></td>
                    </tr>
                    <tr>
                        <td>ANULADO</td>
                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativo_item(8); ?></td>
                    </tr>

                </table>

            </div>
            <div class="col-md-3">
                <strong>DECOMISOS POR ITEM (CANTIDADES)      </strong>
                <table width="400" border="1" align="center">
                    <tr>
                        <td width="100" bgcolor="#CCCCCC"><strong>POR CANTIDA DEL ITEM</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                    </tr>

                    <tr>
                        <td>ALIMENTOS PERECEDEROS (AP)</td>
                        <td class="rojo"> <?php
                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=1");
                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                echo $row["total"];
                ?></td>
                    </tr>
                    <tr>
                        <td>ALIMENTOS NO PERECEDEROS (ANP)</td>
                        <td class="rojo"><?php
                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=2");
                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                echo $row["total"];
                ?></td>
                    </tr>
                    <tr>
                        <td>BEBIDAS ALCOHOLICAS (BA)</td>
                        <td class="rojo"><?php
                            $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=3");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?></td>
                    </tr>
                    <tr>
                        <td>BEBIDAS ANALCOLICAS (BNA) </td>
                        <td class="rojo"><?php
                            $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=4");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?></td>
                    </tr>
                    <tr>
                        <td>BIENES Y MUEBLES (BM) </td>
                        <td class="rojo"><?php
                            $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=5");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?></td>
                    </tr>
                    <tr>
                        <td>EQUIPOS ELECTRONICOS (EE)</td>
                        <td class="rojo"><?php
                            $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=6");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?></td>
                    </tr>
                    <tr>
                        <td>MATERIALES Y OTROS</td>
                        <td class="rojo"><?php
                            $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=7");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?></td>
                    </tr>
                    <tr>
                        <td>ANULADO</td>
                        <td class="rojo"><?php
                            $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=8");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?></td>
                    </tr>

                </table>

            </div>


        </section>

        <div class="col-md-12">
            <h4  style="color:gainsboro; font-family: verdana, arial; ">SISTEMA DESARROLLADO POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO</h4>
            <p> <img src="<?php echo base_url() ?>assets/logos/dtmu.png" alt="..." width="280px"></p>
        </div>

    </body>
</html>