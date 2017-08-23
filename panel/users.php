<?php
session_start();
require_once("inc/newconfig.php");

if(!isset($_SESSION['userid'])){
  header("Location: ./login.php");
  exit;
}

if($auth['group_id'] != 2){
  header("Location: ./index.php");
  exit;
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
                    <h2>Users</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Name</th>
                          <th class="text-center">E-mail</th>
                          <th class="text-center">Edit</th>
                          <th class="text-center">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $users = $db->query("SELECT *
                          FROM users
                          ORDER BY name ASC");
                        foreach($users as $user){
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $user['name']; ?></td>
                          <td class="text-center"><?php echo $user['email']; ?></td>
                          <td class="text-center"><a href="user-edit.php?id=<?php echo $user['id']; ?>">Edit</a></td>
                          <td class="text-center"><a href="user-delete.php?id=<?php echo $user['id']; ?>" onclick = "if(!confirm('Do you really want to delete this user?')) { return false; }">Delete</a></td>
                        </tr>
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
        <!-- /footer content -->
