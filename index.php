<?php
session_start();
include 'server.php';
$sql0 = "SELECT * FROM anunturi";
  
$result = mysqli_query($conn , $sql0);


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Home Page</title>
</head>
<body>
<div class="container">
    <?php
      if($_SESSION["user"]) {
    ?>

      <h1>  Welcome <?php echo $_SESSION["user"]; ?>.</h1> <p>Click here to<p>
       <form action='logout.php' method='post'>
        <button type='submit' class="btn btn-danger btn-lg btn-block">Logout</button>
     </form>
     <br>
     <form action='creareanunt.php' method='post'>
        <button type='submit' class="btn btn-primary btn-lg btn-block">Anunt nou</button>
     </form>
     <div class="row">
     <div class="col-sm-6">
      <h5><?php while($row = mysqli_fetch_assoc($result)){ ?>

      <a href="paginaanunt.php">    
      <h3><?php $_SESSION["anuntid"]= $row['id']; echo $row['titlu'];?></h3>
      </a>
          <h3><?php echo $row['timp']?></h3>
          <h5><?php echo $row['anunt']?></h5><br>
          <form action='actiuneanunt.php' method='post'>
                <button type='submit' name="deletebutton"  class="btn btn-danger btn-lg ">Delete</button>         
                
        </form>
        
      <?php $conn->close();} ?></h5>
      </div>
      </div>
  <?php
  }
      else { 
          echo "<h1>Please login first or Create user </h1>" ?>

  <form action='loginuser.php' method='post'>
        <button type='submit' class="btn btn-success btn-lg btn-block">Login</button>
  </form>
  <br>
  <form action='createuser.php' method='post'>
      <button type='submit' class="btn btn-primary btn-lg btn-block">Create user</button>
</form> 
<?php }?>
</div>
</body>
</html>