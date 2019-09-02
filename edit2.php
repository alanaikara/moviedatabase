<?php  
$conn = mysqli_connect("localhost", "root", "", "moviedatabase");  
$id = $_POST["id"];  
$moviename = $_POST['name'];
$movieactors = $_POST['actorname'];
$movierating = $_POST['rating'];
$movieyear = $_POST['year'];
$moviegenre = $_POST['genre'];
//$movieimage = $_POST['image'];

//  query to update data 
     
// $result  = mysqli_query($connection , "UPDATE movie SET name='$moviename' , actorslist='$movieactors' , rating = '$movierating', genre= '$moviegenre', year='$movieyear', image ='$movieyear' WHERE id='$id'");
// if($result){
//      echo 'data updated';
// }  
 $sql ="UPDATE movie SET name='$moviename' , actorslist='$movieactors' , rating = '$movierating', genre= '$moviegenre', year='$movieyear' WHERE id='$id'"; 
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>  