<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>moviebase</title>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moviedatabase";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    ?> 
</head>
<body>
    
    <h1>enter the movie</h1>
    <form method='post' action='insert.php'>
        <input type="text" id="name" name= "name" placeholder='enter movie name' />
        <!-- <input type="text" id= "actorslist" name= "actorslist" placeholder='enter actors names' /> -->
        <select name="actorslist" id="actorslist" > <!-- multiple="multiple" -->  <option>select actorsname</option>
        <?php

    if($stmt = $conn->query("SELECT actorslist from movie"))
    {
        while($row = $stmt->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['actorslist']?>"><?php echo $row['actorslist']?></option>
            
      <?php  }}
    ?> 
        </select>
        <input type="text" id= "rating" name= "rating" placeholder='enter the rating 1-10' />
        <input type="text" id= "year" name= "year" placeholder='enter movie year' />
        <!-- <input type="text" id= "genre" name= "genre" placeholder='enter movie genres' /> -->
        <select name="genre" id="genre"> <option>select genres</option>
        <?php

if($stmt = $conn->query("SELECT genre from movie"))
{
    while($row = $stmt->fetch_assoc()) {
        ?>
        <option value="<?php echo $row['genre']?>"><?php echo $row['genre']?></option>
        
  <?php  }}
?>
        </select>
        <input type="text" id= "image" name= "image" placeholder='enter movie icon' />
        <button>save</button>
    </form>
    <p id = "result"></p> 
    <!-- <script>
        $("form").submit(function(e){
            e.preventDefault();

            $.post(
                'insert.php',
                {
                    name: $("#name").val(),
                    actorslist: $("#actorslist").val(),
                    rating: $("#rating").val(),
                    year: $("#year").val(),
                    genre: $("#genre").val(),
                    image: $("#image").val(),

                },
                function(result){
                    if(result == 'success'){
                        $("#result").html("yeey i did it");
                    }else{
                        $("#result").html("oops some error");
                    }
                }
            )
        })
    </script> -->
    
</body>
</html>