<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- importing google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <!-- importing google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

    <!-- including custom css -->
    <link href="styles.css" rel="stylesheet">

    <!-- including neccesary files -->
    <?php include "templates/head_import.php" ?>

    <title>ADD NEW PHONE</title>
    <!-- some custom css -->
    <style media="screen">
      *{
        font-family: "Comic Sans MS", cursive, sans-serif;

      }
      label{
        font-size:25px;
        color:#278fff;
      }
    </style>
    <!-- custome php for form validation -->
  <?php
    //$old=1;
    $model=$company=$price=$specs= "";
    $error= array("model"=>"","company"=>"","specs"=>"","price"=>"","img"=>"");
    $input=array("model"=>"","company"=>"","specs"=>"","price"=>"","img"=>"");
    $error_ideal=array("model"=>"","company"=>"","specs"=>"","price"=>"","img"=>"");
// including php custom file having all called functions
    include "util.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$model = test_input("model");
$company = test_input("company");
$price = test_input("price");
$specs = test_input("specs");
// function for checking file...
check_file();
$result = count(array_intersect($error,$error_ideal));
if($result==5){
  if(is_NULL($_SESSION["edit_id"]) ){


  insert_data();
  }
  else{
    echo "updating into databse";

    update_data($_SESSION["edit_id"]);
    $_SESSION["edit_id"]=NULL;
  }
  header("Location: index.php");
}
else{

  echo "aborting inserting $result";
}
}

if ($_SERVER["REQUEST_METHOD"] == "GET"  && !is_NULL($_GET["edit_id"]) ) {



  find_data($_GET["edit_id"]);
  $_SESSION["edit_id"]=$_GET["edit_id"];
  //echo $_SESSION["edit_id"];
  //delete_phone($_GET["edit_id"]);

}



?>
  </head>
  <body>

  <script type="text/javascript" src="add.js">

  </script>
    <!-- including header -->
  <?php include "templates/header.php" ?>

  <br>
  <br>
  <br>

  <div class="container" style="text-align:center;width:800px;">
    <h2 style="text-align:center;color:#007bff">ADD A NEW PHONE</h3>
      <br>

      <!-- form  -->
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">


<!-- inputing data for phone model -->
    <div class="form-group" style="">
    <label for="">PHONE MODEL</label>
    <input type="model" name="model" class="form-control" id=""
    <?php if(empty($input["model"])){ ?> placeholder="Enter model name"
  <?php }else{ ?> value= " <?php echo $input["model"]; };?>">
    <?php if(empty($error["model"])){
      ?>
    <small id="" class="form-text text-muted">here goes new phone name and its nodel number</small>
  <?php }else{ ?>
  <small id="" class="form-text text-danger"><?php echo $error["model"] ?></small>
<?php } ?>
    </div>


<!-- inputting data from "company" -->
    <div class="form-group">
    <label for="">COMPANY</label>
    <input type="company" name="company" class="form-control" id=""
    <?php if(empty($input["company"])){ ?>placeholder="Enter company name"
  <?php }else{ ?> value= " <?php echo $input["company"]; };?>">

    <?php if(empty($error["company"])){
      ?>
    <small id="" class="form-text text-muted">here goes new phone's company</small>
    <?php }else{ ?>
    <small id="" class="form-text text-danger"><?php echo $error["company"] ?></small>
  <?php } ?>    </div>


<!-- inputting data  for specs -->
    <div class="form-group">
    <label for="" style="display:block;">SPECS:</label>
    <input type="specs" name="specs" class="form-control" id="specs"
    <?php if(empty($input["specs"])){ ?>placeholder="Enter specs here"
  <?php }else{ ?> value= " <?php echo $input["specs"]; };?>" style="display:inline;width:85%;">
  <button onClick="make(document.getElementById('specs').value);" type="button" class="btn btn-primary">Preview</button>


    <?php if(empty($error["specs"])){
      ?>
    <small id="" class="form-text text-muted">input the specs in form of colon-spaced and semi-colon seprated line </br>
          for eg. ram:3gb;rom:4gb;camera:2mp</small>
    <?php }else{ ?>
    <small id="" class="form-text text-danger"><?php echo $error["specs"] ?></small>
    <?php } ?>


    <div class="" id="tgh">



    </div>
   </div>


<!-- inputting price -->
    <div class="form-group">
    <label for="">PRICE</label>
    <input type="price" name="price" class="form-control" id=""
    <?php if(empty($input["price"])){ ?>placeholder="Enter price"
  <?php }else{ ?> value= " <?php echo $input["price"]; };?>">

    <?php if(empty($error["price"])){
      ?>
    <small id="" class="form-text text-muted">here goes price in indian currency,in digits only</small>
    <?php }else{ ?>
    <small id="" class="form-text text-danger"><?php echo $error["price"] ?></small>
    <?php } ?>    </div>

<!-- for uploading img -->
    <div class="form-group">
    <label for="">Uplaod image</label>
    <div class="custom-file">
  <input type="file" name="img" class="custom-file-input" id="customFile" placeholder="choose file">
  <label class="custom-file-label" for="customFile">Choose file</label>
  <br />
  <br/>

</div>
<?php if(empty($error["img"])){
?>
<small id="" class="form-text text-muted">resolution of img must be lesser then 250x250 px and less than 250Kb </small>
<?php }else{ ?>
<small id="" class="form-text text-danger"><?php echo $error["img"] ?></small>
<?php } ?>
</div>
<!-- end of upload field -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
<!-- end of form -->
  <br>
  <br>
  <br>
  <br>
<!-- includin footer -->
  <?php include "templates/footer.php" ?>

    </body>
  </html>
