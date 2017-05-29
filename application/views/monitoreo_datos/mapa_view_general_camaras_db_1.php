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

        <section class="content-header">

            <ol class="breadcrumb">


                <li class="h4"> <a href="<?php echo base_url() ?>monitoreo_datos" style="color: #337ab7">
                        <i class="fa fa-arrow-left"></i> Volver </a> / MONITOREO OBSERVATORIO </li>





            </ol>
        </section>

        <div class="col-md-6">
            <?php echo '<h2> Numero de casos registrados: ' . $tipTotal = $this->monitoreo_model_bd->mumero_casos_registrados_monitoreo() . ' Casos de Monitoreo</h2>'; ?>
        </div>
        <div class="col-md-6">
            <?php echo '<h2> Numero de casos registrados: ' . $tipTotal = $this->intendencia_model->mumero_casos_registrados_intendencia() . ' Casos de Intendencia</h2>'; ?>
        </div>
        <div style="color:blue; font-family: verdana, arial; font-size:30px; padding:15px;" id ="displayReloj" >   </div>


        <!-- <ul id="clock">	
             <li id="sec"></li>
             <li id="hour"></li>
             <li id="min"></li>
         </ul>
        -->


        <div class="col-md-4">

        </div>


        <section>


            <div class="col-md-12">










            </div>


            <div class="col-md-1">





            </div>       </section>


        <section>

           
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="<?php echo base_url() ?>assets/logos/recta.png" alt="Flower">
                        <div class="carousel-caption">
                            <div class="col-md-12">
                                <?php echo '<h2> Numero de casos registrados: ' . $tipTotal = $this->monitoreo_model_bd->mumero_casos_registrados_monitoreo() . ' Casos de Monitoreo</h2>'; ?>
                            </div>


                            <div class="col-md-12">

                                <?php if (isset($charts)) echo $charts; ?>
                                <?php if (isset($json)): ?>


                                    <?php
                                endif;
                                if (isset($array)):
                                    ?>


                                <?php endif; ?>

                            </div>
                            <div class="col-md-12">

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



                    <div class="item">
                        <img src="<?php echo base_url() ?>assets/logos/recta.png" alt="Flower">
                        <div class="carousel-caption">
                            <div class="col-md-6">
                                <?php echo '<h2> Numero de casos registrados: ' . $tipTotal = $this->intendencia_model->mumero_casos_registrados_intendencia() . ' Casos de Intendencia</h2>'; ?>
                            </div>

                            <div class="col-md-12">

                                <?php if (isset($charts3)) echo $charts3; ?>
                                <?php if (isset($json)): ?>


                                    <?php
                                endif;
                                if (isset($array)):
                                    ?>

                                    <pre><?php echo print_r($array); ?></pre>
                                <?php endif; ?>

                            </div>
                            <div class="col-md-12">

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

                    <div class="item">
                        <img src="<?php echo base_url() ?>assets/logos/recta.png" alt="Flower">
                        <div class="carousel-caption">
                            <h3>Flowers</h3>
                            <p>

                            <div class="col-md-12">

                                <?= $map['js']; ?>

                                <?= $map['html']; ?>
                            </div>

                        </div>
                        </p>
                    </div>
                </div>


            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel({interval: 500});
    
    // Enable Carousel Indicators
    $(".item").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>



</body>
</html>