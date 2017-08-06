<?php 

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
                    <input type="text" name="title" id="title" class="form-control">

                    <label for="desc">Description * :</label>
                    <input type="text" name="desc" id="desc" class="form-control">

                    <label for="price">Price * :</label>
                    <input type="text" name="price" id="price" class="form-control">

                    <label for="size">Size * :</label>
                     <input type="text" name="size" id="size" class="form-control">

                    <div class="ln_solid"></div>

                    <button type="submit" class="btn btn-primary">Save</button>

                  </form>
                  <!-- end form for validations -->

                </div>



	</body>
	</html>

