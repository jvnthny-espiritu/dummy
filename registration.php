<?php
session_start();
include("connection.php");

$name = $username = $password = $address = $email = $age = $gender = "";
$name_err = $username_err = $password_err = $address_err = $email_err = $register_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT id FROM user WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        } else {
            $register_err = "Database error: Could not prepare statement.";
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter your address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate age and gender (optional)
    $age = isset($_POST["age"]) ? trim($_POST["age"]) : null;
    $gender = isset($_POST["gender"]) ? trim($_POST["gender"]) : null;

    // Check input errors before inserting in database
    if (empty($name_err) && empty($username_err) && empty($password_err) && empty($address_err) && empty($email_err)) {
        $sql = "INSERT INTO user (name, username, password, address, email, age, gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssis", $param_name, $param_username, $param_password, $param_address, $param_email, $param_age, $param_gender);

            $param_name = $name;
            $param_username = $username;
            $param_password = $password;
            $param_address = $address;
            $param_email = $email;
            $param_age = $age;
            $param_gender = $gender;

            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                header("location: index.php");
                die;
            } else {
                $register_err = "Something went wrong. Please try again later.";
                error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
            }

            $stmt->close();
        } else {
            $register_err = "Database error: Could not prepare statement.";
            error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
    } else {
        error_log("Validation errors: " . implode(", ", [$name_err, $username_err, $password_err, $address_err, $email_err]));
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: auto;
            padding: 0 0 25px 0;
        }
    </style>
</head>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-none">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h4 class="bg-dark text-white py-3">REGISTRATION</h4>
            <?php if (!empty($register_err)) : ?>
                <div style="color: red;"><?php echo $register_err; ?></div>
            <?php endif; ?>
            <div class="p-4">
                <div class="mb-3">
                    <input type="text" name="name" value="<?php echo $name; ?>" class="form-control shadow-none" placeholder="Name">
                    <span style="color: red; font-size: 0.75rem;"><?php echo $name_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control shadow-none" placeholder="Username">
                    <span style="color: red; font-size: 0.75rem;"><?php echo $username_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control shadow-none" placeholder="Password">
                    <span style="color: red; font-size: 0.75rem;"><?php echo $password_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control shadow-none" placeholder="Address">
                    <span style="color: red; font-size: 0.75rem;"><?php echo $address_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control shadow-none " placeholder="Email">
                    <span style="color: red; font-size: 0.75rem;"><?php echo $email_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="text" name="age" value="<?php echo $age; ?>" class="form-control shadow-none" placeholder="Age (Optional)">
                </div>
                <div class="mb-3">
                    <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control shadow-none" placeholder="Gender (Optional)">
                </div>
                <button type="submit" name="register" class="btn btn-outline-dark shadow-none">REGISTER</button><br>
            </div>
            <div>
                <h5 style="font-size: 0.875rem;">Already registered?</h5>
                <a style="font-size: 0.875rem;" href="login.php">Login here</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
