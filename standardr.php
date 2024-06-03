<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZEYA's Beach Resort</title>
    <link rel="stylesheet" href="css/bookstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ZEYA's Beach Resort</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="hello.php#header_id">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hello.php#villa_id">Villas & Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hello.php#about_id">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hello.php#contact_id">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Booking Details</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="button" onclick="window.location.href='index.php'">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <section class="container mt-5" id="villa_id">
        <h1 class="text-center">Standard Bedroom</h1>
        <p class="text-center">Take a look at our Standard Bedroom!</p>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="img/standardr.jpg" alt="Standard Bedroom" class="img-fluid mb-4">
            </div>
            <div class="col-md-6">
                <div class="border bg-light p-3 rounded mb-3">
                    <p><strong>RATE:</strong> PHP 500.00<br>
                        1 Double-Sized Bed for 1 to 2 person<br>
                        30 m² - Balcony - Garden view - Pool with a view - Inner courtyard view - Air conditioning - Ensuite bathroom - Terrace - Free WiFi
                    </p>
                    <form action="confirm_booking.php" method="post">
                        <div class="mb-3">
                            <label for="reserved_on" class="form-label">Reserved On:</label>
                            <input type="date" id="reserved_on" name="reserved_on" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="reserved_until" class="form-label">Reserved Until:</label>
                            <input type="date" id="reserved_until" name="reserved_until" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="num_of_occupants" class="form-label">Number of Persons:</label>
                            <input type="number" id="num_of_occupants" name="num_of_occupants" class="form-control" required>
                        </div>
                        <input type="hidden" name="service_id" value="4"> <!-- Assuming 4 is the service ID for standard bedroom -->
                        <button type="submit" class="btn btn-outline-dark">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
