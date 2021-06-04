<?php  
    require_once('connexionbasedonnee.php');

    //forme du if()?valeur_si_if:valeur_sinon

    $nom=isset($_POST['Name'])?$_POST['Name']:"";
    $niveau=isset($_POST['niveau'])?($_POST['niveau']):"";

    $reqinsererundomaine="INSERT INTO domaine(name,niveau) VALUES(?,?)";
    //un tableau
    $paraminsertion=array($nom,$niveau);
    $resultat= $connect->prepare($reqinsererundomaine);
    $resultat->execute($paraminsertion);

    //une fois la requête accomplis, on se rédirige vers la page des domaines
    header('location:domaines.php');
?>