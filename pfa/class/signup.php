<?php 
    class signup{
        
        private $error = "";

        public function evaluate($data){
            foreach($data as $key => $value){
                if(empty($value)){
                    $this->error .= $key . " is empty <br>";
                }
            }
            if($this->error == ""){
                $this->createuser($data);
            }else{
                return $this->error;
            }

        }

        public function createuser($data){
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $specialite=$data['specialite'];
            $email=$data['email'];
            $motdepass = $data['motdepasse'];
            $sexe=$data['sexe'];
            $telephone=$data['telephone'];



            if($specialite == "Eleve"){$table='eleve';}elseif($specialite=="Professeur"){$table='professeur';}


            if($sexe == "Femme"){$profilepic='image/user_female.jpg';}else{$profilepic='image/user_male.jpg';}



            


            $queery = "insert into $table (nom,prenom,email,motdepass,sexe,telephone,specialite,profilepic) values('$nom','$prenom','$email','$motdepass','$sexe','$telephone','$specialite','$profilepic')"; //mhm hna gad zmrk

            $db = new database();
            $db->save($queery);


        }
    


    }

?>