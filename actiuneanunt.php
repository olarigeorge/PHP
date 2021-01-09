<?php
 session_start();
 include 'server.php';
 //delete 
 $sql = "DELETE anunturi FROM anunturi INNER JOIN myuser on myuser.id=anunturi.iduser where myuser.id='" . $_SESSION[id] ."' 
 and anunturi.id='" . $_SESSION["anuntid"] ."' ";


if(isset($_POST["deletebutton"]))
{ 
    
if ($conn->query($sql) === TRUE) {

        echo "Record deleted successfully";
        header("Location:index.php");

    } else {

  echo "Error deleting record: " . $conn->error;
}

}

$conn->close();
 ?>