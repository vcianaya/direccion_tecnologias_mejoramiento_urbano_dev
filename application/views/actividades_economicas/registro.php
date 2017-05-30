<?php
  $correcto = $this->session->flashdata('correcto');
  if ($correcto)
  {
?>
  <div class="mensaje" id="mensajebien"><label><?= $correcto ?></label></div>
<?php
  }
  ?>
<script type="text/javascript">
  $(document).ready(function() { setTimeout(function(){ $(".mensaje").fadeIn(1500); },0000); });
  $(document).ready(function() { setTimeout(function(){ $(".mensaje").fadeOut(1500); },5000); });
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
          <dvi class="container-fluid">
            <table class="table table-bordered table-striped example">
                <thead>
                <tr>
                  <th>Guardia</th>
                  <th>Urbanización</th>
                  <th>Zona</th>
                  <th>Espacio Publico</th>
                  <th>Fecha y Hora</th>
                  <th>Intervencion</th>
                  <th>Acción Tomada</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($operativo as $item): ?>
                <tr id="<?= $item->idoperativo ?>">
                  <td><?= $item->guardia.'_'.$item->placa?></td>
                  <td><?= $item->urbanizacion ?></td>
                  <td><?= $item->zona ?></td>
                  <td><?= $item->espacioPublico ?></td>
                  <td><?= $item->fecha.'&nbsp&nbsp&nbsp&nbsp'.$item->hora ?></td>
                  <td><?= $item->intervencion ?></td>
                  <td><?= $item->accionTomada ?></td>
                  <td align="center">
                    <a href="#" class="btn btn-info detalles" data-toggle="tooltip" data-placement="top" title="Ver detalles">
                      <i class="glyphicon glyphicon-search"></i>
                    </a>
                    <a href="#" class="btn btn-warning modificar" data-toggle="tooltip" data-placement="top" title="Modificar">
                      <i class="glyphicon glyphicon-cog"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach ?>

              </table>
          </dvi>
        </div><!-- /.tab-pane -->

        <div class="tab-pane fade in active" id="tab_3-2">
            <div class="container-fluid">
                <div class="col-md-6">
                <fieldset>
                <legend>Detalles del operativo:</legend>
                <h2><?php if(isset($mensaje)) echo $mensaje; ?></h2>
                <?=validation_errors();?><!--mostrar los errores de validación-->

                <form method="post" name="operativo" action="<?= base_url().'protocolo/saveOperativo'?>">
                    <div class="form-group">
                        <label>Espacio publico:</label>
                        <input type="text" required="true" class="form-control" placeholder="Espacio publico" name="espacioPublico">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Guardia:</label>
                        <select class="form-control select2" required="true" name="guardiaMoto" style="width: 100%;">
                          <option value="">Seleccione</option>
                        <?php foreach ($guardiamoto as $item): ?>
                        <option value="<?php echo $item->id; ?>"><?php echo $item->nombre.'__Placa__'.$item->placa; ?></option>
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
                        <?php foreach ($zona as $item ): ?>
                          <option value="<?php echo $item->id; ?>"><?php echo $item->nombre;?></option>
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

                    <div class="form-group" id="cooperacion">
                        <label for="exampleInputEmail1">Cooperacion Interinstitucional:</label>
                        <select class="form-control select2" id="institucion" multiple="multiple" data-placeholder="Seleccione opcion" style="width: 100%; >
                          <option selected="selected" value="">Seleccione</option>
                        <?php foreach ($institucion as $item): ?>
                          <option value="<?php echo $item->id; ?>"><?php echo $item->nombre; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>

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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" id="modal-bodyku">
        <div id="map"></div>
      </div>
      <div class="modal-footer" id="modal-footerq">
        <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " style="width: 1000px;">
    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" id="modal-bodyku">
      <div class="row">
        <div class="col-md-6">
          <div id="map-container" style="height: 500px;height: 550px"></div>
        </div>
        <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
          <div class="form-group">
              <label>Latitud :</label>
              <input type="text" readonly=""  id="latitud" class="form-control">
          </div>
          </div>
          <div class="col-md-6 table-responsive">
          <div class="form-group">
              <label>Longitud :</label>
              <input type="text" readonly="" id="longitud"  name="longitud" class="form-control">
          </div>
          </div>
        </div>
        <table class="example table table-bordered table-striped">
          <thead>
            <th>Distrito</th>
            <th>Urbanizacion</th>
            <th>Ubicar Distrito</th>
          </thead>
          <tbody>
          <?php foreach ($urbanizacionescentrado as $item): ?>
            <tr id="<?=$item->id?>" lat="<?=$item->posY?>" lng="<?=$item->posX?>">
              <td align="center"><?='DT'.$item->distrito?></td>
              <td align="center"><?=$item->nombre?></td>
              <td align="center">
                <a href="#" class="btn btn-xs btn-warning ubicar" data-toggle="tooltip" data-placement="top" title="Ubicar Distrito">
                  <i class="fa fa-map-marker"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
      <div class="modal-footer" id="modal-footerq">
        <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="enviarcordenadas" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

