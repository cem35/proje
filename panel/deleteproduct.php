<?php 
require_once("inc/newconfig.php");

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
 

  $insert = $db->query("DELETE FROM panel WHERE id = ".$id);
  if($insert)
  {
    $message = "User deleted successfully!";
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
                <div class="x_panel">
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
                     
                     

                       <td class="text-center"> <button type="submit"  class="btn btn-primary">Delete</button></td>

                     

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
        </div>


<!-- /page content -->

        <!-- footer content -->
          <?php
            include('layouts/footer.php');
          ?>

