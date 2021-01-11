   
<div class="navbar navbar-expand d-flex navbar-dark justify-content-between bd-navbar blue accent-3 shadow">
        <div class="relative">
            <div class="d-flex">
                <div>
                    <a href="dashboard.php" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle">
                        <i></i>
                    </a>
                </div>
                <div class="d-none d-md-block">
                    <h1 class="nav-title text-white">Dashboard</h1>
                </div>
            </div>
        </div>
        <!--Top Menu Start -->
<div class="navbar-custom-menu p-t-10">
    <ul class="nav navbar-nav">
   
     <!-- Messages-->
        <li class="dropdown custom-dropdown messages-menu">
            <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-envelope"></i>

<?php
$uid=$_SESSION['crmsuid'];
$query=mysqli_query($con,"select  type_suggetion, messege_suggetion, Names from tblsugetion");
$count=mysqli_num_rows($query);
?>
<span class="badge badge-danger badge-mini rounded-circle"><?php echo $count;?></span>
            </a>
            <ul class="dropdown-menu">
                <h6 class="dropdown-header" style="background:#6495ED;color:white;">
              Message Center
           </h6>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu pl-2 pr-2">
                        <!-- start message -->
<?php while($row=mysqli_fetch_array($query)){
                   
                   
                        ?>
                        
                        <li>
      <a href="messages.php?viewid=<?php echo $row['uid'];?>">
                                <div class="avatar float-left">
                                    <img src="assets/img/dummy/u15.png" alt="">
                                    <span class="avatar-badge busy"></span>
                                   </div>
                                <h4>
                                 
<i class="icon icon-people"></i><?php echo $row['Names']?>
</h4>
<p style="padding-top:2%"><?php echo $row['messege_suggetion']?></p>
                            </a>
                        </li>

<?php } ?>


                        <!-- end message -->
                    
                        <!-- end message -->
                    </ul>
                </li>
                <li class="footer s-12 p-2 text-center"><a href="messages.php" >See All Messages</a></li>
            </ul>
        </li>

       
       
        <!-- User Account-->
        <li class="dropdown custom-dropdown user user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <img src="assets/img/dummy/u15.png" class="user-image" alt="User Image">
            </a>
            <div class="dropdown-menu p-4">
                <div class="row box justify-content-between my-4">
                    <div class="col">
                        <a href="admin-profile.php">
                            <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Profile</div>
                        </a>
                    </div>
                    <div class="col"><a href="change-password.php">
                        <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                        <div class="pt-1">Settings</div>
                    </a></div>
                    <div class="col">
                        <a href="logout.php">
                            <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Logout</div>
                        </a>
                    </div>
                </div>
               
            </div>
        </li>
    </ul>
</div>
    </div>