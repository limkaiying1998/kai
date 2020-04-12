<?php

if(isset($_POST['upload'])){

	$newFileName = $_POST['filename'];

	//if text is empty
	if (empty($newFileName)){
		$newFileName = "gallery";
	}else{
		//remove spaces and change file names to all lowercases (for better naming convention)
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}

	$imageTitle = $_POST['filetitle'];
	$imageDesc = $_POST['filedesc'];

	$file = $_FILES['file'];

	$fileName = $file["name"];
	$fileType = $file["type"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];

	//Placed an explode over the file extension
	$fileExt = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExt)); //turn the file name extension and change it into all lowercase

	//only accept 3 different types of file type 
	$allowed = array("jpg", "jpeg", "png");

	if (in_array($fileActualExt, $allowed)){
		if($fileError === 0)
		{
			//validate the image size
			if($fileSize < 2000000){
				//ensure file name is different because it may overwrite other images with the same name (code is generating a unique id everytime)
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "./img/postimages/" . $imageFullName;
				//establish database connection
				include_once "dbh.php";

				if(empty($imageTitle) || empty($imageDesc)){
					header("Location:./posts.php?upload=empty");
					exit();
				}
				else{
					$sql = "SELECT * FROM posts;";
					$stmt = mysqli_stmt_init($conn);
					//validating the statement
					if(!mysqli_stmt_prepare($stmt, $sql))
					{
						echo "SQL statement has failed!";
					}
					else
					{
						mysqli_stmt_execute($stmt);
						//check the row count
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;

						$sql = "INSERT INTO posts (titlePost,descPost,imgNamePost,orderPost) VALUES (?, ?, ?, ?);";
						if(!mysqli_stmt_prepare($stmt, $sql))
						{
						echo "SQL statement has failed!";
						}else
						{
							mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
							mysqli_stmt_execute($stmt);

							move_uploaded_file($fileTempName, $fileDestination);

							header("Location:./posts.php?upload=success");
						}
					}
				}

			}
			else{
				header("Location:./posts.php?error=filesize");
				exit();
			}

		}
		else{
			header("Location:./posts.php?error=fileerror");
			exit();
		}

	}else{
		header("Location:./posts.php?error=filetype");
		exit();
	}

}

else if(isset($_GET['delete'])){
	require 'dbh.php';

	$id = $_GET['delete'];
	$sql = "DELETE FROM posts WHERE idPost=$id";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location:./index.php?error=sqlerror");
		exit();
	}
	else{
		mysqli_stmt_execute($stmt);
		header("Location:./posts.php");
	}



}

?>