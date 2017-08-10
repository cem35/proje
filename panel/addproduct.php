<?php 
require_once("inc/newconfig.php");

function addDb (){
	$title=$_POST['title'];
	$desc=$_POST['desc'];
	$price=$_POST['price'];
	$size= $_POST['size'];
	
 /*if (isset($_POST['submit'])) { //to check if the form was submitted
       
       $db->exec( 'INSERT INTO panel (id, title, description, price, size) VALUES (NULL, '.$_POST['title'].', '.$_POST['desc'].', '.$_POST['price'].', '.$_POST['size'].');');
       echo "a";
       echo 'INSERT INTO panel (id, title, description, price, size) VALUES (NULL, '.$_POST['title'].', '.$_POST['desc'].', '.$_POST['price'].', '.$_POST['size'].');';
    } */
}
if($_POST){

	// foto kısım
	$target_dir = "panel/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	// foto kısım
    $title=$_POST['title'];
	$desc=$_POST['desc'];
	$price=$_POST['price'];
	$size= $_POST['size'];
  $insert = $db->query("INSERT INTO panel ( title, description, price, size, photo_location) VALUES ('$title', '$desc', '$price','$size', '$target_file')");
  if($insert)
  {
    $message = "User added successfully!";
	echo "asda";
	}
  else
  {
	echo "else";
    $error = "There was a database error.";
}

}
?>



	<!DOCTYPE html>
	<html>
	<head>
		<title>Add Product</title>
	</head>
	<body>
	
	<table>
	<tr> 
	<th class="title">Title</th>
	<th class="desc">Description</th>
	<th class="price">Price </th>
	<th class="size">Size</th>
	</tr>
	</table>

 <div class="x_content">
                  <form method="post" enctype="multipart/form-data">
                    <label for="title">Title :</label>
                    <input type="text" name="title" id="title" class="form-control"><br>

                    <label for="desc">Description * :</label>
                    <input type="text" name="desc" id="desc" class="form-control"><br>

                    <label for="price">Price * :</label>
                    <input type="text" name="price" id="price" class="form-control"><br>

                    <label for="size">Size * :</label>
                    <input type="text" name="size" id="size" class="form-control"><br>

                    <label for="size">Photo * :</label>
                    <input type="file" name="fileToUpload" size="25" />

                    <div class="ln_solid"></div>

                    <button type="submit" class="btn btn-primary">Save</button>

                  </form>
                  <!-- end form for validations -->

                </div>



	</body>
	</html>

