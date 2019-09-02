<?php  
 $conn = mysqli_connect("localhost", "root", "", "moviedatabase");  
 $output = '';  
 $sql = "SELECT * FROM movie ORDER BY id DESC"; 

 $result = mysqli_query($conn, $sql);  
 
 $output .= '  
      <div align="center">  
           <table border="1" bordercolor="#00CCCC">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="30%">Movie Name</th>  
                     <th width="30%">Actorslist</th>  
                     <th width="10%">rating</th> 
                     <th width="30%">genre</th>  
                     <th width="10%">year</th>  
                     <th width="10%">image</th>  
                     <th width="10%">options</th> 
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {     $id = $row['id'];
               
            $output.= ' <tr id="main">' ; 
            $output.=     " <td>".$row["id" ]."</td> ";
            $output.=     " <td class='movie_name' id='moviename' data-id1=".$row["id"]." >".$row["name"]."</td> "; 
            $output.=     " <td class='actors_name' id='actorsname' data-id2=".$row["id"].">" ;
                    $sql1 = "SELECT name FROM relation WHERE id= '$id' AND category='actor'";  
                    $result1 = mysqli_query($conn, $sql1); 
                     while($row1 = mysqli_fetch_array($result1)){
                        $output.= $row1["name"]."<br>";
                    }
                    $output.= "</td>
                     <td class=movie_rating id=rating data-id3=".$row["id"]." >".$row["rating"]."</td>  
                     <td class=movie_genre id=genre data-id4=".$row["id"]." >";
                     $sql2 = "SELECT name FROM relation WHERE id= '$id' AND category='genre'";  
                     $result2 = mysqli_query($conn, $sql2); 
                      while($row2 = mysqli_fetch_array($result2)){
                         $output.= $row2["name"]."<br>";
                     }
                     $output.= "</td>
                     <td class=movie_year id=year data-id5=".$row["id"]." >".$row["year"]."</td>  
                     <td class=movie_image id=image data-id6=".$row["id"]." ><img src='" .$row["image"]."' height=30px width=20px ></td> 
                     <td><button type='button' name='delete_btn' data-id7=".$row["id"]." id='delete'>Delete</button></td>  
                     <td><button type='button' name='edit_btn' data-id8=".$row["id"]." onclick=editrecord(".$id.",this) id='edit'>Edit</button></td> 
                     </tr>"    ;

             
      }  
     //  $output .= '  
     //       <tr>  
     //            <td></td>  
     //            <td id="first_name" contenteditable></td>  
     //            <td id="last_name" contenteditable></td>  
     //            <td><button type="button" name="add" id="add">Add</button></td>  
     //       </tr>  
     //  ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  