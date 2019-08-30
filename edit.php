<?php  
 $conn = mysqli_connect("localhost", "root", "", "moviedatabase");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE movie SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>  