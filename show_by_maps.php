<!-- creater by ayman bakri 26/2/19 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>pharmacies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrab/bootstrap.min.css">
    <script src="bootstrab/jquery.min.js"></script>
    <script src="bootstrab/bootstrap.min.js"></script>
</head>
<body>
   
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" style="margin-left: 10px ; color: blue;" >pharmacies</a>
        </div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="first_page.php?username=&pass=1" target="_self">Home</a></li>
        </ul>
        <ul class="nav navbar-nav">
        <li class="active"><a href="show_by_list.php?city=dubai" target="_self">show by list</a></li>
        </ul>
        <ul class="nav navbar-nav">
        <li class="active"><a href="show_by_maps.php" target="_self">show by maps</a></li>
        </ul>       
    </div>
</nav>



<div class="form-group" id="googleMap" style="width:100%;height:550px;"></div>
                            <script>
            function myMap() {
            var mapProp= {
              center:new google.maps.LatLng(25.205151749822583, 55.270804898884194),zoom:15,};
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            <?php
    $host='localhost';
    $user='root';
    $password='483';
    $db='pharmacies';
    $connection =  mysqli_connect($host,$user,$password,$db);
    $query = "SELECT * FROM pharmacy";
    $rAdventure = mysqli_query ($connection , $query );
    if (mysqli_num_rows($rAdventure) > 0) {
       
        while($row = mysqli_fetch_assoc($rAdventure)) {
            ?>
            var uluru = {lat: <?PHP echo $row["lat"] ; ?>, lng: <?PHP echo $row["longt"] ; ?>};
            var marker = new google.maps.Marker({position: uluru, map: map , title:'<?PHP echo $row["name"] ; ?>'});
            <?php
        }
    } 
        ?>
            }
            </script>
            <script>
<script src="js/global.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-FkbFB3a-RdYJcNA1Klh9bl6ABESYq0w&callback=myMap"></script>
