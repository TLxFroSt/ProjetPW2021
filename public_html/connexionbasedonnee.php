<!--Pour la connexion à la base de données il est plus facile d'utiliser phpMyadmin mais pas sûr que l'on y accède via un autre pc, donc dans le doute, on va proposer une façon sûr de se connecter à la base de donnée-->
<?php 
    /** plus facile à retrouver si on veut changer de serveur par exmple
    $servername = 'localhost';
            $username = 'root';
            $password = 'root';
    */   
    //On essaie de se connecter
    try{
        $connect = new PDO("mysql:host=localhost;dbname=bdprojetpw2021","root", "");
                //On définit le mode d'erreur de PDO sur Exception
   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }   
            /*On capture les exceptions si une exception est lancée et on affiche les infos correspondantes*/
    catch(PDOException $except){
        die('Erreur : '. $except->getMessage());
    }


    $finconnect=null;
 ?>