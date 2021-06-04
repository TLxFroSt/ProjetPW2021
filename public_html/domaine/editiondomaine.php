<?php 
    require_once('connexionbasedonnee.php');

    //on recupère l'identifiant 
    $iddomaine=isset($_GET['idDom']) ?$_GET['idDom']:0;

    $requete1="SELECT * FROM domaine WHERE id_dom=$iddomaine";
    $resrequete1=$connect->query($requete1);
    $dom=$resrequete1->fetch(); 
    $nom=$dom['name'];
    $niveau=$dom['niveau'];
 ?>

<!DOCTYPE HTML>
<HTML>
<head>
    <title> Edition domaine </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/miseenpage.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
</head>
<body>

    <!--On reprend la même chose que l'on a fait dans la page doamaines.php avec quelque changements pour adapter à la création du nouveau domaine -->

    <?php include("menu.php"); ?>
    <div class="container">
        <div class="pannel pannel-primary margetop">
            <div class="pannel-heading"> <h2>Editer le domaine...</h2></div>
            <div class="pannel-body">
                <form method="post", action="modifdom.php" class="form">
                    
                    <div class="form-group">
                        <label for="niveau">Identifiant : <?php echo "$iddomaine" ?></label>
                        <input type="hidden" name="idDom" class="form-control" value="<?php echo $iddomaine ?>">
                    </div>
                    <div class="form-group">
                        <label for="niveau">Nom :</label>
                        <input type="texte" name="Name" placeholder="tapez le nom du nouveau domaine" class="form-control" value="<?php echo $nom ?>">
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau :</label> 
                        <select name="niveau", class="form-control", id="niveau">
                            <option value="fac" 
                            <?php  if($niveau=="fac") echo "selected"?>>Fac</option>
                            <option value="ecole"
                            <?php  if($niveau=="ecole") echo "selected"?>>Ecole</option>
                            <option value="bac"
                            <?php  if($niveau=="bac") echo "selected"?>>Bac</option>
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