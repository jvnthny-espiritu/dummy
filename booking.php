<?php
session_start();
include("connection.php");

// Check if a booking cancellation is requested
if (isset($_GET['action']) && $_GET['action'] == 'cancel' && isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    
    // Check if the booking belongs to the current user
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM bookings WHERE booking_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $booking_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Delete the booking
        $sql = "DELETE FROM bookings WHERE booking_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "Booking successfully cancelled.";
        } else {
            $_SESSION['message'] = "Failed to cancel booking.";
        }
    } else {
        $_SESSION['message'] = "Invalid booking ID or unauthorized action.";
    }
}

// Display notification message if any
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT b.booking_id, s.service_name, b.num_of_occupants, b.reserved_on, b.reserved_until, b.total_cost, b.status 
FROM bookings b
JOIN services s ON b.service_id = s.service_id
WHERE b.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    // Error handling
    throw new Exception("Error in SQL query: " . $conn->error);
}

echo '<button onclick="window.location.href=\'index.php\'">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
    </svg> Back</button>
    <h2>Your Bookings</h2>';
    
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Booking ID</th>
                <th>Service Name</th>
                <th>Number of Persons</th>
                <th>Reserved At</th>
                <th>Reserved Until</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['booking_id'] . "</td>
                <td>" . $row['service_name'] . "</td>
                <td>" . $row['num_of_occupants'] . "</td>
                <td>" . $row['reserved_on'] . "</td>
                <td>" . $row['reserved_until'] . "</td>
                <td>" . $row['total_cost'] . "</td>
                <td>" . $row['status'] . "</td>
                <td><a href='booking.php?action=cancel&booking_id=" . $row['booking_id'] . "' onclick=\"return confirm('Are you sure you want to cancel this booking?');\">Cancel</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No bookings found.";
}

$conn->close();
?>

