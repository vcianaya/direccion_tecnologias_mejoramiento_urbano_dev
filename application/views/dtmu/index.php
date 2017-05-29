<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <!-- count particles -->

        
        <!-- particles.js container -->


        <!-- scripts -->
      
        <!-- stats.js -->

        
    </body>
    <div class="row">
        <div class="col-md-10 col-xs-offset-1">
            <div class="wrap">
                <p id="item-title">&nbsp;</p>
                <div id="showcase" class="noselect">
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/firefox.png" alt="INTENDENCIA">
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/wyzo.png" alt="MONITOREO">
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/equipamiento.png" alt="EQUIPAMIENTO">
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/chrome.png" alt="CAPAS" >
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/iexplore.png" alt="COMANDO">
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/safari.png" alt="MONITOREO DE DATOS">
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/safari.png" alt="ALUMBRADO PUBLICO">
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/safari.png" alt="INVERSION PUBLICA">
                    </a>
                    <a href="#">
                        <img class="cloud9-item" src="<?php echo base_url() ?>assets/browsers/safari.png" alt="OTROS">
                    </a>
                </div>

            </div>
        </div>
    </div>
    <script src=" <?php echo base_url() ?>assets/js/jquery.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/module/jquery.reflection.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/module/jquery.cloud9carousel.js"></script>

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
</html>