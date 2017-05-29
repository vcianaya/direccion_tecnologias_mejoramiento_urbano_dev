<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
      ================================================== -->
        <meta charset="utf-8">
        <title>zWebDesign Free Html5 Responsive Template</title>
        <meta name="description" content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
        <meta name="author" content="www.zerotheme.com">

        <!-- Mobile Specific Metas
      ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
      ================================================== -->




        <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
        <!--[if lt IE 9]>
                    <script src="js/html5.js"></script>
                    <script src="js/css3-mediaqueries.js"></script>
            <![endif]-->

      
        <style type='text/css'>
            body
            {
                font-family: Arial;
                font-size: 14px;
            }
            a {
                color: blue;
                text-decoration: none;
                font-size: 14px;
            }
            a:hover
            {
                text-decoration: underline;
            }
            negrita{
                font-weight: bold;
            }
        </style>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.4");
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/highcharts.js"></script>

    </head>
    <body>
        <!--------------Header--------------->

        <section class="content-header">

            <ol class="breadcrumb">

                <li class="h4"> <a href="javascript:history.back(1)" style="color: #337ab7"><i class="fa fa-arrow-left "></i> Volver </a> / Informe Generado </li>
            </ol>
        </section>
        <?php
        $correcto = $this->session->flashdata('correcto');
        if ($correcto) {
            ?>
            <div class="alert alert-success">
                <?= $correcto ?>
            </div>


            <?php
        }
        ?>

        <font  color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline">
        <?php echo validation_errors(); ?></font>


        <!--------------Content--------------->
        
        <section>
            <div class="col-md-2"></div>
            <div class="col-md-10">

                <table border="1">
                    <tr>
                        <td width="560" align="center"><strong>Grafico de Operativos por horas</strong>
                            <div id="a"  class="left">
                                <?php if (isset($charts)) echo $charts; ?>
                                <?php if (isset($json)): ?>

                                    <pre><?php echo print_r($json); ?></pre>
                                    <?php
                                endif;
                                if (isset($array)):
                                    ?>

                                    <pre><?php echo print_r($array); ?></pre>
                                <?php endif; ?>
                            </div> 
                        <td width="560"><strong>Grafico de Operativos por dias</strong>
                            <?php if (isset($charts2)) echo $charts2; ?>
                            <?php if (isset($json)): ?>

                                <pre><?php echo print_r($json); ?></pre>
                                <?php
                            endif;
                            if (isset($array)):
                                ?>

                                <pre><?php echo print_r($array); ?></pre>
                            <?php endif; ?>



                        </td>
                    </tr>
                </table>

            </div>

        </section>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <!-- Input addon -->
                    <div class="box box-info">
                        <div class="box-header">

                        </div>

                        <div class="box-body">
                            <div class="container">



                                <?php
                                if (!$operativos) {
                                    ?>
                                    No se encontro ningun registro.
                                <?php } else {
                                    ?>
                                    <table  border="0" align="center" class="gradienttable">
                                        <tr>
                                            <td colspan="2" ><table  border="2" align="center">
                                                    <tr class="fondo">
                                                        <td rowspan="2" class="negrita"><strong>Fecha</strong></td>
                                                        <td rowspan="2" class="negrita"><strong>Hora</strong></td>
                                                        <td rowspan="2" class="negrita"><strong>Tipo de Caso</strong></td>
                                                        <td rowspan="2" class="negrita"> <strong>Direccion</strong></td>
                                                        <td rowspan="2" class="negrita"> <strong>Comentario</strong></td>
                                                

                                                    </tr>
                                                    <tr class="fondo">

                                                    </tr>
                                                    <?php
                                                    foreach ($operativos as $fila) {
                                                        ?>
                                                        <tr>
                                                            <td width="90" ><strong><?= $fila->fecha ?>  </strong></td>
                                                            <td ><?= $fila->hora ?></td>
                                                            
                                                            <td><?= $fila->nombre_monitoreo ?></td>
                                                            <td><?= $fila->direccion ?></td>
                                                            <td><?= $fila->descripcion_monitoreo ?></td>
                                                            




                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </table>      <strong></strong></td>
                                        </tr>
                                    </table>

                                    <?php
                                }
                                ?>
                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">



                        </div>


                    </div><!-- /.box -->

                </div><!--/.col (left) -->

        </section>

        




        <!--------------Footer--------------->
        <footer>
            <div class="container">



            </div>
        </footer>
    </body></html>










