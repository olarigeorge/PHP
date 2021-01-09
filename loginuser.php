<?php
 session_start();
 $message="";
if(count($_POST)>0) {
  include 'server.php';
  $sql0 = "SELECT * FROM myuser WHERE nume='" . $_POST["nume"] . "'and parola = '". $_POST["parola"]."'";
  
  $result = mysqli_query($conn , $sql0);
  $row  = mysqli_fetch_array($result);
 
  
  if(is_array($row)) {
    $_SESSION["user"]=$row["nume"];
    $_SESSION["pass"]=$row["parola"];
    $_SESSION["id"]=$row["id"];
    $conn->close();
  }
  else {
    $message = "Invalid Username or Password!";
    
  }


}
if(isset($_SESSION["user"])) {
  header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  
  <div class="container">
    <form action="" method="POST">
    <h2>HTML Login</h2>
    <div class="message"><?php if($message!="") { echo $message; } ?></div>

    <div class="form-group">
        <label for="fname">User name</label><br>
        <input type="text" class="form-control"  name="nume" placeholder="Enter user" required><br><br>
      </div>
      
      <div class="form-group">
        <label for="lname">Parola</label><br>
        <input type="password" class="form-control" name="parola" placeholder="Enter password" required ><br><br>
      </div>

      <button type="submit" class="btn btn-success btn-lg btn-block" >Login</button>
    </form>
   <br>
     <form action="resetpassword.php" method="get">
          <button  type="submit"   class="btn btn-primary btn-lg btn-block">Lost Password</button>
      </form>
      <br>
      <form action="createuser.php" method="get">
         <button type="submit" class="btn btn-secondary btn-lg btn-block">Inregistrare</button>
      </form>
  </div>


</body>

</html>