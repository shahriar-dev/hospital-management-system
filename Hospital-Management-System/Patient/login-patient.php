<?php
session_start();
$Username = "";
$Password = "";

$UsernameError = "";
$PasswordError = "";

$emptyField = false;
define("filepath", "data/patient-details.txt");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        /* Username */
        if (empty($_POST['username'])) {
            $UsernameError = "Username REQUIRED!";
            $emptyField = true;
        } else {
            $Username = Test_User_Input($_POST['username']);

            if (!preg_match("/^[A-Za-z0-9. ]*$/", $Username)) {
                $UsernameError = "Only Number and lowercase, Uppercase Letter are Allowed!";
                $emptyField = true;
            }
        }
        /* Password */
        if (empty($_POST['password'])) {
            $PasswordError = "You must Enter a Password!";
            $emptyField = true;
        } else {
            $Password = Test_User_Input($_POST['password']);

            $UpperCase = preg_match("@[A-Z]@", $Password);
            $LowerCase = preg_match("@[a-z]@", $Password);
            $Number = preg_match("@[0-9]@", $Password);

            if (!$UpperCase || !$LowerCase || !$Number) {
                $PasswordError = "Password must contain 1 UPPERCASE, 1 LOWERCASE and 1 NUMBER";
                $emptyField = true;
            }
        }

        if (!$emptyField) {
            $retrievedData = json_decode(file_get_contents(filepath));
            if ($retrievedData != null) {
                foreach ($retrievedData as $user) {
                    if ($user->userName == $Username && $user->password == $Password) {
                        $_SESSION['id'] = $Username;
                        header("Location: profile-patient.php");
                        exit();
                    }
                }
            }
        }
    }
}
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
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
            margin: 0px;
            padding: 0px;
            font-family: Cambria;
        }
    </style>
</head>

<body style="background-image: url(img/undraw_medicine.svg); background-position:cover; background-size:700px 1200px; background-repeat:no-repeat;">
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
            <label for="error_password"><?php echo $PasswordError; ?></label>
        </div>
        <div style="margin: 10px 0px 10px 0px;">
            <input type="submit" name="submit" value="Login" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px;">
        </div>

        <p>
            Not yet Registered? <a href="registration-patient.php">Sign up</a>
        </p>
    </form>
</body>

</html>