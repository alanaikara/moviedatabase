<?php
    $name = $_POST['name'];
    $actorslist = $_POST['actorslist'];
    $rating = $_POST['rating'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $image = $_POST['image'];
    $con = new mysqli('localhost','root','','moviedatabase');
    if($con->connect_error){
        echo 'database connection error';
    }

    $stmt = $con->prepare("INSERT INTO movie (name, actorslist,rating,year,genre,image) VALUES (?,?,?,?,?,?)");

    $stmt->bind_param("ssiiss",$name,$actorslist,$rating,$year,$genre,$image);

    if($stmt->execute()){
        echo 'success';
        header("location:server.php");
    }else{
        echo 'failure';
    }