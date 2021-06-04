<?php  
    require_once('connexionbasedonnee.php');

    //forme du if()?valeurs_si_if:valeur_sinon
    $iddomaine=isset($_POST['idDom'])?$_POST['idDom']:0;
    $nom=isset($_POST['Name'])?$_POST['Name']:"";
    $niveau=isset($_POST['niveau'])?($_POST['niveau']):"";

    //création d'un tableau avec les 3 param préalablement définits
    $parammodification= array($nom,$niveau,$iddomaine);
    print_r($parammodification);
    //requete préparée
    $resultat= $connect->prepare("UPDATE domaine SET name=?, niveau=? WHERE id_dom=?");
    $resultat->execute($parammodification);

    //une fois la requête accomplis, on se rédirige vers la page des domaines
    header('location:domaines.php');
?>