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
    $model=$company=$price=$specs= "";
    $error= array("model"=>"","company"=>"","specs"=>"","price"=>"","img"=>"");
    $input=array("model"=>"","company"=>"","specs"=>"","price"=>"","img"=>"");
    include "util.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //echo($_POST['model']);
$model = test_input("model");
$company = test_input("company");
$price = test_input("price");
$specs = test_input("specs");
check_file();
//print_r($input);
}



?>
  </head>
  <body>
    <script type="text/javascript">
      // console.log("inside script");
      function make(ele)
      {
        var spec_func = function(str)
      {
          var specs=[];
          var arr= str.split(";");
          console.log(arr);
          arr.forEach((item)=>{
        item=item.split(":");
              var key= item[0];
              var value = item[1];
              specs[key]=value;
              }
              );

                return specs;
      };

      var specs=spec_func(ele);

      console.log(specs)  ;
      console.log("lentgh is " + Object.keys(specs).length);
      var length =Object.keys(specs).length;

      function tableCreate(data_arr,length) {
        //body reference
        console.log(data_arr.length);
        var body = document.getElementById("tgh");
        //console.log(body);
        // create elements <table> and a <tbody>
        var tbl = document.createElement("table");
        var tblBody = document.createElement("tbody");
        var rows= length;
        //data_arr.length;
        var cols=2;
        // cells creation
        for (var i = 0; i < rows; i++) {
          // table row creation
          var row = document.createElement("tr");

          for (var j = 0; j < cols; j++) {
            // create element <td> and text node
            //Make text node the contents of <td> element
            // put <td> at end of the table row
            var cell = document.createElement("td");
            if(j==0)
            {
              cell.setAttribute("style","text-align:left;");
              var cellText = document.createTextNode(Object.keys(data_arr)[i]);

            }
            else {
              cell.setAttribute("style","text-align:right;");
              var cellText = document.createTextNode(data_arr[Object.keys(data_arr)[i]]);


            }

            cell.appendChild(cellText);
            row.appendChild(cell);
          }

          //row added to end of table body
          tblBody.appendChild(row);
        }

        // append the <tbody> inside the <table>
        tbl.appendChild(tblBody);
        // put <table> in the <body>
        body.appendChild(tbl);
        // tbl border attribute to
        //tbl.setAttribute("border", "2");
        tbl.setAttribute("class","table table-hover");
        tbl.setAttribute("style","width:80%;margin-left:auto;margin-right:auto;");
      }

      tableCreate(specs,length);

    };
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

    <div class="form-group" style="">
    <label for="">PHONE MODEL</label>
    <input type="model" name="model" class="form-control" id=""
    <?php if(empty($input["model"])){ ?>placeholder="Enter model name"
  <?php }else{ ?> value= " <?php echo $input["model"]; };?>">
    <?php if(empty($error["model"])){
      ?>
    <small id="" class="form-text text-muted">here goes new phone name and its nodel number</small>
  <?php }else{ ?>
  <small id="" class="form-text text-danger"><?php echo $error["model"] ?></small>
<?php } ?>
    </div>

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


      <!-- ......................... -->

      <!-- ............... -->
    </div>
   </div>

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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

  <br>
  <br>
  <br>
  <br>
<!-- includin footer -->
  <?php include "templates/footer.php" ?>

    </body>
  </html>
