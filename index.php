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
  </head>
  <body>
    <!-- header section -->
  <?php
  include "templates/header.php" ?>
<!-- ending header -->

  <br>
  <br>
  <br>
<!-- staring card deck -->
  <div class="container">
    <h2 style="text-align:center;color:#007bff;">Mobile we have...</h2>
    <!-- first row -->
    <div class="row">
      <div class="col-lg-4">
        <!-- first card -->
        <div class="card" style="">
        <img class="card-img-top" src="img.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item ">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
          <a href="#" class="btn btn-primary">Card link</a>
          <a href="#" class="btn btn-primary float-right">Another link</a>
        </div>
      </div>
      </div>

      <div class="col-lg-4">
        <!-- second card -->
        <div class="card" style="">
        <img class="card-img-top" src="img.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
          <a href="#" class="btn btn-primary">Card link</a>
          <a href="#" class="btn btn-primary float-right">Another link</a>
        </div>
      </div>
      </div>

      <div class="col-lg-4">
        <!-- third card -->
        <div class="card" style="">
        <img class="card-img-top" src="img.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
          <a href="#" class="btn btn-primary">Card link</a>
          <a href="#" class="btn btn-primary float-right">Another link</a>
        </div>
      </div>
      </div>
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
