<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conect_db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Code by: www.codeinfoweb.com -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Sidebar | By Code Info</title>
    <link rel="stylesheet" href="./css/dasbord.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
    
        .contener {
            display: flex;
            min-height: 100vh;
        }
    
        aside {
            width: 80px;
            background-color: #333;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
        }
    
        aside .menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }
    
        aside .menu ul li {
            width: 100%;
            text-align: center;
            margin: 15px 0;
        }
    
        aside .menu ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }
    
        aside .menu ul li a:hover {
            background-color: #007bff;
        }
    
        main {
            flex: 1;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    
        form {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
    
        .plat-box {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
    
        .plat-box label {
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }
    
        .plat-box input,
        .plat-box textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }
    
        .plat-box input:focus,
        .plat-box textarea:focus {
            border-color: #007bff;
            outline: none;
            background-color: #fff;
        }
    
        .plat-box textarea {
            height: 150px;
            resize: none;
        }
    
        .plat-box button {
            align-self: flex-end;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
    
        .plat-box button:hover {
            background-color: #0056b3;
        }
    
        @media (max-width: 768px) {
            aside {
                width: 60px;
            }
    
            aside .menu ul li a {
                font-size: 18px;
            }
    
            form {
                padding: 15px;
            }
    
            .plat-box textarea {
                height: 100px;
            }
        }
    </style>
    
  </head>
  <body>
    <div class="contener">
        <aside>
            <div class="menu">
                <ul>
                    <li><a href=""><i class="fa-solid fa-house"></i></a></li>
                    <li><a href=""><i class="fa-solid fa-plus"></i></a></li>
                    <li><a href=""><i class="fa-solid fa-comment"></i></a></li>
                    <li><a href=""><i class="fa-solid fa-right-to-bracket"></i></a></li>
                </ul>

            </div>

        </aside>
        <main>
            <div class="container">
                <form action="./back/saveplat.php" method="post">
            
                    <div class="plat-box">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
            
                    <div class="plat-box">
                        <label for="plats_img">Plats Image</label>
                        <input type="text" id="plats_img" name="plats_img" accept="image/*" required>
                    </div>
            
                    <div class="plat-box">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
            
                    <div class="plat-box">
                        <label for="id_menu">ID Menu</label>
                        <select id="id_menu" name="id_Menu" required>
                            <option value="" disabled selected>Select an option</option>
                            <?php

                                $sql="SELECT * FROM `Menu`";
                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($result))
                                {
                                    ?>

                                <option value="<?php  echo $row['id'];?>" ><?php
                                echo $row['NAME'];
                            ?></option>

                            <?php
                                }

                            ?>

                        </select>
                    </div>
            
                    <div class="plat-box">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </div>
                    
                </form>
            </div>
            
            
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </body>
</html>