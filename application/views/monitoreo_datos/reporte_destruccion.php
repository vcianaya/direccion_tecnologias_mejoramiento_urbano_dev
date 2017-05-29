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
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.4");
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
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
        </style>
    </head>
    <body  >
        <section>
            <div style="color:black; font-family: verdana, arial; font-size:30px; padding:15px;" id ="displayReloj" ></div>
            <script type="text/javascript">

            /**
             
             * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
             
             * Suma los valores de los cuadros de texto
             
             */

            function sumar()

            {

                var valor1 = verificar("cantidad_ap");

                var valor2 = verificar("destruccion_ap");

                var valor3 = verificar("devolucion_ap");

                var valor4 = verificar("donacion_ap");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ap").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }


            function sumar2()

            {

                var valor1 = verificar("cantidad_anp");

                var valor2 = verificar("destruccion_anp");

                var valor3 = verificar("devolucion_anp");

                var valor4 = verificar("donacion_anp");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anp").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar3()

            {

                var valor1 = verificar("cantidad_ba");

                var valor2 = verificar("destruccion_ba");

                var valor3 = verificar("devolucion_ba");

                var valor4 = verificar("donacion_ba");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ba").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar4()

            {

                var valor1 = verificar("cantidad_bna");

                var valor2 = verificar("destruccion_bna");

                var valor3 = verificar("devolucion_bna");

                var valor4 = verificar("donacion_bna");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bna").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar5()

            {

                var valor1 = verificar("cantidad_bm");

                var valor2 = verificar("destruccion_bm");

                var valor3 = verificar("devolucion_bm");

                var valor4 = verificar("donacion_bm");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bm").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar6()

            {

                var valor1 = verificar("cantidad_ee");

                var valor2 = verificar("destruccion_ee");

                var valor3 = verificar("devolucion_ee");

                var valor4 = verificar("donacion_ee");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ee").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar7()

            {

                var valor1 = verificar("cantidad_mo");

                var valor2 = verificar("destruccion_mo");

                var valor3 = verificar("devolucion_mo");

                var valor4 = verificar("donacion_mo");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_mo").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar8()

            {

                var valor1 = verificar("cantidad_anulado");

                var valor2 = verificar("destruccion_anulado");

                var valor3 = verificar("devolucion_anulado");

                var valor4 = verificar("donacion_anulado");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anulado").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar9()

            {

                var valor1 = verificar("cantidad_ap2");

                var valor2 = verificar("destruccion_ap2");

                var valor3 = verificar("devolucion_ap2");

                var valor4 = verificar("donacion_ap2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ap2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar10()

            {

                var valor1 = verificar("cantidad_anp2");

                var valor2 = verificar("destruccion_anp2");

                var valor3 = verificar("devolucion_anp2");

                var valor4 = verificar("donacion_anp2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anp2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar11()

            {

                var valor1 = verificar("cantidad_ba2");

                var valor2 = verificar("destruccion_ba2");

                var valor3 = verificar("devolucion_ba2");

                var valor4 = verificar("donacion_ba2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ba2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar12()

            {

                var valor1 = verificar("cantidad_bna2");

                var valor2 = verificar("destruccion_bna2");

                var valor3 = verificar("devolucion_bna2");

                var valor4 = verificar("donacion_bna2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bna2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar13()

            {

                var valor1 = verificar("cantidad_bm2");

                var valor2 = verificar("destruccion_bm2");

                var valor3 = verificar("devolucion_bm2");

                var valor4 = verificar("donacion_bm2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bm2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar14()

            {

                var valor1 = verificar("cantidad_ee2");

                var valor2 = verificar("destruccion_ee2");

                var valor3 = verificar("devolucion_ee2");

                var valor4 = verificar("donacion_ee2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ee2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar15()

            {

                var valor1 = verificar("cantidad_mo2");

                var valor2 = verificar("destruccion_mo2");

                var valor3 = verificar("devolucion_mo2");

                var valor4 = verificar("donacion_mo2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_mo2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar16()

            {

                var valor1 = verificar("cantidad_anulado2");

                var valor2 = verificar("destruccion_anulado2");

                var valor3 = verificar("devolucion_anulado2");

                var valor4 = verificar("donacion_anulado2");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anulado2").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar17()

            {

                var valor1 = verificar("cantidad_ap3");

                var valor2 = verificar("destruccion_ap3");

                var valor3 = verificar("devolucion_ap3");

                var valor4 = verificar("donacion_ap3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ap3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar18()

            {

                var valor1 = verificar("cantidad_anp3");

                var valor2 = verificar("destruccion_anp3");

                var valor3 = verificar("devolucion_anp3");

                var valor4 = verificar("donacion_anp3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anp3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar19()

            {

                var valor1 = verificar("cantidad_ba3");

                var valor2 = verificar("destruccion_ba3");

                var valor3 = verificar("devolucion_ba3");

                var valor4 = verificar("donacion_ba3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ba3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar20()

            {

                var valor1 = verificar("cantidad_bna3");

                var valor2 = verificar("destruccion_bna3");

                var valor3 = verificar("devolucion_bna3");

                var valor4 = verificar("donacion_bna3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bna3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar21()

            {

                var valor1 = verificar("cantidad_bm3");

                var valor2 = verificar("destruccion_bm3");

                var valor3 = verificar("devolucion_bm3");

                var valor4 = verificar("donacion_bm3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bm3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar22()

            {

                var valor1 = verificar("cantidad_ee3");

                var valor2 = verificar("destruccion_ee3");

                var valor3 = verificar("devolucion_ee3");

                var valor4 = verificar("donacion_ee3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ee3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar23()

            {

                var valor1 = verificar("cantidad_mo3");

                var valor2 = verificar("destruccion_mo3");

                var valor3 = verificar("devolucion_mo3");

                var valor4 = verificar("donacion_mo3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_mo3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar24()

            {

                var valor1 = verificar("cantidad_anulado3");

                var valor2 = verificar("destruccion_anulado3");

                var valor3 = verificar("devolucion_anulado3");

                var valor4 = verificar("donacion_anulado3");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anulado3").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar25()

            {

                var valor1 = verificar("cantidad_ap4");

                var valor2 = verificar("destruccion_ap4");

                var valor3 = verificar("devolucion_ap4");

                var valor4 = verificar("donacion_ap4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ap4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }


            function sumar26()

            {

                var valor1 = verificar("cantidad_anp4");

                var valor2 = verificar("destruccion_anp4");

                var valor3 = verificar("devolucion_anp4");

                var valor4 = verificar("donacion_anp4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anp4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar27()

            {

                var valor1 = verificar("cantidad_ba4");

                var valor2 = verificar("destruccion_ba4");

                var valor3 = verificar("devolucion_ba4");

                var valor4 = verificar("donacion_ba4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ba4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            function sumar28()

            {

                var valor1 = verificar("cantidad_bna4");

                var valor2 = verificar("destruccion_bna4");

                var valor3 = verificar("devolucion_bna4");

                var valor4 = verificar("donacion_bna4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bna4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar29()

            {

                var valor1 = verificar("cantidad_bm4");

                var valor2 = verificar("destruccion_bm4");

                var valor3 = verificar("devolucion_bm4");

                var valor4 = verificar("donacion_bm4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_bm4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar30()

            {

                var valor1 = verificar("cantidad_ee4");

                var valor2 = verificar("destruccion_ee4");

                var valor3 = verificar("devolucion_ee4");

                var valor4 = verificar("donacion_ee4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_ee4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar31()

            {

                var valor1 = verificar("cantidad_mo4");

                var valor2 = verificar("destruccion_mo4");

                var valor3 = verificar("devolucion_mo4");

                var valor4 = verificar("donacion_mo4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_mo4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }

            function sumar32()

            {

                var valor1 = verificar("cantidad_anulado4");

                var valor2 = verificar("destruccion_anulado4");

                var valor3 = verificar("devolucion_anulado4");

                var valor4 = verificar("donacion_anulado4");

                // realizamos la suma de los valores y los ponemos en la casilla del

                // formulario que contiene el total

                document.getElementById("total_anulado4").value = parseFloat(valor1) - parseFloat(valor2) - parseFloat(valor3) - parseFloat(valor4);

            }
            /**
             
             * Funcion para verificar los valores de los cuadros de texto. Si no es un
             
             * valor numerico, cambia de color el borde del cuadro de texto
             
             */

            function verificar(id)

            {

                var obj = document.getElementById(id);

                if (obj.value == "")
                    value = "0";

                else
                    value = obj.value;

                if (validate_importe(value, 1))

                {

                    // marcamos como erroneo

                    obj.style.borderColor = "#808080";

                    return value;

                } else {

                    // marcamos como erroneo

                    obj.style.borderColor = "#f00";

                    return 0;

                }

            }



            /**
             
             * Funcion para validar el importe
             
             * Tiene que recibir:
             
             *  El valor del importe (Ej. document.formName.operator)
             
             *  Determina si permite o no decimales [1-si|0-no]
             
             * Devuelve:
             
             *  true-Todo correcto
             
             *  false-Incorrecto
             
             */

            function validate_importe(value, decimal)

            {

                if (decimal == undefined)
                    decimal = 0;



                if (decimal == 1)

                {

                    // Permite decimales tanto por . como por ,

                    var patron = new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");

                } else {

                    // Numero entero normal

                    var patron = new RegExp("^([0-9])*$")

                }



                if (value && value.search(patron) == 0)

                {

                    return true;

                }

                return false;

            }

            </script>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <table width="400" border="1" align="center">
                        <tr>
                            <td colspan="7" align="center" bgcolor="#CCCCCC"><strong>DECOMISOS POR ITEM EN CANTIDADES</strong></td>
                        </tr>

                        <tr>
                            <td width="100" bgcolor="#CCCCCC"><strong> ITEM</strong></td>
                            <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                            <td width="79" bgcolor="#CCCCCC"><strong>DESTRUCCION</strong></td>
                            <td width="79" bgcolor="#CCCCCC"><strong>DEVOLUCION</strong></td>
                            <td width="79" bgcolor="#CCCCCC"><strong>DONACION</strong></td>
                            <td width="79" bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
                            <td width="79" bgcolor="#CCCCCC"><strong>EDITAR</strong></td>
                        </tr>
                        <tr>
                            <td><strong>ALIMENTOS PERECEDEROS (AP)</strong></td>
                            <?php echo form_open('intendencia/guardar_inventario'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id10" onkeyup="sumar();" value="1" readonly>
                                <input name="cantidad_ap" type="text" id="cantidad_ap" onkeyup="sumar();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=1");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_ap" id="destruccion_ap" onkeyup="sumar();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 0,1");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_ap"  id="devolucion_ap" onkeyup="sumar();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 0,1");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_ap"  id="donacion_ap" onkeyup="sumar();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 0,1");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_ap" type="text" id="total_ap" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 0,1");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td ><input type="submit" name="submit9" id="submit16" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>ALIMENTOS NO PERECEDEROS (ANP)</strong></td>
                            <?php echo form_open('intendencia/guardar_inventario_anp'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id9" onkeyup="sumar();" value="2" readonly>
                                <input name="cantidad_anp" type="text" id="cantidad_anp" onkeyup="sumar2();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_anp" id="destruccion_anp" onkeyup="sumar2();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 1,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_anp"  id="devolucion_anp" onkeyup="sumar2();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 1,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_anp"  id="donacion_anp" onkeyup="sumar2();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 1,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_anp" type="text" id="total_anp" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 1,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="submit" name="submit9" id="submit15" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>BEBIDAS ALCOHOLICAS (BA)</strong></td>
                            <?php echo form_open('intendencia/guardar_inventario_ba'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id8" onkeyup="sumar();" value="3" readonly>
                                <input name="cantidad_ba" type="text" id="cantidad_ba" onkeyup="sumar3();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=3");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_ba" id="destruccion_ba" onkeyup="sumar3();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 2,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_ba"  id="devolucion_ba" onkeyup="sumar3();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 2,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_ba"  id="donacion_ba" onkeyup="sumar3();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 2,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_ba" type="text" id="total_ba" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 2,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="submit" name="submit9" id="submit14" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>BEBIDAS ANALCOLICAS (BNA) </strong></td>
                            <?php echo form_open('intendencia/guardar_inventario_bna'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id7" onkeyup="sumar();" value="4" readonly>
                                <input name="cantidad_bna" type="text" id="cantidad_bna" onkeyup="sumar4();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=4");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_bna" id="destruccion_bna" onkeyup="sumar4();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 3,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_bna"  id="devolucion_bna" onkeyup="sumar4();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 3,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_bna"  id="donacion_bna" onkeyup="sumar4();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 3,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_bna" type="text" id="total_bna" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 3,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="submit" name="submit9" id="submit13" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                        <tr>
                            <td height="44"><strong>BIENES Y MUEBLES (BM) </strong></td>
                            <?php echo form_open('intendencia/guardar_inventario_bm'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id6" onkeyup="sumar();" value="5" readonly>
                                <input name="cantidad_bm" type="text" id="cantidad_bm" onkeyup="sumar5();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=5");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_bm" id="destruccion_bm" onkeyup="sumar5();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 4,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_bm"  id="devolucion_bm" onkeyup="sumar5();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 4,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_bm"  id="donacion_bm" onkeyup="sumar5();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 4,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_bm" type="text" id="total_bm" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 4,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="submit" name="submit9" id="submit12" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>EQUIPOS ELECTRONICOS (EE)</strong></td>
                            <?php echo form_open('intendencia/guardar_inventario_ee'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id5" onkeyup="sumar();" value="6" readonly>
                                <input name="cantidad_ee" type="text" id="cantidad_ee" onkeyup="sumar6();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=6");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_ee" id="destruccion_ee" onkeyup="sumar6();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 5,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_ee"  id="devolucion_ee" onkeyup="sumar6();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 5,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_ee"  id="donacion_ee" onkeyup="sumar6();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 5,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_ee" type="text" id="total_ee" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 5,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="submit" name="submit9" id="submit11" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>MATERIALES Y OTROS</strong></td>
                            <?php echo form_open('intendencia/guardar_inventario_mo'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id4" onkeyup="sumar();" value="7" readonly>
                                <input name="cantidad_mo" type="text" id="cantidad_mo" onkeyup="sumar7();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=7");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_mo" id="destruccion_mo" onkeyup="sumar7();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 6,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_mo"  id="devolucion_mo" onkeyup="sumar7();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 6,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_mo"  id="donacion_mo" onkeyup="sumar7();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 6,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_mo" type="text" id="total_mo" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 6,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="submit" name="submit9" id="submit10" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>ANULADO</strong></td>
                            <?php echo form_open('intendencia/guardar_inventario_anulado'); ?>
                            <td class="rojo"><input name="id" type="hidden" id="id3" onkeyup="sumar();" value="8" readonly>
                                <input name="cantidad_anulado" type="text" id="cantidad_anulado" onkeyup="sumar8();" value="<?php
                                $result = mysql_query("SELECT SUM(cantidad) as total FROM decomiso WHERE item=8");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="text" name="destruccion_anulado" id="destruccion_anulado" onkeyup="sumar8();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 7,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["destruccion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="devolucion_anulado"  id="devolucion_anulado" onkeyup="sumar8();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 7,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["devolucion"];
                                ?>"></td>
                            <td class="rojo"><input type="text" name="donacion_anulado"  id="donacion_anulado" onkeyup="sumar8();" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 7,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["donacion"];
                                ?>"></td>
                            <td class="rojo"><input name="total_anulado" type="text" id="total_anulado" value="<?php
                                $result = mysql_query("SELECT * FROM inventario_decomiso  LIMIT 7,2");
                                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                echo $row["total"];
                                ?>" readonly></td>
                            <td class="rojo"><input type="submit" name="submit9" id="submit9" value="GUARDAR" class="btn btn-primary">
                                <?php echo form_close(); ?></td>
                        </tr>
                    </table>

                </div>
            </div>
            <p>&nbsp;</p>
        </section>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <table width="400" border="1" align="center">
                    <tr>
                        <td colspan="7" align="center" bgcolor="#CCCCCC"><strong>DECOMISOS POR ITEM EN CANTIDADES FEBRERO</strong></td>
                    </tr>
                    <tr>
                        <td width="100" bgcolor="#CCCCCC"><strong> ITEM</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DESTRUCCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DEVOLUCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DONACION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>EDITAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS PERECEDEROS (AP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="9" readonly>
                            <input name="cantidad_ap2" type="text" id="cantidad_ap2" onkeyup="sumar9();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=1");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ap2" id="destruccion_ap2" onkeyup="sumar9();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 9");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ap2"  id="devolucion_ap2" onkeyup="sumar9();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 9");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ap2"  id="donacion_ap2" onkeyup="sumar9();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 9");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ap2" type="text" id="total_ap2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 9");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td ><input type="submit" name="submit2" id="submit17" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS NO PERECEDEROS (ANP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anp2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="10" readonly>
                            <input name="cantidad_anp2" type="text" id="cantidad_anp2" onkeyup="sumar10();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=2");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anp2" id="destruccion_anp2" onkeyup="sumar10();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 10");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anp2"  id="devolucion_anp2" onkeyup="sumar10();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 10");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anp2"  id="donacion_anp2" onkeyup="sumar10();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 10");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anp2" type="text" id="total_anp2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 10");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit2" id="submit18" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ALCOHOLICAS (BA)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ba2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id17" onkeyup="sumar();" value="11" readonly>
                            <input name="cantidad_ba2" type="text" id="cantidad_ba2" onkeyup="sumar11();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=3");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ba2" id="destruccion_ba2" onkeyup="sumar11();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 11");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ba2"  id="devolucion_ba2" onkeyup="sumar11();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 11");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ba2"  id="donacion_ba2" onkeyup="sumar11();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 11");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ba2" type="text" id="total_ba2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 11");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit2" id="submit19" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ANALCOLICAS (BNA) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bna2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id18" onkeyup="sumar();" value="12" readonly>
                            <input name="cantidad_bna2" type="text" id="cantidad_bna2" onkeyup="sumar12();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=4");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bna2" id="destruccion_bna2" onkeyup="sumar12();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 12");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bna2"  id="devolucion_bna2" onkeyup="sumar12();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 12");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bna2"  id="donacion_bna2" onkeyup="sumar12();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 12");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bna2" type="text" id="total_bna2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 12");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit2" id="submit20" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td height="44"><strong>BIENES Y MUEBLES (BM) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bm2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id19" onkeyup="sumar();" value="13" readonly>
                            <input name="cantidad_bm2" type="text" id="cantidad_bm2" onkeyup="sumar5();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=5");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bm2" id="destruccion_bm2" onkeyup="sumar13();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 13");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bm2"  id="devolucion_bm2" onkeyup="sumar13();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 13");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bm2"  id="donacion_bm2" onkeyup="sumar13();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 13");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bm2" type="text" id="total_bm2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 13");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit2" id="submit21" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>EQUIPOS ELECTRONICOS (EE)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ee2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id20" onkeyup="sumar();" value="14" readonly>
                            <input name="cantidad_ee2" type="text" id="cantidad_ee2" onkeyup="sumar6();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=6");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ee2" id="destruccion_ee2" onkeyup="sumar14();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 14");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ee2"  id="devolucion_ee2" onkeyup="sumar14();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 14");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ee2"  id="donacion_ee2" onkeyup="sumar14();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 14");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ee2" type="text" id="total_ee2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 14");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit2" id="submit22" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>MATERIALES Y OTROS</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_mo2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id21" onkeyup="sumar();" value="15" readonly>
                            <input name="cantidad_mo2" type="text" id="cantidad_mo2" onkeyup="sumar7();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=7");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_mo2" id="destruccion_mo2" onkeyup="sumar15();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 15");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_mo2"  id="devolucion_mo2" onkeyup="sumar15();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 15");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_mo2"  id="donacion_mo2" onkeyup="sumar15();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 15");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_mo2" type="text" id="total_mo2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 15");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit2" id="submit23" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ANULADO</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anulado2'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id22" onkeyup="sumar();" value="16" readonly>
                            <input name="cantidad_anulado2" type="text" id="cantidad_anulado2" onkeyup="sumar8();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.item=8");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anulado2" id="destruccion_anulado2" onkeyup="sumar16();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 16");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anulado2"  id="devolucion_anulado2" onkeyup="sumar16();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 16");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anulado2"  id="donacion_anulado2" onkeyup="sumar16();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 16");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anulado2" type="text" id="total_anulado2" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 16");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit2" id="submit24" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                </table>
                <table width="400" border="1" align="center">
                    <tr>
                        <td colspan="7" align="center" bgcolor="#CCCCCC"><strong>DECOMISOS POR ITEM EN CANTIDADES MARZO</strong></td>
                    </tr>
                    <tr>
                        <td width="100" bgcolor="#CCCCCC"><strong>ITEM</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DESTRUCCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DEVOLUCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DONACION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>EDITAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS PERECEDEROS (AP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="17" readonly>
                            <input name="cantidad_ap3" type="text" id="cantidad_ap3" onkeyup="sumar9();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.item=1");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ap3" id="destruccion_ap3" onkeyup="sumar17();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 17");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ap3"  id="devolucion_ap3" onkeyup="sumar17();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 17");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ap3"  id="donacion_ap3" onkeyup="sumar17();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 17");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ap3" type="text" id="total_ap3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 17");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td ><input type="submit" name="submit" id="submit" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS NO PERECEDEROS (ANP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anp3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="18" readonly>
                            <input name="cantidad_anp3" type="text" id="cantidad_anp3" onkeyup="sumar10();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.item=2");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anp3" id="destruccion_anp3" onkeyup="sumar18();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 18");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anp3"  id="devolucion_anp3" onkeyup="sumar18();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 18");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anp3"  id="donacion_anp3" onkeyup="sumar18();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 18");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anp3" type="text" id="total_anp3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 18");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit" id="submit2" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ALCOHOLICAS (BA)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ba3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id11" onkeyup="sumar();" value="19" readonly>
                            <input name="cantidad_ba3" type="text" id="cantidad_ba3" onkeyup="sumar11();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes =3 and  decomiso.item=3");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ba3" id="destruccion_ba3" onkeyup="sumar19();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 19");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ba3"  id="devolucion_ba3" onkeyup="sumar19();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 19");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ba3"  id="donacion_ba3" onkeyup="sumar19();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 19");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ba3" type="text" id="total_ba3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 19");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit" id="submit3" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ANALCOLICAS (BNA) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bna3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id12" onkeyup="sumar();" value="20" readonly>
                            <input name="cantidad_bna3" type="text" id="cantidad_bna3" onkeyup="sumar12();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.item=4");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bna3" id="destruccion_bna3" onkeyup="sumar20();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 20");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bna3"  id="devolucion_bna3" onkeyup="sumar20();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 20");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bna3"  id="donacion_bna3" onkeyup="sumar20();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 20");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bna3" type="text" id="total_bna3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 20");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit" id="submit4" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td height="44"><strong>BIENES Y MUEBLES (BM) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bm3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id13" onkeyup="sumar();" value="21" readonly>
                            <input name="cantidad_bm3" type="text" id="cantidad_bm3" onkeyup="sumar5();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.item=5");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bm3" id="destruccion_bm3" onkeyup="sumar21();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 21");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bm3"  id="devolucion_bm3" onkeyup="sumar21();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 21");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bm3"  id="donacion_bm3" onkeyup="sumar21();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 21");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bm3" type="text" id="total_bm3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 21");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit" id="submit5" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>EQUIPOS ELECTRONICOS (EE)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ee3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id14" onkeyup="sumar();" value="22" readonly>
                            <input name="cantidad_ee3" type="text" id="cantidad_ee3" onkeyup="sumar6();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.item=6");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ee3" id="destruccion_ee3" onkeyup="sumar22();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 22");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ee3"  id="devolucion_ee3" onkeyup="sumar22();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 22");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ee3"  id="donacion_ee3" onkeyup="sumar22();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 22");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ee3" type="text" id="total_ee3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 22");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit" id="submit6" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>MATERIALES Y OTROS</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_mo3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id15" onkeyup="sumar();" value="23" readonly>
                            <input name="cantidad_mo3" type="text" id="cantidad_mo3" onkeyup="sumar7();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.item=7");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_mo3" id="destruccion_mo3" onkeyup="sumar23();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 23");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_mo3"  id="devolucion_mo3" onkeyup="suma23();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 23");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_mo3"  id="donacion_mo3" onkeyup="sumar23();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 23");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_mo3" type="text" id="total_mo3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 23");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit" id="submit7" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ANULADO</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anulado3'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id16" onkeyup="sumar();" value="24" readonly>
                            <input name="cantidad_anulado3" type="text" id="cantidad_anulado3" onkeyup="sumar8();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.item=8");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anulado3" id="destruccion_anulado3" onkeyup="sumar24();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 24");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anulado3"  id="devolucion_anulado3" onkeyup="sumar24();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 24");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anulado3"  id="donacion_anulado3" onkeyup="sumar24();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 24");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anulado3" type="text" id="total_anulado3" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 24");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit" id="submit8" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                </table>
                <table width="400" border="1" align="center">
                    <tr>
                        <td colspan="7" align="center" bgcolor="#CCCCCC"><strong>DECOMISOS POR ITEM EN CANTIDADES ABRIL</strong></td>
                    </tr>
                    <tr>
                        <td width="100" bgcolor="#CCCCCC"><strong>ITEM</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DESTRUCCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DEVOLUCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DONACION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>EDITAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS PERECEDEROS (AP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="25" readonly>
                            <input name="cantidad_ap4" type="text" id="cantidad_ap4" onkeyup="sumar9();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=1");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ap4" id="destruccion_ap4" onkeyup="sumar25();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 25");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ap4"  id="devolucion_ap4" onkeyup="sumar25();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 25");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ap4"  id="donacion_ap4" onkeyup="sumar25();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 25");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ap4" type="text" id="total_ap4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 25");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td ><input type="submit" name="submit3" id="submit25" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS NO PERECEDEROS (ANP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anp4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="26" readonly>
                            <input name="cantidad_anp4" type="text" id="cantidad_anp4" onkeyup="sumar10();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=2");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anp4" id="destruccion_anp4" onkeyup="sumar26();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 26");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anp4"  id="devolucion_anp4" onkeyup="sumar26();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 26");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anp4"  id="donacion_anp4" onkeyup="sumar26();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 26");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anp4" type="text" id="total_anp4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 26");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit3" id="submit26" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ALCOHOLICAS (BA)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ba4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="27" onkeyup="sumar();" value="27" readonly>
                            <input name="cantidad_ba4" type="text" id="cantidad_ba4" onkeyup="sumar11();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=3");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ba4" id="destruccion_ba4" onkeyup="sumar27();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 27");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ba4"  id="devolucion_ba4" onkeyup="sumar27();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 27");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ba4"  id="donacion_ba4" onkeyup="sumar27();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 27");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ba4" type="text" id="total_ba4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 27");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit3" id="submit27" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ANALCOLICAS (BNA) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bna4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="28" onkeyup="sumar();" value="28" readonly>
                            <input name="cantidad_bna4" type="text" id="cantidad_bna4" onkeyup="sumar12();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=4");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bna4" id="destruccion_bna4" onkeyup="sumar28();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 28");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bna4"  id="devolucion_bna4" onkeyup="sumar28();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 28");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bna4"  id="donacion_bna4" onkeyup="sumar28();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 28");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bna4" type="text" id="total_bna4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 28");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit3" id="submit28" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td height="44"><strong>BIENES Y MUEBLES (BM) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bm4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="29" onkeyup="sumar();" value="29" readonly>
                            <input name="cantidad_bm4" type="text" id="cantidad_bm4" onkeyup="sumar5();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=5");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bm4" id="destruccion_bm4" onkeyup="sumar29();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 29");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bm4"  id="devolucion_bm4" onkeyup="sumar29();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 29");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bm4"  id="donacion_bm4" onkeyup="sumar29();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 29");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bm4" type="text" id="total_bm4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 29");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit3" id="submit29" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>EQUIPOS ELECTRONICOS (EE)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ee4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="30" onkeyup="sumar();" value="30" readonly>
                            <input name="cantidad_ee4" type="text" id="cantidad_ee4" onkeyup="sumar6();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=6");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ee4" id="destruccion_ee4" onkeyup="sumar30();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 30");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ee4"  id="devolucion_ee4" onkeyup="sumar30();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 30");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ee4"  id="donacion_ee4" onkeyup="sumar30();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 30");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ee4" type="text" id="total_ee4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 30");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit3" id="submit30" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>MATERIALES Y OTROS</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_mo4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="31" onkeyup="sumar();" value="31" readonly>
                            <input name="cantidad_mo4" type="text" id="cantidad_mo4" onkeyup="sumar7();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=7");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_mo4" id="destruccion_mo4" onkeyup="sumar31();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 31");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_mo4"  id="devolucion_mo4" onkeyup="suma31();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 31");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_mo4"  id="donacion_mo4" onkeyup="sumar31();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 31");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_mo4" type="text" id="total_mo4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 31");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit3" id="submit31" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ANULADO</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anulado4'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="32" onkeyup="sumar();" value="32" readonly>
                            <input name="cantidad_anulado4" type="text" id="cantidad_anulado4" onkeyup="sumar8();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.item=8");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anulado4" id="destruccion_anulado4" onkeyup="sumar32();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 32");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anulado4"  id="devolucion_anulado4" onkeyup="sumar32();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 32");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anulado4"  id="donacion_anulado4" onkeyup="sumar32();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 32");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anulado4" type="text" id="total_anulado4" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 32");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit3" id="submit32" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                </table>
                <table width="400" border="1" align="center">
                    <tr>
                        <td colspan="7" align="center" bgcolor="#CCCCCC"><strong>DECOMISOS POR ITEM EN CANTIDADES MAYO</strong></td>
                    </tr>
                    <tr>
                        <td width="100" bgcolor="#CCCCCC"><strong>ITEM</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DESTRUCCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DEVOLUCION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>DONACION</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
                        <td width="79" bgcolor="#CCCCCC"><strong>EDITAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS PERECEDEROS (AP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="33" readonly>
                            <input name="cantidad_ap5" type="text" id="cantidad_ap5" onkeyup="sumar9();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=1");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ap5" id="destruccion_ap5" onkeyup="sumar33();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 33");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ap5"  id="devolucion_ap5" onkeyup="sumar33();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 33");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ap5"  id="donacion_ap5" onkeyup="sumar33();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 33");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ap5" type="text" id="total_ap5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 33");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td ><input type="submit" name="submit4" id="submit33" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ALIMENTOS NO PERECEDEROS (ANP)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anp5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="id" onkeyup="sumar();" value="34" readonly>
                            <input name="cantidad_anp5" type="text" id="cantidad_anp5" onkeyup="sumar10();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=2");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anp5" id="destruccion_anp5" onkeyup="sumar34();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 34");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anp5"  id="devolucion_anp5" onkeyup="sumar34();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 34");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anp5"  id="donacion_anp5" onkeyup="sumar34();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 34");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anp5" type="text" id="total_anp5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 34");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit4" id="submit34" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ALCOHOLICAS (BA)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ba5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="272" onkeyup="sumar();" value="35" readonly>
                            <input name="cantidad_ba5" type="text" id="cantidad_ba5" onkeyup="sumar11();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=3");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ba5" id="destruccion_ba5" onkeyup="sumar35();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 35");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ba5"  id="devolucion_ba5" onkeyup="sumar35();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 35");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ba5"  id="donacion_ba5" onkeyup="sumar35();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso   where id = 35");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ba5" type="text" id="total_ba5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 35");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit4" id="submit35" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>BEBIDAS ANALCOLICAS (BNA) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bna5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="282" onkeyup="sumar();" value="36" readonly>
                            <input name="cantidad_bna5" type="text" id="cantidad_bna5" onkeyup="sumar12();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=4");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bna5" id="destruccion_bna5" onkeyup="sumar36();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 36");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bna5"  id="devolucion_bna5" onkeyup="sumar36();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 36");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bna5"  id="donacion_bna5" onkeyup="sumar36();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 36");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bna5" type="text" id="total_bna5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 36");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit4" id="submit36" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td height="44"><strong>BIENES Y MUEBLES (BM) </strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_bm5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="292" onkeyup="sumar();" value="37" readonly>
                            <input name="cantidad_bm5" type="text" id="cantidad_bm5" onkeyup="sumar5();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=5");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_bm5" id="destruccion_bm5" onkeyup="sumar29();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 37");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_bm5"  id="devolucion_bm5" onkeyup="sumar37();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 37");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_bm5"  id="donacion_bm5" onkeyup="sumar37();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 37");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_bm5" type="text" id="total_bm5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 37");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit4" id="submit37" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>EQUIPOS ELECTRONICOS (EE)</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_ee5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="302" onkeyup="sumar();" value="38" readonly>
                            <input name="cantidad_ee5" type="text" id="cantidad_ee5" onkeyup="sumar6();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=6");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_ee5" id="destruccion_ee5" onkeyup="sumar38();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 38");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_ee5"  id="devolucion_ee5" onkeyup="sumar38();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 38");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_ee5"  id="donacion_ee5" onkeyup="sumar38();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 38");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_ee5" type="text" id="total_ee5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 38");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit4" id="submit38" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>MATERIALES Y OTROS</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_mo5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="312" onkeyup="sumar();" value="39" readonly>
                            <input name="cantidad_mo5" type="text" id="cantidad_mo5" onkeyup="sumar7();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=7");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_mo5" id="destruccion_mo5" onkeyup="sumar39();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 39");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_mo5"  id="devolucion_mo5" onkeyup="suma39();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 39");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_mo5"  id="donacion_mo5" onkeyup="sumar39();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 39");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_mo5" type="text" id="total_mo5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 39");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit4" id="submit39" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ANULADO</strong></td>
                        <?php echo form_open('intendencia/guardar_inventario_anulado5'); ?>
                        <td class="rojo"><input name="id" type="hidden" id="322" onkeyup="sumar();" value="40" readonly>
                            <input name="cantidad_anulado5" type="text" id="cantidad_anulado5" onkeyup="sumar8();" value="<?php
                            $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.item=8");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="text" name="destruccion_anulado5" id="destruccion_anulado5" onkeyup="sumar40();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso where id = 40");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["destruccion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="devolucion_anulado5"  id="devolucion_anulado5" onkeyup="sumar40();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 40");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["devolucion"];
                            ?>"></td>
                        <td class="rojo"><input type="text" name="donacion_anulado5"  id="donacion_anulado5" onkeyup="sumar40();" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 40");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["donacion"];
                            ?>"></td>
                        <td class="rojo"><input name="total_anulado5" type="text" id="total_anulado5" value="<?php
                            $result = mysql_query("SELECT * FROM inventario_decomiso  where id = 40");
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            echo $row["total"];
                            ?>" readonly></td>
                        <td class="rojo"><input type="submit" name="submit4" id="submit40" value="GUARDAR" class="btn btn-primary">
                            <?php echo form_close(); ?></td>
                    </tr>
                </table>
                <p>&nbsp;</p>

                <div class="row">
                    <div class="col-md-6">
                        <table width="553" border="1">
                            <tr>
                                <td colspan="8" align="center" bgcolor="#CCCCCC"><strong>BEBIDAS ALCOHOLICAS</strong></td>
                            </tr>
                            <tr>
                                <td width="338" bgcolor="#CCCCCC"><strong>DETALLE</strong></td>
                                <td width="88" bgcolor="#CCCCCC">ENERO</td>
                                <td width="105" bgcolor="#CCCCCC">FEBRERO</td>
                                <td width="105" bgcolor="#CCCCCC">MARZO </td>
                                <td width="105" bgcolor="#CCCCCC">ABRIL</td>
                                <td width="105" bgcolor="#CCCCCC">MAYO</td>
                                <td width="88" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                                <td width="105" bgcolor="#CCCCCC"><strong>PORCENTAJE</strong></td>
                            </tr>
                            <?php
                            foreach ($ba as $b):
                                ?>
                                <tr>
                                    <td><strong>
                                            <?= $b->nombre_especie ?>
                                        </strong></td>
                                    <td><?php
                                        $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 1 and  decomiso.especie = " . $b->id);
                                        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                        echo $row["total"];
                                        ?></td>
                                    <td><?php
                                        $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 2 and  decomiso.especie = " . $b->id);
                                        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                        echo $row["total"];
                                        ?></td>
                                    <td><?php
                                        $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 3 and  decomiso.especie = " . $b->id);
                                        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                        echo $row["total"];
                                        ?></td>
                                    <td><?php
                                        $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 4 and  decomiso.especie = " . $b->id);
                                        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                        echo $row["total"];
                                        ?></td>
                                    <td><?php
                                        $result = mysql_query("SELECT SUM(cantidad) as total
FROM decomiso INNER JOIN operativo ON decomiso.id_operativo = operativo.id_operativo where operativo.mes = 5 and  decomiso.especie = " . $b->id);
                                        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                        echo $row["total"];
                                        ?></td>
                                    <td><?php
                                        $result = mysql_query("SELECT SUM(decomiso.cantidad) as total FROM decomiso where especie =   " . $b->id);
                                        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                                        echo $row["total"];
                                        //        echo    $this->intendencia_model->ba_especie_2($b->id);
                                        ?></td>
                                    <td><?php echo round($r = $this->intendencia_model->ba_especie($b->id) * 100 / $this->intendencia_model->ba_especie_total()) . ' %'; ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <td><strong>TOTAL</strong></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><?php //echo $this->intendencia_model->ba_especie_total(); ?></td>
                                <td>100%</td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-6">
                        <?php if (isset($charts2)) echo $charts2; ?>
                        <?php if (isset($json)): ?>
                            <?php
                        endif;
                        if (isset($array)):
                            ?>
                        <?php endif; ?>
                    </div>

                </div>
                <p>&nbsp;</p>
            </div>
        </div>

    </body>
</html>