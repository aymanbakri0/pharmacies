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
        show_by_maps
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

<form action="show_by_list.php" >
<div class="form-group" style="padding-top: 0px;padding-right: 300px;padding-bottom: 10px;padding-left: 400px;">
    <h2>Chose the city</h2>
                                <label><h3>City</h3></label>
                                <select name="city">
                                <option selected="selected">all</option>
                                <option >dubai</option>
                                <option>sharja</option>
                                </select>
                            <div class="select-dropdown"></div>
                            <button class="btn btn-success btn-submit">save</button>
                            </div>
</form>

<?php
    $host='localhost';
    $user='root';
    $password='483';
    $db='pharmacies';

    $connection =  mysqli_connect($host,$user,$password,$db);
    $city = $_GET['city'];
   if($city)
   {
    $query = "SELECT * FROM pharmacy WHERE address ='" .$_GET['city'] ."' ";
   }
   elseif ($city='all'){$query = "SELECT * FROM pharmacy ";}
   else 
   {
    $query = "SELECT * FROM pharmacy ";
   }
    $rAdventure = mysqli_query ($connection , $query );

    if (mysqli_num_rows($rAdventure)>0) {
       
        while($row = mysqli_fetch_assoc($rAdventure)){
        ?>
        <div   style="margin-left: 350px ; border: 1px solid black;width: 390px;" >
            <div >   
                 <div class="row" style="text-align: center;">  
                     <p> <strong>Name :</strong> <?php echo $row["name"]; ?> </p>
                    <p> <strong>address :</strong> <?php echo $row["address"]; ?> </p>
                    <p> <strong>delivery :</strong> <?php echo $row["delivery"]; ?> </p>
                    <p> <strong>phon : </strong><?php echo $row["phon"]; ?> </p>
                    <p> <strong>email : </strong> <?php echo $row["email"]; ?>    </p>
                 </div>     
    </div>
    </div>
   
        <?php
        }
         ?>
         </div>  
         <?php

    } else {
        echo "0 results";
    }


    if (!$rAdventure)
    {
        echo"error";
        exit;
    }

    ?>

</body>
</html>