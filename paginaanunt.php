<?php 
session_start();
include 'server.php';

if(count($_POST)>0){
    $sql0 = "INSERT INTO comentari (iduser, idanunt, anunt)
         VALUES ('$_SESSION[id]', '$_SESSION[anuntid]', '$_POST[comentariu]')";
  if ($conn->query($sql0) == TRUE) {
      echo "New record created successfully";
  } else {
       echo "Error: " . $sql0 . "<br>" . $conn->error;
  }
}
$sql1 = "SELECT comentari.anunt ,myuser.nume FROM comentari INNER JOIN anunturi on anunturi.id=comentari.idanunt  INNER JOIN myuser on comentari.iduser=myuser.id where 
 comentari.idanunt='" . $_SESSION["anuntid"] ."'";
$result1 = mysqli_query($conn , $sql1);


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
    <div class="row">
        <div class="col-sm-6">
        <?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
        <h3><?php echo $row1['nume'];?></h3>
        <h5><?php echo $row1["anunt"] ;?></h5>
        <?php $conn->close();} ?>
        <form action="" method="post" >
            <div class="form-group">
                <label for="anunt">Comentariu</label><br>
                     <textarea class="form-control" id="exampleFormControlTextarea1" name="comentariu" rows="5"></textarea>
                </div>
            </div>
        <button type="submit"  name="anuntnou" class="btn btn-success btn-lg btn-block">Sent</button>
    </form>
    </div>
</div>
</body>
</html>