<?php 
include('header.php');
?>
<link rel="stylesheet" href="css/calendar.css">
<link rel="stylesheet" href="css/maps.css">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">

<style>
	.row{
		display: flex;
		justify-content: space-around;
		width: 100%;
	}
	.logo{
		position: absolute;
		background-color: blue;
		height; 40px;
		width: 350px;
		color:white;
		text-align: center;
		top: 5%;
	} 
	#map{
		height:500px;
		width:600px;
		padding-top: 25px;
	}

</style>
<div class="logo">
	<p>Voyger</p>
</div>

<div class="container">	
	<div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn btn-default" data-calendar-nav="today">Today</button>
				<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>
				<button class="btn btn-warning" data-calendar-view="week">Week</button>
				<button class="btn btn-warning" data-calendar-view="day">Day</button>
			</div>
		</div>
		<h3></h3>
	</div>
	<div class="row">
		<div class="cal_eve">
		<div class="col-md-3">
			<h4>All Events List</h4>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
		<div class="col-md-9">
			<div id="showEventCalendar"></div>
		</div>
		
		</div>
		<div id="map"></div>
	</div>	
	<!-- maps -->
	
	
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>


<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script>
      mapboxgl.accessToken = 'pk.eyJ1Ijoic2FtaXIzMTIiLCJhIjoiY2xya2w0MjF6MDRydjJpbzFsY3VnOWpodyJ9.n8___7lS38DG91NcS6JpNw';
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [85.300140,27.700769],
        zoom: 12
      });

	  const marker1 = new mapboxgl.Marker()
		.setLngLat([85.300140,27.700769])
		.addTo(map);
	

</script>

