<?php
//if ($_SERVER["REQUEST_METHOD"] == "GET") {
echo "HELLO";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phone database";
//echo "reach here";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$deleteeId="deleteId";
//echo "hello from server";
//echo $_GET[$deleteeId];
$ele = $_GET[$deleteeId];
// sql to delete a record
$sql = "DELETE FROM phone WHERE id='$ele'";

if (mysqli_query($conn, $sql)) {
    //echo "Record deleted hrom table successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
//}
?>
