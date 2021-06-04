<?php
	require_once("connexionbasedonnee.php");
	session_start();
	//on recup le login et le mot de passe 
	$login=isset($_POST['login'])? $_POST['login']:"";
	$password=isset($_POST['password'])?$_POST['password']:"";

	$requeteConnexion="SELECT * FROM user WHERE login='$login' AND password=md5('$password')";

	/**
	 * la methode query va nous executer la requete demandé à partir des informations de la base de données obtenus via la variable $connect dans la connexion à la base de données, puis stocké le resultat dans la var $resultat
	  */
	$resultat=$connect->query($requeteConnexion);

	/**La methode fetch va nous retourner le resultat sous forme de tableau associatif, retourne une ligne de ce tableau si l'utilisateur existe */
	
	if($user=$resultat->fetch()){
		if($user['etat']==1){  
		//l'utilisateur est activé donc on va créer une session
			$_SESSION['user']=$user;     //var glob pour la création de session
			header("Location:https://gestionentreprise.go.yj.fr/pages pour le proj/domaines.php");
		}
		else {
			$_SESSION['connexionFails']="Error...! Compte desactivé, veuillez contacter l'administrateur";
			header("Location:https://gestionentreprise.go.yj.fr/pages pour le proj/login.php");
		}
	}
	//l'utilisateur n'existe pas, si c'est le cas, on peut créer un compte
	else{
		$_SESSION['connexionFails']="Error...! ident ou mdp incorrect";
			header("Location:https://gestionentreprise.go.yj.fr/pages pour le proj/login.php");
	}


	if (isset($_GET['afaire']) && $_GET['afaire']=='deconnexion'){
    session_start();
    session_destroy();
    header("Location:https://gestionentreprise.go.yj.fr/pages pour le proj/login.php");
	}
    else {echo "erreur";}
  ?>