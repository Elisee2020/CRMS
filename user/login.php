<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['loginUser']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID,FullName from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password'LIMIT 1 ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
        $Verified = $ret['Verified'];
            $date = $ret['UserRegdate'];
        $_SESSION['crmsuid']=$ret['ID'];
        $_SESSION['fname']=$ret['FullName'];
       header('location:../index.php');
       if ($Verified == 1) {
           # code...
       }else{
        $msg = "this account has not yet been verified. An email was sent to $emailcon on $date";  
  }  
}
    else{
    $msg="The username and password you entered is incorrect.";
    }
  }


if(isset($_POST['loginCompany']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tblcompany where  (CompanyEmail='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['crmscid']=$ret['ID'];
     header('location:../company/dashboard.php');

    }
    else{
    $msg="Invalid Company Details.";
    }
  }


    if(isset($_POST['loginAdmin']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$emailcon' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['crmsaid']=$ret['ID'];
     header('location:../admin/dashboard.php');
    }
    else{
    $msg="Invalid Admin Details.";
    }
  }

  ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <title>Campus Recruitment Management System-Login Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="blue4 p-t-b-100 height-full responsive-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/icon/icon-plane.png" alt="">
                </div>
                <div class="col-lg-6 p-t-100">
                    <div class="text-white">
                        <h1>Welcome Back</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Hey Buddies Welcome back to Campus Recruitment Management!</p>
                    </div>
                   <form method="post" action="">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-user-o"></i>
                                          <input class="form-control form-control-lg no-b" type="text" id="email" name="emailcont" required="true" placeholder="Registered Email or Contact Number">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" name="password" required="true" class="form-control form-control-lg no-b"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <a onclick="showdd()" class="btn btn-success btn-lg btn-block" >Let me enter</a>


                                <div class="dropdowLogin " id="ddLogin">
                                    <input type="submit" name="loginUser" value="i'm a user">
                                    <input type="submit" name="loginCompany" value="we are a company">
                                    <input type="submit" name="loginAdmin" value="i'm an admin">
                                </div>

                                <style type="text/css">
                                    .dropdowLogin{
                                        background-color: #fff;
                                        height: 0px;
                                        overflow: hidden;
                                        transition: .4s ease all;
                                        margin-top: 10px;
                                    }
                                    .dropdowLogin.show{
                                        margin-top: 0px;
                                        height: 120px;
                                    }
                                    .dropdowLogin input {
                                        width: 100%;
                                        height: 40px;
                                        border: none;
                                        border-bottom: 1px solid #eee;
                                        outline: none;
                                        background-color: #fff;
                                    }
                                    .dropdowLogin input:hover{
                                        cursor: pointer;
                                        background-color: #eee;
                                        transition: .4s ease all;
                                    }
                                </style>

                                <script type="text/javascript">
                                    showdd = () => {
                                    document.getElementById("ddLogin").classList.toggle("show");
                                    }
                                </script>

                                <p class="forget-pass text-white"><a href="forgot-password.php"> Have you forgot your password ?</a><a href="user-signup.php" style="padding-left: 250px"> Sign Up!!</a></p>
                                <p class="forget-pass text-white"><a href="../index.php"> Back to Home!!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>