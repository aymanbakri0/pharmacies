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
<body style="background: #ffffff url('back.jpg') ;
  margin-top: 20px;" >
    <?php
    $host='localhost';
    $user='root';
    $password='483';
    $db='pharmacies';
    $aaaa = 0;
    $connection =  mysqli_connect($host,$user,$password,$db);
     $pass = $_GET['pass'];
    if ($pass){}
else {
    @$image = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
    // $file = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO `pharmacy` (`id`, `name`, `address`, `lat`, `longt`, `delivery`, `picture`, `phon`, `email`, `Confirmation`) VALUES (NULL,  '" .$_GET['name'] ."', '" .$_GET['city'] ."', '" .$_GET['long'] ."', '" .$_GET['lit'] ."', '" .$_GET['delivery'] ."', '$image', '" .$_GET['Phone'] ."', '" .$_GET['Email'] ."','NO')";
    $rAdventure = mysqli_query ($connection , $query );
    if ($rAdventure)
    {?>
    <script>
    alert("insert data was successful");
  </script>
    <?php }
}
    ?>
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

         <ul class="nav navbar-nav">
         <li class="nav-item">
            <a class="active" href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModa7" style="color: white;" > insert new pharmacies</a>
            <div class="modal fade" id="exampleModa7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalLabel" style="margin-left: 180px "> add new pharmacies </h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form href="first_page.php"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label>name</label>
                                <input type="text" name="name" class="form-control" placeholder="enter the name" required="">
                            </div>
                            <div class="form-group" id="googleMap" style="width:100%;height:400px;"></div>
                            <script type="text/javascript">
            function myMap() {
            var mapProp= {
              center:new google.maps.LatLng(25.205151749822583, 55.270804898884194),zoom:15,};
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            google.maps.event.addListener(map, 'click', function(event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                var uluru = {lat: event.latLng.lat(), lng: event.latLng.lng()};
                var marker = new google.maps.Marker({position: uluru, map: map});
                document.getElementById('long').value=lat;
                document.getElementById('lit').value=lng;
            // alert(event.latLng.lat() + ", " + event.latLng.lng());
            });}
            </script>
            <input type="hidden" name="long" id="long" value="">
            <input type="hidden" name="lit" id="lit" value="">
            
                            <div class="form-group">
                                <label>City</label>
                                <select name="city">
                                <option selected="selected">dubai</option>
                                <option>sharja</option>
                                </select>
                            <div class="select-dropdown"></div>
                            </div>
                            <div class="form-group">
                                <label>delivery</label>
                                            <select name="delivery">
                                                <option selected="selected">Yes</option>
                                                <option>No</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                            </div>
                            <div class="form-group">
                                <label>Select image to upload:</label>
                                <input type="file" name="image" id="image">
                            </div>
                          
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="Email" class="form-control" placeholder="enter the URL download about Film" required="">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="Phone" class="form-control" placeholder="enter the Evaluation about Film"required="">
                            </div> 
                           
                              <input type="hidden" name="pass" style="width:1px ; height:1px ; ">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-submit" style=" width:100%">save</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
       
    </div>
</nav>

<script src="js/global.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-FkbFB3a-RdYJcNA1Klh9bl6ABESYq0w&callback=myMap"></script>
        </body>