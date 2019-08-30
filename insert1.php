<?php
    $name = $_POST['genrename'];
    $con = new mysqli('localhost','root','','moviedatabase');
    if($con->connect_error){
        echo 'database connection error';
    }

    $stmt = $con->prepare("INSERT INTO genre (genre) VALUES (?)");

    $stmt->bind_param("s",$name);

    if($stmt->execute()){
        echo 'success';
        //header("location:server.php");
    }else{
        echo 'failure';
    }


?>