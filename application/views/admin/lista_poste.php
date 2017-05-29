<br>
<a href="#" class="btn btn-primary ok">asdasdasdsa</a>
<br>
<div class="container-fluid">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">LISTADO DE POSTES</h3>
    </div>
    <div class="panel-body table-responsive">
      <table class="example table table-striped table-bordered">
        <thead>
            <td>ID</td>
            <td style="width:100px">Distrito</td>
            <td style="width:250px">Zona</td>
            <td style="width:250px">Direccion</td>
            <td style="width:80px">Area</td>
            <td>Nro. Postes</td>
            <td>No funcionan</td>
            <td>Accion</td>
        </thead>
        <tbody>

          <?php foreach ($luminarias as $item): ?>
          <tr>
            <td><?= $item->id  ?></td>
            <td><?= $item->nombre_distrito ?></td>
            <td><?= $item->nombrezona ?></td>
            <td><?= $item->direccion ?></td>
            <td><?= $item->codigo_area ?></td>
            <td><?= $item->nro_postes_luz ?></td>
            <td><?= $item->nro_no_funcionan ?></td>
            <td>
              <a href="<?=base_url()?>detalle_area/<?= $item->id?>" target="_blank" class="btn btn-primary">
                <i class="glyphicon glyphicon-print"></i>
              </a>

              <a href="#" class="btn btn-primary ok">
                <i class="glyphicon glyphicon-glass"></i>
              </a>

            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">


                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
            <div class="modal-body" id="modal-bodyku">

            </div>
            <div class="modal-footer" id="modal-footerq">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button><button id="enviar" class="btn btn-primary">Aceptar</button>
            </div>
            </div>
        </div>
    </div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(".example").DataTable({});
  _modal = $('#myModal');
  $('.ok').unbind().bind('click',function(e){
            e.preventDefault();
            console.log('asdsa');
            _modal.modal('show');
          });
});
</script>
</body>

</html>
