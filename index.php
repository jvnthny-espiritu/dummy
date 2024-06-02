
    <?php
    session_start();
    include ("connection.php");

    $username = $password = "";
    $username_err = $password_err = $login_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }

        
        if(empty($username_err) && empty($password_err)){

            if (isset($_POST['log'])) {
                
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sqllogin = "SELECT user_id FROM user WHERE  username = '$username' AND password = '$password'";
    
               
                $query = mysqli_query($conn, $sqllogin);
                $row = mysqli_fetch_array($query);
                $count = mysqli_num_rows($query);

                if ($count == 1) {

                    $_SESSION['user_id'] = $row['user_id'];
                    echo "Login successful!";
                    header("location:hello.php");
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
    ?>

    <?php
    if(!empty($login_err)){
        echo '<div style="color: red;">' . $login_err . '</div>';
    }
    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
   <style>
      div.login-form{
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 400px; 
         height: 400px;
      }
   </style>


</head>
<body class="bg-light">
   <div class="login-form text-center rounded bg-white shadow overflow-none"> 
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h4 class="bg-dark text-white py-3">LOG-IN</h4>
          <div class="p-4">
            <div class="mb-3">
              <input type="text" name="username" value="<?php echo $username; ?>" class="form-control shadow-none text-center" placeholder="Username">
              <span style="color: red;"><?php echo $username_err; ?></span>
            </div>    
            <div class="mb-4">
               <input type="password" name="password" class="form-control shadow-none text-center" placeholder="Password">
               <span style="color: red;"><?php echo $password_err; ?></span>
            </div>
               <button type="submit" name="log" class="btn btn-outline-dark shadow-none" >LOG-IN</button><br>
        </div>
            <h6>Not yet registered?</h6><a href="registration.php">Register Now</a><br>

      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


