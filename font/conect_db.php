<?php

$SerName = "localhost";
$UR = "root";
$Pss= "1234";
$dbname ="ChefCuisinier";

$conn = new mysqli($SerName,$UR,$Pss,$dbname);

if ($conn->connect_error) {
    echo "Failed To Connect DB".$conn->connect_error;
} 


