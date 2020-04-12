<?php
//error_reporting(0);
error_reporting (E_ALL ^ E_NOTICE);
  require "header.php";
  session_start();
  if(!isset($_SESSION['userID']))
  {
    header("Location:./login.php?error=notauser");
    exit;
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/cssstyle.css">
  </head>
  <body>

      </header>
    <main>

      <section class="gallery-links">
        <div class="wrapper">
          <h2>Our Posts</h2>

          <div class="gallery-container">
            <?php
            //connect to database
            include_once 'dbh.php';

            $sql = "SELECT * FROM posts ORDER BY orderPost DESC;";
            $stmt = mysqli_stmt_init($conn);
            $id = $row['idPost'];

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              //while loop to print all data from database
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<a>
                  <div style="background-image: url(./img/postimages/'.$row["imgNamePost"].');"></div>
                  <h3>'.$row["titlePost"].'</h3>
                  <p>'.$row["descPost"].'</p>';
                echo'</a>';
                ?> 
             <?php }}?>
          </div>

            
        </div>
      </section>

    </main>
  </body>
</html>


<?php
  require "footer.php";
?>
