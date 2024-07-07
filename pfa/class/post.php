<?php

use LDAP\Result;

    class post{
                private $error = "";
                public function createpost($userid,$data,$file)
                {
                    if(!empty($data['post']) || !empty($fichier['file']['name']) )
                    {

                        $post=$data['post'];
                        $query="insert into post (user_id,post,fichier) values ('$userid','$post','$file')";
                        $db = new database();
                        $db->save($query);

                    }else
                    {
                        $this->error .= "please type something to post and add a file  <br>";

                    }
                    return $this->error; 
                }

                public function getpost($id){
                    $query="select * from post where user_id='$id' order by date desc ";
                    $db = new database();
                    $result=$db->read($query);

                    if($result){
                        return $result;
                    }else{
                        return false;
                    }

                }

                public function getonepost($id){
                    $query="select * from post where id_post='$id' limit 1 ";
                    $db = new database();
                    $result=$db->read($query);

                    if($result){
                        return $result[0];
                    }else{
                        return false;
                    }

                }

                public function deletepost($id){
                    $query="delete from post where id_post=$id ";
                    $db = new database();
                    $db->save($query);
                    header("Location:homepage.php");
                    die;
                }

                public function affichepost($id){
                    $query = "SELECT post.*
                    FROM post
                    INNER JOIN request ON request.reciever = post.user_id
                    WHERE request.sender = '$id' AND request.statut = '1'
                    ORDER BY post.date DESC";

                    $db = new database();
                    $result=$db->read($query);
                    return  $result;



                }


                public function affichepostprof($id_eleve,$id_prof){
                    $query = "SELECT post.*
                    FROM post
                    INNER JOIN request ON request.reciever = post.user_id
                    WHERE request.sender = '$id_eleve' AND request.reciever = '$id_prof' AND request.statut = '1'
                ";

                    $db = new database();
                    $result=$db->read($query);
                    return  $result;



                }

                public function addcv($userid,$filename)
                {
                    if(!empty($fichier['file']['name']) )
                    {
                        $db = new database();
                        $query="update professeur set cv = '$filename' where id_prof = $userid";
                        $db->save($query);

                    }else
                    {
                        $this->error .= "erreur";

                    }
                    return $this->error; 
                }


                
            }