<?php 
    require_once('connexionbasedonnee.php');

    //on recupère l'identifiant 
    $id_emp=isset($_GET['id_emp'])? $_GET['id_emp']:0;

    $requeteEmploye="SELECT * FROM employe WHERE id_emp=$id_emp";
    $resultatEmploye=$connect->query($requeteEmploye);
    $employe=$resultatEmploye->fetch(); 

    $nom=$employe['nom'];
    $prenom=$employe['prenom'];
    $sexe=$employe['sexe'];
    $id_dom=$employe['id_dom'];

    $afficheDomaines=$connect->query("SELECT * FROM domaine ");
    
 ?>

<!DOCTYPE HTML>
<HTML>
<head>
    <title> Edition employe </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/miseenpage.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
</head>
<body>

    <!--On reprend la même chose que l'on a fait dans la page doamaines.php avec quelque changements pour adapter à la création du nouveau employe -->

    <?php include("menu.php"); ?>
    <div class="container">
        <div class="pannel pannel-primary margetop">
            <div class="pannel-heading"> <h2>Edition des employes...</h2></div>
            <div class="pannel-body">
                <form method="POST", action="modifemp.php" class="form" >
                    
                    <div class="form-group">
                        <label for="id_emp"> id employé à éditer: <?php echo "$id_emp" ?></label>
                        <input type="hidden" name="id_emp" class="form-control" value="<?php echo $id_emp ?>">
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="texte" name="nom" placeholder="tapez le nom du nouveau employe" class="form-control" value="<?php echo $nom ?>">
                    </div>

                   <div class="form-group">
                        <label for="prenom">Prenom :</label>
                        <input type="texte" name="prenom" placeholder="prenom" class="form-control" value="<?php echo $prenom ?>">
                    </div>
                    <div class="form-group">
                        <label for="civilité">Civilité :</label>
                        <div class="radio">
                            <label><input type="radio" name="sexe" value="H" 
                                <?php if($sexe==="H") echo "checked" ?>  checked /> Homme </label><br>
                            <label><input type="radio" name="sexe" value="F"
                                <?php if($sexe==="F") echo "checked" ?>/> Femme </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_dom">Domaine:...</label>                      
                        <select name="id_dom", class="form-control", id="id_dom" >
                            <?php while ($tabdomaine=$afficheDomaines->fetch()) { ?>
                            <!--on recup le resultat du domaine sous forme de tableau associatif    -->                                
                                <option value="<?php echo $tabdomaine['id_dom']?>"
                                    <?php if ($id_dom==$tabdomaine['id_dom']) echo "selected" ?>>
                                    <?php echo $tabdomaine['name'] ?>                             
                                </option>                        
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" > 
                        <span class="glyphicon glyphicon-floppy-saved"></span>  
                    </button>

                </form>
            </div>
        </div>
    </div>
    
</body>
</HTML>