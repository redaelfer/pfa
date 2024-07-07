<div id="friends">
<?php    
    
        $image = $friendrow['profilepic'];

        
     ?>    
<a href="messagerie.php?id=<?php echo $friendrow['id_eleve'] ?>" target="_blank"><img id="friendimg" src="<?php echo $image ?>">
<?php echo $friendrow['nom']." ".$friendrow['prenom']; 
           ?><br>

</a>
    
      

</div>
