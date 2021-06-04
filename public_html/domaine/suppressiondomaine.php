<?php  
    require_once('connexionbasedonnee.php');

    /**On va avoir 2 pbs majeurs ici: Tout d'abord, on veut qu'un domaine ne soit supprimer que s'il ne contient plus d'employés, ensuite on veut que l'identifiant des domaines puissent être changés, par exemple si on supprime un domaine x, on veut que le domaine suivant x+1 puisse prendre l'id du domaine x et ainsi de suite de sorte à ce qu'il n'y ait pas de trous */

    $iddomaine=isset($_GET['idDom'])?$_GET['idDom']:0;

    $resultatcount=$connect->query("SELECT count(*) compteremploye FROM employe WHERE id_dom=$iddomaine");
    //on recup le resultat sous forme de tableau associatif
    $tabcompter=$resultatcount->fetch();
    $resultat=$tabcompter['compteremploye'];

    if ($resultat==0) {      //il n'y a plus aucun employé dans ce domaine
        $paramsuppression= array($iddomaine);
        $resultat= $connect->prepare("DELETE FROM domaine WHERE id_dom=?");
        $resultat->execute($paramsuppression);  

        //une fois la requête accomplis, on se rédirige vers la page des domaines
        header('location:domaines.php');
    } 
    else {
        $msgError="Impossible: supprimez d'abord tous les employés inscrits";
        header("location:alertmsg.php? messageErreur=$msgError");
    }
    

    

   
?>