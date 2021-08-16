<?php
require '../../Hospital-Management-System/Patient/model/dbAddPatient.php';


$EmailErrorRegister = "";
$UsernameErrorRegister = "";
$PasswordErrorRegister = "";
$RegistrationError = "";

$EmailRegister = "";
$UsernameRegister = "";
$PasswordRegister = "";

$flag = 0;
$emptyField = false;

// define("filepath", "../data/patient-details.json");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // if (isset($_POST['back'])) {
    //     header("Location: ./../");
    // }
    if (isset($_POST['register'])) {
        /* name */
        // if (empty($_POST['firstName'])) {
        //     $FirstNameError = "First Name is Required!";
        //     $flag = 1;
        //     $emptyField = true;
        // }
        // if (empty($_POST['lastName'])) {
        //     $LastNameError = "Last Name is Required!";
        //     $flag = 1;
        //     $emptyField = true;
        // }
        // $FirstName = Test_User_Input($_POST['firstName']);
        // $LastName = Test_User_Input($_POST['lastName']);
        // if ($flag == 0) {
        //     if (!preg_match("/^[A-Za-z. ]*$/", $FirstName)) {
        //         $FirstNameError = "Only Letters and White Spaces are Allowed!";
        //         $emptyField = true;
        //     }
        //     if (!preg_match("/^[A-Za-z. ]*$/", $LastName)) {
        //         $LastNameError = "Only Letters and White Spaces are Allowed!";
        //         $emptyField = true;
        //     }
        // }
        // /* Gender */
        // if (empty($_POST['gender'])) {
        //     $GenderError = "Gender is Required!";
        //     $emptyField = true;
        // } else {
        //     $Gender = Test_User_Input($_POST['gender']);
        // }
        /* Date of Birth */
        // if (empty($_POST['dob'])) {
        //     $DoBError = "Date of Birth Required!";
        //     $emptyField = true;
        // } else {
        //     $DoB = Test_User_Input($_POST['dob']);
        // }
        // /* Religion */
        // if (empty($_POST['religion']) || Test_User_Input($_POST['religion']) == "default") {
        //     $ReligionError = "Religion Required!";
        //     $emptyField = true;
        // } else {
        //     $Religion = Test_User_Input($_POST['religion']);
        // }
        /* Bloodgroup */
        // if (empty($_POST['bloodgroup']) || Test_User_Input($_POST['bloodgroup']) == "default") {
        //     $BloodGroupError = "Blood Group Required!";
        //     $emptyField = true;
        // } else {
        //     $BloodGroup = Test_User_Input($_POST['bloodgroup']);
        // }
        // /* Phone Number */
        // if (empty($_POST['phoneNumber'])) {
        //     $PhoneNumberError = "Phone Number is Required!";
        //     $emptyField = true;
        // } else {
        //     $PhoneNumber = Test_User_Input($_POST['phoneNumber']);
        //     $pattern1 = preg_match("/\+?([0-9]{1,})([0-9]{11})/", $PhoneNumber);
        //     $pattern2 = preg_match("/^[0-9]{11}/", $PhoneNumber);
        //     if (!$pattern1 && !$pattern2) {
        //         $PhoneNumberError = "Invalid Format";
        //         $emptyField = true;
        //     }
        // }

        /* Email */
        if (empty($_POST['email-register'])) {
            $EmailErrorRegister = "Email is Required!";
            $emptyField = true;
        } else {
            $EmailRegister = Test_User_Input($_POST['email-register']);
            if (!preg_match("/^([a-zA-Z0-9.]+)*@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9]+)*$/", $EmailRegister)) {
                $EmailErrorRegister = "Invalid Format";
                $emptyField = true;
            }
        }
        /* Username */
        if (empty($_POST['username-register'])) {
            $UsernameErrorRegister = "Username REQUIRED!";
            $emptyField = true;
        } else {
            $UsernameRegister = Test_User_Input($_POST['username-register']);

            if (!preg_match("/^[A-Za-z0-9. ]*$/", $UsernameRegister)) {
                $UsernameErrorRegister = "Only Number and lowercase, Uppercase Letter are Allowed!";
                $emptyField = true;
            }
        }
        /* Password */
        if (empty($_POST['password-register'])) {
            echo 'password not found!';
            $PasswordErrorRegister = "You must Enter a Password!";
            $emptyField = true;
        } else {
            $PasswordRegister = Test_User_Input($_POST['password-register']);
            $UpperCase = preg_match("@[A-Z]@", $PasswordRegister);
            $LowerCase = preg_match("@[a-z]@", $PasswordRegister);
            $Number = preg_match("@[0-9]@", $PasswordRegister);

            if (!$UpperCase || !$LowerCase || !$Number) {
                $PasswordErrorRegister = "Password must contain 1 UPPERCASE, 1 LOWERCASE and 1 NUMBER";
                $emptyField = true;
            }
        }
        if (!$emptyField) {
            $response = insertPatient($UsernameRegister, $EmailRegister, $PasswordRegister);
            if ($response) {
                $_SESSION['id'] = $UsernameRegister;
                header("Location: ../../../../Hospital-Management-System/Patient/Views/index.php");
            }
        } else {
            $RegistrationError = "Registration Failed! Try Again...";
        }
    }
}

