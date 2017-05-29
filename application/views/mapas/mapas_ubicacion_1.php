<html>
<head>
  <title>OSM Print Maps Job Editor</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jobEditor.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/leaflet.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/smoothness/jquery-ui-1.8.18.custom.css" />
  <link id="favicon" rel="shortcut icon" href="<?php echo base_url() ?>assets/images/beer.ico" />
</head>
<body>
  <div id="header">
    <h1>OSM Print Maps</h2>
  </div> <!--header-->
  <div id="tabs">
    <ul>
     
      <li><a href="#tabs-1">Create Map</a></li>

    </ul>
    
    <div id='tabs-1'>
      <div id="map">
	Map Goes Here
      </div>
      <div id="sidebar">
	<div id='accordion'>
	  <ul>
	    <li><a href="#renderer">General</a></li>

	  </ul>

	  <div id="renderer">
	
	
	    <label>Paper Size:</label>
	    <SELECT id="paperSizeSelect">
	      <option selected value="A4">A4</option>
\
	    </SELECT>
	  
	
	    <!--
	    <label>Map Size (w,h) km:</label>
	    <input id="mapSizeW" type="text" size="3" value="5"/>,
	    <input id="mapSizeH" type="text" size="3" value="5"/>
	    <br/>
	    -->
	    <label>Map Scale:</label>
	    <select id='mapScaleSelect'>
	      <option value='10000'>1:10000</option>
	      <option selected value='25000'>1:25000</option>
	      <option value='50000'>1:50000</option>
	      <option value='100000'>1:100000</option>
	      <option value='250000'>1:250000</option>
	      <option value='500000'>1:500000</option>
	    </select>
	  </div> <!--renderer-->
	  
	

	  <br/>
	    <label>Map Centre (lon,lat):</label>
	    <input id="mapCenterLon" type="text" size="5" value="lon"/>,
            
            
	    <input id="mapCenterLat" type="text" size="5" value="lat"/>
	</div> <!-- accordion -->
	
	
	
      </div> <!--sidebar-->
    </div> <!--tabs-1-->

    
    
  
    





</div> <!--tabs-->



<script src="<?php echo base_url() ?>assets/js/leaflet.js"></script>
<script src="<?php echo base_url() ?>assets/js/proj4js-compressed.js"></script> 
<script src="<?php echo base_url() ?>assets/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/geturl.js"></script>
<script src="<?php echo base_url() ?>assets/js/jobEditor.js"></script>

<script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: "blind",
      hide: "explode" 
    });
    //$("#accordion").accordion();
  $("#accordion").tabs();
    $("#tabs").tabs({selected : 0});
    //$("#tabs").tabs();
    $("#tabs-2").tabs();
  });
</script>
</body>

</html>

