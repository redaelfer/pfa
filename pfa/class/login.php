<?php
    class login{
        private $error = "";
        private $lien  = "";
        private $id = "";

        public function evaluate($data){
            $email=$data['email'];
            $motdepass=$data['motdepass'];
            $specialite=$data['specialite'];

            if($specialite == "Eleve"){$table='eleve';$id_column='id_eleve';$this->lien='homepage2.php';
            }elseif($specialite=="Professeur")
            {$table='professeur';$id_column='id_prof';$this->lien='homepage.php';}


            $query = "select * from $table where email='$email' limit 1 " ;

            $db = new database();
            $result = $db->read($query);

            if($result){
                $row = $result[0];
                if($motdepass==$row['motdepass']){
                    $_SESSION[$id_column]=$row[$id_column]; 
                    $this->id=$row[$id_column];
                    
                }else{
                    $this->error .= "wrong password"; 
                }
    

            }else{
                $this->error .= "no email found";
            }

            return ['error'=>$this->error,'lien'=>$this->lien,'id' => $this->id];

        }

    public function testlogin_prof($id)
    {
        if(is_numeric($id))
        {
                $query = "select * from professeur where id_prof='$id' limit 1";
                $db = new database();
                $result = $db->read($query);

            if($result){
                $user_data=$result[0];  
                return $user_data;

            }else{
                header("Location:login.php");
                die;
            }
            }else{
                header("Location:login.php");
                die;
                }
                        
                    
        }

        public function testlogin_eleve($id)
        {
            if(is_numeric($id))
            {
                    $query = "select * from eleve where id_eleve = '$id' limit 1";
                    $db = new database();
                    $result = $db->read($query);
    
                if($result){
                    $user_data=$result[0];  
                    return $user_data;
    
                }else{
                    header("Location:login.php");
                    die;
                }
                }else{
                    header("Location:login.php");
                    die;
                    }
                            
                        
            }
    }

    


?>
