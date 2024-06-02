<?php
session_start();
include("connection.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Error: User is not logged in.");
    }

    $user_id = $_SESSION['user_id'];
    $reserved_on = $_POST['reserved_on'];
    $reserved_until = $_POST['reserved_until'];
    $num_of_occupants = $_POST['num_of_occupants'];
    $service_id = $_POST['service_id'];


    // Get service details
    $service_query = $conn->prepare("SELECT service_name, max_occupancy, rate_per_night FROM services WHERE service_id = ?");
    if (!$service_query) {
        die("Error preparing statement: " . $conn->error);
    }
    $service_query->bind_param("i", $service_id);
    $service_query->execute();
    $service_result = $service_query->get_result();
    if ($service_result->num_rows === 0) {
        die("Error: Service not found.");
    }
    $service = $service_result->fetch_assoc();

    // Check if the number of occupants exceeds the maximum occupancy
    if ($num_of_occupants > $service['max_occupancy']) {
        die("Error: Number of occupants exceeds the maximum occupancy for this service.");
    }

    // Check for availability
    $availability_query = $conn->prepare("SELECT COUNT(*) as count FROM bookings WHERE service_id = ? AND status = 'Booked' AND (reserved_on < ? AND reserved_until > ?)");
    if (!$availability_query) {
        die("Error preparing availability statement: " . $conn->error);
    }
    $availability_query->bind_param("iss", $service_id, $reserved_until, $reserved_on);
    $availability_query->execute();
    $availability_result = $availability_query->get_result();
    $availability = $availability_result->fetch_assoc();

    if ($availability['count'] > 0) {
        die("Error: The villa is not available for the selected dates.");
    }

    // Calculate total cost
    $start_date = new DateTime($reserved_on);
    $end_date = new DateTime($reserved_until);
    $interval = $start_date->diff($end_date);
    $days = $interval->days;
    $total_cost = $days * $service['rate_per_night'];

    // Insert booking into database
    $booking_query = $conn->prepare("INSERT INTO bookings (user_id, service_id, service_name, reserved_on, reserved_until, num_of_occupants, total_cost, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Booked')");
    if (!$booking_query) {
        die("Error preparing booking statement: " . $conn->error);
    }
    $booking_query->bind_param("iisssid", $user_id, $service_id, $service['service_name'], $reserved_on, $reserved_until, $num_of_occupants, $total_cost);
    $booking_query->execute();

    if ($booking_query->affected_rows === 0) {
        die("Error: Booking could not be created.");
    }

    // Redirect to booking details page
    header("Location: booking.php?booking_id=" . $conn->insert_id);
    exit();
}
?>

