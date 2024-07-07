<div id="friends">
<?php    
    
        $image = $request['profilepic'];
        $idelv=$request['id_eleve'];

        
     ?>    
<a href="messagerie.php?id=<?php echo $request['id_eleve'] ?>" target="_blank"><img id="friendimg" src="<?php echo $image ?>">
<?php echo $request['nom']." ".$request['prenom'];
           ?>
</a>
<?php echo "<br>"/* . $request['domaine'];*/ ?>
      <div class="invite">  
        <form method="post">
                <button type="submit" name="accept-<?php echo $idelv ?>" value="accepted"><i class="fa-solid fa-plus"></i>Accepter Demande
        </form>
      </div><i class="fa-regular fa-X" style="color: red;"></i>

        <?php 
        if(isset($_POST["accept-$idelv"]) && $_POST["accept-$idelv"] == "accepted"){
                $user->acceptinvite($request['id_eleve'],$_SESSION['id_prof']);
        } 
        ?>
      
      

</div>
