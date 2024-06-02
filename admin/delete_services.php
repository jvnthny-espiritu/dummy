<?php
session_start();
require('admin_config.php');

if (isset($_GET['action']) && $_GET['action'] == 'cancel' && isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    
    // Check if the booking belongs to the current user
    $service_id = $_SESSION['service_id'];
    $sql = "SELECT * FROM services WHERE service_id = '$service_id'";
    $stmt = mysqli_query($conn, $sql);
    $service_data = mysqli_fetch_array($stmt);
    
    if (!empty( $service_data = mysqli_fetch_array($stmt))) {
        // Delete the booking
        $sql = "DELETE FROM services WHERE service_id = '$service_id'?";
        $stmt = mysqli_query($conn, $sql);
        
        if ($stmt) {
            $_SESSION['message'] = "Booking successfully cancelled.";
        } else {
            $_SESSION['message'] = "Failed to cancel booking.";
        }
    } else {
        $_SESSION['message'] = "Invalid booking ID or unauthorized action.";
    }
}
if(mysqli_query($conn, $sql)){
    header("location: admin_index.php");
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
