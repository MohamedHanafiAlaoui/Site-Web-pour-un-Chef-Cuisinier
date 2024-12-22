<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../conect_db.php';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $image_menu = $_POST['image_menu'];

    $sql = "INSERT INTO Menu (name, id_ROLES, image_menu) 
            VALUES ('$name', 1, '$image_menu')";

    $result = mysqli_query($conn, $sql);


    if ($result) {
        echo "Menu ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout : " . mysqli_error($conn);
    }
}
?>
