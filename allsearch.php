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
<div class="container-fluid searchresult">    
  <div class="row">
    <div class="col-sm-12 text-left">
      <h1 class="sear">Search Results</h1>

<?php
include 'dbconnect.php';
// $con = mysqli_connect('localhost','root','','airline');
$selectdate = $_POST["selectdate"];
echo $selectdate;
global $sql, $availableNumber;
    $sql = "SELECT * FROM onewayflights WHERE todate = '$selectdate'";


$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);

if($rowcount == 0){
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result</div>";
}
else{
    $rowcount = 2 * $rowcount;
echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." results</div>";

echo "<table class='table table-bordered table-striped table-hover'>
      <thead>
      <tr>
        <th>Flight</th>
        <th>Airplane Id</th>
        <th>Airplane Name</th>
        <th>Takeoff Date</th>
        <th>Departure</th>
        <th>Departure Time</th>
        <th>Arrival</th>
        <th>Arrival Time</th>
        <th>Class</th>
        <th>Capacity</th>
        <th>Price</th>
        <th>Remain Seats</th>
        <th>Reserve</th>
      </tr>
      </thead>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tbody><tr>";
        $fnumber = $row['fnumber'];
        $aid = $row['aid'];
        $dairport = $row['dairport'];
        $dtime = $row['dtime'];
        $aairport = $row['aairport'];
        $atime = $row['atime'];

        $businessclass = "SELECT capacity,price,classname FROM class where fnumber = $fnumber AND classname = 'business'";
        $classes = mysqli_query($conn,$businessclass);
        while ($row = mysqli_fetch_array($classes)) {
                $bcapacity = $row['capacity'];
                $bprice = $row['price'];
                $businessclass = $row['classname'];
        }
        $economyclass = "SELECT capacity,price,classname FROM class where fnumber = $fnumber AND classname = 'economy'";
        $classe = mysqli_query($conn,$economyclass);
        while ($row = mysqli_fetch_array($classe)) {
                $ecapacity = $row['capacity'];
                $eprice = $row['price'];
                $economyclass = $row['classname'];
        }
        $pname = "select * from airplane where tdate = '$selectdate'";
        $pnames = mysqli_query($conn, $pname);   
        while ($row = mysqli_fetch_array($pnames)) {
            $pname = $row['pname'];
            $bseat = $row['bseats'];
            $eseat = $row['eseats'];
        }

        echo "<td>".$fnumber."</td>";
        echo "<td>".$aid."</td>";
        echo "<td>".$pname."</td>";
        echo "<td>" . $selectdate . "</td>";
        echo "<td>" . $dairport . "</td>";
        echo "<td>" . $dtime . "</td>";
        echo "<td>" . $aairport . "</td>";
        echo "<td>" . $atime . "</td>";
        echo "<td>" . $businessclass . "</td>";
        echo "<td>" . $bcapacity . "</td>";
        echo "<td>" . $bprice . "</td>";
        echo "<td>" . $bseat . "</td>";
       
            //calculate number of remain seats
        
        
        if($bseat>0){
        echo '<td>
            <form action="shoppingcart.php" method="post">
                <input type="hidden" name="flightno" value="'.$fnumber.'">
                <input type="hidden" name="price" value="'.$bprice.'">
                <input type="hidden" name="classtype" value="'.$businessclass.'">
                <input type="hidden" name="date" value="'.$selectdate.'">
                <input type="hidden" name="type" value="onewayflights">
                <button type="submit" class="btn btn-primary" name="economyadd">Add to Cart</button>
            </form>
            </td>';
        }else{
            echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
        }
        echo "</tr>";



    echo "<tr>";

        echo "<td>".$fnumber."</td>";
        echo "<td>".$aid."</td>";
        echo "<td>".$pname."</td>";
        echo "<td>" . $selectdate . "</td>";
        echo "<td>" . $dairport . "</td>";
        echo "<td>" . $dtime . "</td>";
        echo "<td>" . $aairport . "</td>";
        echo "<td>" . $atime . "</td>";
        echo "<td>" . $economyclass . "</td>";
        echo "<td>" . $ecapacity . "</td>";
        echo "<td>" . $eprice . "</td>";
        echo "<td>".$eseat."</td>";
       
            //calculate number of remain seats
        // $eseats = "select eseats from airplane where tdate = '$selectdate'";
        // $reserved = mysqli_query($con, $eseats);   
        // while ($row = mysqli_fetch_array($reserved)) {
        //     $eseat = $row['eseats'];
        //     echo "<td>".$row['eseats']."</td>";
        // }
        
        if($eseat>0){
        echo '<td>
            <form action="shoppingcart.php" method="post">
                <input type="hidden" name="flightno" value="'.$fnumber.'">
                <input type="hidden" name="price" value="'.$eprice.'">
                <input type="hidden" name="classtype" value="'.$economyclass.'">
                <input type="hidden" name="date" value="'.$selectdate.'">
                <input type="hidden" name="type" value="onewayflights">
                <button type="submit" class="btn btn-primary" name="economyadd">Add to Cart</button>
            </form>
            </td>';
        }else{
            echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
        }
        echo "</tr>";
    }
echo " </tbody></table>";

}
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