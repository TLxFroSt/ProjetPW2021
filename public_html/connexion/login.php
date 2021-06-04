<?php 
	session_start();
	$connexionFails= isset($_SESSION['connexionFails'])? $_SESSION['connexionFails']:"";
	session_destroy();
 ?>

<!DOCTYPE HTML>
<HTML>
	<head>
		<meta charset="utf-8">
		<title>Se connecter...</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miseenpage.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	</head>
	<body>
		<div class="container col-md-8 col-md-offset-4 col-lg-2 col-lg-offset-5">
			<div class="panel panel-primary margetop">
				<!--Formulaire de connexion-->	
				<div class="panel-heading text-center" >
                    <span class="glyphicon glyphicon-user"></span><br>Se connecter...
                </div>		
				<div class="panel-body">
					<form action="validationconnexion.php" method="POST" class="form" >
						<div class="form-group">
							<label for="login"> Identifiant: </label>
							<input type="login" name="login" placeholder="identifiant" class="form-control">
						</div>
						<div>
							<label for="password"> Mot de passe: </label>
							<input type="password" name="password" placeholder="mot de passe" class="form-control">
						</div>  <br>
						<!--On ajoute une div pour affiche le msg d'erreur en cas d'echec de la connexion-->
						<?php if(empty(!$connexionFails)){ ?>
							<div class="alert alert-danger">
								<?php echo $connexionFails ?>
							</div>  <br>
						<?php } ?>						
	               		<button type="submit"> <span class="glyphicon glyphicon-log-in" ></span> Connexion </button>
					</form>
				</div> &nbsp &nbsp

				<!--Rajout d'un lien hyper-texte pour l'inscription-->
				<a href="s'inscrire.php">creer un compte</a>&nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp
                <a href="contact.php">contactez-nous</a>

			</div>

		</div>	
	</body>
</HTML>