<?php 
	require_once("connexionbasedonnee.php");
    session_start();
	//require_once("se connecter.php");
	//variables globales

	/* on pourrait avoir un cas de variable null, ce qui peut conduire à une erreur donc on gère ça avec la methode isset qui détermine si une variable est déclarée et est différente de null */

	if(isset($_GET['Name']))
        $name=$_GET['Name'];
    else
        $name="";
	
	if(isset($_GET['niveau']))
        $niveau=$_GET['niveau'];
    else
        $niveau="all";

	//re-selectionner à chaque fois
	if ($niveau=="all") {
		//cette requête ne marche pas
		$reqdom="SELECT * FROM domaine
		WHERE name LIKE '%$name%'";
		
		$count="SELECT count(*) compter from domaine
		where name like '%$name%'";
	}
	else {
		//cette requête ne marche pas les variables name et niveau ne sont pas reconnus
		$reqdom="SELECT * FROM domaine 
		WHERE name LIKE '%$name%' 
		AND niveau ='%$niveau%'";

		$count="SELECT count(*) compter FROM domaine
		WHERE name LIKE '%$name%'
		AND niveau ='%$niveau%'";
	}
	$resrequete=$connect->query($reqdom);

	//une requête pour compter le nombre de filière disponibles
	$compterresultat=$connect ->query($count);
	$tabcompte=$compterresultat->fetch();
	$nbdom=$tabcompte['compter'];

 ?>

<!DOCTYPE HTML>
<HTML>
<head>
	<title> Les Domaines </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/miseenpage.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<div class="container">

		<!--Une premiere division pour la recherche -->
		<div class="panel panel-info margetop">
			<div class="panel-heading"> Rechercher...</div>		
			<div class="panel-body">
				<!--On va avoir besoin d'un formulaire pour la recherche -->
				<form method="GET", action="domaines.php" class="form-inline">
					<!--pour une meilleur lisibilité on utilise une class form-group -->
					<div class="form-group">
						<input type="texte" name="Name" placeholder="tapez votre reqête" class="form-control" value="<?php echo $name ?>">
					</div>
					
				<!--une selection des différents niveaux disponibles,on a decider d'un choix par niveau car c'était plus rapide -->
					
					<!--label for="niveau">Niveau:</label> 
					<select name="niveau", class="form-control", id="niveau">
						<option value="all" 
							<?php if($niveau==="all") echo "selected" ?>>	All</option>
						<option value="fac"
							<?php if($niveau==="fac") echo "selected" ?>>	Fac</option>
						<option value="ecole"
							<?php if($niveau==="ecole") echo "selected" ?>>Ecole</option>
						<option value="bac"
							<?php if($niveau==="bac") echo "selected" ?>>Bac</option>
						</select-->


						<button type="submit" class="btn btn-primary" >
							valider
						</button>
						&nbsp &nbsp 
                        <?php
                            if($_SESSION['user']['typecompte']=='ADMIN'){?>
                                <a href="insertiondomaine.php">
							        <span class="glyphicon glyphicon-plus"></span>add 
						        </a>
                        
                        <?php } ?>
                        
                        
						
				</form>
			</div>
		</div>

		

		<!--Et une 2e pour l'affichage des resultats -->
		<div class="panel panel-primary margetop">
			<div class="panel-heading"> Domaines disponibles...(<?php echo $nbdom ?> domaines)</div>	
			<div class="panel-body">
				<table class="table table-striped">
					<!--table permet de dire à la page que c'est un tab, table-striped pour la nuance des couleurs -->
					<thead>
						<tr align="center">
							<th> id domaine </th>
							<th> name </th>
							<th> niveau </th>
							<?php
                                if($_SESSION['user']['typecompte']=='ADMIN'){?>
                                    <th> Edition/supression </th>
                            <?php } ?>
						</tr>
					</thead>

					<tbody>
						<?php while($dom=$resrequete->fetch()){ ?>
							<tr>
							<!--on veut acceder à toutes les domaines donc on utilise une boucle while pour chacune des domaines -->
								<td> <?php echo $dom['id_dom']; ?></td>  
								<td> <?php echo $dom['name']; ?></td>
								<td> <?php echo $dom['niveau']; ?></td>
								<td> 
                                    <?php
                                        if($_SESSION['user']['typecompte']=='ADMIN'){?>
									        <a href="editiondomaine.php? idDom=<?php echo $dom['id_dom'] ?>">
										        <span class="glyphicon glyphicon-edit"></span>
									        </a> &nbsp &nbsp &nbsp &nbsp &nbsp 
                                        <?php } ?>

									 <?php
                                        if($_SESSION['user']['typecompte']=='ADMIN'){?>
									            <a onclick="return confirm('Continuer la suppression de ce domaine ?')"
									                href="suppressiondomaine.php? idDom=<?php echo $dom['id_dom'] ?>">
										            <span class="glyphicon glyphicon-trash"></span> 
									            </a> 
                                       <?php } ?>			
								</td>
							</tr>
						<?php } ?>					
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</body>
</HTML>