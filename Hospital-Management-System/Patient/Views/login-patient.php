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
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body style="background-image: url(img/undraw_medicine.svg); background-position:cover; background-size:700px 1200px; background-repeat:no-repeat;">
    <div>
        <?php
        require "../Controllers/Include/header.php";
        ?>
    </div>
    <div style="border-radius: 15px 15px 0px 0px; background-color:rgb(0,0,0,6); margin:auto; color:#6460A4; width:800px;">
        <h2 align="center">Login - Patient</h2>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" style="width: 30%; margin: 0px auto; padding: 20px; border:1px solid #9A94E0; border-radius: 0px 0px 10px 10px;">
        <div style="margin: 10px 0px 10px 0px;">
            <label for="username" style="display: block; margin:3px;">Username</label>
            <input type="text" name="username" value="<?php echo $Username; ?>" style="display: block; margin:3px; border-radius:5px; height: 30px; width:93%; font-size:16px; border: 2px solid #9A94E0;">
            <label for="error_username" style="color: red;"><?php echo $UsernameError; ?></label>
        </div>
        <div style="margin: 10px 0px 10px 0px;">
            <label for="password" style="display: block; margin:3px;">Password</label>
            <input type="password" name="password" style="display: block; margin:3px; border-radius:5px; height: 30px; width:93%; font-size:16px; border: 2px solid #9A94E0;" value="<?php echo $Password ?>">
            <label for="error_password" style="color: red;"><?php echo $PasswordError; ?></label>
        </div>
        <div style="margin: 10px 0px 10px 0px;">
            <div>
                <input type="submit" name="submit" value="Login" style="display: inline-block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px;">

                <label for="error_message" style="color: red;"><?php echo $LoginError; ?></label>
            </div>
        </div>

        <p>
            Not yet Registered? <a href="registration-patient.php">Sign up</a>
            <span style="padding: 0 0 0 150px;">
                Forgotten Password? <a href="change-password-patient.php">Click here!</a>
            </span>
        </p>

    </form>
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        require "../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>