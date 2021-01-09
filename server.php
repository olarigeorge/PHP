<?php
//mysql://b7e9e1b8cc3e32:ca8ac1b2@us-cdbr-east-02.cleardb.com/heroku_8a5dc0c935d2436?reconnect=true
$servername = "us-cdbr-east-02.cleardb.com";
$username = "b7e9e1b8cc3e32";
$password = "ca8ac1b2";
$dbname = "heroku_8a5dc0c935d2436";

// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{

}
?>