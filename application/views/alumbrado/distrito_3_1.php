
<?php $id ?> 
<?php
$var = $this->alumbrado_model->distrito_3($id);
foreach ($var as $p) {
    ?>

<?php } ?>


<div class="modal-header">
   
    <h4><strong>CODIGO DEL AREA <?= $p->codigo_area ?>

        </strong></h4>

</div> 
<div class="modal-body">

    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo base_url() ?>assets/uploads/soporte/<?= $p->imagen_area ?> "  width="350px" class="zoom" style="cursor: -webkit-zoom-in; transform: translate(0px, 0px);"/>
            <div class="row"> 
                <div class="col-md-12"> <h3><strong style="color: #0066FF">FICHA TECNICA </strong>  </h3></div>
            </div>
            <div class="row"> 
                <div class="col-md-12"> <h5><strong>CODIGO AREA: </strong><?= $p->codigo_area ?>  </h5></div>
            </div>
            <div class="row"> 
                <div class="col-md-12"> <h5><strong>NOMBRE AREA: </strong><?= $p->nombre_area ?>  </h5></div>
            </div>
            <div class="row"> 
                <div class="col-md-12"> <h5><strong>TIPO AREA: </strong><?= $p->tipo_area ?>  </h5></div>
            </div>
            <div class="row"> 
                <div class="col-md-12"> <h5><strong>DIRECCION: </strong><?= $p->direccion ?>  </h5></div>
            </div>
            <div class="row"> 
                <div class="col-md-12"> <h5><strong>NRO DE POSTES DE LUZ: </strong><?= $p->nro_postes_luz ?>  </h5></div>
            </div>
            <div class="row"> 
                <div class="col-md-12"> <h5><strong>NRO DE POSTES DE LUZ QUE FUNCIONAN: </strong><?php echo $p->nro_postes_luz - $p->nro_no_funcionan ?>  </h5></div>
            </div>
            <div class="row"> 
                <div class="col-md-12"> <h5><strong>NRO DE POSTES DE LUZ QUE NO FUNCIONAN: </strong><?= $p->nro_no_funcionan ?>  </h5></div>
            </div>
            <?php if ($p->tipo_area == 'PLAZA') { ?>
                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">ESTADO DEL AREA PLAZAS </strong>  </h3></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>ESTADO DE LA PLAZA: </strong><?= $p->estado_area_plaza ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>REJAS DESCUBIERTAS: </strong><?= $p->rejas_descubiertas ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>REJAS CERRADAS: </strong><?= $p->rejas_cerradas ?>  </h5></div>
                </div>
            <?php } else if ($p->tipo_area == 'PARQUE') { ?>
                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">ESTADO DEL AREA PARQUES </strong>  </h3></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>ESTADO DE LA PARQUES: </strong><?= $p->estado_area_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>REJAS DESCUBIERTAS: </strong><?= $p->rejas_descubiertas_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>REJAS CERRADAS: </strong><?= $p->rejas_cerradas_parques ?>  </h5></div>
                </div>
            <?php } ?>
        </div>
        <?php if ($p->tipo_area == 'PLAZA') { ?>
            <div class="col-md-4">
                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">EQUIPAMIENTO AREA PLAZAS </strong>  </h3></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>BANQUETAS: </strong><?= $p->banqueta_area ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>BASUREROS: </strong><?= $p->basureros ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>MONUMENTOS: </strong><?= $p->monumentos ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>PLAQUETAS DE CREACION: </strong><?= $p->plaquetas_creacion ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">AREA VERDE EN PLAZAS </strong>  </h3></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>MANTENIMIENTO: </strong><?= $p->mantenimiento ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>LIMPIAS: </strong><?= $p->limpias ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">ACTIVIDADES O SERVICIOS EN PLAZAS </strong>  </h3></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>MODULO POLICIAL: </strong><?= $p->modulo_policial ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>CENTRO DE SALUD: </strong><?= $p->centro_salud ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>PARADA DE TRANSPORTE: </strong><?= $p->parada_trasnporte ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>COMERCIO: </strong><?= $p->comercio ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>VENTA DE COMIDAS: </strong><?= $p->venta_comidas ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>SNACKS: </strong><?= $p->snacks ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>VENTA DE PRODUCTOS: </strong><?= $p->venta_productos ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>OBSERVACIONES: </strong><?= $p->observaciones ?>  </h5></div>
                </div>
            </div>
        <?php } else if ($p->tipo_area == 'PARQUE') { ?>
            <div class="col-md-4">
                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">EQUIPAMIENTO AREA PARQUES </strong>  </h3></div>
                </div>

                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>BANQUETAS: </strong><?= $p->banquetas_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>BASUREROS: </strong><?= $p->basureros_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>MONUMENTOS: </strong><?= $p->monumentos_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>PLAQUETAS DE CREACION: </strong><?= $p->plaquetas_creacion_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>JUEGO PARA NINOS: </strong><?= $p->juego_para_nino_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">AREA VERDE EN PARQUES </strong>  </h3></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>MANTENIMIENTO: </strong><?= $p->mantenimiento_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>LIMPIAS: </strong><?= $p->limpias_parques ?>  </h5></div>
                </div>

                <div class="row"> 
                    <div class="col-md-12"> <h3><strong style="color: #0066FF">ACTIVIDADES O SERVICIOS EN PARQUES </strong>  </h3></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>MODULO POLICIAL: </strong><?= $p->modulo_policial_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>CENTRO DE SALUD: </strong><?= $p->centro_salud_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>PARADA DE TRANSPORTE: </strong><?= $p->parada_transporte ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>COMERCIO: </strong><?= $p->comercio_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>VENTA DE COMIDAS: </strong><?= $p->venta_comidas_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>SNACKS: </strong><?= $p->snacks_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>VENTA DE PRODUCTOS: </strong><?= $p->venta_productos_parques ?>  </h5></div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> <h5><strong>OBSERVACIONES: </strong><?= $p->observaciones_parques ?>  </h5></div>
                </div>
            </div>
        <?php } ?>
        <div class="col-dm-3">

            <div class="row"> 
                <div class="col-md-3"> <h3><strong style="color: #0066FF">VIDEO</strong>  </h3></div>
                <video controls height="250px" width="350px">   <source src="<?php echo base_url() ?>assets/uploads/SOPORTE/<?= $p->video ?>" type="video/mp4"> </video>
            </div>

        </div>                                
    </div>
</div>
 <script src="<?php echo base_url() ?>assets/js/zoomerang.js"></script>
            <script>
            Array.prototype.forEach.call(document.querySelectorAll('p'), function (p, i) {
                p.style.marginLeft = i * 6 + '%'
            })
            Zoomerang
                    .config({
                        maxHeight: 900,
                        maxWidth: 900,
                        bgColor: '#000',
                        bgOpacity: .15,
                        ///    onOpen: openCallback,
                        // onClose: closeCallback,
                        ///  onBeforeOpen: beforeOpenCallback,
                        ///   onBeforeClose: beforeCloseCallback
                    })
                    .listen('.zoom')

            function openCallback(el) {
                console.log('zoomed in on: ')
                console.log(el)
            }

            function closeCallback(el) {
                console.log('zoomed out on: ')
                console.log(el)
            }

            function beforeOpenCallback(el) {
                console.log('on before zoomed in on:')
                console.log(el)
            }

            function beforeCloseCallback(el) {
                console.log('on before zoomed out on:')
                console.log(el)
            }

            </script>

