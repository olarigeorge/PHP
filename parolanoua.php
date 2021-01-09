<?php
session_start();
$message="";
if(count($_POST)>0) {
    include 'server.php';
    
   if($_POST["password"]===$_POST["passwordreped"])
   {
    $sql0 = "UPDATE myuser SET parola='" . $_POST["password"] . "' WHERE id='" . $_SESSION["id"]. "'";;
    $result = mysqli_query($conn , $sql0);
    $row  = mysqli_fetch_array($result);
    header("Location:loginuser.php");
   }
   else
   {
    $message="Not good";
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
  <h2>HTML New password</h2>
    <form action="" method="POST">
    
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <div class="form-group">
        <label for="lname">New Password</label><br>
        <input type="password" class="form-control" name="password" placeholder="Enter new password" required><br>
    </div>  
    <div class="form-group">
        <label for="fname">Reped new password</label><br>
        <input type="password" class="form-control"  name="passwordreped" placeholder="Reped new password " required><br><br>
      </div>
    <button type="submit" class="btn btn-success btn-lg btn-block" >Trimite</button>
    </form>
</div>
</body>
</html>