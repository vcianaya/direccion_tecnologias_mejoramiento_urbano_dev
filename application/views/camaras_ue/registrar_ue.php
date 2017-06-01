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
												<input type="text" class="form-control" data-inputmask='"mask": "(99) 999-999"' data-mask>
											</div>

											<div class="form-group">
												<label class="control-label text-primary">Email</label>
												<input type="email"  name="email" class="form-control" placeholder="Em@ail">
											</div>

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
										</fieldset>
									</div>
									<div class="col-md-6">

										<fieldset class="fieldcuerpo" align="left" >
											<legend style="font-size: 18px">Datos tecnicos</legend>
											<div class="form-group">
												<label class="control-label text-primary">Infraestructura pertenece a:</label>
												<select class="select2 select-item" name="infraestructura" style="width: 100%">
													<option value="">Elija una opcion</option>
													<option value="JUNTA VECINAL">JUNTA VECINAL</option>
													<option value="GAMEA">GAMEA</option>
													<option value="ONG">ONG</option>
													<option value="IGLESIA">IGLESIA</option>
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
															<option value="">Elija un tipo</option>
															<?php foreach ($tipo_medidor as $item): ?>
																<option value="<?=$item->id?>"><?=$item->nombre_tipo_medidor?></option>
															<?php endforeach ?>
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
														<label class="control-label">Ubicar distrito</label>
														<div class="input-group">
															<a href="#" id="distrito" class="btn btn-primary input-group-addon" ><i class="fa fa-map-marker" style="color:white"></i></a>
															<select class="select2 distrito" style="width: 100%">
																<option value="">Ejija un distrito:</option>
																<?php foreach ($distrito as $item): ?>
																	<option value="<?=$item->lat.','.$item->lng?>"><?=$item->nombre_distrito?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Ubicar zona</label>
														<div class="input-group">
															<a href="#" class="btn btn-primary input-group-addon" id="zonau" ><i class="fa fa-map-marker" style="color:white"></i></a>
															<select class="select2 zona" style="width: 100%">
																<option value="">Elina una zona</option>
																<?php foreach ($zona as $item): ?>
																	<option value="<?=$item->lat.','.$item->lng?>"><?=$item->nombre?></option>
																<?php endforeach ?>
															</select>
														</div>
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
	<script src="<?php echo base_url() ?>assets/plugin/input-mask/jquery.inputmask.js"></script>
	<script>
	//Datemask dd/mm/yyyy
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
			//Datemask2 mm/dd/yyyy
			$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
			//Money Euro
			$("[data-mask]").inputmask();
		function initMap() {//START CODE MAP
			var var_location = new google.maps.LatLng(-16.506602830615456, -68.1624944201966 );
			var map = new google.maps.Map(document.getElementById('map-container'), {
				zoom: 11,
				center: var_location,
			});
			// Construct the polygon.
			var distrito1 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 1): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
	var distrito1 = new google.maps.Polygon({
		paths: distrito1,
		strokeColor: '#000000',
		strokeOpacity: 0.8,
		strokeWeight: 3,
		fillColor: '#0FF',
		fillOpacity: 0.35
	});
	distrito1.setMap(map);

			// Construct the polygon.
			var distrito2 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 2): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
	var distrito2 = new google.maps.Polygon({
		paths: distrito2,
		strokeColor: '#000000',
		strokeOpacity: 0.8,
		strokeWeight: 3,
		fillColor: '#C0F',
		fillOpacity: 0.35,
		clickable:"true"
	});
	distrito2.setMap(map);

			// Construct the polygon.
			var distrito3 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 3): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
	var distrito3 = new google.maps.Polygon({
		paths: distrito3,
		strokeColor: '#000000',
		strokeOpacity: 0.8,
		strokeWeight: 3,
		fillColor: '#FF9',
		fillOpacity: 0.35
	});
	distrito3.setMap(map);

	var distrito4 = [
	<?php foreach ($poligon as $item): ?>
	<?php if ($item->distrito == 4): ?>
	{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
<?php endif ?>
<?php endforeach ?>
];
			// Construct the polygon.
			var distrito4 = new google.maps.Polygon({
				paths: distrito4,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#6F6',
				fillOpacity: 0.35
			});
			distrito4.setMap(map);

			var distrito5 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 5): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito5 = new google.maps.Polygon({
				paths: distrito5,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#408080',
				fillOpacity: 0.35
			});
			distrito5.setMap(map);

			var distrito6 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 6): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito6 = new google.maps.Polygon({
				paths: distrito6,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#F00',
				fillOpacity: 0.35
			});
			distrito6.setMap(map);

			var distrito7 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 7): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito7 = new google.maps.Polygon({
				paths: distrito7,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#FF9999',
				fillOpacity: 0.35
			});
			distrito7.setMap(map);

			var distrito8 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 8): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito8 = new google.maps.Polygon({
				paths: distrito8,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#F36',
				fillOpacity: 0.35
			});
			distrito8.setMap(map);

			var distrito9 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 9): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito9 = new google.maps.Polygon({
				paths: distrito9,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#000',
				fillOpacity: 0.35
			});
			distrito9.setMap(map);

			var distrito10 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 10): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito10 = new google.maps.Polygon({
				paths: distrito10,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#F93',
				fillOpacity: 0.35
			});
			distrito10.setMap(map);

			var distrito11 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 11): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito11 = new google.maps.Polygon({
				paths: distrito11,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#0080C0',
				fillOpacity: 0.35
			});
			distrito11.setMap(map);

			var distrito12 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 12): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito12 = new google.maps.Polygon({
				paths: distrito12,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#00F',
				fillOpacity: 0.35
			});
			distrito12.setMap(map);

			var distrito13 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 13): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito13 = new google.maps.Polygon({
				paths: distrito13,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#030',
				fillOpacity: 0.35
			});
			distrito13.setMap(map);

			var distrito14 = [
			<?php foreach ($poligon as $item): ?>
			<?php if ($item->distrito == 14): ?>
			{lat:<?=$item->lat?>,lng:<?=$item->lng?>},
		<?php endif ?>
	<?php endforeach ?>
	];
			// Construct the polygon.
			var distrito14 = new google.maps.Polygon({
				paths: distrito14,
				strokeColor: '#000000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#969',
				fillOpacity: 0.35
			});
			distrito14.setMap(map);
			//INFOWINDOW DISTRITOS
			var distritos = new google.maps.InfoWindow();
			<?php foreach ($distrito as $item): ?>
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(<?=$item->lat?>, <?=$item->lng?>),
					map: map,
					animation: google.maps.Animation.DROP,
					icon: '<?=base_url()?>assets/logos/d<?=$item->numero?>.png'
					//icon: '{{url('images/logos/d')}}'+{{$item->numero}}+'.png'

				});
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						distritos.setContent('<?=$item->nombre_distrito?>');
						distritos.open(map, marker);
					}
				})
				(marker,<?=$item->id?>));
			<?php endforeach ?>

			//UBICAR DISTRITOS Y ZONAS
			$('#distrito').click(function(e) {
				e.preventDefault();
				var val = $('.distrito').val();
				var coordenadas = val.split(",");

				var myLatLng = new google.maps.LatLng(coordenadas[0],coordenadas[1]);
				map.setCenter(myLatLng);
				map.setZoom(16);
			});
			$('#zonau').click(function(e) {
				e.preventDefault();
				var val = $('.zona').val();
				var coordenadas = val.split(",");

				var myLatLng = new google.maps.LatLng(coordenadas[0],coordenadas[1]);
				map.setCenter(myLatLng);
				map.setZoom(16);
			});
	}//END CODE MAP
	function limpiar_marcadores(lista){
		for(i in lista)
		{	lista[i].setMap(null);	}
	}
	$(document).ready(function() {
		$(".select2").select2({language: "es"});
		$('.datepicker').datepicker({language: "es"});
		initMap();
	});
</script>
</body>
</html>