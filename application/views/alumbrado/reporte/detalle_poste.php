
<?php $si = '';$no=''; ?>
<?php foreach ($postes as $item): ?>
<?php if ($item->funciona_poste_si_no == 'SI'): ?>
  <?php
      $si .= "markers=color:yellow%7Clabel:".$item->numero_poste."%7C".substr($item->pos_y_p, 0,10).",".substr($item->pos_x_p, 0,10)."&";
  ?>
<?php else: ?>
  <?php
      $no .="markers=color:red%7Clabel:".$item->numero_poste."%7C".substr($item->pos_y_p, 0,10).",".substr($item->pos_x_p, 0,10)."&"
    ?>
<?php endif; ?>
<?php endforeach; ?>
<div class="row">
  <div class="col-md-10 col-xs-offset-1">
    <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $luminaria->pos_y; ?>,<?= $luminaria->pos_x ?>&zoom=18&size=600x600&maptype=satellite&<?= $si.$no ?>markers=color:blue%7Clabel:P%7C<?=substr($luminaria->pos_y,0,10).",".substr($luminaria->pos_x,0,10)?>&key=AIzaSyC6Hx8BQ6pdC74tYglLjCMR4ynlwqllVmw" style="width:600px;height:600px">
  </div>
</div><br>
<div class="row">
    <div class="col-md-6 col-xs-offset-1">
      <table style="width:600px" border="2px">
        <tr>
          <td colspan="6" align="center" width="700px">FICHA TECNICA</td>
          <!--<td colspan="3" align="center">ESTADO DEL AREA <?=$luminaria->tipo_area?> </td>-->
        </tr>
        
        <tr>
          <td colspan="6" align="center">
            Codigo de area: <b><?=$luminaria->codigo_area?></b><br>
            Nombre de area: <b><?=$luminaria->nombre_area?></b><br>
            Tipo de area: <b><?=$luminaria->tipo_area?></b><br>
            Direccion: <b><?=$luminaria->direccion?></b><br>
            Nro postes de luz: <b><?=$luminaria->nro_postes_luz?></b><br>
            No funcionan: <b><?=$luminaria->nro_no_funcionan?></b><br>
          </td>
          <!--
          <td colspan="3" align="center">
            Estado de la plaza: <b><?=$luminaria->estado_area_plaza?></b><br>
            Rejas descubiertas: <b><?=$luminaria->rejas_descubiertas?></b><br>
            Rejas cerradas: <b><?=$luminaria->rejas_cerradas?></b><br>
          </td>
          -->
        </tr>
        <!--
        <tr>
          <td colspan="3" align="center">EQUIPAMIENTO AREA PLAZA</td>
          <td colspan="3" align="center">AREA VERDE EN PLAZA <?=$luminaria->tipo_area?> </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            Banquetas: <b><?=$luminaria->banqueta_area?></b><br>
            Basureros: <b><?=$luminaria->basureros?></b><br>
            Monumentos: <b><?=$luminaria->monumentos?></b><br>
            Plaquetas de creacion: <b><?=$luminaria->plaquetas_creacion?></b><br>

          </td>
          <td colspan="3" align="center">
            Mantenimiento: <b><?=$luminaria->mantenimiento?></b><br>
            Limpias: <b><?=$luminaria->limpias?></b><br>
          </td>
        </tr>Z
        <tr>
          <td colspan="6" align="center">ACTIVIDADES O SERVICIOS EN PLAZAS</td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            Modulo Policial: <b><?=$luminaria->modulo_policial?></b><br>
            Centro de salud: <b><?=$luminaria->centro_salud?></b><br>
            Parada transporte: <b><?=$luminaria->parada_trasnporte?></b><br>
          </td>
          <td colspan="3" align="center">
            Comercio: <b><?=$luminaria->comercio?></b><br>
            Venta de comidas: <b><?=$luminaria->venta_comidas?></b><br>
            Snacks: <b><?=$luminaria->snacks?></b><br>
            Venta de productos: <b><?=$luminaria->venta_productos?></b><br>
            Observaciones: <b><?=$luminaria->observaciones?></b><br>
          </td>
        </tr>

      </table>

      </blockquote>
      <table style="width:600px;" border="2px">
        <tr>
          <td align="center">Numero de poste</td>
          <td align="center">Estructura de poste</td>
          <td align="center">Tipo de poste</td>
          <td align="center">Tipo luminaria</td>
          <td align="center">Potencia</td>
          <td align="center">Funciona SI/NO</td>
        </tr>
        -->
        <?php foreach ($postes as $item): ?>
          <tr>
            <td align="center"><?=$item->numero_poste?></td>
            <td align="center"><?=$item->nombre_estructura_poste?></td>
            <td align="center"><?=$item->nombre_tipo_poste?></td>
            <td align="center"><?=$item->nombre_tipo_luminaria?></td>
            <td align="center"><?=$item->potencia?></td>
            <td align="center"><?=$item->funciona_poste_si_no?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
</div>
