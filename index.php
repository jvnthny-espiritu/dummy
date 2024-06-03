<!DOCTYPE html>
<html>
<head>
    <title>ZEYA's Beach Resort</title>
    <link rel="stylesheet" href="css/bookstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
		* {
			font-family: Arial, Helvetica, sans-serif;
		}

        nav {
            display: flex;
            padding: 10px 25px;
            justify-content: space-between;
            align-items: center;
            background-color: transparent;
            position: fixed;
			width: 100%;
            top: 0;
            z-index: 1000;
            transition: background-color 0.3s ease-in-out;
        }

        .nav-links ul li a {
            color: #fff;
            text-decoration: none;
			font-weight: 900;
            font-size: 15px;
        }

        .nav-links ul li:hover::after {
            background: #fff;
        }

        .scrolled {
            background-color: #040273;
        }

		.text-box{
			width: 90%;
			color: #fff;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			text-align: center;
		}

		.text-box h1{
			font-size: 62px;
			font-weight: 900;
		}

		.text-box p{
			margin: 10px 0 40px;
			color: #fff;
			text-align: center
		}

        .carousel-item img {
            object-fit: cover; 
            height: 750px;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 10px;
        }


        .about-section {
            padding: 80px 0;
            background-color: #fff;
        }

        .about-content {
            text-align: center;
        }

        .about-content h2 {
            font-size: 36px;
            color: #007bff;
        }

        .about-content p {
            font-size: 18px;
        }

        .room-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .room-title {
            text-align: center;
            margin-bottom: 50px;
            color: #007bff;
        }

        .room-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-5px);
        }

        .room-card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            max-width: 100%;
        }

        .room-card-body {
            padding: 20px;
        }

        .room-card-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .room-card-text {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav id="navbar">
        <div class="nav-links">
            <ul>
                <li><a href="#header_id">HOME</a></li>
                <li><a href="#villa_id">VILLAS & ROOMS</a></li>
                <li><a href="#about_id">ABOUT US</a></li>
                <li><a href="#contact_id">CONTACT</a></li>
                <li><a href="booking.php">BOOKING DETAILS</a></li>
                <li><button type="button" onclick="window.location.href='login.php'" class="btn btn-outline-light">Log Out</button></li>
            </ul>
        </div>
    </nav>
    <section class="header" id="header_id" style="background-image: url(img/likod.jpeg);">
        <div class="text-box">
            <h1>Welcome to ZEYA's Beach Resort!</h1>
            <p>Where your dream escape becomes a reality. Your perfect gateaway awaits. Let us provide you with an unforgettable experience, where every moment is crafted to ensure your utmost relaxation and enjoyment.</p>
        </div>
    </section>

<!-- Villas and Rooms -->
<section class="villa" id="villa_id">
	<h1>Villas and Rooms</h1>
	<p>Take a look at our villas and rooms!</p>
	<div id="villaCarousel" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<a href="small_villa.php"><img src="img/smallvilla.jpg" class="d-block w-100" alt="small villa"></a>
				<div class="carousel-caption d-none d-md-block">
					<h3>Small Villa</h3>
					<button type="button" onclick="window.location.href='small_villa.php'" class="btn btn-outline-light">Book Now</button>
				</div>
			</div>
			<div class="carousel-item">
				<a href="deluxe_villa.php"><img src="img/deluxevilla.jpg" class="d-block w-100" alt="deluxe villa"></a>
				<div class="carousel-caption d-none d-md-block">
					<h3>Deluxe Villa</h3>
					<button type="button" onclick="window.location.href='deluxe_villa.php'" class="btn btn-outline-light">Book Now</button>
				</div>
			</div>
			<div class="carousel-item">
				<a href="premium_villa.php"><img src="img/premiumvilla.jpg" class="d-block w-100" alt="premium villa"></a>
				<div class="carousel-caption d-none d-md-block">
					<h3>Premium Villa</h3>
					<button type="button" onclick="window.location.href='premium_villa.php'" class="btn btn-outline-light">Book Now</button>
				</div>
			</div>
			<div class="carousel-item">
				<a href="standardr.php"><img src="img/standardr.jpg" class="d-block w-100" alt="standard bed room"></a>
				<div class="carousel-caption d-none d-md-block">
					<h3>Standard Bedroom</h3>
					<button type="button" onclick="window.location.href='standardr.php'" class="btn btn-outline-light">Book Now</button>
				</div>
			</div>
			<div class="carousel-item">
				<a href="standarddb.php"><img src="img/standarddb.jpg" class="d-block w-100" alt="standard double bed room"></a>
				<div class="carousel-caption d-none d-md-block">
					<h3>Standard Double Bedroom</h3>
					<button type="button" onclick="window.location.href='standarddb.php'" class="btn btn-outline-light">Book Now</button>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#villaCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#villaCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</section>

<!-- About ZEYA's Beach Resort Section -->
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-content">
                    <h2>About ZEYA's Beach Resort</h2>
                    <p>Welcome to ZEYA's Beach Resort, where luxury meets nature. Nestled along the pristine shores of Laguna, our resort offers a serene escape from the hustle and bustle of everyday life. Immerse yourself in the breathtaking beauty of our private beach, where golden sands meet crystal-clear waters.</p>
                    <p>At ZEYA's Beach Resort, we believe in providing our guests with an unforgettable experience. Whether you're seeking relaxation, adventure, or both, our resort has something for everyone. From exhilarating water sports to rejuvenating spa treatments, there's no shortage of activities to enjoy.</p>
                    <p>Indulge your taste buds at our renowned Warung restaurant, where our talented chefs create mouthwatering dishes using only the freshest ingredients. Whether you're craving authentic Indonesian cuisine or international favorites, you're sure to find something to satisfy your palate.</p>
                    <p>Our dedicated staff is committed to ensuring your stay with us is nothing short of perfect. From the moment you arrive until the time you depart, we'll go above and beyond to exceed your expectations and create lasting memories.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rooms and Accommodations Section -->
<section class="room-section">
    <div class="container">
        <h2 class="room-title">Rooms and Accommodations</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="room-card">
                    <div class="room-card-body">
                        <h3 class="room-card-title">Small Villa</h3>
                        <p class="room-card-text">Ideal for 1 to 3 guests. 40 m² - Balcony - Garden view - Pool with a view - Inner courtyard view - Air conditioning - Ensuite bathroom - Terrace - Free WiFi</p>
                    </div>
                </div>
            </div>
			<div class="col-md-4">
                <div class="room-card">
                    <div class="room-card-body">
                        <h3 class="room-card-title">Small Villa</h3>
                        <p class="room-card-text">Ideal for 1 to 3 guests. 40 m² - Balcony - Garden view - Pool with a view - Inner courtyard view - Air conditioning - Ensuite bathroom - Terrace - Free WiFi</p>
                    </div>
                </div>
            </div>
			<div class="col-md-4">
                <div class="room-card">
                    <div class="room-card-body">
                        <h3 class="room-card-title">Small Villa</h3>
                        <p class="room-card-text">Ideal for 1 to 3 guests. 40 m² - Balcony - Garden view - Pool with a view - Inner courtyard view - Air conditioning - Ensuite bathroom - Terrace - Free WiFi</p>
                    </div>
                </div>
            </div>
			<div class="col-md-4">
                <div class="room-card">
                    <div class="room-card-body">
                        <h3 class="room-card-title">Small Villa</h3>
                        <p class="room-card-text">Ideal for 1 to 3 guests. 40 m² - Balcony - Garden view - Pool with a view - Inner courtyard view - Air conditioning - Ensuite bathroom - Terrace - Free WiFi</p>
                    </div>
                </div>
            </div>
			<div class="col-md-4">
                <div class="room-card">
                    <div class="room-card-body">
                        <h3 class="room-card-title">Small Villa</h3>
                        <p class="room-card-text">Ideal for 1 to 3 guests. 40 m² - Balcony - Garden view - Pool with a view - Inner courtyard view - Air conditioning - Ensuite bathroom - Terrace - Free WiFi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section class="contact" id="contact_id">
    <h4>Contact</h4>
    <p>GLOBE (Call | Text | Viber | WhatsApp): +63 917 707 9384 — 
    SMART (Call | Text): +63 919 635 8064 US DIRECT: +1 310 929 1772 <br>
    AU DIRECT: +61 280 734 193 — 
    RECEPTION: +63 950 764 8359 — 
    WARUNG: +63 956 660 8446</p>
	<h4>For more inquiries, you can reach out our social media accounts:</h4>
	<div class="icons">
		<a href="https://www.facebook.com/profile.php?id=61559798502978"><img src="img/facebook-icon.png" width="20" height="20"></a>
		<a href="https://www.instagram.com/siargaoislandvillas/"><img src="img/instagram-icon.png" width="20" height="20"></a>
		<img src="img/twitter-icon.png" width="20" height="20">
	</div>    
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
</body>
</html>
