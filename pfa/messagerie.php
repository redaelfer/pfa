<?php 
session_start();
include("class/DB.php");
include("class/login.php");
include("class/user.php");
include("class/post.php");
include("class/profile.php");
include("class/messagerie.php");

$db= new database();
$login = new login();
$user_data=$login->testlogin_prof($_SESSION['id_prof']);

$msg=new messagerie;
$id_eleve=$_GET['id'];
$id_prof=$_SESSION['id_prof'];
$sender='professeur';    
if(isset($_POST['submit'])){  
    $message=$_POST['message'];
    $msg->sendMessage($id_prof,$id_eleve,$message,$sender);}
$toutmessage=$msg->getMessages($id_prof,$id_eleve);

     
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="messagerie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



</head>
<body>
         <!-- top bar --> 
            <div class="topbar">
               
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
            <a href="ttmeseleves.php"><div id="menub">Mes eleves</div></a>

            <a href="inviteprof.php"><div id="menub">Invitations  </div></a>
            <a href="infromations.php"><div id="menub">Informations </div></a>
        </div>
        <div id="messagerie">
        <div id="msg" >
        <?php 
        if (is_array($toutmessage) && !empty($toutmessage)) {
            foreach ($toutmessage as $message) {
               
                    $sender = $message['sender'];
                    if ($sender === 'professeur') {
                        $query = "SELECT * FROM professeur WHERE id_prof = $id_prof";
                        $result = $db->read($query);
                       
                    } elseif ($sender === 'eleve') {
                        $query = "SELECT * FROM eleve WHERE id_eleve = $id_eleve";
                        $result = $db->read($query);
                        }
                    foreach($result as $datademessage){
                        $donne=$datademessage['nom'].' '.$datademessage['prenom'];
                        $image=$datademessage['profilepic'];
                    }
                    $messageContent = $message['message'];
                    $date=$message['datemessage'];

                    ?>
            <div class="message">
                <div class="sender"><img id="friendimg" src="<?php echo $image ?>"><?php echo $donne; ?></div>
                <div class="content"><?php echo $messageContent; ?></div>
                <div class="date"><?php echo $date; ?></div>
            </div>
            <?php
        }
    }
    ?>

    
        </div>  
        
        <div>
        <form method="post">
        <textarea name="message" placeholder="Écrivez votre message ici..."></textarea>
        <button type="submit" name="submit">Envoyer</button>
    </form>
      </div>
        </div>
</div>
</div>
 </div>
</div>




</body>
</html>






