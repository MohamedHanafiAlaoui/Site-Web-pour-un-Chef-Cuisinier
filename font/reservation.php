<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


include './conect_db.php';
$id = $_GET['id'];


$cin = $_SESSION['cin'];




if ( isset($_POST['save'])) {
  $first_date = $_POST['first_date'];
  $time = $_POST['time'];



    $sql1="SELECT * FROM `ROLES` WHERE cin = '$cin'   LIMIT 1";
    $result = mysqli_query($conn,$sql1);
    $row =mysqli_fetch_assoc($result);
    $id_ROLES=$row['id'];


  

  $sql = "INSERT INTO Reservation ( id_ROLES, First_Date, Time, id_menu) 
  VALUES ( $id_ROLES  , '$first_date' , '$time', '$id')
  ";

      $result = mysqli_query($conn,$sql);

      if ($result) {
        header("Location:index.php");
        exit();
      }
      else
      {
        echo "Failed" . mysqli_error($conn);
      }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Inspired by Image</title>

    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv+pq6E1J6dy1LwpjHXzEF04fjmX5Wi3hQ9KDdfk/cglZG71y+gGlEcpHdi" crossorigin="anonymous">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
            background: #f4f6f9; /* Light background for the page */
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Form Container Styling */
        .form-container {
            background: #ffffff;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-top: 30px;
        }

        .form-container h2 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #4e54c8;
        }

        .form-control {
            border-radius: 30px;
            padding: 1rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            margin-bottom: 1.5rem;
        }

        .btn {
            width: 100%;
            padding: 1rem;
            background-color: #4e54c8;
            border: none;
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #3e47b2;
            transform: translateY(-5px);
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

    </style>
        <link rel="stylesheet" href="./css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="./css/style.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>


<header  >

<nav class="nav-primary" aria-label="Main">
        <div class="wrap">
        <div class="responsive-menu-icon"></div>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./menu.php">Menu</a></li>
            <li><a href="#">Contact Us</a></li>
            <?php
            session_start();
            include 'conect_db.php';
            if (isset($_SESSION["id"])) {
               echo ' <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">
                <img src="https://www.tutorialrepublic.com/examples/images/avatar/3.jpg" class="avatar" alt="Avatar"> Antonio Moreno <b class="caret"></b>
            </a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                <a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a>
                <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
                <div class="divider dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
            </div>
            </li>';
            }else {
                echo '<li><a href="./login.php">login</a></li>';
            }
            ?>
            
            
        </ul>
        </div>
    </nav>
</header>



<main>
    <div class="container">
       
        <div class="form-container">
            <h2>Enter First Date and Time</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="first_date" class="form-label">First Date</label>
                    <input type="date" class="form-control" id="first_date" name="first_date" required>
                </div>
                <div class="form-group">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <div class="form-group ">

                <?php

    if(isset($_GET['id'])){
        $sql = "SELECT * FROM `Menu` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>    
                    <h1 style="margin: 10px 0;">
                  menu :
                <span> <?php echo $row["NAME"]; ?></span>
                  </h1>
                <?php
            }
        }
    }
    ?>

                
                </div>
                <button type="submit" name="save" class="btn">Submit</button>
            </form>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
