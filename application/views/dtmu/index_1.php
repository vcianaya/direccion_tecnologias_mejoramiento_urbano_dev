<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="<?php echo base_url() ?>assets/css/style_modules.css" rel="stylesheet">
        <!-- particles.js container -->
        

        <style>
            
            @font-face {
	font-family: "probert";
	src: url(<?php echo base_url() ?>assets/fonts/Probert.otf);
} 
        </style>
    <body style="background-image: url(<?php echo base_url() ?>assets/logos/stss.png);
          background-repeat: no-repeat; background-size: 400px; background-position-x: 20px; background-position-y:60px ">
        <br><br><br>
        <div id="particles-js" style="position:absolute; z-index:0;width:100%;height:85%"></div>
        <div class="row" >
            <div class="col-md-10 col-xs-offset-1" >
                <div class="wrap">
                    <strong><p id="item-title" style="color: #000022; font-size: 70px; font-family: probert;">&nbsp;</p></strong> 
                    <div id="showcase" class="noselect" >
                        <a href="<?php echo base_url() ?>intendencia">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/intendencia.png" alt="INTENDENCIA" >
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/monitoreo.png" alt="MONITOREO">
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/equipamiento.png" alt="EQUIPAMIENTO">
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/capas.png" alt="CAPAS" >
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/policia.png" alt="COMANDO">
                        </a>
                        <a href="<?php echo base_url() ?>monitoreo_datos/reporte_por_mes">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/monitoreo_datos.png" alt="MONITOREO DE DATOS">
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/alumbrado_publico.png" alt="ALUMBRADO PUBLICO">
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/inversion_publica.png" alt="INVERSION PUBLICA">
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/otros.png" alt="OTROS">
                        </a>
                        
                    </div>

                </div>
            </div>
        </div>
        <script src=" <?php echo base_url() ?>assets/js/jquery.js"></script>
        <script src=" <?php echo base_url() ?>assets/js/module/jquery.reflection.js"></script>
        <script src=" <?php echo base_url() ?>assets/js/module/jquery.cloud9carousel.js"></script>
        <!-- scripts -->
        <script src="<?php echo base_url() ?>assets/js/particles.js"></script>
        <script src="<?php echo base_url() ?>assets/js/app.js"></script>

        <script src="<?php echo base_url() ?>assets/js/lib/stats.js"></script>        

        <script type="text/javascript">
            $(function () {
                var showcase = $("#showcase"), title = $('#item-title')
                showcase.Cloud9Carousel({
                    yOrigin: 42,
                    yRadius: 48,
                    mirror: {
                        gap: 12,
                        height: 0.2
                    },
                    buttonLeft: $("#nav > .left"),
                    buttonRight: $("#nav > .right"),
                    autoPlay: 1,
                    bringToFront: true,
                    onRendered: rendered,
                    onLoaded: function () {
                        showcase.css('visibility', 'visible')
                        showcase.css('display', 'none')
                        showcase.fadeIn(1500)
                    }
                })
                function rendered(carousel) {
                    title.text(carousel.nearestItem().element.alt)
                    // Fade in based on proximity of the item
                    var c = Math.cos((carousel.floatIndex() % 1) * 2 * Math.PI)
                    title.css('opacity', 0.5 + (0.5 * c))
                }
                //
                // Simulate physical button click effect
                //
                $('#nav > button').click(function (e) {
                    var b = $(e.target).addClass('down')
                    setTimeout(function () {
                        b.removeClass('down')
                    }, 80)
                })
                $(document).keydown(function (e) {
                    //
                    // More codes: http://www.javascripter.net/faq/keycodes.htm
                    //
                    switch (e.keyCode) {
                        /* left arrow */
                        case 37:
                            $('#nav > .left').click()
                            break
                            /* right arrow */
                        case 39:
                            $('#nav > .right').click()
                    }
                })
            })
        </script>
    </body>
</html>