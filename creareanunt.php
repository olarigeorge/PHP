<?php
 session_start();

 if(count($_POST)>0){
    include 'server.php';
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO anunturi (iduser, titlu, specializare, timp, anunt)
         VALUES ('$_SESSION[id]', '$_POST[titlu]', '$_POST[specializare]', '$date' , '$_POST[anunt]')";
  if ($conn->query($sql) == TRUE) {
      echo "New record created successfully";
        header('Location:index.php');
  } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
  }
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
    <div class="form-group">
        <label for="title">Titlu</label><br>
        <input type="text" class="form-control"  name="titlu" placeholder="Enter title" required><br><br>
    </div>
    <div class="form-group">
      <label for="specializare">Specializare</label>
      <select id="specializare"  class="form-control"  name="specializare">
        <option value="Calculatoare">Calculatoare</option>
        <option value="Tehnologia constructilor de masini">Tehnologia constructilor de masini</option>
        <option value="Electronica Aplicata">Electronica Aplicata</option>
        <option value="Robotica">Robotica</option>
      </select><br><br>
      </div>
      <div class="form-group">
        <label for="anunt">Anunt</label><br>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="anunt" rows="5"></textarea>
      </div>
    <button type="submit"  name="anuntnou" class="btn btn-success btn-lg btn-block">Sent</button>
</form>

</div>
</body>
</html>