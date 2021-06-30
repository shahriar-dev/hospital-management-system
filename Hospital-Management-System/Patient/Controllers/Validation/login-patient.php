<?php
session_start();
$Username = "";
$Password = "";

$UsernameError = "";
$PasswordError = "";
$LoginError = "";
$emptyField = false;
define("filepath", "../data/patient-details.json");
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
        }

        if (!$emptyField) {
            $retrievedData = json_decode(file_get_contents(filepath));
            if ($retrievedData != null) {
                foreach ($retrievedData as $user) {
                    if ($user->userName == $Username && $user->password == $Password) {
                        $_SESSION['id'] = $Username;
                        header("Location: profile-patient.php");
                        exit();
                    } else {
                        $LoginError = "Login FAILED! Check credentials..";
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
