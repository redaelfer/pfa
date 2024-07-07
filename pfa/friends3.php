<div id="friends">
<?php    
    
        $image = $friendrow['profilepic'];
        $idprf=$friendrow['id_prof'];

        
     ?>    
<a href="profileprof.php?id=<?php echo $friendrow['id_prof'] ?>" target="_blank"><img id="friendimg" src="<?php echo $image ?>">
<?php echo $friendrow['nom']." ".$friendrow['prenom'];
           ?>
</a>
<span style="color: grey;"><?php echo "<br>" . $friendrow['domaine']; ?></span><br>
<div><a href="infoprof.php?id=<?php echo $friendrow['id_prof'] ?>" style="font-size:10px;color:grey;text-decoration: underline;">plus d'informations</a></div>
     <div class="invite">  
     <a href="messagerieelv.php?id=<?php echo $friendrow['id_prof'] ?>"><button><i class="fa-solid fa-message"></i> Envoyer message</button></a>

      </div> 

</div>
