<?php
//error_reporting(0);
error_reporting (E_ALL ^ E_NOTICE);
	require "header.php";
	session_start();
  if($_SESSION['isanAdmin'] == 0)
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

            
          <div class="gallery-upload">

           <?php if(isset($_GET['error'])){
              if($_GET['error'] == "filesize"){
                echo'<p style="color:red">Your file size is too big!</p>';
              }
              else if($_GET['error'] == "fileerror"){
                echo'<p style="color:red">You have run into an error!</p>';
              }
              else if ($_GET["error"] == "filetype"){
                echo'<p style="color:red">Wrong file type! Please upload a jpeg, jpg or png!</p>';
              }
            }
            ?>
  
          <div class="gallery-upload">
                <h2>Create a New Post</h2>
                  <form action="posts.inc.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="filename" placeholder="File name...">
                    <input type="text" name="filetitle" placeholder="Image title...">
                    <input type="text" name="filedesc" placeholder="Image description...">
                    <input type="file" name="file">
                    <button type="submit" name="upload">UPLOAD</button>
                  </form>
                </div>

              
        </div>

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
                echo '</a>';

                ?> 
                <a class="btn"onclick="return confirm('Are you sure?')" href="posts.inc.php?delete= <?php echo $row['idPost'];?>">Delete </a>

             <?php }}?>
          </div>

              
				  
      </section>

    </main>
  </body>
</html>


<?php
	require "footer.php";
?>
