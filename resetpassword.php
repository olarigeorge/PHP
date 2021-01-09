<?php
session_start();
$message="";
if(count($_POST)>0) {
    include 'server.php';
    
   
    $sql0 = "SELECT * FROM myuser WHERE email='" . $_POST["email"] . "'and nume = '". $_POST["nume"]."'";
    $result = mysqli_query($conn , $sql0);
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
      $_SESSION["user"]=$row["nume"];
      $_SESSION["pass"]=$row["parola"];
      $_SESSION["id"]=$row["id"];
      header("Location:parolanoua.php");
      }
      else {
        $message = "Acest Email nu exista";
        
      }
    
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Reset Password</title>
</head>
<body>

  <div class="container">
  <h2>HTML Resetare parola</h2>
    <form action="" method="POST">
    
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <div class="form-group">
        <label for="lname">Email</label><br>
        <input type="email" class="form-control" name="email" placeholder="Enter email" required><br>
    </div>  
    <div class="form-group">
        <label for="fname">User name</label><br>
        <input type="text" class="form-control"  name="nume" placeholder="Enter user" required><br><br>
      </div>
    <button type="submit" class="btn btn-success btn-lg btn-block" >Trimite</button>
    </form>
    <br>
    <form action="loginuser.php" method="get">
            <button type="submit" class="btn btn-danger btn-lg btn-block">Back</button>
      </form>
</div>
</body>
</html>