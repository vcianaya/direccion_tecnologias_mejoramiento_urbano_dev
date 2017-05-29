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
                        <i class="fa fa-arrow-left"></i> Volver </a> / REPORTE ESPECIFICOS </li>





            </ol>
        </section>


        <section>


            <div class="col-md-12">

                <div class="accordion" id="reports">
                    <div class="panel panel-default" id="area-1">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-1" data-parent="#reports" aria-expanded="false">1. Cantidad de Operativos realizados segun la Actividad Comercial</div>
                        <div id="report-1" class="collapse panel-body display" >

                            <div class="col-md-4"> 
                                <?php echo form_open('intendencia/reporte_actividad_1'); ?>
                                <input name="pregunta" type="hidden" id="pregunta" value="1">
                                <div class="form-group">
                                    <label>Distritos </label>
                                    <select name="distrito" id="distrito" class="form-control" required="true">
                                        <option value="">Seleccione un distrito</option>
                                        <?php foreach ($distrito as $pr) { ?>
                                            <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                        <?php } ?>	
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ver Reporte </button>
                                <?php echo form_close(); ?>
                                  <label>Reporte General </label>
                                <?php echo form_open('intendencia/reporte_actividad_1_1'); ?>
                                <button type="submit" class="btn btn-primary">Ver Reporte General </button>
                                <input name="pregunta" type="hidden" id="pregunta" value="1">
                                <input name="distrito" type="hidden" id="pregunta" value="0">
                                <?php echo form_close(); ?>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default" id="area-2">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-2" data-parent="#reports" aria-expanded="false">2. Cantidad de Operativos realizados por Mes</div>
                        <div id="report-2" class="collapse panel-body display" aria-expanded="false">
                            <div class="col-md-4"> 
                                <?php echo form_open('intendencia/reporte_actividad_2'); ?>
                                <input name="pregunta" type="hidden" id="pregunta" value="2">
                                <div class="form-group">
                                    <label>Distritos </label>
                                    <select name="distrito" id="distrito" class="form-control" required="true">
                                        <option value="">Seleccione un distrito</option>
                                        <?php foreach ($distrito as $pr) { ?>
                                            <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                        <?php } ?>	
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ver Reporte </button>
                                <?php echo form_close(); ?>
                                  <label>Reporte General </label>
                                <?php echo form_open('intendencia/reporte_actividad_2_1'); ?>
                                <button type="submit" class="btn btn-primary">Ver Reporte General </button>
                                <input name="pregunta" type="hidden" id="pregunta" value="1">
                                <input name="distrito" type="hidden" id="pregunta" value="0">
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="area-3">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-3" data-parent="#reports" aria-expanded="false">3. Cantidad de Clausuras Realizadas por Mes y Tipo de Actividad</div>
                        <div id="report-3" class="collapse panel-body display" aria-expanded="false">
                            <div class="col-md-4"> 
                                <?php echo form_open('intendencia/reporte_actividad_3'); ?>
                                <input name="pregunta" type="hidden" id="pregunta" value="3">
                                <div class="form-group">
                                    <label>Distritos </label>
                                    <select name="distrito" id="distrito" class="form-control" required="true">
                                        <option value="">Seleccione un distrito</option>
                                        <?php foreach ($distrito as $pr) { ?>
                                            <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                        <?php } ?>	
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ver Reporte </button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="area-4">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-4" data-parent="#reports" aria-expanded="false">4. Situacion Legal de las Actividades Comerciales</div>
                        <div id="report-4" class="collapse panel-body display" aria-expanded="false">
                            <div class="col-md-4"> 
                                <?php echo form_open('intendencia/reporte_actividad_4'); ?>
                                <input name="pregunta" type="hidden" id="pregunta" value="4">
                                <div class="form-group">
                                    <label>Distritos </label>
                                    <select name="distrito" id="distrito" class="form-control" required="true">
                                        <option value="">Seleccione un distrito</option>
                                        <?php foreach ($distrito as $pr) { ?>
                                            <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                        <?php } ?>	
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ver Reporte </button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" id="area-5">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-5" data-parent="#reports" aria-expanded="false">5. Clausuras Realizadas Por Actividad Comercial - Gestion 2017</div>
                        <div id="report-5" class="collapse panel-body display" >

                            <div class="col-md-4"> 
                                <?php echo form_open('intendencia/reporte_actividad_5'); ?>
                                <input name="pregunta" type="hidden" id="pregunta" value="5">
                                <div class="form-group">
                                    <label>Distritos </label>
                                    <select name="distrito" id="distrito" class="form-control" required="true">
                                        <option value="">Seleccione un distrito</option>
                                        <?php foreach ($distrito as $pr) { ?>
                                            <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                        <?php } ?>	
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ver Reporte </button>
                                <?php echo form_close(); ?>

                            </div>

                        </div>
                    </div>

                    <div class="panel panel-default" id="area-6">
                        <div class="panel-heading collapsed" data-toggle="collapse" data-target="#report-6" data-parent="#reports" aria-expanded="false">6. Grafico - Horario de Operativos</div>
                        <div id="report-6" class="collapse panel-body display" > 

                            <div class="col-md-4"> 
                                <?php echo form_open('intendencia/reporte_actividad_6'); ?>
                                <input name="pregunta" type="hidden" id="pregunta" value="6">
                                <div class="form-group">
                                    <label>Distritos </label>
                                    <select name="distrito" id="distrito" class="form-control" required="true">
                                        <option value="">Seleccione un distrito</option>
                                        <?php foreach ($distrito as $pr) { ?>
                                            <option value="<?= $pr->id ?>"><?= $pr->nombre_distrito ?></option>
                                        <?php } ?>	
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ver Reporte Por Distritos</button>
                                <?php echo form_close(); ?>
                                <label>Reporte General </label>
                                <?php echo form_open('intendencia/reporte_actividad_6_1'); ?>
                                <button type="submit" class="btn btn-primary">Ver Reporte General </button>
                                <input name="pregunta" type="hidden" id="pregunta" value="6">
                                <input name="distrito" type="hidden" id="pregunta" value="0">
                                <?php echo form_close(); ?>
                            </div>

                        </div>
                    </div>
                </div>


            </div>












        </section>





    </body>
</html>