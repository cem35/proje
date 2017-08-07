<?php 
require_once("inc/newconfig.php");

$user = $db->query("SELECT * FROM panel ");

$titlearr=array();
$descriptionarr=array();
$pricearr=array();
$sizearr=array();


while($cek = $user->fetch(PDO::FETCH_ASSOC)) {

  	array_push($titlearr, $cek['title']);

  	array_push($descriptionarr, $cek['description']);

  	array_push($pricearr, $cek['price']);

  	array_push($sizearr, $cek['price']);
}





if($_POST){
    $title=$_POST['title'];
	$desc=$_POST['desc'];
	$price=$_POST['price'];
	$size= $_POST['size'];
  $insert = $db->query("UPDATE panel SET  title= '$title', description =  '$desc', price= '$price', size ='$size'");
  if($insert)
  {
    $message = "User added successfully!";
	//echo "asda";
	}
  else
  {
	//echo "else";
    $error = "There was a database error.";
}

}
?>



	<!DOCTYPE html>
	<html>
	<head>
		<title>Edit Product</title>
	</head>
	<body>
	
	                <div class="x_content">
                  <?php

                      $applications = $db->query("SELECT *
                        FROM panel");

                  ?>

                  <table id="products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Size</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      foreach($applications as $application){

                      ?>
                     <!-- <tr>
                        <td class="text-center"><?php echo $application['id']; ?></td>
                        <td class="text-center"><?php echo $application['title']; ?></td>
                        <td class="text-center"><?php echo $application['description']; ?></td>
                        <td class="text-center"><?php echo $application['price']; ?></td>
                        <td class="text-center"><?php echo $application['size']; ?></td>
                      </tr>-->


			<div class="x_content">
                  <form method="post" enctype="multipart/form-data">
                    <tr>
					<td class="text-center"> <input type="text" name="id" id="id" value= "<?php echo $application['id']; ?> " class="form-control"></td>


                    <td class="text-center"> <input type="text" name="title" id="title" value="<?php echo $application['title']; ?>" class="form-control"></td>

                    <td class="text-center"><input type="text" name="desc" id="desc" value="<?php echo $application['description']; ?>" class="form-control"></td>

                    <td class="text-center"><input type="text" name="price" id="price" value="<?php echo $application['price']; ?>" class="form-control"></td>


                    <td class="text-center"> <input type="text" name="size" id="size" value= "<?php echo $application['size']; ?> " class="form-control"></td>

                     <td class="text-center"> <button type="submit"  class="btn btn-primary">Edit</button></td>
                   

                      </tr>
                  </form>
                  <!-- end form for validations -->

                </div>



                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>



	</body>
	</html>

