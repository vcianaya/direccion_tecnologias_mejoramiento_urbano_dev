<?php
$correcto = $this->session->flashdata('correcto');
if ($correcto) {
    ?>
    <div class="mensaje" id="mensajebien"><label><?= $correcto ?></label></div>
    <?php
}
?>
<script type="text/javascript">

</script>

<section class="content">
    <div class="row"><!--START ROW-->
        <div class="col-md-12"><!-- START COL -->
            <div class="nav-tabs-custom box box-warning">
                <ul class="nav nav-tabs pull-right">
                    <li><a href="#tab_1-2" data-toggle="tab"><i class="fa fa-cogs text-orange" style="font-size: 25px"></i> <b>Administrar</b></a></li>
                    <li><a href="#tab_2-2" data-toggle="tab"><i class="fa fa-info-circle text-orange" style="font-size: 25px"></i> <b>Operativos realizados</b></a></li>
                    <li class="active"><a href="#tab_3-2" data-toggle="tab"><i class="fa fa-tags text-orange" style="font-size: 25px"></i> <b>Registro de operativos</b></a></li>
                    <li class="pull-left header"><i class="text-orange glyphicon glyphicon-tree-conifer"></i>
                        <b class="text-orange">RECUPERACIÓN DE ESPACIOS PUBLICOS</b>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade" id="tab_1-2">

                        <div id="frmOperativo"></div>
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane fade" id="tab_2-2">
                        <div class="container-fluid">
                            <section>

                                <?php foreach ($css_files as $file): ?>
                                    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                                <?php endforeach; ?>
                                <?php foreach ($js_files as $file): ?>
                                    <script src="<?php echo $file; ?>"></script>
                                <?php endforeach; ?>
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
                                </style>
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-10">
                                    <?php echo $output; ?>
                                </div>
                                <div class="col-md-1">

                                </div>


                            </section>
                        </div>
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane fade in active" id="tab_3-2">
                        <div class="container-fluid">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Detalles del operativo:</legend>
                                    <h2><?php if (isset($mensaje)) echo $mensaje; ?></h2>
                                    <?= validation_errors(); ?><!--mostrar los errores de validación-->

                                    <form method="post" name="operativo" action="<?= base_url() . 'protocolo/saveOperativo' ?>">
                                        <div class="form-group">
                                            <label>Espacio publico:</label>
                                            <input type="text" required="true" class="form-control" placeholder="Espacio publico" name="espacioPublico">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Guardia:</label>
                                            <select class="form-control select2" required="true" name="guardiaMoto" style="width: 100%;">
                                                <option value="">Seleccione</option>
                                                <?php foreach ($guardiamoto as $item): ?>
                                                    <option value="<?php echo $item->id; ?>"><?php echo $item->nombre . '__Placa__' . $item->placa; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Fecha:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input required="true" type="text"  class="form-control" name="fecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask value="<?php echo set_value('fecha'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>Hora:</label>
                                                    <div class="input-group">
                                                        <input required="true" type="text" name="hora" class="form-control timepicker">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad de Hombres :</label>
                                            <input type="number" class="form-control" placeholder="Nro." name="cantidadHombres">
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad de Mujeres :</label>
                                            <input type="number" class="form-control" placeholder="Nro." name="cantidadMujeres">
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad de Niños :</label>
                                            <input type="number" class="form-control" placeholder="Nro." name="cantidadNinos">
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad de Adolecentes :</label>
                                            <input type="number" class="form-control" placeholder="Nro." name="cantidadAdolecentes">
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad de Mayores :</label>
                                            <input type="number" class="form-control" placeholder="Nro." name="cantidadMayores">
                                        </div>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Datos tecnicos</legend>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Urbanizacion:</label>
                                        <select class="form-control select2" style="width: 100%;" name="urbanizacion">
                                            <option selected="selected" value="">Seleccione</option>
                                            <?php foreach ($urbanizacionescentrado as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nombre; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Zona:</label>
                                        <select class="form-control select2" style="width: 100%;" name="zona">
                                            <option selected="selected" value="" required="true">Seleccione</option>
                                            <?php foreach ($zona as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nombre; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tipo de Intervencion:</label>
                                        <select class="form-control select2" style="width: 100%;" name="intervencion" required="true">
                                            <option selected="selected" value="">Seleccione</option>
                                            <?php foreach ($intervencion as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nombre; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Acción Tomada:</label>
                                        <select class="form-control select2" style="width: 100%;" name="accionTomada" required="true">
                                            <option selected="selected">Seleccione</option>
                                            <?php foreach ($acciontomada as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nombre ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <input hidden id="datainstitucion" name="institucion" value="">


                                    <div class="form-group">
                                        <label>Pos X :</label>
                                        <input type="text" name="posX" id="posX" class="form-control" name="posX">
                                    </div>

                                    <div class="form-group">
                                        <label>Pos Y :</label>
                                        <input type="text" name="posY" id="posY" class="form-control" name="posY">
                                    </div>

                                    <div class="form-group">
                                        <label>Observaciones :</label>
                                        <textarea class="form-control" name="observaciones"></textarea>
                                    </div>
                                    <input hidden="" name="submit">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-pencil"></i> Registrar
                                    </button>
                                </fieldset>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- END COL -->
    </div><!--END ROW-->


</section>


