<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <header  >
        <div class="vidlogo">

        <div class="video">
            <video  autoplay loop muted src="./img/vecteezy_a-chef-is-cooking-food-in-a-kitchen-with-a-lot-of-food-on_49743276.mov"></video>
        </div>
        <h1 class="italic absolute text-center	w-100 " ><a href="./index.html" ><img src="" alt="">L'Art de la Haute Cuisine</a></h1>
    </div>

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
                ?>

            
                <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">
                <img src="https://www.tutorialrepublic.com/examples/images/avatar/3.jpg" class="avatar" alt="Avatar"> <?php echo $_SESSION["LastName"]; ?> <b class="caret"></b>
            </a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                <a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a>
                <a href="./dasboard.php" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
                <div class="divider dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
            </div>
            </li>';
            <?php
            }else {
                echo '<li><a href="./login.php">login</a></li>';
            }
            ?>
            
            
        </ul>
        </div>
    </nav>
    </header>
    <main>
        <section class="Expériences">
            <h1>Expériences épicuriennes intimes</h1>
            <div class="text_Expériences">
                <p>Levons notre verre à une nouvelle ère de dîners. Réduisez le travail, augmentez le glamour et préparez vos invités pour un dîner inoubliable. Le chef à domicile élabore des menus personnalisés pour des expériences culinaires intimes à la maison. Nous sélectionnons soigneusement chaque détail de votre événement et utilisons des produits locaux, des pratiques durables et des décennies d'expérience pour préparer et servir une expérience culinaire unique et exquise.

                </p>
                <div>
                    <span>
                        Lorsque les détails comptent, faites confiance à The At Home Chef.
                    </span>
                    <span>
                        Faites-vous plaisir.
        
                    </span>
                    <span>
                        Mangez bien.
        
                    </span>
                    <span>
                        Profitez de la vie.
        
                    </span>

                </div>


            </div>



        </section>
        <section class="dining-experience">
            <h2>Create Your Dining Experience</h2>
            <div class="timeline">
                <!-- Timeline Item 1 -->
                <div class="timeline-item">
                    <div class="icon">1</div>
                    <div class="content">
                        <h3>Reserve The Time</h3>
                        <p>Our chef will commit to the day and time of your dinner party as soon as you reserve it. Be sure to reserve your day and time early to guarantee availability and allow for menu design.</p>
                    </div>
                </div>
    
                <!-- Timeline Item 2 -->
                <div class="timeline-item">
                    <div class="icon">2</div>
                    <div class="content">
                        <h3>Design a Menu</h3>
                        <p>Every event begins with a custom menu. We can match your event’s theme or personal preferences to delight and satisfy your guests, or you can leave the selections completely up to us.</p>
                    </div>
                </div>
    
                <!-- Timeline Item 3 -->
                <div class="timeline-item">
                    <div class="icon">3</div>
                    <div class="content">
                        <h3>Source The Food</h3>
                        <p>The closer the source, the better the food. We believe in using the finest ingredients available and sourcing them from local farms and markets whenever possible.</p>
                    </div>
                </div>
    
                <!-- Timeline Item 4 -->
                <div class="timeline-item">
                    <div class="icon">4</div>
                    <div class="content">
                        <h3>Prepare from Scratch</h3>
                        <p>Initial meal preparation begins off-site at our gourmet kitchen. This frees up your home and space and allows our chefs to work with professional-grade culinary tools.</p>
                    </div>
                </div>
    
                <!-- Timeline Item 5 -->
                <div class="timeline-item">
                    <div class="icon">5</div>
                    <div class="content">
                        <h3>Cook & Serve</h3>
                        <p>Dinner is cooked, plated, and served from your kitchen to your table. We can announce and describe dinner to your guests, subtly serve the dishes, or quietly exit after the meal is prepared.</p>
                    </div>
                </div>
    
                <!-- Timeline Item 6 -->
                <div class="timeline-item">
                    <div class="icon">6</div>
                    <div class="content">
                        <h3>Leave it Perfect</h3>
                        <p>It is our goal to leave your kitchen more beautiful than we found it. We will expertly clean the kitchen and dining areas so you can fully relax and enjoy the company of your guests.</p>
                    </div>
                </div>
            </div>
            <a href=""> Book Your Event</a>
        </section>
    </main>

    <footer class="footer-distributed">
 
        <div class="footer-left">

            <h3>L'Art de la Haute <span>Cuisine</span></h3>

            <p class="footer-links">
                <a href="#">Home</a>
                ·
                <a href="#">menu</a>
                ·
                <a href="#">contact us</a>
               
            </p>

            <p class="footer-company-name">CodeShögun &copy; 2024</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>21 Revolution Street</span> safi</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+201020129</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com">contact@cn.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                Web Dev Trick is a blog for web designers, graphic designers, web developers &amp; SEO Learner.
            </p>

            <div class="footer-icons">

                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            

            </div>

        </div>

    </footer>
    <script>

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>