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
    $title=$_POST['title'];
	$desc=$_POST['desc'];
	$price=$_POST['price'];
	$size= $_POST['size'];
  $insert = $db->query("INSERT INTO panel ( title, description, price, size) VALUES ('$title', '$desc', '$price','$size')");
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

                    <div class="ln_solid"></div>

                    <button type="submit"  class="btn btn-primary">Save</button>

                  </form>
                  <!-- end form for validations -->

                </div>



	</body>
	</html>

