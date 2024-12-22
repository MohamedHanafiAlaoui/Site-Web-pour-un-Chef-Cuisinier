<?php
include 'conect_db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Card Design</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-wrap: wrap;
            gap: 20px; /* Space between the cards */
        }

        .card {
            width: 300px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .card-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #ff6f61;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .card-button:hover {
            background-color: #e65b50;
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
            if (isset($_SESSION["Email"])) {
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
    <?php


    $sql="SELECT * FROM `Menu`";
    
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
  ?>

<div class="card">
        <img src="<?php echo($row['image_menu']); ?>" alt="Food Image">
        <div class="card-content">
            <h2 class="card-title"><?php echo($row['NAME']); ?></h2>
            <!-- <p class="card-description">Discover a variety of mouthwatering dishes to satisfy your cravings.</p> -->
            <a href="viewsminu.php?id=<?php echo ($row['id']); ?>" class="card-button">Order Now</a>
        </div>
    </div>

<?php
}
?>

    

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
