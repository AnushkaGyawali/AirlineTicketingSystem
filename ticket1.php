<?php 
 include '../Database.php';  
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
	<script src="jump.js"></script>
</head>
<body> 		
	<div id="header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <div class="container">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="#" class="navbar-brand"><img src="download.png" style="width: 100px;height: 40px;"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto" id="new">
                        <li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
                        <li class="nav-item"><a href="Contacts.html" class="nav-link">CONTACT US</a></li>

                        


                   
                </div>
            </div>
        </nav>
    </div>
        <div class="container-fluid register">
	        <div class="row">
	            <div class="col-md-2 register-left"> 		
	           	</div>
	            <div class="col-md-8 register-right">
	            	<div class="container" class="register-right">
						<h1 class="sear"><b>Search Flights</b></h1>
						<br />
						<p><b>Choose your flight option</b></p>
						<div class="btn-group btn-group-justified">			
							<div class="btn-group">
								<button id="button1" type="button" href="#oneway" class="btn btn-primary">One-Way</button>
							</div>
							<div class="btn-group">
								<button id="button2" type="button" href="#roundtrip" class="btn btn-primary">Round-Trip</button>
							</div>
							<div class="btn-group">
								<button id="button3" type="button" href="#all" class="btn btn-primary">Search All One-Way Flights</button>
							</div>
							<div class="btn-group">
								<button id="button4" type="button" href="#allround" class="btn btn-primary">Search All Round-Trip Flights</button>
							</div>
						</div>
						<hr>
						<div id="oneway">
							<form role="form" action="onewaysearch.php" method="post">
							  <div class="row">
							  <div class="col-sm-6">
							    <label for="from">From:</label>
							 <select class="form-control" name="from">
							    <?php
							    $dairport = $data->selectdairport('onewayflights');
							    foreach ($dairport as $value) {
							    	?>
						            <option><?php echo $value['dairport']; ?></option>
							    <?php 
									}
							    ?>
							</select>



							  </div>
							  <div class="col-sm-6">
							    <label for="to">To:</label>
							    <select class="form-control" name="to">
							    	<?php
							    		$aairport = $data->selectaairport('onewayflights');
							    		foreach ($aairport as $value) {
							    			?>
							    			<option><?php echo $value['aairport']; ?></option>
							    	<?php
							    		}
							    	?>
							    </select>
							  </div>
							  </div>
							  <hr >
							  <div class="row">
								  <div class="col-sm-6">
								    <label for="depart">Depart:</label>
								    <input type="date" class="form-control" id="depart" name="dtime" required>
							  </div>   
							   <!-- <div class="row"> -->
							   <hr >
							  <div class="col-sm-6">
							    <label for="class">Class:</label>
							    <select class="form-control" name="class">
							      <option value="Economy">Economy</option>
							      <option value="Business">Business</option>   
							    </select>
							  </div> 
							  </div>
							  <hr> 
							  <br>
							  <div class="btn-group btn-group-justified">	
									<div class="btn-group">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
									<div class="btn-group">
										<button type="reset"  class="btn btn-info" value="Reset">Reset</button>
									</div>
							  </div>
							  <br>
							  <br>
							</form>
						</div>


						<div id="roundtrip">
							<form role="form" action="roundtripsearch.php" method="post">
								 <div class="row"> 
								  <div class="col-sm-6">
								    <label for="from">From:</label>
								    <select class="form-control" name="from">
									    <?php
									    $dairport = $data->selectairport1('roundflights');
									    foreach ($dairport as $value) {
									    	?>
								            <option><?php echo $value['airport1']; ?></option>
									    <?php 
											}
									    ?>
									</select>
								  </div>
								  <div class="col-sm-6">
								    <label for="to">To:</label>
								    <select class="form-control" name="to">
									    <?php
									    $dairport = $data->selectairport2('roundflights');
									    foreach ($dairport as $value) {
									    	?>
								            <option><?php echo $value['airport2']; ?></option>
									    <?php 
											}
									    ?>
									</select>
								  </div>
								 </div>
								 <hr >
								<div class="row">  
								  <div class="col-sm-6">
								    <label for="depart">Depart:</label>
								    <input type="date" class="form-control" id="depart" name="dtime" required>
								  </div>  
								  <div class="col-sm-6">
								    <label for="return">Return:</label>
								    <input type="date" class="form-control" id="return" name="return" required>
								  </div>
								 </div>
								 <hr >
								 <div class="row">   
								  <div class="col-sm-6">
								    <label for="class">Class:</label>
								    <select class="form-control" name="classtype">
								      <option value="Economy">Economy</option>
								      <option value="Business">Business</option>   
								    </select>
								  </div> 
								 </div>
								 <br> 
								  <div class="btn-group btn-group-justified">	
									<div class="btn-group">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
									<div class="btn-group">
										<button type="reset"  class="btn btn-info" value="Reset">Reset</button>
									</div>
							  	  </div>
								 <br>
								 <br>
								</form>
						</div>
						<div id="all">
							<form role="form" action="allsearch.php" method="post">
								 <div class="row"> 
								  <div class="col-sm-6">
								  <label for="selectdate">Select a date:</label>
								  <input type="date" class="form-control" id="selectdate" name="selectdate" required>
								  </div>
								 </div>
								 <br>
								<div class="row">   
								  <div class="col-sm-6">
								  <button type="submit" class="btn btn-primary">Show ALL</button>
								  </div>
								</div>
								<br>
								<br> 
								</form> 
						</div>
						<div id="allround">
							<form role="form" action="allsearchroundtrip.php" method="post">
								 <div class="row"> 
								  <div class="col-sm-6">
								  <label for="selectdate">Select Going Date:</label>
								  <input type="date" class="form-control" id="selectdate" name="selectdate1" required>
								  </div>

								  <div class="col-sm-6">
								  <label for="selectdate">Select Returning Date:</label>
								  <input type="date" class="form-control" id="selectdate" name="selectdate2" required>
								  </div>
								 </div>
								 <br>
								<div class="row">   
								  <div class="col-sm-6">
								  <button type="submit" class="btn btn-primary">Show ALL</button>
								  </div>
								</div>
								<br>
								<br> 
								</form> 
						</div>	
					</div>
				</div>
			</div>  
		</div>  
		

		
</body>
<!-- </html> -->