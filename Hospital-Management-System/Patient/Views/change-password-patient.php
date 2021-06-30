<?php
require "../../../Hospital-Management-System/Patient/Controllers/Validation/change-password.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <div>
        <?php
        include "../Controllers/Include/header.php";
        ?>
    </div>
    <div style="border-radius: 15px 15px 15px 15px; background-color:rgb(0,0,0,6); margin:auto; color:#6460A4; width:800px;">
        <h2 align="center">Change Password - Patient</h2>
    </div>
    <div style="position: absolute; top: 50%; left:50%; transform:translate(-50%, -50%); width:600px; ">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <fieldset style="border-radius:10px;">
                <legend align="Center" style="font-size: 30px; font-weight:bold;">Change Password</legend>
                <div>
                    <label for="username">Username</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 5px;" type="text" name="username" value="<?php echo $Username ?>" placeholder="Give Username">
                    <label for="usernameerror" style="color:red"><?php echo $UsernameError; ?></label>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 5px;" type="email" name="email" value="<?php echo $Email; ?>" placeholder="Give associated email address">
                    <label for="emailerror" style="color:red"><?php echo $EmailError; ?></label>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 5px;" type="password" name="password" value="<?php echo $Password; ?>">
                    <label for="passworderror" style="color:red"><?php echo $PasswordError; ?></label>
                </div>
                <div>
                    <label for="confirmPassword">Confirm Password</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 5px;" type="password" name="confirmpassword" value="<?php echo $ConfirmPassword; ?>">
                    <label for="confirmpassworderror" style="color:red"><?php echo $ConfirmPasswordError; ?></label>
                </div>

                <div style="margin: 10px 0px 10px 0px; display:flex; ">
                    <!-- <button type="submit" value="submit" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px;">Edit Profile</button> -->
                    <div class="left" style="width: 70%; ">
                        <input type="submit" name="submit" value="Change Passowrd" style="display: block;  margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 100%; text-decoration:none; text-align:center;">
                        <input for="message" style="color: <?php echo $color; ?>; width: 60%; border:none;" value="<?php echo $Message; ?>">
                    </div>
                    <div style="width: 50%;">
                        <!--<input type="submit" name="backlogin" value="Back to Login" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 100%; text-decoration:none; text-align:center;">-->
                        <a href="login-patient.php" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 80%; text-decoration:none; text-align:center;">Back to Login</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>