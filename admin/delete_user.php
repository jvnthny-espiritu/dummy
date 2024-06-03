<?php
session_start();
require('admin_config.php');

if (isset($_GET['action']) && $_GET['action'] == 'cancel' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    // Check if the booking belongs to the current user
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $stmt = mysqli_query($conn, $sql);
    $user_data = mysqli_fetch_array($stmt);
    
    if (!empty( $user_data = mysqli_fetch_array($stmt))) {
        // Delete the booking
        $sql = "DELETE FROM user WHERE user_id = '$user_id'?";
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
