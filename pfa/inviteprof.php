<?php 
session_start();
include("class/DB.php");
include("class/login.php");
include("class/user.php");
include("class/post.php");
include("class/profile.php");

$login = new login();
$user_data=$login->testlogin_prof($_SESSION['id_prof']);

$user=new user();
$requests=$user->getrequest($_SESSION['id_prof']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitations</title>
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
            <div><a href="profilepic.php"><i class="fa-solid fa-circle-user"></i></a></div>
            <div style="font-size:20px;">
            <?php echo $user_data['nom']." ".$user_data['prenom']; ?>         
            </div>
            <br>
            

            <a href="homepage.php"><div id="menub">Homepage</div></a>
            <a href="ttmeseleves.php"><div id="menub">Mes élèves</div></a>

            <a href="inviteprof.php"><div id="menub" style="border-bottom: 2px solid blue;">Invitations  </div></a>
            <a href="infromations.php"><div id="menub">Informations </div></a>
        </div>
            <div style="display: flex;">
               
            
                <div style="min-height:400px;flex:1;">
                    <div id="friendbar"><div id="friend-header">Invitations</div>
                    <?php 
                            $user = new user();
                            $requests = $user->getrequest($_SESSION['id_prof']);

                            if ($requests !== false && !empty($requests)) {
                                foreach ($requests as $request) {
                                include("requests.php");
                                }
                            } else {
                                echo "<span style='margin-left:10px;'>Aucune demande</span>";
                            }
                        ?>
                        
                       
                        
                    </div>
                        
                        
                </div>
               
            
            
            
                
            </div>





        

    </div>




</body>
</html>