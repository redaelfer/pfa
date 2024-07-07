<?php 
session_start();
include("class/DB.php");
include("class/login.php");
include("class/user.php");
include("class/post.php");
include("class/profile.php");


$login = new login();
   $user_data=$login->testlogin_eleve($_SESSION['id_eleve']);


   $user= new user();
$id = $user_data['id_eleve'];
$friends=$user->getprofs($id);

$db = new database();
$query = "SELECT DISTINCT domaine FROM professeur";
$domaines = $db->read($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="inviteeleve.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



</head>
<body>
         <!-- top bar --> 
            <div class="topbar">
                <div class="sitename">
                    <?php 
                        $image = "";
                        if(file_exists($user_data['profilepic'])){
                            $image = $user_data['profilepic'];
                        }
                    ?>
                    <a href="logout.php">
                    <span style="font-size:25px;float:right;margin:10px;color:red"><i class="fa-solid fa-right-from-bracket"></i></span>
                    </a>

                </div>    
            </div>

    
                 <!-- middle bar --> 

    <div class="middle">
        <div  id="partiehaut">
            <img id="profitepicture" src="<?php echo $image ?>">
            <br>
            <div><a href="profilepic2.php"><i class="fa-solid fa-circle-user"></i></a></div>
            <div style="font-size:20px;">
            <?php echo $user_data['nom']." ".$user_data['prenom']; ?>         
            </div>
            <br>
            

            <a href="homepage2.php"><div id="menub" >Timelime</div></a>
            <a href="mesprof.php"><div id="menub">Mes Professeurs</div></a>
            <a href="inviteeleve.php" style="border-bottom: 2px solid blue;"><div id="menub">Recherche   </div></a>
            <a href="attente.php"><div id="menub">Invitations en attente </div></a>
        </div>
            <div id="partiebas">
                
                    <div id="friendbar"><div id="friend-header">Recherche de professeurs<br></div>
                    <div id="friend-header"><form action="recherche.php" method="GET">
                    <label for="domaine">Recherche par domaine:</label>
                    <select name="domaine" id="domaine">
                    <option value="" disabled selected>Sélectionnez un domaine</option>
                        <?php if ($domaines): ?>
                    <?php foreach ($domaines as $domaine): ?>
                        <option value="<?php echo $domaine['domaine'] ?>"><?php echo $domaine['domaine'] ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <button type="submit">Rechercher</button>
                  </form></div>
                    <?php  

                         
                            if($friends){
                                foreach($friends as $friendrow){
                                    include("friends.php");}
                                }
                        ?>
                        
                       
                        
                    </div>
                        
                        
                </div>
               
            
            
            
                
            





        

    </div>




</body>
</html>