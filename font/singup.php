<?php
session_start();
include 'conect_db.php';

if (isset($_POST['email'] , $_POST['Password'])){

    $email= $_POST['email'] ;
    $Password= $_POST['Password'] ;
    $sql = "SELECT id, Email ,LastName,cin FROM Users WHERE Email = '$email' AND Password = '$Password'";
    $result= mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row =mysqli_fetch_assoc($result);
        $_SESSION["id"] = $row["id"];
        $_SESSION["cin"] = $row["cin"];
        $_SESSION["LastName"] = $row["LastName"];

        header("Location:index.php");
        
    }else {
        echo '
                    <script>Swal.fire({
            title: "Drag me!",
            icon: "success",
            draggable: true
            });</script>
            ';
    }


}