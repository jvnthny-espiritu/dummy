<?php
   session_start();
   include ("connection.php");

?>


<!DOCTYPE html>
<html>
<head>
    <title>ZEYA's Beach Resort</title>
    <link rel="stylesheet" type="text/css" href="css/bookstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

		<nav class="nav">
			
			<div class="nav-links">
				<ul>
					<li><a href="hello.php #header_id">HOME</a></li>
					<li><a href="hello.php #villa_id">VILLAS & ROOMS</a></li>
          <li><a href="hello.php #about_id">ABOUT US</a></li>
					<li><a href="hello.php #contact_id">CONTACT</a></li>
					<li><a href="booking.php">BOOKING DETAILS</a></li>
          <li><button type="button" onclick="window.location.href='index.php'" class="btn btn-outline-dark" > Log Out</li>
				</ul>

			</div>
		</nav>


    <section class= "villa" id="villa_id">
	   <h1>Small Villa</h1>
	    <p>Take a look at our Small Villa!</p>
    
	
	   <div class= "row">
		  <div class= "villa-col">
			<img src= "img\smallvilla.jpg" alt= "small villa"><br><br>			
		 </div>

         <div class= "villa-col">
                 <p>RATE: PHP 1500.00
                  1 room for 1 to 3 persons 
			           <br>40 m² - Balcony - Garden view - Pool 
			            with a view - Inner courtyard view - Air conditioning - 
			            Ensuite bathroom - Terrace - Free WiFi</p>
              <div class="border bg-light p-3 rounded mb-3">
               <form action="confirm_booking.php" method="post">
                    <label for="reserved_on">Reserved On:</label>
                    <input type="date" id="reserved_on" name="reserved_on" required><br><br>
    
                    <label for="reserved_until">Reserved Until:</label>
                    <input type="date" id="reserved_until" name="reserved_until" required><br><br>
    
                    <label for="num_of_occupants">Number of Persons:</label>
                    <input type="number" id="num_of_occupants" name="num_of_occupants" required><br><br>
    
                    <input type="hidden" name="service_id" value="1"> <!-- Assuming 1 is the service ID for small villa -->
    
                    <input type="submit" onclick="window.location.href='confirm_booking.php'" class="btn btn-outline-dark" value="Book Now"><br>
               </form>
            </div>
        </div>

	
	</section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>