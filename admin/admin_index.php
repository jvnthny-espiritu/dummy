<?php
session_start();
require('admin_config.php');

if(!isset($_SESSION["admin_id"]) || $_SESSION["admin_id"] === false){
    header("location: admin_login.php");
    exit;
}
if(isset($_POST['delete'])){
    $userId = $_POST['delete'];
    $sql = "DELETE FROM bookings WHERE user_id = '$userId'";
    $query = mysqli_query($conn, $sql);

    $userId = $_POST['delete'];
    $sql = "DELETE FROM user WHERE user_id = '$userId'";
    $query = mysqli_query($conn, $sql);

 
}


$users = mysqli_query($conn, "SELECT * FROM user");
$services = mysqli_query($conn, "SELECT * FROM services");
$bookings = mysqli_query($conn, "SELECT * FROM bookings");


?>


<!DOCTYPE html>
<html>
<head>
    <title>ADMIN DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between">
        <h3 class="mb-0">Admin Panel-Dashboard</h3>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>
    

    <div class="mt-4">
            <h2>Users</h2>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $sql_users = "SELECT * FROM user";
                         $result_users = mysqli_query($conn, $sql_users);
                            while ($row_users = mysqli_fetch_assoc($result_users)) {
                            ?>
                          <tr> <td><?php echo $row_users['user_id']?></td>
                            <td><?php echo $row_users['username']?></td>
                            <td><?php echo $row_users['password']?></td>
                            <td><?php echo $row_users['name']?></td>
                            <td><?php echo $row_users['address']?></td>
                            <td><?php echo $row_users['email']?></td>
                            <form action="" method="post">
                            <td><button class="btn btn-danger" name="delete" value=<?php echo $row_users['user_id']?>>Delete</button></td>
                            </form>
                        </tr>
                        <?php }?>
                    
                        </tbody>
                    </table>
    </div>


    <div class="mt-4">
            <h2>Services</h2>
            <table class="table table-striped">
        <thead>
            <tr>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Max Occupancy</th>
                <th>Rate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_services = "SELECT * FROM services";
            $result_services = mysqli_query($conn, $sql_services);
            while ($row_services = mysqli_fetch_assoc($result_services)) {
                echo "<tr>";
                echo "<td>" . $row_services['service_id'] . "</td>";
                echo "<td>" . $row_services['service_name'] . "</td>";
                echo "<td>" . $row_services['max_occupancy'] . "</td>";
                echo "<td>" . $row_services['rate_per_night'] . "</td>";
                echo "<td><a href='delete_services.php?action=cancel&service_id=" . $row_services['service_id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
          </table>
            
    </div>

    <div class="mt-4">
            <h2>Bookings</h2>
            <table class="table table-striped">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_bookings = "SELECT * FROM bookings";
            $result_bookings = mysqli_query($conn, $sql_bookings);
            while ($row_bookings = mysqli_fetch_assoc($result_bookings)) {
                echo "<tr>";
                echo "<td>" . $row_bookings['booking_id'] . "</td>";
                echo "<td>" . $row_bookings['user_id'] . "</td>";
                echo "<td>" . $row_bookings['service_id'] . "</td>";
                echo "<td>" . $row_bookings['service_name'] . "</td>";
                echo "<td>" . $row_bookings['status'] . "</td>";
                echo "<td><a href='delete_bookings.php?action=cancel&booking_id=" . $row_bookings['booking_id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
         </table>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



