<?php  
    require_once('connexionbasedonnee.php');

    //forme du if()?valeurs_si_if:valeur_sinon
    $id_emp=isset($_POST['id_emp'])?$_POST['id_emp']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?($_POST['prenom']):"";
    $sexe=isset($_POST['sexe'])?$_POST['sexe']:"H";
    $id_dom=isset($_POST['id_dom'])?($_POST['id_dom']):1;

    $editEmploye="UPDATE employe SET nom=?, prenom=?, sexe=?, id_dom=? WHERE id_emp=?";

    $paramedition=array($nom,$prenom,$sexe,$id_dom,$id_emp);
    $resultat= $connect->prepare($editEmploye);
    $resultat->execute($paramedition);

    //une fois la requête accomplis, on se rédirige vers la page des domaines
    header('location:employes.php');
?>