<div id="friends">
<?php    
    
        $image = $friendrow['profilepic'];
        $idprf=$friendrow['id_eleve'];

        
     ?>    
<a href="messagerie.php?id=<?php echo $friendrow['id_eleve'] ?>" target="_blank"><img id="friendimg" src="<?php echo $image ?>">
<?php echo $friendrow['nom']." ".$friendrow['prenom']; 
           ?><br>
<button style="cursor:pointer;"><i class="fa-solid fa-message"></i> Envoyer Message</button>

</a>
    
      

</div>