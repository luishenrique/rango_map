<!DOCTYPE html>
<html>
  	<head>
        <meta charset="utf-8">
        <title>Rango Map</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
 		<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
		<script src="http://maps.google.com/maps/api/js?sensor=true&libraries=geometry&v=3.7"></script>
		<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
		<script src="../../js/maplace-0.1.3.js"></script>
        
        
<script>

var maplace = new Maplace({
    map_div: '#gmap-mixed',
    controls_div: '#controls-mixed',
    controls_type: 'list',
    controls_on_map: false
});

$('#tabs a').click(function(e) {
    e.preventDefault();
    var index = $(this).attr('data-load');
    showGroup(index);
});

function showGroup(index) {
    var el = $('#g'+index);
    $('#tabs li').removeClass('active');
    $(el).parent().addClass('active');
    $.getJSON('ajax.php', { type: index }, function(data) {
        //loads data into the map
        maplace.Load({
            locations: data.locations,
            view_all_text: data.title,
            type: data.type,
            force_generate_controls: true
        });
    });
}

showGroup(0);

</script>
</head>
<body>
	<ul id="tabs">
    	<li><a href="javascript:void(0)" data-load="0" id="g0" title="Group A">Group A</a></li>
    	<li><a href="javascript:void(0)" data-load="1" id="g1" title="Group B">Group B</a></li>
    	<li><a href="javascript:void(0)" data-load="2" id="g2" title="Group C">Group C</a></li>
    	<li><a href="javascript:void(0)" data-load="3" id="g3" title="Group D">Group D</a></li>
    	<li><a href="javascript:void(0)" data-load="4" id="g4" title="Group E">Group E</a></li>
	</ul>
	<div id="controls-mixed"></div>
	<div id="gmap-mixed" style="height: 500px; width: 1200px"></div>
</body>
</html>