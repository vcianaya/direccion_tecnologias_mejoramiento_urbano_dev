<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/960.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/reset.css" media="screen" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.mlens-1.2.min.js"></script>
        <script type="text/javascript" 
                src="http://maps.googleapis.com/maps/api/js?sensor=false&language=es">
        </script>
        <script type="text/javascript">
            //Declaramos la variable G, esto para hacer llamadas rápidas dentro de la API, que generalmente se pone
            //algo como: google.maps.LatLng(xxxx,yyyy), con esto lo cambiamos por: G.LatLng
            //Declaramos nuestra variable kml y show que ocuparemos más abajo
            var G = google.maps;
            var kml = null;
            var show = false;
            //La variable azcapotzalco la declaramos como la posición inicial en el mapa, esto será parael boton de "reset" que pondremos
            var azcapotzalco = new google.maps.LatLng(19.490544, -99.190493);

            //Inicio función centrar
            //Esta función nos centra la vista del çódigo, viene más explicado en developers de maps
            function HomeControl(controlDiv, map) {

                // Set CSS styles for the DIV containing the control
                // Setting padding to 5 px will offset the control
                // from the edge of the map
                controlDiv.style.padding = '5px';

                // Set CSS for the control border
                var controlUI = document.createElement('DIV');
                controlUI.style.backgroundColor = 'white';
                controlUI.style.borderStyle = 'solid';
                controlUI.style.borderWidth = '2px';
                controlUI.style.cursor = 'pointer';
                controlUI.style.textAlign = 'center';
                controlUI.title = 'Click para colocar en la posición inicial';
                controlDiv.appendChild(controlUI);

                // Set CSS for the control interior
                var controlText = document.createElement('DIV');
                controlText.style.fontFamily = 'Arial,sans-serif';
                controlText.style.fontSize = '12px';
                controlText.style.paddingLeft = '4px';
                controlText.style.paddingRight = '4px';
                controlText.innerHTML = 'Centrar el Mapa';
                controlUI.appendChild(controlText);


                google.maps.event.addDomListener(controlUI, 'click', function () {
                    //Aquí declaramos que al dar click en el boton se ejecute la acción de centrar con los parametros de 'azcapotzalco'
                    map.setCenter(azcapotzalco)
                    //Colocamos el zoom inicial del mapa
                    map.setZoom(13);
                });
            }
            //Termina código para "resetear" mapa

            //Dentro de esta función vamos a mandar a llamar capas dinamicamente, en este caso son archivos kml los cuales 
            //se pueden generar con Google Earth
            function toggle() {
                if (!this.kmlLayer) {
                    this.kmlLayer = new G.KmlLayer(
                            'http://192.168.43.81:9090/observatorio/assets/maps/' + this.id + '.kml', //ponemos la ruta de donde va a mandar a llamar los archivos.
                            {preserveViewport: true});
                    this.displayIsOn = false;
                }

                //Declaramos que cuando esté desactivado el checkbox no nos muestre la capa
                if (this.displayIsOn) {
                    this.kmlLayer.setMap(null);
                    this.displayIsOn = false;
                }
                else {
                    this.kmlLayer.setMap(map);
                    this.displayIsOn = true;
                    //Declaramos que cuando esté activado el checkbox nos muestre la capa
                }
                ;
            }
            ;


            //Con esta función inicializamos el mapa
            function initialize() {
                //Tomamos los valores del input que agregamos abajo para mostrar las capas
                var layers = document.getElementsByTagName('input');
                //Agregamos las opciones iniciales para la capa, la longitud inicial, el nivel de zoom, que tipo de mapa es 
                //(en este punto podemos declarar ROADMAP, SATELLITE, HYBRID, TERRAIN para diferentes vistas )
                //decimos que si queremos poder manejar el zoom, en overviewMapControl es para que se ponga la vista miniatura
                //dentro de mapTypeControlOptions podemos declarar la forma en la que se verá el menú, con formato vertical 
                //o en forma de "lista"
                var options = {
                    center: new G.LatLng(19.490544, -99.190493),
                    zoom: 13,
                    mapTypeId: G.MapTypeId.ROADMAP,
                    scaleControl: true,
                    overviewMapControl: true,
                    mapTypeControlOptions: {
                        style: G.MapTypeControlStyle.DROPDOWN_MENU}
                };

                //Inicializamos el mapa con las opciones que declaramos arriba
                map = new G.Map(document.getElementById('map'), options);
                //En este caso vamos a declarar una capa inicial para nuestro mapa, es un archivo kmz y se cargará al inicializar el mapa
                // var kmzLayer = new google.maps.KmlLayer('http://kaguamedia.com/kml/Azcapotzalco.kmz');
                var kmzLayer = new google.maps.KmlLayer('http://192.168.43.81:9090/observatorio/assets/kml/Azcapotzalco.kmz');
                kmzLayer.setMap(map);
                //En esta función vamos a declarar otra capa, en este caso un archivo kml para que de la misma forma se inice con el mapa
                // var kmzLayer = new google.maps.KmlLayer('http://kaguamedia.com/kml/Colonias.kml');
                var kmzLayer = new google.maps.KmlLayer('http://192.168.43.81:9090/observatorio/assets/kml/Colonias.kml');
                kmzLayer.setMap(map);
                //Agrego de los dos tipos de archivos para que vean que la forma de llamar un kmz y un kml es la misma.

                //Creamos el div para la función centrar arriba mostrada
                var homeControlDiv = document.createElement('DIV');
                var homeControl = new HomeControl(homeControlDiv, map);
                homeControlDiv.index = 1;
                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);

                //En esta función vamos a tomar los valores de los checkbox que están declarados en el código para que se manden a llamar
                //las capas de forma dinámica. El valor final de i será igual al número de capas que declaren dentro del id mapas
                for (var i = 0; i < 2; i++) {
                    layers[i].type = 'checkbox';
                    G.event.addDomListener(layers[i], 'click', toggle)
                }
                ;
            }
            ;

            G.event.addDomListener(window, 'load', initialize);

        </script>
        
<script>

            function initialize() {
                var fenway = {lat: 42.345573, lng: -71.098326};
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: fenway,
                    zoom: 14
                });
                var panorama = new google.maps.StreetViewPanorama(
                        document.getElementById('pano'), {
                    position: fenway,
                    pov: {
                        heading: 34,
                        pitch: 10
                    }
                });
                map.setStreetView(panorama);
            }

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=API_KEY&signed_in=true&callback=initialize">
        </script>


    </head>

</head>
<body>


    <div id="page-wrap">
    

<table width="539" height="291" border="0" align="center">
  <tr>
    <td width="134"><img src="<?php echo base_url() ?>assets/logos/llenado_datos.jpg" alt="..."></td>
    <td width="162">&nbsp;</td>
    <td width="129"><img src="<?php echo base_url() ?>assets/logos/reportes.jpg" alt="..."></td>
  </tr>
</table>
        </div>
</body>
</html>