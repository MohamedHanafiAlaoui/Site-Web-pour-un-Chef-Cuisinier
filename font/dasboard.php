<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include './conect_db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Sidebar | By Code Info</title>
    <link rel="stylesheet" href="./css/dasbord.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  </head>
  <body>
    <div class="contener">
      <aside>
        <div class="menu">

          <ul>


                        <?php
            
            
            if (isset($_SESSION["cin"])) {
              $cin = $_SESSION["cin"];
              $sql1="SELECT * FROM `ROLES` WHERE cin = '$cin'   LIMIT 1";
              $result = mysqli_query($conn,$sql1);
              $row =mysqli_fetch_assoc($result);
              $TYPE=$row['TYPE'];

              if ($TYPE != 'user') {
                ?>

<li><a href="./dasboard.php" aria-label="Home"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="#" aria-label="Add" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="fa-solid fa-plus"></i></a>
              <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul style="color: black;">
                    <li><a  href="./addmenu.php">menu</a></li>
                    <li><a  href="./addplat.php">plat</a></li>
                  </ul>

                </div>
              </div>
            </li>
            <li><a href="#" aria-label="Comments"><i class="fa-solid fa-comment"></i></a>
   
            </li>


                <?php
              }

            }
          

                ?>

            <li><a href="./" aria-label="Logout"><i class="fa-solid fa-right-to-bracket"></i></a></li>
          </ul>
        </div>
      </aside>
      <main>
        <?php
              if ($TYPE != 'user') {
                ?>

        <header>
          <h1>ANALYTICS</h1>
        </header>
        <section>
          <div class="cards_analytic">
            <div class="Card">
              <div class="Card_logo">
                <i class="fa-solid fa-clipboard-list"></i>
              </div>
              <div class="Card_text">
                <h4>Orders</h4>
                <span>300</span>
              </div>
            </div>
            <div class="Card">
              <div class="Card_logo">
                <i class="fa-solid fa-clipboard-list"></i>
              </div>
              <div class="Card_text">
                <h4>Orders</h4>
                <span>300</span>
              </div>
            </div>
            <div class="Card">
              <div class="Card_logo">
                <i class="fa-solid fa-clipboard-list"></i>
              </div>
              <div class="Card_text">
                <h4>Orders</h4>
                <span>300</span>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
              <div class="table-responsive">
  <table id="mytable" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>First Name</th>
        <th>CIN</th>
        <th>Menu</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT r.id, u.FristName, u.cin, r.id_menu, r.statut FROM Reservation r
              JOIN Users u ON u.id = r.id_ROLES";  // Assuming `id_ROLES` is the foreign key to `Users`
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['FristName']}</td>
                  <td>{$row['cin']}</td>
                  <td>{$row['id_menu']}</td> <!-- Add a JOIN with Menu if you want menu details -->
                  <td>{$row['statut']}</td>
                  <td>
                    <!-- Action buttons to change the status -->
                    <a href='change_status.php?id={$row['id']}&status=approuvée' class='btn btn-success'>Approve</a>
                    <a href='change_status.php?id={$row['id']}&status=refusée' class='btn btn-danger'>Reject</a>
                  </td>
                </tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>


              </div>
            </div>
          </div>
        </section>
        <?php
    }
    ?>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
