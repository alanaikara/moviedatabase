<?php
    $con = new mysqli('localhost','root','','moviedatabase');
    if($con->connect_error){
        echo 'database connection error';
    }
    $id = $_POST['id'];
    $name = $_POST['name'];
    $actorslist = $_POST['actorslist'];
    $actor= 'actor';
    foreach($_POST['actorslist'] as $selectedactor){
        $stmt2 = $con->prepare("INSERT INTO relation (id,name,category) VALUES (?,?,?)");

        $stmt2->bind_param("iss",$id,$selectedactor,$actor);
    
        if($stmt2->execute()){
            echo 'actors inserted';
        }else{
            echo 'failure';
        }
    }
    $rating = $_POST['rating'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $genres = 'genre';
    foreach($_POST['genre'] as $selectedgenre){
        $stmt3 = $con->prepare("INSERT INTO relation (id,name,category) VALUES (?,?,?)");

        $stmt3->bind_param("iss",$id,$selectedgenre,$genres);
    
        if($stmt3->execute()){
            echo 'actors inserted';
        }else{
            echo 'failure1';
        }
    }
    $image = $_POST['image'];
    

    $stmt = $con->prepare("INSERT INTO movie (id, name,rating,year,image) VALUES (?,?,?,?,?)");
    

    $stmt->bind_param("isiis",$id,$name,$rating,$year,$image);

    if($stmt->execute()){
        echo 'success';
        header("location:server2.php");
    }else{
        echo 'failure';
    }