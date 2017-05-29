<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <style type="text/css">
            body{
                background: #888888
            }
            #sidebar{
                position: absolute;
                width: 18%;
                height: 590px;
                background: #222;
                color: #fff;
                margin-left: 80%;
                margin-top: -600px;
                border: 5px solid #fff;
            }
            ul{
                padding: 0;
                text-align: justify;		
            }

            li{
                cursor: pointer;
                border-top: 1px solid #fff;
                background: #c3c3c3; 
                list-style: none;
                color: #111
            }
            li:hover{
                background: #fefefe;
            }
        </style>
        <script type="text/javascript">
            function datos_marker(lat, lng, marker)
            {
                var mi_marker = new google.maps.LatLng(lat, lng);
                
                map.panTo(mi_marker);
                google.maps.event.trigger(marker, 'click');
            }
        </script>
        <?= $map['js'] ?>
        <title>La librería googlemaps de codeigniter por Biostall.com</title>
    </head>
    <body>
        <?= $map['html'] ?>
        <div id="sidebar" >
            <ul>
                <?php
                foreach ($datos as $marker_sidebar) {
                    ?><li onclick="datos_marker(<?= $marker_sidebar->pos_y ?>,<?= $marker_sidebar->pos_x ?>, marker_<?= $marker_sidebar->id_operativo ?>)">
                    <?= '<strong style="color: #c7254e">✓&nbsp;&nbsp;Zona:</strong>  '.$marker_sidebar->nombre.'<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Calle / Avenida:</strong> '.$marker_sidebar->nombre_c.'<br/> <strong style="color: #c7254e">✓&nbsp;&nbsp;Operativo:</strong>  '.$marker_sidebar->nombre_o ?></li><?php
                    }
                    ?>
            </ul>
           
            
        </div>
       
    </body>
</html>