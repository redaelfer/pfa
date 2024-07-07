<?php 
    session_start();
    print_r($_POST);



    include("class/DB.php");
    include("class/login.php");


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $login = new login();
        $result = $login -> evaluate($_POST);
        if($result['error'] != ""){
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "the following error occured : <br>";
            echo $result['error'];
            echo "</div>";
        }else{

           $url = $result['lien']; 
                      if (isset($_SESSION['id_eleve'])) {

                        $url .= '?id=' . $_SESSION['id_eleve'];
           } elseif (isset($_SESSION['id_prof'])) {

            $url .= '?id=' . $_SESSION['id_prof'];
           }
   

           header("Location: $url");
           die;


        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> mybook / login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="entete">
        <div class="nom">MyBook</div>
    </div>
        <div class="formulaire">
        <form class="form" method="post">
            <div class="flex-column">
            <label>Log In </label> <br><br><br>
            <label>Email </label></div>
            <div class="inputForm">
                <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
                <input name="email" type="text" type="text" class="input" placeholder="Enter your Email">
            </div>
            
            <div class="flex-column">
            <label>Password </label></div>
            <div class="inputForm">
                <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                <input name="motdepass" type="password" class="input" placeholder="Enter your Password">
            </div>
            <div class="flex-column">
            <label>Log In As: </label></div>
            <div class="tab-container">
            <input type="submit" name="specialite" value="Eleve" class="tab tab--1">
            <input type="submit" name="specialite" value="Professeur" class="tab tab--2">
                        <div class="indicator"></div>
                        </div><br>
                        <div>You dont have an account <a href="signup.php">SignUp</a></div>


        </form>
    </div>


        

</body>
</html>


