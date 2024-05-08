<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shoe Ecommerce</title>
    <link rel="stylesheet" href="../views/assets/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<?php 

require_once "../controllers/UserController.php";
require_once "../utils/AppUtils.php";

session_start();

if(isset($_SESSION['auth'])) {
    $auth = $_SESSION['auth'];
    if($auth['role'] == "USER") {
        header("Location: index.php");
        exit;
    } else if($auth['role'] == "ADMIN") {
        header("Location: admin.php");
        exit;
    }
}

$firstName = $lastName = $email = $password = $confirmPassword = "";

$firstNameErr = $lastNameErr = $emailErr = $passwordErr = $confirmPasswordErr = $errorMsg =  "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(empty($_POST["firstName"])) {
        $firstNameErr = "FirstName is required";
    } else {
        $firstName = AppUtils::test_input($_POST["firstName"]);
        if (!preg_match("/^[a-zA-Z-' \p{L}]*$/u", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
        }
    }

    if(empty($_POST["lastName"])) {
        $lastNameErr = "LastName is required";
    } else {
        $lastName = AppUtils::test_input($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z-' \p{L}]*$/u", $firstName)) {
            $lastNameErr = "Only letters and white space allowed";
        }
    }

    if(empty($_POST["email"])) {
        $emailErr = "E-mail is required";
    } else {
        $email = AppUtils::test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if(empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = AppUtils::test_input($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters long";
        }
    }

    if(empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Confirm Password is required";
    } else {
        $confirmPassword = AppUtils::test_input($_POST["confirmPassword"]);
        if ($confirmPassword !== $password) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    if(empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $userController = new UserController();

        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
        ];

        $errorMsg = $userController->handleRegisterRequest($data);
    }
}

?>

<body>
    <section class="container forms">

        <!-- Register Form -->
        <div class="form signup">
            <div class="form-content">
                <header>Register</header>
                <form action="./register.php" method="POST">
                    <div class="field fullName">
                        <div class="first">
                            <input type="text" placeholder="First Name" class="input <?php if (!empty($firstNameErr)) echo 'error_input'; ?>" name="firstName" value="<?php echo $firstName ?>">
                            <span class="error"><?php echo $firstNameErr ?></span>
                        </div>
                        <div class="last">
                            <input type="text" placeholder="Last Name" class="input <?php if (!empty($lastNameErr)) echo 'error_input'; ?>" name="lastName" value="<?php echo $lastName ?>">
                            <span class="error"><?php echo $lastNameErr ?></span>
                        </div>
                    </div>

                    <div class="field input-field">
                        <input type="email" placeholder="E-mail" class="input <?php if (!empty($emailErr)) echo 'error_input'; ?>" name="email" value="<?php echo $email ?>">
                        <span class="error"><?php echo $emailErr ?></span>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password <?php if (!empty($passwordErr)) echo 'error_input'; ?>" name="password" value="<?php echo $password ?>">
                        <i class='bx bx-hide eye-icon'></i>
                        <span class="error"><?php echo $passwordErr ?></span>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" class="password <?php if (!empty($confirmPasswordErr)) echo 'error_input'; ?>" name="confirmPassword" value="<?php echo $confirmPassword ?>">
                        <i class='bx bx-hide eye-icon'></i>
                        <span class="error"><?php echo $confirmPasswordErr ?></span>
                    </div>

                    <div class="field button-field">
                        <button type="submit">Register</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="./login.php" class="link login-link">Login</a></span>
                </div>
            </div>

        </div>
    </section>

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <?php
        if (!empty($errorMsg)) {
            echo '<script type="text/javascript">toastr.error("' . $errorMsg . '")</script>';
        }
    ?>

</body>

</html>