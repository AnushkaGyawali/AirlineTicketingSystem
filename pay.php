<?php 
 include 'Database.php';  
 $data = new Database;  
 $success_message = '';  

 ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ide=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <script src="jquery-3.4.1.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="login.js"></script>
    <script src="jump.js"></script>
</head>
<body>      
    <div id="header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <div class="container">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="#" class="navbar-brand"><img src="pic.jpg" style="width: 100px;height: 40px;"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto" id="new">
                        <li class="nav-item"><a href="Home.php" class="nav-link">HOME</a></li>
                        <li class="nav-item"><a href="Contacts.html" class="nav-link">CONTACT US</a></li> 
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Payment Finish</h1>
      <div><img src="smile.jpg" alt="smile" id="smile">
      </div>
      <p><strong><i><font color="black" >Payment Sucessfull</font></i></strong></p>

<?php

include_once 'dbconnect.php';
$round = $_POST["round"];
    $sql = mysqli_query($conn,"UPDATE books SET paid = '1' WHERE flightype = '$round'");
    mysqli_close($conn);
?>

    </div>
    
  </div>
</div>


</body>
</html>
<style >body {
  background: url("plane.gif");
  background-repeat: no-repeat;
   background-attachment: fixed;
  background-size: 100% 100%;
}</style>