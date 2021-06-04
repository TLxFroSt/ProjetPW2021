 <?php 
    //debut de la session
    session_start();
    if (isset($_SESSION['user'])){
        echo "<a href='validationconnexion.php?afaire=deconnexion'> Confirmez la deconnexion !</a>";
    }
    else header("location:login.php");

 ?>