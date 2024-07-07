<?php 

class messagerie{
        public function sendMessage($id_prof, $id_eleve, $message_content, $sender) {
            $db = new Database();
            $query = "INSERT INTO messagerie (id_prof, id_eleve, message, sender) 
                      VALUES ('$id_prof', '$id_eleve', '$message_content', '$sender')";
            return $db->save($query);
        }
    
        public function getMessages($id_prof, $id_eleve) {
            $db = new Database();
            $query = "SELECT * FROM messagerie 
                      WHERE id_prof = '$id_prof' AND id_eleve = '$id_eleve' 
                      ORDER BY datemessage DESC";
            $result=$db->read($query);
            return $result ;
        }
       
}