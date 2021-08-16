<?php
session_start();
require './../../Hospital-Management-System/Patient/model/dbGetPatient.php';
$UsernameLogin = "";
$PasswordLogin = "";

$UsernameErrorLogin = "";
$PasswordErrorLogin = "";
$LoginError = "";
$emptyField = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        /* Username */
        if (empty($_POST['username-login'])) {
            $UsernameErrorLogin = "Username REQUIRED!";
            $emptyField = true;
        } else {
            $UsernameLogin = $_POST['username-login'];

            if (!preg_match("/^[A-Za-z0-9. ]*$/", $UsernameLogin)) {
                $UsernameErrorLogin = "Only Number and lowercase, Uppercase Letter are Allowed!";
                $emptyField = true;
            }
        }
        /* Password */
        if (empty($_POST['password-login'])) {
            $PasswordErrorLogin = "You must Enter a Password!";
            $emptyField = true;
        } else {
            $PasswordLogin = $_POST['password-login'];
        }

        if (!$emptyField) {

            $response = dbLogin($UsernameLogin, $PasswordLogin);

            if (!$response) {
                $LoginError = 'Login Failed!';
            } else {
                $_SESSION['id'] = $response;
                header("Location: ../../../../Hospital-Management-System/Patient/Views/");
            }
        }
    }
}
