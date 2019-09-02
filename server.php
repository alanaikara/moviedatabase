<html>  
      <head>  
           <title>Movie Database</title>  
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                     <h1 align="center">Movie Database</h1><br />
                     <!-- <button>add genre</button> -->
                     <button id="btn" class="editbutton" >add genre</button>
                     <button id="addbtn" class="editbutton" >add</button>
                     <form id="editForm"  action="insert1.php" method="post" name="editForm">
                     <input type="text" id="genrename" name="genrename" placeholder="enter the genre">
                    </form>
                     <button type="button"  name="addactor" id="addactor">add actor</button>
                     <button id="addbtn2" class="editbutton" >add</button>
                     <form id="editForm2"  action="insert2.php" method="post" name="editForm">
                     <input type="text" id="actorname" name="actorname" placeholder="enter the actorname">
                    </form>
                     <td><button type="button" onclick="location.href='/moviebase/form.php'" name="addmovie" id="addmovie">Add Movie</button></td>  
                     <div id="disp_data"></div>                 
                </div> 
      </body>  
 </html> 

 <script>  
 $(document).ready(function(){

     $("#editForm").hide();
        $("#addbtn").hide();
        $("#btn").click(function(e) {
            $("#editForm").show();
            $("#btn").hide();
            $("#addbtn").show();

       }); 
            
      $(document).on('click', '#addbtn', function(){  
           var genrename=$("#genrename").val();   
           if(confirm("Are you sure you want to add this?"))  
           {  
                $.ajax({  
                     url:"insert1.php",  
                     method:"POST",  
                     data:{genrename:genrename},  
                     dataType:"text",  
                     success:function(data){ 
                         $("#editForm").hide();
                          $("#addbtn").hide(); 
                          $("#btn").show();
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
      $("#editForm2").hide();
        $("#addbtn2").hide();
        $("#addactor").click(function(e) {
            $("#editForm2").show();
            $("#addactor").hide();
            $("#addbtn2").show();

       }); 
            
      $(document).on('click', '#addbtn2', function(){  
           //var actorname=$(this).data("actorname"); 
           var actorname = $("#actorname").val();  
           if(confirm("Are you sure you want to add this?"))  
           {  
                $.ajax({  
                     url:"insert2.php",  
                     method:"POST",  
                     data:{actorname:actorname},  
                     dataType:"text",  
                     success:function(data){ 
                         $("#editForm2").hide();
                         $("#addbtn2").hide(); 
                         $("#addactor").show();
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });


     //table data

      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#disp_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
     
          
     $(document).on('click', '#edit', function(){  
           var id=$(this).data("id8");   
               var $this = $(this);
               var tds = $this.closest('tr').find('td').filter(function() {
                return $(this).find('.edit_btn').length === 0;
               });
               if ($this.html() === 'Edit') {
                     $this.html('Save');
                    tds.prop('contenteditable', true);
               } else {
                $this.html('Edit');
                tds.prop('contenteditable', false);
           }
           function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data); 
                     fetch_data();  
                }  
           });  
      }  
      $(document).on('blur', '.movie_name', function(){  
           var id = $(this).data("id1");  
           var name = $(this).text();  
           edit_data(id, name, "name");  
      });  
      $(document).on('blur', '.actors_name', function(){  
           var id = $(this).data("id2");  
           var actors_name = $(this).text();  
           edit_data(id,actors_name, "actorslist");  
      });  
      $(document).on('blur', '.movie_rating', function(){  
           var id = $(this).data("id3");  
           var movie_rating = $(this).text();  
           edit_data(id,movie_rating, "rating");  
      });  
      $(document).on('blur', '.movie_genre', function(){  
           var id = $(this).data("id4");  
           var movie_genre = $(this).text();  
           edit_data(id,movie_genre, "genre");  
      });  
      $(document).on('blur', '.movie_year', function(){  
           var id = $(this).data("id5");  
           var movie_year = $(this).text();  
           edit_data(id,movie_year, "year");  
      });  
      $(document).on('blur', '.movie_image', function(){  
           var id = $(this).data("id6");  
           var movie_image = $(this).text();  
           edit_data(id,movie_image, "image");  
      });  
               
           }  
      );  
     
      $(document).on('click', '#delete', function(){  
           var id=$(this).data("id7");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"deletedata.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script> 