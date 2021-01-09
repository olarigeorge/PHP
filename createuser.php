<?php
session_start();
$message="";
if(count($_POST)>0){

  include 'server.php';
  $sql0 = "SELECT * FROM myuser WHERE nume='" . $_POST["nume"] ."'and email = '". $_POST["email"]."'";
  
  $result = mysqli_query($conn , $sql0);
  $row  = mysqli_fetch_array($result);
 
  
  if(!is_array($row)) {
    $_SESSION["telefon"]=$_POST["telefon"];
    $_SESSION["prenume"]=$_POST["prenume"];
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["user"]=$_POST["nume"];
    $_SESSION["pass"]=$_POST["parola"];
    
  
    
    
    
    $sql = "INSERT INTO myuser (nume, prenume, email,telefon, parola)
      VALUES ('$_POST[nume]', '$_POST[prenume]', '$_POST[email]', '$_POST[telefon]', '$_POST[parola]')";

    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
       
    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
}
  $conn->close();
  
  } else {
    $message = "User already exist !";
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
    <form action="" method="post" >
      <div class="message"><?php if($message!="") { echo $message; } ?></div>
      <h3>Inregistrare</h3>
      
        <input type="radio"  id='mr' name="rad"  checked>
        <label class="radio-inline" for="mr">Mr</label>
        <input type="radio"   id='mrs' name="rad" >
        <label  class="radio-inline" for="mrs">Mrs</label>
        <input type="radio"    id='miss' name="rad" >
        <label class="radio-inline" for="miss">Miss</label><br><br>
     
      <div class="form-group">
        <label for="fname">User name</label><br>
        <input type="text" class="form-control"  name="nume" placeholder="Enter user" required><br><br>
      </div>
      <div class="form-group">
        <label for="lname">Prenume</label><br>
        <input type="text" class="form-control"  name="prenume" placeholder="Enter last name" required><br><br>
      </div>
      <div class="form-group">
        <label for="lname">Email</label><br>
        <input type="email" class="form-control" name="email" placeholder="Enter email" required><br><br>
      </div>
      <div class="form-group">
        <label for="lname">Telefon</label><br>
        <input type="tel" class="form-control" name="telefon" placeholder="Enter phone" required><br><br>
      </div>
      <div class="form-group">
        <label for="lname">Parola</label><br>
        <input type="password" class="form-control" name="parola" placeholder="Enter password" required ><br><br>
      </div>
      <div class="form-group">
      <label for="judete">County</label>
      <select id="judete"  class="form-control"  name="judete">
        <option value="Maramures">Maramures</option>
        <option value="Iasi">Iasi</option>
        <option value="Cluj">Cluj</option>
        <option value="Brasov">Brasov</option>
      </select><br><br>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="yes" value="1">
        <label for="yes"> Esti de acord cu termeni si conditile</label><br><br>
      </div>

      <button type="submit"  name="createuser" class="btn btn-success btn-lg btn-block">Inregistrare</button>
      <button type="reset" class="btn btn-dark btn-lg btn-block">Resetare</button>
      
    </form>
    <br>
    <form action="loginuser.php" method="get">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
      </form>
    <br>
    
  </div>


</body>

</html>