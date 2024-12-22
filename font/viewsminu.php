<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include './conect_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Inspired by Image</title>
    <style>
        /* General Reset */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
        }

        /* Main Container */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #4e54c8, #8f94fb); /* Inspired by vibrant colors */
            color: #ffffff;
            text-align: center;
        }

        /* Header Section */
        .header {
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 3rem;
            margin: 0;
        }

        .header p {
            font-size: 1.2rem;
            margin-top: 0.5rem;
        }

        /* Button Section */
        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            margin: 1rem 0;
            font-size: 1rem;
            font-weight: bold;
            color: #4e54c8;
            background: #ffffff;
            border: none;
            border-radius: 25px;
            text-transform: uppercase;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Food Cards Section */
        .food-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            margin: 2rem 0;
        }

        .food-card {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #ffffff, #f0f0f0);
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .food-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        .food-card img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .food-card .content {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            padding: 1rem;
        }

        .food-card .content h3 {
            margin: 0.5rem 0 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .food-card .content p {
            margin: 0;
            font-size: 1rem;
            line-height: 1.4;
        }

    </style>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
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
                    echo '<li class="nav-item dropdown">
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
                } else {
                    echo '<li><a href="./login.php">login</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</header>

<div class="container">
    <div class="header">
        <h1>Inspired Design</h1>
        <p>Elegance meets simplicity.</p>
    </div>

    <div class="food-cards">

    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `Plats` WHERE id_Menu = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>    
                <div class="food-card">
                    <img src="<?php echo $row["Plats_img"]; ?>" alt="Delicious Food">
                    <div class="content">
                        <h3><?php echo $row["Name"]; ?></h3>
                        <p><?php echo $row["description"]; ?></p>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>

    </div>

    <a href="#" class="btn">Explore More</a>

    <div class="footer">
        <p>&copy; 2024 Inspired Designs. All rights reserved.</p>
    </div>
</div>
</body>
</html>
