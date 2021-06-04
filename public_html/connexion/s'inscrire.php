<?php session_start();
	
?>

<!DOCTYPE HTML>
<HTML>
	<head>
		<meta charset="utf-8">
		<title>Page d'inscription d'un utilisateur</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miseenpage.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	</head>
	<body>
		<div class="container col-md-6 col-md-offset-3 col-lg-2 col-lg-offset-5">
			<div class="panel panel-primary margetop">
				<!--Formulaire d'inscription-->
                <div class="panel-heading text-center">
                    <span class="glyphicon glyphicon-user"></span><br> S'inscrire...
                </div>
                <div class="panel-body">
                	<div class="panel-body">
                        <form action="validationInscription.php" method="POST" class="form" >
                            
                            <div>
                                <label for="mail"> Mail: </label>
                                <input type="email" name="mail" placeholder="Entrez votre mail" class="form-control">
                            </div>  <br>

                            <div class="form-group">
                                <label for="login"> Login: </label>
                                <input type="login" name="login" placeholder="identifiant" class="form-control">
                            </div>
                            <div>
                                <label for="password"> Mot de passe: </label>
                                <input type="password" name="password" placeholder="mot de passe" class="form-control">
                            </div>  <br>

                            <div>
                                <label for="password"> Confirmer le mot de passe: </label>
                                <input type="password" name="password2" placeholder="confirmer le mot de passe" class="form-control">
                            </div>  <br>

                            <!--On ajoute une div pour affiche le msg d'erreur en cas d'echec de la connexion-->
                                                
                            <button type="submit"> <span class="glyphicon glyphicon-log-in" ></span> S'inscrire </button>
                        </form>
				</div>
			</div>
		</div>

	</body>
</HTML>