<?php
// require "../../Hospital-Management-System/Patient/model/dbConnect.php";
require "../../Hospital-Management-System/Patient/Controllers/Validation/data.php";
require "../../Hospital-Management-System/Patient/Controllers/Validation/login-patient.php";
require "../../Hospital-Management-System/Patient/Controllers/Validation/registration-validation.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="registration-patient">
    <title>Registration - PATIENT</title>
    <link rel="stylesheet" href="./assets/css/style_registration.css">
    <!-- ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="./assets/img/Authentication.svg" alt="" srcset="">
            </div>

            <div class="login__forms">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login__register" id="login-in">
                    <h1 class="login__title">LOGIN</h1>

                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class='bx bxs-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Username</label>
                            <input type="text" name="username-login" id="username" class="form__input" value="<?php echo $UsernameLogin; ?>">
                            <i class='bx bxs-user-check'></i>
                            <i class='bx bxs-error-circle' id="user-check"></i>

                            <!-- <small>Error Message</small> -->
                        </div>
                        <!-- <small>Error Message</small> -->
                        <!-- <div class="form__validation-icon">
                            <i class='bx bxs-user-check'></i>
                            <i class='bx bxs-error-circle'></i>
                            <small>Error Message</small>
                        </div> -->
                    </div>
                    <div class="username-error" id="username-error">
                        <small><?php echo $PasswordErrorLogin; ?></small>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bxs-lock'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Password</label>
                            <input type="password" name="password-login" id="password" class="form__input" value="<?php $PasswordLogin; ?>">
                            <i class='bx bxs-check-shield'></i>
                            <i class='bx bxs-error-circle'></i>
                        </div>
                    </div>
                    <div class="password-error" id="password-error">
                        <small><?php echo $PasswordErrorLogin; ?></small>
                    </div>
                    <a href="#" class="login__forgot">Forgot Password?</a>
                    <input type="submit" class="login__button" name="submit" value="Login">
                    <div class="login-error" id="login-error">
                        <small><?php echo $LoginError; ?></small>
                    </div>
                    <!-- <a href="../../../Hospital-Management-System/Patient/Views/registration-patient.php" class="form__new">New User? Click Here!</a> -->

                    <div>
                        <span class="login__account">Don't have an Account?</span>
                        <span class="login__signin" id="sign-up">Sign Up</span>
                    </div>

                    <div class="form__social">
                        <span class="form__social-text">Our Login with</span>
                        <a href="#" class="form__social-icon"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="form__social-icon"><i class='bx bxl-google'></i></a>
                        <a href="#" class="form__social-icon"><i class='bx bxl-twitter'></i></a>
                        <a href="#" class="form__social-icon"><i class='bx bxl-instagram'></i></a>
                    </div>
                </form>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login__create none" id="login-up">
                    <h1 class="login__title">Create Account</h1>

                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class='bx bxs-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Username</label>
                            <input type="text" name="username-register" id="username-register" class="form__input">
                            <i class='bx bxs-user-check'></i>
                            <i class='bx bxs-error-circle' id="user-check"></i>
                        </div>
                    </div>
                    <div class="usernameRegister-error" id="usernameRegister-error">
                        <small><?php echo $UsernameErrorRegister; ?></small>
                    </div>
                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-at'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Email</label>
                            <input type="text" name="email-register" id="email-register" class="form__input">
                            <i class='bx bx-mail-send'></i>
                            <i class='bx bxs-error-circle'></i>
                        </div>

                    </div>
                    <div class="emailRegister-error" id="emailRegister-error">
                        <small><?php echo $EmailErrorRegister; ?></small>
                    </div>
                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bxs-lock'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Password</label>
                            <input type="password" name="password-register" id="password-register" class="form__input">
                            <i class='bx bxs-check-shield'></i>
                            <i class='bx bxs-error-circle'></i>
                        </div>

                    </div>
                    <div class="passwordRegister-error" id="passwordRegister-error">
                        <small><?php echo $PasswordErrorRegister; ?></small>
                    </div>
                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bxs-lock'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Confirm Password</label>
                            <input type="password" name="cpassword-register" id="cpassword-register" class="form__input">
                            <i class='bx bxs-check-shield'></i>
                            <i class='bx bxs-error-circle'></i>
                        </div>

                    </div>
                    <div class="cpasswordRegister-error" id="cpasswordRegister-error">
                        <small></small>
                    </div>
                    <!-- <a href="#" class="login__forgot">Forgot Password?</a> -->
                    <input type="submit" class="login__button" name="register" value="Sign Up">
                    <div class="register-error" id="register-error">
                        <small><?php echo $RegistrationError; ?></small>
                    </div>

                    <div>
                        <span class="login__account">Already have an Account?</span>
                        <span class="login__signup" id="sign-in">Sign In</span>
                    </div>

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
    </div>
    <script src="./assets/js/app_login.js"></script>
    <script src="./assets/js/app_register.js"></script>
</body>

</html>