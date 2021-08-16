<?php
require "../../../Hospital-Management-System/Patient/Controllers/Validation/login-patient.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="patient-login">
    <title>Patient - Login</title>
    <link rel="stylesheet" href="./../assets/css/style_login.css">

    <!-- ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   
</head>

<body>
    <div class="login__form">
        <div class="shape1"></div>
        <div class="shape2"></div>

        <div class="form">
            <img src="./../assets/img/Authentication.svg" alt="" class="form__img">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form__content">
                <h1 class="form__title">LOGIN</h1>

                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class='bx bxs-user-circle'></i>
                    </div>

                    <div class="form__div-input">
                        <label for="" class="form__label">Username</label>
                        <input type="text" name="username" id="" class="form__input">
                    </div>
                </div>
                <div class="form__div">
                    <div class="form__icon">
                        <i class='bx bxs-lock'></i>
                    </div>

                    <div class="form__div-input">
                        <label for="" class="form__label">Password</label>
                        <input type="password" name="password" id="" class="form__input">
                    </div>
                </div>
                <a href="#" class="form__forgot">Forgot Password?</a>
                <input type="submit" class="form__button" name="submit" value="Login">
                <a href="../../../Hospital-Management-System/Patient/Views/registration-patient.php" class="form__new">New User? Click Here!</a>
                <div class="form__social">
                    <span class="form__social-text">Our Login with</span>
                    <a href="#" class="form__social-icon"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="form__social-icon"><i class='bx bxl-google'></i></a>
                    <a href="#" class="form__social-icon"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="form__social-icon"><i class='bx bxl-instagram'></i></a>
                </div>
            </form>
        </div>
    </div>
    <script src="./../assets/js/app_login.js"></script>
</body>

</html>