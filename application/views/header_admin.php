<meta name="robots" content="no-cache" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Mininoo" />
<meta name="keywords" content="love, passion, intrigue, deception" />
<meta name="robots" content="no-cache" />

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" type="text/css" />

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

<

<div class="container">

    <div class="menu-admin" style="margin-bottom: 50px;">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">

                    <a class="brand" href="<?php echo base_url() ?>">OMSC</a>
                    <ul class="nav">
                        <li class="active1"><?php echo anchor('admin', '<i class="icon-home"></i>|Inicio'); ?></li>
                        
                        <li> <?php echo anchor('admin_crud/registro_mapas', 'Administracion de Mapas'); ?></li>
                        <li> <?php echo anchor('admin_crud/accesorios_robados', 'Accesorios Robados'); ?></li>
                       <li> <?php echo anchor('admin_crud/autopartes_robadas', 'Autopartes Robadas'); ?></li>
                       <li> <?php echo anchor('admin_crud/avenida', 'Avenida'); ?></li>
                       <li> <?php echo anchor('admin_crud/calle', 'Calle'); ?></li>
                       <li> <?php echo anchor('admin_crud/clase_vehiculo', 'Clase vehiculo'); ?></li>
                       <li> <?php echo anchor('admin_crud/clasificacion', 'Clasificacion'); ?></li>
                       <li> <?php echo anchor('admin_crud/delito', 'Delito'); ?></li>
                       <li> <?php echo anchor('admin_crud/distrito', 'Distrito'); ?></li>
                       <li> <?php echo anchor('admin_crud/division', 'Division'); ?></li>
                       <li> <?php echo anchor('admin_crud/documentos_robados', 'Documentos Robados'); ?></li>
                       
                       <li> <?php echo anchor('admin_crud/template', 'template'); ?></li>
                    </ul>
                    
                    <a href="<?php echo base_url() ?>login/logout_ci" role="button" class="btn btn-primary" data-toggle="modal">Cerrar sesion</a>
                </div>
            </div>
        </div>  
    </div>

</div>





