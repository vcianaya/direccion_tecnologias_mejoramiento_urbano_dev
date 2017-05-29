<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Selects en cascada con codeigniter y jQuery</title>
</head>
<body>
<h1>Selects en cascada con codeigniter y jQuery</h1>
<?php
$data = array(
  'name'        => 'postal',
  'id'          => 'postal',
  'maxlength'   => '100',
  'size'        => '6'
);
 
//desplegable provincias
echo form_dropdown('provincias', $provincias, '', 'id="provincias"');
//desplegable poblaciones
echo form_dropdown('poblaciones', array('@' => 'Escoge una Zona'), 'Escoge una Zona', 'id="poblaciones"');
//campo de texto postal
echo form_input("postal");
//desplegable provincias2
echo form_dropdown('provincias2', array('@' => 'Escoge una Zona'), '', 'id="provincias2"');
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("input[name=postal]").attr('disabled','disabled');
    //al cambiar el select provincias
    $("#provincias").on("change", function()
    {
        //obtenemos la id de la provincia seleccionada
        var provinciaSelected = $( "#provincias option:selected").attr("value");
        //hacemos la petición via get contra home/getAjaxPoblacion pasando la provincia
        $.get("<?php echo base_url('mapa/getAjaxPoblacion') ?>", {"provincia":provinciaSelected}, function(data)
        {
            //parseamos el json y recorremos
            var poblaciones = "";
            var poblacion = JSON.parse(data);
            for(datos in poblacion.poblaciones)
            {
                poblaciones += '<option value="'+poblacion.poblaciones[datos].id+'">'+
                poblacion.poblaciones[datos].nombre+'</option>';
            }
            //populamos el desplegable poblaciones con las poblaciones obtenidas
            $('select#poblaciones').html(poblaciones);
            $('input[name=postal]').val(poblacion.postal);
        });
    });
 
    //al cambiar el select poblaciones
    $("#poblaciones").on("change", function()
    {
        //obtenemos la id de la población seleccionada
        var poblacionSelected = $("#poblaciones option:selected").attr("value"), provincias = "";
        //hacemos la petición via get contra home/getAjaxPostal pasando la población
        $.get("<?php echo base_url('mapa/getAjaxPostal') ?>", {"poblacion":poblacionSelected}, function(data)
        {
            //parseamos la respuesta
            var data = JSON.parse(data);
            //pintamos el resultado en el campo de texto
            $('input[name=postal]').val(data.postal);
 
            //como tenemos formateado el array no sirve el for in
            //pero si el each, que accede a la clave y al valor
            $.each(data.provincias, function(k, v)
            {
            	provincias += '<option value="'+k+'">'+ v +'</option>';
            })
            //populamos el desplegable provincias2 de nuevo con todas las provincias
            $('select#provincias2').html(provincias);
        });
    });
});
</script>
</body>
</html>