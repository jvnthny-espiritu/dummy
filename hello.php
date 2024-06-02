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

    <section class="header" id="header_id" style="background-image: url(img/likod.jpeg);">
		<nav>
			
			<div class="nav-links">
				<ul>
					<li><a href="#header_id">HOME</a></li>
					<li><a href="#villa_id">VILLAS & ROOMS</a></li>
                    <li><a href="#about_id">ABOUT US</a></li>
					<li><a href="#contact_id">CONTACT</a></li>
					<li><a href="booking.php">BOOKING DETAILS</a></li>
                    <li><button type="button" onclick="window.location.href='index.php'" class="btn btn-outline-light" > Log Out</li>
				</ul>

			</div>
		</nav>
		
           <div class="text-box">
	          <h1>Welcome to ZEYA's Beach Resort!</h1>
	          <p>Where your dream escape becomes a reality. Your perfect gateaway awaits. Let us provide you with an unforgettable experience, where every moment is crafted to ensure your utmost relaxation and enjoyment.</p>
             </div>
	</section>


<!-- Villas and Rooms -->

    <section class= "villa" id="villa_id">
	 <h1>Villas and Rooms</h1>
	 <p>Take a look at our villas and rooms!</p>
    
	
	 <div class= "row">
		<div class= "villa-col">
		    <a href="small_villa.php"><img src= "img\smallvilla.jpg" alt= "small villa"></a>
            <h3>Small Villa</h3>
			<li><button type="button" onclick="window.location.href='small_villa.php'" class="btn btn-outline-dark" >Book Now</li>
			
		</div>

        
		<div class= "villa-col">
			<a href="deluxe_villa.php"><img src= "img\deluxevilla.jpg" alt= "deluxe villa"></a>
			<h3>Deluxe Villa</h3>
			<li><button type="button" onclick="window.location.href='deluxe_villa.php'" class="btn btn-outline-dark" >Book Now</li>
		</div>

		<div class= "villa-col">
		    <a href="premium_villa.php"><img src= "img\premiumvilla.jpg" alt= "premium villa"></a>
			<h3>Premium Villa</h3>
			<li><button type="button" onclick="window.location.href='premium_villa.php'" class="btn btn-outline-dark" >Book Now</li>
		</div>
        
        <div class= "villa-col">
			<a href="standardr.php"><img src= "img\standardr.jpg" alt= "standard bed room"></a>
			<h3>Standard Bedroom</h3>
			<li><button type="button" onclick="window.location.href='standardr.php'" class="btn btn-outline-dark" >Book Now</li>
		</div>
        
        <div class= "villa-col">
			<a href="standarddb.php"><img src= "img\standarddb.jpg" alt= "standard double bed room"></a>
			<h3>Standard Double Bedroom</h3>
			<li><button type="button" onclick="window.location.href='standarddb.php'" class="btn btn-outline-dark" >Book Now</li>
		</div>
	 </div>
	
	</section>

	
<!-- About & Services -->

<section class ="about" id="about_id">
	<h1>About ZEYA's Beach Resort</h1>
	<p>ZEYA's Beach Resort offers a private beach where you can relax in a sun lounger, 
	plus activities like scuba diving, snorkeling, and surfing/body boarding are nearby. 
	The outdoor pool provides a splash of fun, while guests in the mood for pampering can 
	indulge in massages at the spa. Warung serves Indonesian cuisine and is open for breakfast, 
	lunch, and dinner. A terrace and a garden are other highlights. The helpful staff and 
	comfortable guestrooms get good marks from fellow travelers.</p>
	
	<br><h2>Rooms listed below:</h2>
	<div class= "row">
		<div class= "about-col">
			<h3>Small Villa</h3>
			<p>1 room for 1 to 3 persons 
			<br>40 m² - Balcony - Garden view - Pool 
			with a view - Inner courtyard view - Air conditioning - 
			Ensuite bathroom - Terrace - Free WiFi</p>
		</div>
		<div class= "about-col">
			<h3>Deluxe Villa</h3>
			<p>Bedroom: 1 Queen Size Bed 
			   Bedroom 2: 1 Double Bed room for 3 to 4 persons
			<br>70 m² - Balcony - Garden view - Pool 
			with a view - Inner courtyard view - Patio - Air conditioning - 
			Ensuite bathroom - Terrace - Free WiFi</p>
		</div>
		<div class= "about-col">
			<h3>Premium Villa</h3>
			<p> 3 Bedroom: 3 Queen Size Bed
				Room for maximum of 6 persons
			<br>70 m² - Balcony - Garden view - Pool 
			with a view - Inner courtyard view - Air conditioning - 
			Ensuite bathroom - Terrace - Free WiFi</p>
		</div>
		<div class= "about-col">
			<h3>Standard room</h3>
			<p>1 Double - Sized Bed for 1 to 2 person 
			<br>30 m² - Balcony - Garden view - Pool 
			with a view - Inner courtyard view - Air conditioning - 
			Ensuite bathroom - Terrace - Free WiFi</p>
		</div>
		<div class= "about-col">
			<h3>Standard Double Bedroom</h3>
			<p>1 room - 2 Single Size Bed for 1 to 2 person 
			<br>30 m² - Balcony - Garden view - Pool 
			with a view - Inner courtyard view - Air conditioning - 
			Ensuite bathroom - Terrace - Free WiFi</p>
	</div>
	
</section>

<!-- End of About -->
	





<section class= "contact" id="contact_id">
	<h4>Contact</h4>
	<p>GLOBE (Call | Text | Viber | WhatsApp): +63 917 707 9384 — 
	SMART (Call | Text): +63 919 635 8064 US DIRECT: +1 310 929 1772 <br>
	AU DIRECT: +61 280 734 193 — 
	RECEPTION: +63 950 764 8359 — 
	WARUNG: +63 956 660 8446</p>
	<h4>For more inquiries, you can reach out our social media accounts:</h4>
	
   <div class= "icons">
	<a href = "https://www.facebook.com/booksiargaoislandvillas/"><img src= "img\fb.png"  href= ""width = "20" height = "20"></a>
	<a href = "https://www.instagram.com/siargaoislandvillas/"><img src= "img\ig.png" width = "20" height = "20"></a>
	<img src= "img\twt.png" width = "20" height = "20">
 </div>	

</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>