<?php
include "../db_connection.php";
include "../../index.php";
$id = $_GET['id'];


// DB_CONNECTION.PHP

$servername = "localhost";
$username = "root";
$password = "";
$database = "formationplus";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully: <br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


{
    //THIS PART IS FOR THE EDITING THINGY
    $nom = $_POST['name'];
    $penom = $_POST['genre'];
    $actor = $_POST['actor'];
    $year = $_POST['year'];
    $synopsis = $_POST['synopsis'];

    include "../db_connection.php";

        try {
            $sql = "INSERT INTO attestation (idAttestation, idEtudiant, idConvention, message)";
//    VALUES ('$nom', prenom')";...
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script type='text/javascript'>alert('Aattestation enregistree');</script>";
            echo "DONE ";
            if (mysqli_query($conn, $sql)) {
                header('location:../../index.php');
            }
        } catch (PDOException $e) {
            echo $sql_e . "<br>" . $e->getMessage();
        }

        $conn = null;


        header("../../index.php");

}
