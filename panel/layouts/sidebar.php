
<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="./" class="site_title"><i class="fa fa-television"></i> <span><?php echo TITLE; ?></span></a>
  </div>

  <div class="clearfix"></div>

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Login Panel</h3>
      <ul class="nav side-menu">
        <li>
          <a href="applications.php"><i class="fa fa-envelope"></i> Applications</a>
        </li>
        <li>
          <a href="change-password.php"><i class="fa fa-key"></i> Change Password</a>
        </li>
        <?php
          if($auth['group_id'] == 2){
        ?>
        <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="user-add.php">Add User</a></li>
            <li><a href="users.php">Show Users</a></li>
          </ul>
        </li>
        <?php
          }
        ?>
      </ul>
    </div>

  </div>
  <!-- /sidebar menu -->
</div>
