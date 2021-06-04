<?php  
    require_once('connexionbasedonnee.php');

    $id_emp=isset($_GET['id_user'])?$_GET['id_user']:0;


    $paramsuppression= array($id_emp);
    $resultat= $connect->prepare("DELETE FROM employe WHERE id_emp=?");
    $resultat->execute($paramsuppression);  

    header('location:employes.php');

    

   
?>