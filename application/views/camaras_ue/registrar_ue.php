<div class="container-fluid" style="margin-top: 10px">
	<div class="row"><!--START ROW-->
		<div class="col-md-12"><!-- START COL -->
			<div class="nav-tabs-custom box box-warning">
				<ul class="nav nav-tabs pull-right">
					<li><a href="#listado" data-toggle="tab"><i class="fa fa-info-circle text-orange" style="font-size: 25px"></i> <b>Listado de unidades educativas</b></a></li>
					<li class="active"><a href="#registro" data-toggle="tab"><i class="fa fa-tags text-orange" style="font-size: 25px"></i> <b>Registro de unidades educativas</b></a></li>
					<li class="pull-left header"><i class="text-orange fa fa-university"></i>
						<b class="text-orange">UNIDADES EDUCATIVAS</b>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="registro">
						<div class="container-fluid">
							<div class="col-md-6">
								<fieldset class="fieldcuerpo" align="left" >
									<legend style="font-size: 18px">Datos generales</legend>
									<form action="" method="post">
										<div class="form-group">
											<label class="control-label text-primary">Nombre unidad educativa</label>
											<input type="text" name="nombre" class="form-control" placeholder="Nombre de la unidad educativa">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Turno</label>
											<select class="form-control" name="turno">
												<option value="">Elija una opcion</option>
												<option value="Mañana">Mañana</option>
												<option value="Tarde">Tarde</option>
												<option value="Noche">Noche</option>
											</select>
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Nivel</label>
											<select class="form-control" name="nivel">
												<option value="">Elija una opcion</option>
												<?php foreach ($nivel as $item): ?>
													<option value="<?= $item->id ?>"><?= $item->nivel?></option>
												<?php endforeach ?>
											</select>
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Director</label>
											<input type="text" name="director" class="form-control" placeholder="Nombre completo">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Total Docentes</label>
											<input type="number" min="0" name="total_docentes" class="form-control" placeholder="Nro. Docentes">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Total Regentes</label>
											<input type="number" min="0" name="total_regentes" class="form-control" placeholder="Nro. Regentes">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Pdte. Junta escolar</label>
											<input type="text" name="director" class="form-control" placeholder="Nombre completo">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Fecha de inaguracion</label>
											<input type="text" class="form-control datepicker">
										</div>
									</fieldset>

									<fieldset class="fieldcuerpo" align="left" >
										<legend style="font-size: 18px">Ubicacion y Contacto</legend>
										<div class="form-group">
											<label class="control-label text-primary">Zona:</label>
											<select class="select2 select-item" name="zona" style="width: 100%">
												<option value="">Elija una zona:</option>
												<?php foreach ($zona as $item): ?>
													<option value="<?=$item->id?>"><?=$item->nombre?></option>
												<?php endforeach ?>
											</select>
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Calle/Avenida</label>
											<textarea class="form-control" rows="2" placeholder="Calle o avenida"></textarea>
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Nro. Puerta</label>
											<input type="number" min="0" name="director" class="form-control" placeholder="Numero de puerta">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Telefono</label>
											<input type="number" min="0" name="director" class="form-control" placeholder="">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Email</label>
											<input type="email"  name="email" class="form-control" placeholder="Em@ail">
										</div>
									</fieldset>
								</div>
								<div class="col-md-6">

									<fieldset class="fieldcuerpo" align="left" >
										<legend style="font-size: 18px">Datos tecnicos</legend>
										<div class="form-group">
											<label class="control-label text-primary">Infraestructura</label>
											<select class="select2 select-item" name="infraestructura" style="width: 100%">
												<option value="">Elija una opcion</option>
											</select>
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Ambientes</label>
											<select class="select2 select-item" multiple="" name="infraestructura" style="width: 100%">
												<option value="">Elija una opcion</option>
											</select>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label text-primary">Energia</label>
													<select class="form-control" name="energia">
														<option value="si">Si</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label text-primary">Tipo de medidor</label>
													<select class="form-control" name="energia">
														<option value="si">Si</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Nro. Medidor</label>
											<input type="number" min="0" name="nro_medidor" class="form-control" placeholder="Numero medidor">
										</div>

									</fieldset>

									<fieldset class="fieldcuerpo" align="left" >
										<legend style="font-size: 18px">Video Vigilancia</legend>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label text-primary">Energia</label>
													<select class="form-control" name="energia">
														<option value="si">Si</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label text-primary">Capacidad centro de datos(GB)</label>
													<input type="number" min="0" name="nro_medidor" class="form-control" placeholder="Capacidad en gigabytes">
												</div>
											</div>
										</div>


										<div class="form-group">
											<label class="control-label text-primary">Fecha de funcionamiento</label>
											<input type="text" class="form-control datepicker">
										</div>

										<div class="form-group">
											<label class="control-label text-primary">Ubicacion centro de datos</label>
											<textarea class="form-control" rows="2" placeholder="Ubicacion del datacenter"></textarea>
										</div>
									</fieldset>

									<fieldset class="fieldcuerpo" align="left" >
										<legend style="font-size: 18px">Georeferenciacion</legend>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label text-primary">Latitud</label>
													<input type="text"  name="email" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label text-primary">Longitud</label>
													<input type="text"  name="email" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div id="map-container" style="width: 100%;height: 365px;"></div>
									</fieldset>
								</form>

								</div>
							</div>
						</div><!-- /.tab-pane -->

						<div class="tab-pane fade" id="listado">
							<dvi class="container-fluid">
								<div class="col-md-6">

								</div>
							</dvi>
						</div><!-- /.tab-pane -->

					</div><!-- /.tab-content -->
				</div><!-- nav-tabs-custom -->
			</div><!-- END COL -->
		</div><!--END ROW-->
	</div>

	<script src="http://maps.google.com/maps/api/js?key=AIzaSyAKE2bdGVHKLyN6a5HD6lWffpWNlbq3LsM"></script>
	<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugin/select2/js/select2.full.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugin/select2/js/i18n/es.js"></script>
	<script src="<?php echo base_url() ?>assets/plugin/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/plugin/datepicker/js/locales/bootstrap-datepicker.es.js"></script>
	<script>
		function initMap() {
			var var_location = new google.maps.LatLng(-16.506602830615456, -68.1624944201966 );
			var map = new google.maps.Map(document.getElementById('map-container'), {
				zoom: 11,
				center: var_location,
			});
		}

		$(document).ready(function() {
			$(".select2").select2({language: "es"});
			$('.datepicker').datepicker({language: "es"});
			initMap();
		});
	</script>
</body>
</html>