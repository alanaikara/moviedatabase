<html>  
      <head>  
           <title>Movie Database</title>  
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                     <h1 align="center">Movie Database</h1><br />
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
                     <td><button type="button" onclick="location.href='/moviebase/form2.php'" name="addmovie" id="addmovie">Add Movie</button></td>  
                     <div id="disp_data"></div>               
                </div> 
      </body>  
 </html>  
 <script>  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select2.php",  
                method:"POST",  
                success:function(data){  
                     $('#disp_data').html(data);  
                }  
           });  
      }  
       function editrecord(id,obj){
              
              console.log('hello');      
              // console.log();
              var id = id;
              var name = $(obj).parents("#main").find("#moviename").text();
              console.log(name);
              var rating = $(obj).parents("#main").find("#rating").text();
              console.log(rating);
              var actorname = $(obj).parents("#main").find("#actorsname").text();
              console.log(actorname);
              var genre = $(obj).parents("#main").find("#genre").text();
              console.log(genre);
              var year = $(obj).parents("#main").find("#year").text();
              console.log(year);
             // var image = $(obj).parents("#main").find("#image").src();
             // console.log(image);
             
     $(document).on('click', '#submit', function(){   
                $.ajax({  
                     url:"edit2.php",  
                     method:"POST",  
                     data:{id:id,name:name,actorname:actorname,rating:rating,genre:genre,year:year},  
                     dataType:"text",  
                     success:function(data){  
                          //alert(data);  
                          fetch_data();  
                     }  
                });  
           
          });  
      }
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
 
      function fetch_data()  
      {  
           $.ajax({  
                url:"select2.php",  
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
               $("#edit").attr("id", "submit");
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
     //       function edit_data(id, text, column_name)  
     //  {  
     //       $.ajax({  
     //            url:"edit.php",  
     //            method:"POST",  
     //            data:{id:id, text:text, column_name:column_name},  
     //            dataType:"text",  
     //            success:function(data){  
     //                 alert(data); 
     //                 fetch_data();  
     //            }  
     //       });  
     //  }  

               
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