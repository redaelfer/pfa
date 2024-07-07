<div id="friends">
<?php    
    
        $image = $friendrow['profilepic'];
        $idprf=$friendrow['id_prof'];

        
     ?>    
<a href="postprof.php?id=<?php echo $friendrow['id_prof'] ?>" target="_blank"><img id="friendimg" src="<?php echo $image ?>">
<?php echo $friendrow['nom']." ".$friendrow['prenom'];
           ?>
</a>
<span style="color: grey;"><?php echo "<br>" . $friendrow['domaine']; ?></span>
     <div class="invite">  
      </div> 

</div>
