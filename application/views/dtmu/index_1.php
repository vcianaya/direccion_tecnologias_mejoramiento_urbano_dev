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
 // text-shadow: 2px 2px 10px #0044cc !important 
        </style>
    <body>
        <br><br><br>
 
        <div class="row" >
            <div class="col-md-10 col-xs-offset-1" >
                <div class="wrap">
                    <strong><p id="item-title" style="color: rgb(185, 148, 39); font-size: 40px; font-family: probert; text-shadow: 2px 2px 10px #000000 !important ">&nbsp;</p></strong> 
                    <div id="showcase" class="noselect" >
                        <a href="<?php echo base_url() ?>intendencia">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/smsc_logo.png" alt="SECRETARIA MUNICIPAL DE DESARROLLO SOCIAL" >
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/smdh_logo.png" alt="SECRETARIA MUNICIPAL DE DESARROLLO HUMANO">
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/smds_logo.png" alt="SECRETARIA MUNICIPAL DE DESARROLLO SOCIAL">
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/smpu_logo.png" alt="SECRETARIA MUNICIPAL DE PLANIFICACION E INFRAESTRUCTURA URBANA" >
                        </a>
                        <a href="#">
                            <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/smus_logo.png" alt="SECRETARIA MUNICIPAL DE MOVILIDAD URBANA SOSTENIBLE">
                        </a>
                      
                     
                        
                    </div>

                </div>
            </div>
        </div>
        <script src=" <?php echo base_url() ?>assets/js/jquery.js"></script>
        <script src=" <?php echo base_url() ?>assets/js/module/jquery.reflection.js"></script>
        <script src=" <?php echo base_url() ?>assets/js/module/jquery.cloud9carousel.js"></script>
        <!-- scripts -->



      

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