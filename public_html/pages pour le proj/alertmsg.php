<?php
	$messageErreur=isset($_GET['messageErreur'])? ($_GET['messageErreur']):"Erreur!";
 ?>
<!DOCTYPE HTML>
<HTML>
<head>
	<title> Page d'Alerte </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/miseenpage.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<div class="container">
		<div class="panel panel-danger margetop">
			<div class="panel-heading"> 
				<span class="glyphicon glyphicon-alert">WARNING...</span>
			</div>
			<div class="panel-body">
				<?php echo $messageErreur ?>
				<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><br>Retour</a>
			</div>
		</div>

	</div>
	
</body>
</HTML>