</section>
<script src="<?php echo base_url() ?>assets/plugin/select2/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=
  AIzaSyAKE2bdGVHKLyN6a5HD6lWffpWNlbq3LsM&sensor=false"></script>
<script type="text/javascript">
var map = null;
var nuevos_marcadores = [];

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$(document).ready(function() {
    $(".example").DataTable();
    $(".select2").select2();
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

    select = $("#institucion").select2();
    select.on("select2:select", function (e) {
        data = select.val();
        $("#datainstitucion").attr("value",data);
        console.log(data);
    });

    select.on("select2:unselect", function (e) {
        data = select.val();
        $("#datainstitucion").attr("value",data);
        console.log(data);
    });

  //DETALLES DEL OPERATIVO
  _modal = $('#myModal');
    $('.example').on('click','.detalles',function(e){
      e.preventDefault();
      _fila = $(this).closest('tr');
      idoperativo = _fila.attr('id');
        $.ajax({
          url: "<?= base_url().'protocolo/operativoDetalle/'?>"+idoperativo,
            success:function(response){
            _modal.find('#myModalLabel').html('Detalles del operativo');
            _modal.find('.modal-body').html(response);
            _modal.find('.btn-primary').unbind().bind('click',function(e){
            e.preventDefault();
              _modal.modal('hide');
            });
            _modal.modal('show');
            }
      });
    });//EDN DETALLES DEL OPERATIVO

  //MODIFICAR OPERATIVO
  _modal = $('#myModal');
    $('.example').on('click','.modificar',function(e){
      e.preventDefault();
      _fila = $(this).closest('tr');
      idoperativo = _fila.attr('id');
        $.ajax({
          url: "<?= base_url().'protocolo/modificarOperativo/'?>"+idoperativo,
            success:function(response){
              $('#frmOperativo').html(response);
              $('#tab_3-2').attr('class', 'tab-pane fade');
              $('#tab_2-2').attr('class', 'tab-pane fade');
              $('#tab_1-2').attr('class', 'tab-pane fade active in');
            }
      });
    });//EDN DETALLES DEL OPERATIVO

    //MODAL MAPA
    _modalMap = $('#ModalMap');
    $('#posX').click(function(event) {
      _modalMap.find('#myModalLabel').html('Geolocalizacion');
      map_init();
      _modalMap.modal('show');
    });
    //END MODAL MAPA

  function map_init(){
    var var_location = new google.maps.LatLng(-16.506602830615456, -68.1624944201966 );
    var map = new google.maps.Map(document.getElementById('map-container'), {
    zoom: 11,
    center: var_location,
  });
        google.maps.event.addListener(map, "click", function(event){
           var coordenadas = event.latLng.toString();
           alert('sebas');
        });



    _modalMap.find('#enviarcordenadas').click(function(e) {
       //Crear variable coordenada
       e.preventDefault();
       latitud = $('#latitud').val();
       longitud = $('#longitud').val();
       $('#posX').val(latitud);
       $('#posY').val(longitud);
      _modalMap.modal('hide');
    });

    //UBICAR DISTRITO
  _modal = $('#myModal');
    $('.example').on('click','.ubicar',function(e){
      e.preventDefault();
      _fila = $(this).closest('tr');
      lat = _fila.attr('lat');
      lng = _fila.attr('lng');
      var myLatLng = new google.maps.LatLng(lat, lng);
      map.setCenter(myLatLng);
      map.setZoom(16);
    });//EDN UBICAR DISTRITO


  // Define the LatLng coordinates for the polygon's path.
  var distrito1 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 1) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
  <?php endforeach ?>
  ];

  // Construct the polygon.
  var distrito1 = new google.maps.Polygon({
    paths: distrito1,
    strokeColor: '#000000',
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: '#0FF',
    fillOpacity: 0.35
  });
  distrito1.setMap(map);


  // Define the LatLng coordinates for the polygon's path.
  var distrito2 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 2) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
  <?php endforeach ?>
  ];
  // Construct the polygon.
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito3 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 3) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
  <?php endforeach ?>
  ];
  // Construct the polygon.
  var distrito3 = new google.maps.Polygon({
    paths: distrito3,
    strokeColor: '#000000',
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: '#FF9',
    fillOpacity: 0.35
  });
  distrito3.setMap(map);

  // Define the LatLng coordinates for the polygon's path.
  var distrito4 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 4) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito5 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 5) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito6 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 6) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito7 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 7) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito8 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 8) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito9 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 9) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito10 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 10) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito11 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 11) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito12 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 12) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito13 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 13) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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

  // Define the LatLng coordinates for the polygon's path.
  var distrito14 = [
  <?php foreach ($area as $item): ?>
    <?php if ($item->distrito == 14) {?>
      {lat:<?=$item->lat?>, lng:<?=$item->lng?>},
    <?php } ?>
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


   google.maps.event.addListener(distrito1, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   google.maps.event.addListener(distrito2, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   google.maps.event.addListener(distrito3, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   google.maps.event.addListener(distrito4, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   google.maps.event.addListener(distrito5, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   google.maps.event.addListener(distrito6, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   google.maps.event.addListener(distrito7, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   google.maps.event.addListener(distrito8, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
        });

   google.maps.event.addListener(distrito9, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
        });

   google.maps.event.addListener(distrito10, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

      google.maps.event.addListener(distrito11, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

      google.maps.event.addListener(distrito12, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

      google.maps.event.addListener(distrito13, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

      google.maps.event.addListener(distrito14, 'click', function(event) {
          var coordenadas = event.latLng.toString();
          coordenadas = coordenadas.replace("(", "");
          coordenadas = coordenadas.replace(")", "");
          var lista = coordenadas.split(",");
          var direccion = new google.maps.LatLng(lista[0], lista[1]);
          _modalMap.find("#latitud").val(lista[0]);
          _modalMap.find("#longitud").val(lista[1]);

          var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: map,
               animation:google.maps.Animation.DROP,
               draggable:false,
               icon: '<?=base_url().'assets/icon/marker.png'?>'
           });

           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           google.maps.event.addListener(marcador, "click", function(){
           });
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(map);
          console.log(coordenadas);
        });

   function limpiar_marcadores(lista)
    {
        for(i in lista)
        {
            //QUITAR MARCADOR DEL MAPA
            lista[i].setMap(null);
        }
    }

  var infowindow = new google.maps.InfoWindow();
  <?php foreach ($distritos as $item): ?>

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?=$item->lat?>, <?=$item->lng?>),
        map: map,
        animation: google.maps.Animation.DROP,
        icon: '<?=base_url().'assets/logos/urbanizacion.png'?>'
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<?=$item->nombre?>');
          infowindow.open(map, marker);
        }
      })
      (marker, <?=$item->id?>));
  <?php endforeach ?>

  var infowindow2 = new google.maps.InfoWindow();
  <?php foreach ($urbanizacionescentrado as $item): ?>

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?=$item->posY?>, <?=$item->posX?>),
        map: map,
        animation: google.maps.Animation.DROP
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow2.setContent('<?=$item->nombre?>');
          infowindow2.open(map, marker);
        }
      })
      (marker, <?=$item->id?>));
  <?php endforeach ?>

      $('#ModalMap').on('shown.bs.modal', function () {
          google.maps.event.trigger(map, "resize");
          map.setCenter(var_location);
      });
  }
});


</script>