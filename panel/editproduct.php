<?php 
session_start();
require_once("inc/config.php");

if(!isset($_SESSION['userid'])){
  header("Location: ./login.php");
  exit;
}

if($auth['group_id'] != 2){
  header("Location: ./index.php");
  exit;
}

$user = $db->query("SELECT * FROM panel ");

$idarr=array();
$titlearr=array();
$descriptionarr=array();
$pricearr=array();
$sizearr=array();
$photoarr=array();


while($cek = $user->fetch(PDO::FETCH_ASSOC)) {
  array_push($idarr, $cek['id']);

    array_push($titlearr, $cek['title']);

    array_push($descriptionarr, $cek['description']);

    array_push($pricearr, $cek['price']);

    array_push($sizearr, $cek['size']);
    
    array_push($photoarr, $cek['photo_location']);

}





if($_POST){
  $id = $_POST['id'];
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $size = $_POST['size'];

  // foto kısım
 //echo $_FILES["fileToUpload"]["name"] ; 
  if($_FILES["fileToUpload"]["name"] != "" )
  {
            $target_dir = "uploads/";
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

              $target_file= "panel/".$target_file;
               $insert = $db->query("UPDATE panel SET  title= '$title', description =  '$desc', price= '$price', size ='$size', photo_location = '$target_file' where id=".$id);
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
    }// if
  // foto kısım


  $insert = $db->query("UPDATE panel SET  title= '$title', description =  '$desc', price= '$price', size ='$size'  where id=".$id);
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



	    <?php
              include('layouts/ust.php');
            ?>

        <!-- page content -->
        <div class="content-wrapper py-3" role="main">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
         
                <div class="x_title">
                   <h2>Product</h2>
                  <div class="clearfix"></div>
                </div>
	                <div class="x_content">
                  <?php

                      $applications = $db->query("SELECT *  FROM panel ");

                  ?>

                  <table id="products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Size</th>
                        <th class="text-center">Photo</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      foreach($applications as $application){

                      ?>
               
			<div class="x_content">
                  <form method="post" enctype="multipart/form-data">
                    <tr>
					<td class="text-center"> <input type="text" name="id" id="id"  value= "<?php echo $application['id']; ?> " class="form-control"></td>


                    <td class="text-center"> <input type="text"  name="title" id="title" value="<?php echo $application['title']; ?>" class="form-control"></td>

                    <td class="text-center"><input type="text"  name="desc" id="desc" value="<?php echo $application['description']; ?>" class="form-control"></td>

                    <td class="text-center"><input type="text" name="price" id="price" value="<?php echo $application['price']; ?>" class="form-control"></td>


                    <td class="text-center"> <input type="text" name="size" id="size" value= "<?php echo $application['size']; ?> " class="form-control"></td>
                   
                    <td class="text-center" > <input type="file" name="fileToUpload" size="25" id="fileToUpload" ></td>

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
              </div>
            </div>
          </div>
        </div>


<!-- /page content -->

        <!-- footer content -->
          <?php
            include('layouts/footer.php');
          ?>
        

  </body>
</html>
