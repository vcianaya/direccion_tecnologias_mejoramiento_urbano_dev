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
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/zerogrid.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">

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

        <link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>



    </head>
    <body>
        <!--------------Header--------------->

        <section class="content-header">

            <ol class="breadcrumb">

                <li class="h4"> <a href="<?php echo base_url() ?>editor/lista_modulos"><i class="fa fa-arrow-left"></i> Volver </a> / Menu de Notas</li>
            </ol>
        </section>
        <!--------------Content--------------->
        <?php
        $correcto = $this->session->flashdata('correcto');
        if ($correcto) {
            ?>
            <div class="alert alert-success">
                <?php echo $correcto ?>
            </div>


            <?php
        }
        ?>

        <section id="content">
            <div class="col-md-4">

                <?php echo form_open('notas/registros_cites'); ?>

                <div class="modal-header">


                    <h4>Llene los siguientes datos : </h4>
                </div>
                <div class="modal-body">




                    <div class="form-group celfrm opt2">
                        <label for="curpwd" >Seleccione el Tipo de Nota:</label>
                        <select name="notas" id="notas" class="form-control" required="true">
                            <option value="">Seleccione el Tipo de Nota</option>

                            <?php foreach ($notas as $p) { ?>
                                <option value="<?= $p->id ?>"><?= $p->nombre_notas ?></option>
                            <?php } ?>	
                        </select>


                    </div>

                    <div class="form-group celfrm opt2">
                        <label for="curpwd" >Seleccione la jefatura:</label>
                        <select name="jefaturas" id="jefaturas" class="form-control" required="true">
                            <option value="">Seleccione la jefatura</option>

                            <?php foreach ($jefaturas as $p) { ?>
                                <option value="<?= $p->id ?>"><?= $p->nombre_jefaturas ?></option>
                            <?php } ?>	
                        </select>


                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" id="submit" value="Buscar" class="btn btn-primary">                            


                </div>

                <?php echo form_close(); ?>
            </div>


            <div class="col-md-4">

                <?php echo form_open('felcc/reporte_felcc_general'); ?>


                <div class="modal-body">
                </div>
                <div class="modal-footer">



                </div>

                <?php echo form_close(); ?>
            </div>


        </section>
        <!--------------Footer--------------->
        <footer>

        </footer>
    </body></html>