<?php
    class profile{
        public function getprofile($id){
            $db = new database();
            $query = "select * from professeur where id_prof = $id limit 1 ";
            return $db->read($query);
        }        

    }