<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Ecommerce</title>
    <link rel="stylesheet" href="../views/assets/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<?php

require_once "../controllers/AuthController.php";
require_once "../utils/AppUtils.php";

session_start();

if(isset($_SESSION['auth'])) {
    $auth = $_SESSION['auth'];
    if($auth['role'] == "USER") {
        header("Location: index.php");
        exit;
    } elseif($auth['role'] == "ADMIN") {
        header("Location: admin.php");
        exit;
    }
}

$email = $password = "";

$emailErr = $passwordErr = $errorMsg = $successMsg = "";

if (isset($_GET['success'])) {
    $successMsg = "Register successfully";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $emailErr = "E-mail is required";
    } else {
        $email = AppUtils::test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = AppUtils::test_input($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters long";
        }
    }

    if (empty($emailErr) && empty($passwordErr)) {
        $authController = new AuthController();

        $data = [
            'email' => $email,
            'password' => $password,
        ];

        $errorMsg = $authController->handleLoginRequest($data);
    }
}

?>

<body>

    <section class="container forms">
        <!-- Login Form -->
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="login.php" method="POST">
                    <div class="field input-field">
                        <input type="email" placeholder="E-mail" class="input <?php if (!empty($emailErr)) echo 'error_input'; ?>" name="email" value="<?php echo $email ?>">
                        <span class="error"><?php echo $emailErr ?></span>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password <?php if (!empty($passwordErr)) echo 'error_input'; ?>" name="password" value="<?php echo $password ?>">
                        <i class='bx bx-hide eye-icon'></i>
                        <span class="error"><?php echo $passwordErr ?></span>
                    </div>

                    <div class="field button-field">
                        <button>Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="./register.php" class="link signup-link">Register</a></span>
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

        if (!empty($successMsg)) {
            echo '<script type="text/javascript">toastr.success("' . $successMsg . '")</script>';
        }
    ?>

</body>

</html>
