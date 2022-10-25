<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/movies.css"/>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/movie_info.css"/>
    <link rel="stylesheet" type="text/css" href="css/register_form.css"> <link rel="stylesheet" type="text/css" href="css/movie_info.css"/>
    <title>FormationPlus</title>
</head>
<body id="addGif">

<!-- top box --------------------------------------------------------------------------------------------->
<div class="topBox2 debug">
    <div class="topBoxText debug">
        <h1>FomationPlus</h1>
    </div>
</div>


<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "formationplus";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully: <br>";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}


@$valider = $_GET["valider"];
@$recherche = $_GET["mots"];
if(isset($valider) && !empty(trim($recherche))){

    $req=$conn->prepare("SELECT movie_name FROM movies where movie_name    LIKE '%$recherche%'");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $tab = $req->fetchAll();
    $afficher = "oui";

}
?>

<!-- --------------------------------------------------------------------------------------->
    <div class="cards debug">
        <?php

        include "php/db_connection.php";

        //$id = $_GET['idEtudiant'];
$idEtudiant = 0;
$id=4;
        //z echo $_SESSION['user_id'];


        $fetch = "SELECT * FROM etudiant WHERE idEtudiant = '$id'";
        $idconv = "SELECT idConvention FROM etudiant WHERE idEtudiant = '$id'";
        $conv = "SELECT nom FROM convention WHERE idConvention = '$idconv'";

        $db_result = $conn->query($fetch);
        // $db_result = $conn->query($userInfo);

        foreach ($db_result as $row) {

          echo '<form class="register-form" style="justify-content: center; margin-left: 440px; float: left" action="php/handlers_movie/edit_movie_handler.php?id=' . $row['idEtudiant'] . '" method="POST" enctype="multipart/form-data">' .
        '<p>'.'Etudiant:'.'</p>'.
               '<input class="input-field" id="name" type="text" placeholder="Name" name="name" value="'.$row['prenom'].'"  autofocus required >'.
              '<input class="input-field" id="name" type="text" placeholder="Name" name="name" value="'.$row['nom'].'"  autofocus required >'.
              '<p>'.'Convention'.'</p>'.
              '<div class="input-container">'.
              '<select id="genre" name="convention" required label="Convention" >'.
              '  <optgroup label="convention correspendante"  >'.
              '<option value="Action">'.$row['idConvention'].'</option>'.
              '</optgroup>'.
              '</select>'.
              '</div>'.
              '<textarea class="input-field" id="synopsis" placeholder="message" name="message" required readonly ">'.'Bonjour '.$row['prenom'].' ' .$row['nom'].',
Vous avez suivi '.$row['idConvention'].'heures de formation chez FormationPlus.
Pouvez-vous nous retourner ce mail avec la pièce jointe signée.
Cordialement,
FormationPlus'
.' </textarea>'.'<br>'.
              '<span id="count-words">'.'</span>'.
              '<button name="editbtn"  value="delete-Movie" class="btn"  value="submit"; class="btn">'.'Valider'.'</button>'.'</form>';


}
        ?>



</div>

<!--<img src="img/menu_1.jpg" sizes="100px;100">-->
<!-- JavaScript ------------------------------------------------------------------------------------------->
<!-- js menu button -->
<script src="js/menu.js"></script>
<!-- js sidebar -->
<!--    <script src="js/movie_filter_genre.js"></script>-->
<!-- other js functions -->
<script src="js/main.js"></script>

</body>

</html>
