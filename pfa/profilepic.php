<?php 
    session_start();
    include("class/DB.php");
    include("class/login.php");
    include("class/user.php");
    include("class/post.php");


   $login = new login();
   $data=$login->testlogin_prof($_SESSION['id_prof']);

   if($_SERVER['REQUEST_METHOD']=="POST"){    
        if(isset($_FILES["profilepic"]['name']) && $_FILES["profilepic"]['name'] != ""){
        $filename = "uploads/" . $_FILES["profilepic"]['name'];
        move_uploaded_file($_FILES["profilepic"]['tmp_name'],"$filename");

        if(file_exists($filename))
        {
            $db=new database();
            $query="update professeur set profilepic = '$filename' where id_prof = $data[id_prof]";
            $db->save($query);

            header("Location:homepage.php");
            die;

        }
        }else{
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "the following error occured : <br>";
            echo "please add a valide image";
            echo "</div>";

        }

   }
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>changer photo de profile</title>
    <link rel="stylesheet" href="timeline.css">

</head>
<body style="background-color:lightgray;font-family: 'Arial Narrow', Arial, sans-serif;">
         <!-- top bar --> 
            <div class="topbar">

                <a href="homepage.php"><h1>Return</h1></a>
                    <a href="logout.php">
                    <span style="font-size:11px;float:right;margin:10px;color:red">LogOut</span>
                    </a>

              
            </div>

    
                 <!-- middle bar --> 

               
            
            
            
                <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px;padding-top:0px;">

                    <form method="post" enctype="multipart/form-data">    
                        <div id="post"> 
                        <input type="file" name="profilepic">
                        <input type="submit" id="postb" value="change">
                    </form>


                    </div>

                    
                    
                    
            
                
            </div>





        

    </div>




</body>
</html>