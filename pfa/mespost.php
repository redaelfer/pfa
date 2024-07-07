
<div id="affichepost">
<div id=image_post>
<?php     

    $image=$user_data['profilepic']
    ?>    
<img src="<?php echo $image ?>" style="width: 75px;margin-right:4px; border-radius:200px;">
</div>

<div id="post_all">
    <div style="font-weight: bold;color:#0098ff"><?php echo $row_user['nom']." ".$row_user['prenom']; ?>
    </div>
    <div class="post-content">
    <?php 
    echo $row['post'];

            
    ?><br></div><br>
    Piece Jointe : <a href="<?php echo $row['fichier'] ?>" target="_blank"><i class="fa-solid fa-file-pdf fa-2x"></i></a>

    <br><br>
    &nbsp&nbsp<span><?php echo $row['date']; ?></span>
</div>
</div> 



