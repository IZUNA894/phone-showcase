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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //echo($_POST['model']);
$model = test_input("model");
$company = test_input("company");
$price = test_input("price");
$specs = test_input("specs");
}

function test_input($field) {
  $data = $_POST[$field];
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if(empty($data))
{
  echo("$field can \' be empty");
  //cancel_submit();
}

return $data;
}
?>

<!-- php for sql database -->
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// doing sql query
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
  </head>
  <body>
    <!-- including header -->
  <?php include "templates/header.php" ?>

  <br>
  <br>
  <br>

  <div class="container" style="text-align:center;width:800px;">
    <h2 style="text-align:center;color:#007bff">ADD A NEW PHONE</h3>
      <br>

      <!-- form  -->
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="form-group" style="">
    <label for="">PHONE MODEL</label>
    <input type="model" name="model" class="form-control" id=""placeholder="Enter model name">
    <small id="" class="form-text text-muted">here goes new phone name and its nodel number</small>
    </div>

    <div class="form-group">
    <label for="">COMPANY</label>
    <input type="company" name="company" class="form-control" id=""placeholder="Enter company name">
    <small id="" class="form-text text-muted">here goes new phone's company name</small>
    </div>


    <div class="form-group">
    <label for="">SPECS:</label>
    <input type="specs" name="specs" class="form-control" id=""placeholder="Enter specs">
    <small id="" class="form-text text-muted">here goes new phone's specs</small>
    </div>

    <div class="form-group">
    <label for="">PRICE</label>
    <input type="price" name="price" class="form-control" id=""placeholder="Enter price">
    <small id="" class="form-text text-muted">here goes new phone's price in INC</small>
    </div>


    <div class="form-group">
    <label for="">Uplaod image</label>
    <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
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
