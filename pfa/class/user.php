<?php 
    class user{
        public function getdata($id){ 
            $query="select * from professeur where id_prof= '$id' limit 1";
            $db = new database;
            $result = $db->read($query);
            if($result){
                $row=$result[0];
                return $row;
            }else{
                return false;
            }

        }

        public function getuser($id)
        {   $db = new database();
            $query="select * from professeur where id_prof = '$id' limit 1";
            $result =$db->read($query);

            if($result){
                return $result[0];
            }else{
                return false;
            }

        }

        public function getprofs($id)
        {   $db = new database();
            $query="SELECT * FROM professeur
            WHERE id_prof NOT IN (
                SELECT reciever FROM request WHERE sender = $id
            )";   
            $result =$db->read($query);

            if($result){
                return $result;
            }else{
                return false;
            }

        }

        public function getfriends($id)
        {   $db = new database();
            $query="SELECT * FROM professeur
            WHERE id_prof IN (
            SELECT reciever FROM request WHERE sender = $id AND statut='0')";
            $result =$db->read($query);    

            return $result;

        }


        public function sendinvite($sender,$reciever){
            $query = "SELECT COUNT(*) AS count_rows
              FROM request 
              WHERE (sender = '$sender' AND reciever = '$reciever')
              OR (sender = '$reciever' AND reciever = '$sender')";

                $db = new database();
                $result = $db->read($query);

                if ($result !== false && isset($result[0]['count_rows']) && $result[0]['count_rows'] > 0) {
                    return false;
                } else {
                            
                            
                            $query = "SELECT statut FROM request 
                            WHERE (sender = '$sender' AND reciever = '$reciever')
                            LIMIT 1";
                    $db = new database();
                    $existingStatus = $db->read($query);

                    if ($existingStatus === false  || $existingStatus[0]['statut'] != '1') {
                            
                            
            
            $query="insert into request (sender,reciever) values ('$sender','$reciever')";
            $db = new database();
            $result=$db->save($query);
            if ($result) {
                header("Location:inviteeleve.php ");
                exit(); 
            }
            return $result;
        }
    }}

    

        public function getrequest($idprof){
        $query ="SELECT * FROM eleve 
        WHERE id_eleve IN (
            SELECT sender FROM request WHERE reciever = $idprof AND statut = '0'
        )";
        $db = new database();
        $result=$db->read($query);
        return $result;
    }

    public function acceptinvite($sender,$reciever){
        $query = "UPDATE request SET statut = '1' WHERE sender = $sender AND reciever = $reciever";
        $db = new database();
        $result=$db->save($query);
        if ($result) {
            header("Location: inviteprof.php");
            exit;
        } 
        return $result;
    }

    public function geteleves($idprof){
        $query ="SELECT eleve.* 
                FROM request 
                INNER JOIN eleve ON request.sender = eleve.id_eleve 
                WHERE request.reciever = $idprof AND request.statut = '1'";
        $db = new database();
        $result=$db->read($query);
        return $result;
    }

    public function getprof($idelv){
        $query ="SELECT professeur.* 
                FROM request 
                INNER JOIN professeur ON request.reciever = professeur.id_prof
                WHERE request.sender = $idelv AND request.statut = '1'";
        $db = new database();
        $results=$db->read($query);
        return $results;

    }

    public function getprofsbydomaine($dom){
        $query ="SELECT * FROM professeur
        WHERE domaine = '$dom' ";
        $db = new database();
        $results=$db->read($query);
        return $results;

    }

    }








?>


