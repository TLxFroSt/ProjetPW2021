<?php 
	require_once("connexionbasedonnee.php");
    session_start();
	//include("se connecter.php");

	//on recupere les différentes données de l'employé
	$domaine=isset($_GET['domaine'])? $_GET['domaine']:0;
	$nomPrenom=isset($_GET['nomPrenom'])? $_GET['nomPrenom']:"";

	if ($domaine==0) { //pour la prochaine requete, j'utilisserai une inner join

		//
		$requeteEmp="SELECT id_emp, nom, prenom, sexe, name 
		FROM employe AS emp,domaine AS dom 
		WHERE emp.id_dom=dom.id_dom ORDER BY id_emp";

		$requeteCompter="SELECT count(*) compter FROM employe WHERE (nom LIKE '%$nomPrenom%' OR prenom LIKE'%$nomPrenom%')";

	}
	else{
		$requeteEmp="SELECT id_emp, nom, prenom, sexe, name FROM employe AS emp,domaine AS dom 
			WHERE emp.id_dom=dom.id_dom  
			AND dom.id_dom=$domaine ORDER BY id_emp";

		$requeteCompter="SELECT count(*) compter FROM employe WHERE (nom LIKE '%$nomPrenom%' OR prenom LIKE'%$nomPrenom%') AND id_dom=$domaine";
	}
	

	//requete pour afficher tous les domaines
	$afficheDomaines=$connect->query("SELECT * FROM domaine ");

	//resultat de la requete employe
	$resultatEmp= $connect-> query($requeteEmp);

	
	//resultat de la requete compte
	$compterresultat=$connect ->query($requeteCompter);
	$tabcompte=$compterresultat->fetch();
	$nbemp=$tabcompte['compter'];

 ?>

<!DOCTYPE HTML>
<HTML>
<head>
	<title> Les Employés </title>
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
				<form method="GET", action="employes.php" class="form-inline">
					<!--pour une meilleur lisibilité on utilise une class form-group -->
					<!--<div class="form-group">
						<input type="texte" name="nomPrenom" placeholder="nom et prenom " class="form-control" value="<?php echo $nomPrenom ?>">
					</div>
					-->
					<label for="domaine"> Domaine: </label> 
					<select name="domaine", class="form-control", id="domaine" >

						<option value=0> Tous les domaines</option>

						<?php while ($tabdomaine=$afficheDomaines->fetch()) { ?>
							<!--on recup le resultat du domaine sous forme de tableau associatif	-->		
							
							<option value="<?php echo $tabdomaine['id_dom']?>"
								

								<?php if($tabdomaine['id_dom']==$domaine) echo "selected" ?>>
								<?php echo $tabdomaine['name'] ?>
								
							</option>

						
						<?php } ?>

					</select>

					<!--Bouton pour la recherche -->
					<button type="submit" class="btn btn-primary" > 
						valider
					</button>			&nbsp &nbsp 
						
					<!-- Ajout d'un employé-->
                    <?php
                        if($_SESSION['user']['typecompte']=='ADMIN'){?>
                            <a href="insertionemploye.php">
                                <span class="glyphicon glyphicon-plus"></span>nouv employe
                            </a>
                    <?php } ?>
				</form>
			</div>
		</div>




		<!--Et une 2e pour l'affichage des resultats -->
		<div class="panel panel-primary margetop">
			<div class="panel-heading"> La liste des employés...(<?php echo $nbemp ?> employés)</div>	
			<div class="panel-body">
				<table class="table table-striped">
					<!--table permet de dire à la page que c'est un tab, table-striped pour la nuance des couleurs -->
					<thead>
						<tr align="center">
							<th> id employe </th>
							<th> Nom </th>
							<th> Prenom </th>
							<th> Civilité </th>
							<th> Domaine </th>
                            <?php
                                if($_SESSION['user']['typecompte']=='ADMIN'){?>
							        <th> Edition/supression </th>
                            <?php  } ?>
						</tr>
					</thead>

					<tbody>
						<?php while($employe=$resultatEmp->fetch()){ ?>
							<tr>
							<!--on veut acceder à toutes les domaines donc on utilise une boucle while pour chacune des domaines -->
								<td> <?php echo $employe['id_emp'] ?></td>  
								<td> <?php echo $employe['nom'] ?></td>
								<td> <?php echo $employe['prenom'] ?></td>
								<td> <?php echo $employe['sexe'] ?></td>  
								<td> <?php echo $employe['name'] ?></td>
								
								<td> 
									<!--Edition d'un employe-->
                                    <?php
                                        if($_SESSION['user']['typecompte']=='ADMIN'){?>
                                            <a href="editionemploye.php? id_emp=<?php echo $employe['id_emp'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a> &nbsp &nbsp &nbsp &nbsp &nbsp 
                                       <?php } ?>
									
									<!--Supression d'un employe-->
                                    <?php
                                        if($_SESSION['user']['typecompte']=='ADMIN'){?>
                                            <a onclick="return confirm('Continuer la suppression de ce employé ?')"
                                            href="suppressionemploye.php? id_emp=<?php echo $employe['id_emp'] ?>">
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