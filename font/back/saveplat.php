<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../conect_db.php';

if (isset($_POST['save'])) {
    $Name = $_POST['name'];
    $Plats_img	= $_POST['Plats_img'];
    $description	= $_POST['description'];
    $id_Menu	=(int) $_POST['id_Menu'];




    $sql = "INSERT INTO Plats (Name, description, Plats_img, id_Menu) 
            VALUES ('$Name', '$description', '$Plats_img', $id_Menu)";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        header("Location:../dasboard.php");
    } else {
        echo "Erreur lors de l'ajout : " . mysqli_error($conn);
    }
}
?>
