<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['saabmit'])){
    if (!empty($_POST['typesug']) AND !empty($_POST['msg']) AND !empty($_POST['Fname']) AND !empty($_POST['user'])) {

        $typesug=($_POST['typesug']);
        $messaage=htmlspecialchars($_POST['msg']);
        $name=htmlspecialchars($_POST['Fname']);
        $username=htmlspecialchars($_POST['user']);


        $query=mysqli_query($con, "insert into tblsugetion(type_suggetion,messege_suggetion,Names,User_Name) value('$typesug','$messaage','$name','$username')");
    if ($query) {
        echo '<script>alert("your has been sent with success")</script>';
  }
  else
    {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

        
             }
}
  
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Campus Recruitment Management System-Between dates reports</title>
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
<?php include_once('includes/sidebar.php');?>
<!--Sidebar End-->
<?php include_once('includes/header.php');?>
    <div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Suggestion detail
                    </h4>
            </div>
        </div>
     </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                   
                        <div class="card-body b-b">
                            <form method="post">
                                   <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <h1>Please help us to sreve you better taking acouple of munites!</h1>
                                        <h2>How satisfied were you with our Service</h2>
                                        </br>
                  <style type="text/css">
                      .radbtn{
                        margin-left: 12px;
                      }
                  </style>                     
              <input type="radio" name="typesug" id="typesug" value="Excellent"><strong style="color: black;" class="radbtn">Excellent</strong></br></br>
              <input type="radio" name="typesug" id="typesug" value="Good"><strong style="color: black">Good</strong></br></br>
              <input type="radio" name="typesug" id="typesug" value="Natural"><strong style="color: black">Natural</strong></br></br>
              <input type="radio" name="typesug" id="typesug" value="Poor"><strong style="color: black">Poor</strong></br>

              
                </br>                   
             <textarea type="text" class="form-control" name="msg" placeholder="Write message here" required=""></textarea></br>

             <div class="row">
             <div class="col">
               <input type="text"  name="Fname" required="true" class="form-control" placeholder="Enter your name">
             </div>
             <div class="col">
               <input type="email"  name="user" required="true" class="form-control" placeholder="Enter your E-mail Adress">
             </div>
           </div>



            <!-- <input type="text" name="Fname" required="true" class="" placeholder="Enter your name"></br></br>
             <input type="email" name="user" required="true" class="" placeholder="" style="">-->

                                    </div>

                                </div>
                                
                                <button type="submit" name="saabmit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                
                    </div>
                </div>
         
            </div>
        </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>
