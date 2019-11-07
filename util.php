<?php

    $specs=array();
    function mk_array($str)
    {
        global $specs;
        $arr= explode(";",$str);
        //print_r($arr);
        foreach($arr as $unit)
        {
            $data = explode(":",$unit);
            $key = $data[0];
            $value = $data[1];
            $specs[$key]=$value;
            //print_r($specs);


        }



    };


    // function for checking input fields which will call other checking function;
    function test_input($field) {

      test_input_pattern($field,sanitize($field));
      //check_file();
      }
    //function for checking input fields are blank or not;
    function sanitize($field){
      //global $error;
    //  print_r( $error);
      global $input;
      $data = $_POST[$field];
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $input[$field]=$data;
      return $data;


      //return $data;
    };
    //function for pattern checking in input fields;
    function test_input_pattern($field,$data)
    {
      global $error;
      // checking "model";
      if($field == "model"){
        if(empty($data))
        {
          $error[$field]="$field can't be empty";
        }
        elseif(preg_match("/\W/",$data))
        {
        //  echo "hello";
          $error[$field]="$field should contain alphanumeric";
        }else{
          //  echo "hello";
        };


    };

    // checking "company" input
    if($field == "company"){
      if(empty($data))
      {
        $error[$field]="$field can't be empty";
      }
      elseif(preg_match("/\W/",$data))
      {
        $error[$field]="$field should contain alphabets only";
      }else{};


   };

   // checking price $input
   if($field == "price"){
     if(empty($data))
     {
       $error[$field]="$field can't be empty";
     }
     elseif(preg_match("/[^0-9]/",$data))
     {
       $error[$field]="$field should contain digits only";
     }else{};


  };

  // checking specs field
  if($field == "specs"){
    if(empty($data))
    {
      $error[$field]="$field can't be empty";
    }
    elseif(!preg_match("/[0-9]/",$data))
    {
      $error[$field]="$field should contain digits only";
    }else{};


 };
//print_r($error);
}



// script to upload and validate a img file

function check_file()
{
// Check if image file is a actual image or fake image
  global $error,$input;
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    //echo "heyya";
    //print_r($error);
    if($check !== false) {
      //  $error["img"]="File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error["img"]= "File is not an image.";

        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    $error["img"] ="Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img"]["size"] > 250000) {
    $error["img"]="Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error["img"] ="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error["img"]=$error["img"]. ", your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      $temp_name=$_FILES['img']['name'];
      rename("uploads/".$temp_name,"uploads/img".getNextIncrement("phone").".jpeg");
      $input["img"]="img".getNextIncrement("phone").".jpg";
      //echo getNextIncrement("phone");
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $error["img"]=$error["img"]. "Sorry, there was an error uploading your file.";
    }
}
};
// file upload script ends here
//print_r ($error);


    // GEETING A inique key from SQLiteDatabase
     function getNextIncrement($table) {
        $sql_db_host = "localhost";// MySQL Hostname
        $sql_db_user = "root";// MySQL Database User
        $sql_db_pass = "";// MySQL Database Password
        $sql_db_name = "phone database";// MySQL Database Name
        $conn = new mysqli($sql_db_host, $sql_db_user, $sql_db_pass, $sql_db_name);
        if (mysqli_connect_errno()) {
            die(mysqli_connect_error());
        }
           //$conn, $sql_db_name;
          $next_increment = 1;
          $table = mysqli_escape_string($conn, $table);
          $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$sql_db_name' AND TABLE_NAME = '$table'";
          $results = $conn->query($sql);
          while($row = $results->fetch_assoc()) {
              $next_increment = $row['AUTO_INCREMENT'];
          }
          return $next_increment;
      }


    // connecting to database and inserting database
    function insert_data(){
      $servername = "localhost";
      $username = "root";
      $password = "";
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
    }
?>
