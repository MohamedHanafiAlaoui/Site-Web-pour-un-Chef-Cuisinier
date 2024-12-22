<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
include 'conect_db.php';


if (
    isset($_POST['LastName'], $_POST['nom'], $_POST['Email'], $_POST['Password'], $_POST['cin'], $_POST['inputDate'])
) {


    $LastName = trim($_POST['LastName']);
    $FristName = trim($_POST['nom']);
    $Email = trim($_POST['Email']);
    $Password = trim($_POST['Password']);
    $cin = trim($_POST['cin']);
    $FristDate = trim($_POST['inputDate']);

    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    $query = "insert into Users(FristName,LastName,Password,cin,Email,FirstDate ) values ('$FristName','$LastName','$hashed_password' ,'$cin','$Email','$FristDate')";

    mysqli_query($conn,$query);
    $query2 = "insert into ROLES(cin,TYPE) values ('$cin','user' )";

    mysqli_query($conn,$query2);

    header("Location:login.php");


}
