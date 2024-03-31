<?php 
include_once("db_connect.php");
include('header.php');
// $condition = "$id == ";
// $sql = "SELECT id FROM event where date";
// if ($condition) {
//     $sql .= " WHERE $condition";
// }
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM event where id=$id"; // Modify this query as needed
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$title=$row["title"];
	$date = $row["start_date"];
    $id = $row["id"];
    $description = $row['description'];
    $markerLng = $row["longitude"];
    $markerLat = $row["latitude"];
} else {
    echo "No results found in the database.";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Stay organized with our user-friendly Calendar featuring events, reminders, and a customizable interface. Built with HTML, CSS, and JavaScript. Start scheduling today!"
    />
    <meta
      name="keywords"
      content="calendar, events, reminders, javascript, html, css, open source coding"
    />
    
    
    <link rel="stylesheet" href="css/calendar.css">
	<link rel="stylesheet" href="css/maps.css">
	<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
    

    <link rel="stylesheet" href="style.css" />
    <title>Voyager</title>
  </head>
	<body>
<!-- <?php include('container.php');?> -->
<style>

	.row{
		display: flex;
		justify-content: space-between;
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
	.container{
		width:100%;
	}

	#map{
		height:500px;
		width:600px;
		padding-top: 25px;
	}
	#description{
		width: 550px;
		height: auto;
		margin: 30px;
		text-align:justify;
		box-shadow: 3px 6px 10px black;
		padding: 40px;
		font-size: 15px;	
	}
	#description ul li{
		list-style-type: sqaure;
	}
	.cal_eve{
		display: flex;
		justify-content: space-between;
	}
	#controls{
		left: 23%;
		position: absolute;
	}
	.container .page-header{
		margin-top:0;
	}
	.container .page-header .voy h1{
		padding-top:50px;
		background-color:black;
		color:white;
	}

</style>

<div class="container">	
	<div class="page-header">
		<div class="voy">
			<h1 style="text-align:center;font-family:'sans';padding-bottom:50px;margin-top:0;">Voyager</h1>
		</div>
		<div class="pull-right form-inline" id="controls">
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
		<div class="col-md-4">
			<h4>All Events List</h4>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
		<div class="col-md-9">
			<div id="showEventCalendar"></div>
		</div>
		
		</div>
		<div class="map_container">
		<div id="map"></div>
		<div id="description"><?php echo "
			<p><h3>$date<br/></h3><h4><b><em>$title</em></b></h4></p>
			<li>$description</li>
			"?></div>
		</div>
        <!-- <div id="description"><?php echo $description?></div> -->
	</div>	
	<!-- maps -->
	
	
</div>
	</body>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>


<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script>
      mapboxgl.accessToken = 'pk.eyJ1Ijoic2FtaXIzMTIiLCJhIjoiY2xya2w0MjF6MDRydjJpbzFsY3VnOWpodyJ9.n8___7lS38DG91NcS6JpNw';
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [<?php echo $markerLng; ?>, <?php echo $markerLat; ?>],
        zoom: 15
      });

      var marker = new mapboxgl.Marker()
            .setLngLat([<?php echo $markerLng; ?>, <?php echo $markerLat; ?>])
            .addTo(map);
	

</script>
</html>

