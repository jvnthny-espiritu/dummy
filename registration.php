
    <?php
    session_start();
    include("connection.php");

    $name = $username = $password = $address = $email = "";
    $name_err = $username_err = $password_err = $address_err = $email_err = $register_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate name
        if(empty(trim($_POST["name"]))){
            $name_err = "Please enter your name.";
        } else{
            $name = trim($_POST["name"]);
        }

        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            $sql = "SELECT user_id FROM user WHERE username = ?";
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("s", $param_username);
                $param_username = trim($_POST["username"]);
                if($stmt->execute()){
                    $stmt->store_result();
                    if($stmt->num_rows == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                $stmt->close();
            }
        }

        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have at least 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }

        // Validate address
        if(empty(trim($_POST["address"]))){
            $address_err = "Please enter your address.";
        } else{
            $address = trim($_POST["address"]);
        }

        // Validate email
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter your email.";
        } elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
            $email_err = "Invalid email format.";
        } else{
            $email = trim($_POST["email"]);
        }

        // Check input errors before inserting in database
        if(empty($name_err) && empty($username_err) && empty($password_err) && empty($address_err) && empty($email_err)){
            $sql = "INSERT INTO user (name, username, password, address, email) VALUES (?, ?, ?, ?, ?)";
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("sssss", $param_name, $param_username, $param_password, $param_address, $param_email);
                
                $param_name = $name;
                $param_username = $username;
                $param_password = $password;
                $param_address = $address;
                $param_email = $email;
                
                if($stmt->execute()){
                    $_SESSION['username'] = $username;
                    echo "Registration Succesfull!" .'<button onclick="window.location.href=\'hello.php\'"></button>';
                    header("location: hello.php"); 
                    die;
                } else{
                    $register_err = "Something went wrong. Please try again later.";
                }

                $stmt->close();
            }
        }

        $conn->close();
    }
    ?>

    <?php
    if(!empty($register_err)){
        echo '<div style="color: red;">' . $register_err . '</div>';
    }
    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      div.login-form{
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 500px;
         height: 500px;
      }
   </style>


</head>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-none">
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h4 class="bg-dark text-white py-3">REGISTRATION</h4>
          <div class="p-4">
            <div class="mb-3">         
               <input type="text" name="name" value="<?php echo $name; ?>" class="form-control shadow-none text-center" placeholder="Name">
               <span style="color: red;"><?php echo $name_err; ?></span>
            </div>
            <div class="mb-3">
               <input type="text" name="username" value="<?php echo $username; ?>" class="form-control shadow-none text-center" placeholder="Username">
               <span style="color: red;"><?php echo $username_err; ?></span>
            </div>
            <div class="mb-3">
               <input type="password" name="password" class="form-control shadow-none text-center" placeholder="Password">
               <span style="color: red;"><?php echo $password_err; ?></span>
            </div>
            <div class="mb-3">
               <input type="text" name="address" value="<?php echo $address; ?>"  class="form-control shadow-none text-center" placeholder="Address">
               <span style="color: red;"><?php echo $address_err; ?></span>
            </div>
            <div class="mb-3">
               <input type="email" name="email" value="<?php echo $email; ?>" class="form-control shadow-none text-center" placeholder="Email">
               <span style="color: red;"><?php echo $email_err; ?></span>
            </div>
             <button type="submit" name="log" class="btn btn-outline-dark shadow-none" >REGISTER</button><br>
    
           </div>
          <div>
            <h5>Already registered?</h5><a href="index.php">Login here</a>
          </div>
      </form>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

