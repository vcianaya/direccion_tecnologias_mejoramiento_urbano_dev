<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />

        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.4");
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
    </head>
    <body>


        <section class="content-header">

            <ol class="breadcrumb">


                <li class="h4"> <a href="javascript:history.back(1)" style="color: #337ab7">
                        <i class="fa fa-arrow-left"></i> Volver </a> / REPORTE DE NINOS (GENERAL) </li>


                <?php if (!$datos) { ?>

                    <?php
                } else {
                    ?>

                <?php }
                ?>


            </ol>
        </section>


        <section>


            <div class="col-md-12">

                <div class="accordion" id="reports">
                    <div class="panel panel-default" id="area-1">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-1" data-parent="#reports" aria-expanded="false">1. Cantidad de niñ@s por edad y sexo por Centro Infantil</div>
                        <div id="report-1" class="collapse panel-body display" >
                            <?php foreach ($css_files as $file): ?>
                                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                            <?php endforeach; ?>
                            <?php foreach ($js_files as $file): ?>
                                <script src="<?php echo $file; ?>"></script>
                            <?php endforeach; ?>
                           
                            <div class="col-md-12">
                                <?php echo $output; ?>
                            </div>
                          
                            <div class="col-md-6">
                                <?php if (isset($charts)) echo $charts; ?>
                                <?php if (isset($json)): ?>
                                    <?php
                                endif;
                                if (isset($array)):
                                    ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php if (isset($charts10)) echo $charts10; ?>
                                <?php if (isset($json)): ?>
                                    <?php
                                endif;
                                if (isset($array)):
                                    ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default" id="area-2">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-2" data-parent="#reports" aria-expanded="false">2. Cantidad de niñ@s por Talla y Peso</div>
                        <div id="report-2" class="collapse panel-body display" aria-expanded="false">
                           
                           <div class="col-md-6">
                                <?php if (isset($charts3)) echo $charts3; ?>
                                <?php if (isset($json)): ?>
                                    <?php
                                endif;
                                if (isset($array)):
                                    ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
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
             









        </section>





    </body>
</html>