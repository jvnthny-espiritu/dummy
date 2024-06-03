<!DOCTYPE html>
<html>
<head>
    <title>ADMIN PANEL LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <style>
      div.login-form{
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 400px;
      }
   </style>

</head>
<body class="bg-light">


    <?php
    session_start();
    require('admin_config.php');

    $adname = $adpass = "";
    $adname_err = $adpass_err = $log_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["admin_name"]))){
            $adname_err = "Please enter username.";
        } else{
            $adname = trim($_POST["admin_name"]);
        }

        // Check if password is empty
        if(empty(trim($_POST["admin_pass"]))){
            $adpass_err = "Please enter your password.";
        } else{
            $adpass = trim($_POST["admin_pass"]);
        }

        
        if(empty($adname_err) && empty($admin_pass_err)){

            if (isset($_POST['log'])) {
                
                $adname = $_POST['admin_name'];
                $admin_pass = $_POST['admin_pass'];
                $sqllogin = "SELECT admin_id FROM admin WHERE  admin_name = '$adname' AND admin_pass = '$admin_pass'";
    
               
                $query = mysqli_query($conn, $sqllogin);
                $row = mysqli_fetch_array($query);
                $count = mysqli_num_rows($query);

                if ($count == 1) {

                    $_SESSION['admin_id'] = $row['admin_id'];
                    echo "Login successful!";
                    header("location:admin_index.php");
                    die;
                  } else {
                            $login_err = "Invalid password.";
                        }
            } else {
                        $login_err = "No user found.";
                    }
         } else {
                    echo "Something went wrong. Please try again later.";
                }
       
    
        
        $conn->close();
    }

    if(!empty($login_err)){
        echo '<div style="color: red;">' . $login_err . '</div>';
    }

    ?>

    
<!DOCTYPE html>
<html>
<head>
    <title>ADMIN PANEL LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <style>
      div.login-form{
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 400px;
      }
   </style>

</head>
<body class="bg-light">
   <div class="login-form text-center rounded bg-white shadow overflow-none">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h4 class="bg-dark text-white py-3">ADMIN PANEL LOG-IN</h4>
                <div class="p-4">
                   <div class="mb-3">
                     <input type="text" name="admin_name" value="<?php echo $adname; ?>" class="form-control shadow-none text-center" placeholder="Admin Username">
                     <span style="color: red;"><?php echo $adname_err; ?></span>
                    </div>    
                    <div class="mb-4">
                         <input type="password" name="admin_pass" class="form-control shadow-none text-center" placeholder="Password">
                        <span style="color: red;"><?php echo $adpass_err; ?></span>
                    </div>
                    <button type="submit" name="log" class="btn btn-outline-dark shadow-none" >LOG-IN</button>
                </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
