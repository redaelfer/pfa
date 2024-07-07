<?php  

    include("class/DB.php");
    include("class/signup.php");


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $signup = new signup();
        $result = $signup -> evaluate($_POST);
        if($result != ""){
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "the following error occured : <br>";
            echo $result;
            echo "</div>";
        }else{
            header("Location:login.php");
            die;
        }
        




    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBook / Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    
    <div class="entete">
        <div class="nom">MyBook</div>
    </div>
    <div class="formulaire"> Sign Up<br><br>
       
        <form method="post" action="" class="form">
            
        <input name="nom" type="text" id="text" placeholder="nom"><br>
                <input name="prenom"  type="text" id="text" placeholder="prenom"><br>
                Sexe     : 
                <select name="sexe" id="gender">
                    <option>Home</option>
                    <option>Femme</option>

                </select><br>
                Domaine: 
                <select name="specialite" id="gender">
                    <option>Eleve</option>
                    <option>Professeur</option>

                </select><br>
                <input name="email" type="text" id="text" placeholder="email"><br>
                <input name="telephone" type="tel" pattern="0[0-9]{9}" id="text"  placeholder="numero de telephone" ><br>
                <input name="motdepasse" type="password" id="text" placeholder="mot de passe" ><br>
                <input name="signup" type="submit"  value="Sign Up" id="buttom">
                <br>
                Already have an account? <a href="login.php">LogIn</a>
            
            



                







        </form>
    

    </div>
</body>
</html>