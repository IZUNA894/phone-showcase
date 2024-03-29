<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <?php
    include "templates/head_import.php" ?>

    <!-- including custom css -->
    <link href="index.css" rel="stylesheet">

    <title>CYBER SEC</title>
    <!-- importing google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

    <!-- some custom css -->
    <style media="screen">
      *{
        font-family: "Comic Sans MS", cursive, sans-serif;

      }
    </style>

    <!-- php script goes here-->
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phone database";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM phone";
$result = $conn->query($sql);
//echo $result."hello";

// including php file having all functions used here
include 'util.php';
?>
  </head>
  <body>

    <!-- header section -->
  <?php include "templates/header.php" ?>
<!-- ending header -->

  <br>
  <br>
  <br>
<!-- staring card deck -->
  <div class="container">
    <div id="response">
    </div>

    <h2 style="text-align:center;color:#007bff;">Mobile we have...</h2>
    <!-- first row -->
    <div class="row">
      <?php
      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
           ?>

           <div class="col-lg-4" style="margin-top:10px;">
             <!--  card -->
             <div class="card" style="align:center;">
             <img class="card-img-top card-images" style="max-width:100%;height:auto;display: block;
  margin-left: auto;
  margin-right: auto;" src= "<?php echo 'uploads/'.$row['img'] ?>" alt="Card image cap">
             <div class="card-body">
               <h4 class="card-title" style="display:inline;color:#007bff;font-weight:bold;font-family:;"> <?php echo $row["company"]." ".$row["model"] ?></h5>
               <button type="button" class="btn btn-primary float-right">
                Price <span class="badge badge-pill badge-light"><?php echo $row["price"] ?></span>
               </button>


               <p class="card-text"></p>
             </div>
             <!-- specs table goes here -->
             <div class="" style="overflow:auto;height:150px;">


             <table class="table table-hover" >
                <?php

                $specs=array();


                mk_array($row["specs"]);

                foreach($specs as $key => $value) {
                  ?>
                  <tr >
                    <td>  <?php echo $key ?></td>
                    <td style="text-align:right;"><?php echo $value ?></td>
                  </tr>
                <?php } ?>
             </table>
           </div>

             <div class="card-body">
               <a href="add.php?edit_id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>

               <a href="" onClick="delete_phone(<?php  echo $row['id'] ?>);" class="btn btn-primary float-right">Delete</a>
             </div>
           </div>
           </div>








        <?php   }
      } else {
         echo "0 results";
      }
      $conn->close(); ?>



    </div>
    <!-- ending row -->
  </div>
  <!-- ending card deck -->


<br>
<br>
<br>

<!-- footer section -->
<?php include "templates/footer.php" ?>
</body>
</html>
