<?php  

	require_once("connexionbasedonnee.php");
	session_start();
	
	$mail=isset($_POST['mail'])?$_POST['mail']:"";
	$login=isset($_POST['login'])?$_POST['login']:"";
	$password=isset($_POST['password'])?$_POST['password']:"";
	$password2=isset($_POST['password2'])?$_POST['password2']:"";
	$typecompte="VISITEUR";
	$etat=0;

	if (!empty($mail) AND !empty($login) AND !empty($password) AND !empty($password2)) {
		//on peut lancer une condition pour savoir si le mail est valide avec la methode filter_var
		if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
			if ($password==$password2) {
				//on va tester voir si personne dans la bd n'a le même login
				$testlogin=$connect->query("SELECT id_user FROM user WHERE login='$login'");
				//$testmail=$connect->query("SELECT id_user FROM user WHERE mail=$mail");
				if ($testlogin -> rowCount() < 1 ) {	//le login est libre
				//rowCount()  retourne le nombre de lignes affectées par la dernière requête
					$requeteInsertionUser="INSERT INTO user(mail,login,password,typecompte,etat) VALUES ('$mail', '$login', md5('$password'), '$typecompte', '$etat' )";
					$resultat=$connect->query($requeteInsertionUser);
					echo "utilisateur créé";
                    header("Location:https://gestionentreprise.go.yj.fr/pages pour le proj/login.php");
					
				} else echo "mail ou login déja utilisé";
				
			} else echo "les 2 mots de passe ne correspondent pas !"	;		
		}else echo"mail invalide !";
	} else echo"un ou plusieurs champs est vide !";
	
session_destroy();

?>