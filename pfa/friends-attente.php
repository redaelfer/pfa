<div id="friends">
<?php    
    
        $image = $friendrow['profilepic'];
        $idprf=$friendrow['id_prof'];

        
     ?>    
<a href="messagerieelv.php?id=<?php echo $friendrow['id_prof'] ?>" target="_blank"><img id="friendimg" src="<?php echo $image ?>">
<?php echo $friendrow['nom']." ".$friendrow['prenom'];
           ?>

<span style="color: gray;"><?php echo "<br>" . $friendrow['domaine']; ?></span><br>
     <div class="invite"> 
     <a href="messagerieelv.php?id=<?php echo $friendrow['id_prof'] ?>"><button><i class="fa-solid fa-message"></i> Envoyer message</button></a>
        </a>
      </div> 

        <?php 
        if(isset($_POST["invite-$idprf"]) && $_POST["invite-$idprf"] == "invited"){
                $user->sendinvite($_SESSION['id_eleve'],$friendrow['id_prof']);
        }
        ?>
      
      

</div>
