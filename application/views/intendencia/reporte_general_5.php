<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />

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
    <body>


        <section class="content-header">


        </section>


        <section style="padding-left: 130px; padding-right: 40px; padding-top: 120px">
            <div class="row">

                <div class="col-md-6">


                </div>
            </div>
            <?php
            foreach ($reporte as $e):
                ?>
                <?php
            endforeach;
            ?>
            <div class="row">
                <div class="col-md-6">



                

                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?php if (isset($charts2)) echo $charts2; ?>
                    <?php if (isset($json)): ?>
                        <?php
                    endif;
                    if (isset($array)):
                        ?>
                    <?php endif; ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="centrear"><?= $e->parrafo_1 ?></h6>
                </div>

            </div>











        </section>





    </body>
</html>