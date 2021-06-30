<?php
session_start();
$FirstNameError = "";
$LastNameError = "";
$GenderError = "";
$DoBError = "";
$ReligionError = "";
$EmailError = "";
$UsernameError = "";
$PasswordError = "";
$PhoneNumberError = "";
$BloodGroupError = "";

$FirstName = "";
$LastName = "";
$Gender = "";
$Religion = "";
$Email = "";
$Username = "";
$Password = "";
$DoB = "";
$PhoneNumber = "";
$BloodGroup = "";
$ErrorMessage = "";
$PresentAddress = "";
$PermanentAddress = "";

$flag = 0;
$emptyField = false;

define("filepath", "../data/patient-details.json");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['back'])) {
        header("Location: login-patient.php");
    }
    if (isset($_POST['register'])) {
        /* name */
        if (empty($_POST['firstName'])) {
            $FirstNameError = "First Name is Required!";
            $flag = 1;
            $emptyField = true;
        }
        if (empty($_POST['lastName'])) {
            $LastNameError = "Last Name is Required!";
            $flag = 1;
            $emptyField = true;
        }
        $FirstName = Test_User_Input($_POST['firstName']);
        $LastName = Test_User_Input($_POST['lastName']);
        if ($flag == 0) {
            if (!preg_match("/^[A-Za-z. ]*$/", $FirstName)) {
                $FirstNameError = "Only Letters and White Spaces are Allowed!";
                $emptyField = true;
            }
            if (!preg_match("/^[A-Za-z. ]*$/", $LastName)) {
                $LastNameError = "Only Letters and White Spaces are Allowed!";
                $emptyField = true;
            }
        }
        /* Gender */
        if (empty($_POST['gender'])) {
            $GenderError = "Gender is Required!";
            $emptyField = true;
        } else {
            $Gender = Test_User_Input($_POST['gender']);
        }
        /* Date of Birth */
        if (empty($_POST['dob'])) {
            $DoBError = "Date of Birth Required!";
            $emptyField = true;
        } else {
            $DoB = Test_User_Input($_POST['dob']);
        }
        /* Religion */
        if (empty($_POST['religion']) || Test_User_Input($_POST['religion']) == "default") {
            $ReligionError = "Religion Required!";
            $emptyField = true;
        } else {
            $Religion = Test_User_Input($_POST['religion']);
        }
        /* Bloodgroup */
        if (empty($_POST['bloodgroup']) || Test_User_Input($_POST['bloodgroup']) == "default") {
            $BloodGroupError = "Blood Group Required!";
            $emptyField = true;
        } else {
            $BloodGroup = Test_User_Input($_POST['bloodgroup']);
        }
        /* Phone Number */
        if (empty($_POST['phoneNumber'])) {
            $PhoneNumberError = "Phone Number is Required!";
            $emptyField = true;
        } else {
            $PhoneNumber = Test_User_Input($_POST['phoneNumber']);
            $pattern1 = preg_match("/\+?([0-9]{1,})([0-9]{11})/", $PhoneNumber);
            $pattern2 = preg_match("/^[0-9]{11}/", $PhoneNumber);
            if (!$pattern1 && !$pattern2) {
                $PhoneNumberError = "Invalid Format";
                $emptyField = true;
            }
        }

        /* Email */
        if (empty($_POST['email'])) {
            $EmailError = "Email is Required!";
            $emptyField = true;
        } else {
            $Email = Test_User_Input($_POST['email']);
            if (!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}[.]{1}[a-zA-Z0-9._]{2,}/", $Email)) {
                $EmailError = "Invalid Format";
                $emptyField = true;
            }
        }
        /* Username */
        if (empty($_POST['userName'])) {
            $UsernameError = "Username REQUIRED!";
            $emptyField = true;
        } else {
            $Username = Test_User_Input($_POST['userName']);

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
            //"presentAddress" => Test_User_Input($_POST['presentAddress']), "permanentAddress" => Test_User_Input($_POST['permanentAddress']),
            $data = array(
                "firstName" => $FirstName, "lastName" => $LastName, "gender" => $Gender, "dob" => $DoB, "religion" => $Religion, "bloodGroup" => $BloodGroup,
                "phoneNumber" => $PhoneNumber, "email" => $Email, "userName" => $Username, "password" => $Password, "presentAddress" => $PresentAddress, "permanentAddress" => $PermanentAddress
            );
            $_SESSION['id'] = $Username;
            if (file_get_contents(filepath) != null) {

                $retrievedData = json_decode(file_get_contents(filepath));
                $retrievedData[] = $data;
                $result = file_put_contents(filepath, json_encode($retrievedData, JSON_PRETTY_PRINT));
                if ($result) {
                    header("Location: ../Views/profile-patient.php");
                } else {
                    $ErrorMessage = "Error Saving Information!";
                }
            } else {
                $retrievedData[] = $data;
                $result = file_put_contents(filepath, json_encode($retrievedData, JSON_PRETTY_PRINT));
                if ($result) {
                    header("Location: profile-patient.php");
                } else {
                    $ErrorMessage = "Error Saving Information!";
                }
            }
        }
    }
}

function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
