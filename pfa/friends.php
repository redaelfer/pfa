<div id="friends">
<?php    
    
        $image = $friendrow['profilepic'];
        $idprf=$friendrow['id_prof'];

        
     ?>    
<a href="messagerieelv.php?id=<?php echo $friendrow['id_prof'] ?>" target="_blank"><img id="friendimg" src="<?php echo $image ?>">
<?php echo $friendrow['nom']." ".$friendrow['prenom'];
           ?>
</a>
<span style="color:grey"><?php echo "<br>" . $friendrow['domaine']; ?></span><br>
     <div class="invite">  <form method="post">
                <button type="submit" name="invite-<?php echo $idprf ?>" value="invited" style="cursor: pointer;"><i class="fa-solid fa-plus"></i>Envoyer Demande
        </form>
      </div> 

        <?php 
        if(isset($_POST["invite-$idprf"]) && $_POST["invite-$idprf"] == "invited"){
                $user->sendinvite($_SESSION['id_eleve'],$friendrow['id_prof']);
        }
        ?>
      
      

</div>
