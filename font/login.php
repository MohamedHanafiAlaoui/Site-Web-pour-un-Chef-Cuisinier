

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>


    <link rel="stylesheet" href="./css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->

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

    <div class="wrapper">
        <div class="title-text">
          <div class="title login">Login Form</div>
          <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
          <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
          </div>
          <div class="form-inner">
            <form action="./singup.php" class="login" method="post">
              <div class="field">
                <input type="email" placeholder="Email Address" name="email" required>
              </div>
              <div class="field">
                <input type="password" placeholder="Password" name="Password" required>
              </div>
              <div class="pass-link"><a href="#">Forgot password?</a></div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Login">
              </div>
              <div class="signup-link">Not a member? <a href="">Signup now</a></div>
            </form>





            <form action="./register.php"  class="signup" method="post">
            <div class="field">
                <input type="text" placeholder="LastName" name="LastName">
              </div>
              <div class="field">
                <input type="text" placeholder="nom" name="nom" required>
              </div>
              <div class="field">
                <input type="text" placeholder="Email Address" name="Email"  required>
              </div>
              <div class="field">
                <input type="password" placeholder="Password" name="Password" required>
              </div>
              <div class="field">
                <input type="password" placeholder="Confirm password" required>
              </div>
              <div class="field">
                <input type="text" placeholder="cin" name="cin" required>
              </div>
              <div class="field">
                <input type="date" placeholder="FristDate" name="inputDate" required>
              </div>


              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="submit" name="submit">
               
              </div>
              <!-- <button type="submit">Signup</button> -->

            </form>
          </div>
        </div>
      </div>
  <script>
     const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });

  </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
