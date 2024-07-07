<?php session_start();

    include("class/DB.php");
    include("class/login.php");
    include("class/user.php");
    include("class/post.php");
    include("class/profile.php");


   $login = new login();
   $user_data=$login->testlogin_eleve($_SESSION['id_eleve']);


$user= new user();
$prof=$user->getprof($_SESSION['id_eleve']);


$post = new post();
$posts=$post->affichepost($_SESSION['id_eleve']);




    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <link rel="stylesheet" href="homepage.css">
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
            

            <a href="homepage2.php"><div id="menub" style="border-bottom: 2px solid blue;">Timelime</div></a>
            <a href="mesprof.php"><div id="menub">Mes Professeurs</div></a>
            <a href="inviteeleve.php"><div id="menub">Recherche   </div></a>
            <a href="attente.php"><div id="menub">Invitations en attente </div></a>

        </div>
            <div style="display: flex;">
               
            
                <div style="min-height:400px;flex:1;">
                    <div id="friendbar">Mes Prof
                    <?php 
                            if($prof){$limit=3;$counter=0;
                                foreach($prof as $friendrow){
                                    if($counter<$limit){
                                    include("friends-mini.php");
                                    $counter++;
                                }
                                }
                            }
                        ?>
                    <div id="friends" style="display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 20px;
            color:grey;"><i class="fa-solid fa-circle"></i><i class="fa-solid fa-circle"></i><i class="fa-solid fa-circle"></i></div>
            
                       
                        
                    </div>
                        
                        
                </div>
               
            
            
            
                <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px;padding-top:0px;">

                    

                    <div id="postbar">    
                        <span>Feed</span>
                        <?php 
                            if($posts){
                                foreach($posts as $row){
                                    $id=$row["user_id"];
                                    $user=new user();
                                    $row_user=$user->getuser($id);
                                    include("affichepost.php");}}
                                
                            
                        ?>

                        

                                            

                                            
                    </div>
                    
                    
            
                </div>
            </div>





        

    </div>




</body>
</html>