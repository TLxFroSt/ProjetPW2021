<!DOCTYPE html>
<html>
<head>
    <title> Nouveau domaine </title>
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
            <div class="pannel-heading"> <h2>Les données du nouveau domaine...</h2></div>
            <div class="pannel-body">
                <form method="post", action="insertdom.php" class="form">
                    
                    <div class="form-group">
                        <label for="niveau">Nom :</label>
                        <input type="texte" name="Name" placeholder="tapez le nom du nouveau domaine" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau :</label> 
                        <select name="niveau", class="form-control", id="niveau">

                            <option value="fac">Fac</option>

                            <option value="ecole">Ecole</option>

                            <option value="bac">Bac</option>
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
</html>