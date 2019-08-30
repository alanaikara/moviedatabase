<?php
    $name = $_POST['actorname'];
    $con = new mysqli('localhost','root','','moviedatabase');
    if($con->connect_error){
        echo 'database connection error';
    }

    $stmt = $con->prepare("INSERT INTO actor (actorname) VALUES (?)");

    $stmt->bind_param("s",$name);

    if($stmt->execute()){
        echo 'success';
        //header("location:server.php");
    }else{
        echo 'failure';
    }

?>