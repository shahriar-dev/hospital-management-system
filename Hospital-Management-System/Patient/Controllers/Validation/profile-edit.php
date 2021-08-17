<?php
session_start();
require '../../../Hospital-Management-System/Patient/model/dbUpdatePatient.php';
$id = Test_User_Input($_SESSION['id']);
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
$PresentAddress = "";
$PermanentAddress = "";
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
$changeStatus = false;
$LoginSuccess = false;
$fnameC = $lnameC = $genderC = $religionC = $emailC = $usernameC = $passwordC = $dobC = $pnumberC = $bgroupC = $peraddressC = $preaddressC = false;
if (!isset($_SESSION['id'])) {
    exit();
} else {
    $id = $_SESSION['id'];

    $response = dbGetPatientInfo($id);
    if (count($response) === 1) {
        foreach ($response as $user) {
            $FirstName = $user['patient_firstName'];
            $LastName = $user['patient_lastName'];
            $Gender = $user['patient_gender'];
            $BloodGroup = $user['patient_bloodGroup'];
            $PresentAddress = $user['patient_presentAddress'];
            $PermanentAddress = $user['patient_permanentAddress'];
            $Email = $user['patient_email'];
            $PhoneNumber = $user['patient_phoneNumber'];
            $Religion = $user['patient_religion'];
            $DoB = $user['patient_dob'];
            $Username = $user['patient_username'];
            $Password = $user['patient_password'];
            $Message = "Welcome " . $FirstName . " " . $LastName;
        }
    } else {
        $Message = "Information Extraction Failed!";
    }
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['firstName'])) {
            $FirstName = Test_User_Input($_POST['firstName']);
            if (!preg_match("/^[A-Za-z. ]*$/", $FirstName)) {
                $FirstNameError = "Only Letters and White Spaces are Allowed!";
                $fnameC = false;
                $emptyField = true;
            } else {
                $fnameC = true;
                $changeStatus = true;
            }
        }
        if (!empty($_POST['lastName'])) {
            $LastName = Test_User_Input($_POST['lastName']);
            if (!preg_match("/^[A-Za-z. ]*$/", $LastName)) {
                $LastNameError = "Only Letters and White Spaces are Allowed!";
                $lnameC = false;
                $emptyField = true;
            } else {
                $lnameC = true;
                $changeStatus = true;
            }
        }
        if (!empty($_POST['gender'])) {
            $Gender = Test_User_Input($_POST['gender']);
            $genderC = true;
            $changeStatus = true;
        }
        if (!empty($_POST['religion'])) {
            $Religion = Test_User_Input($_POST['religion']);
            $religionC = true;
            $changeStatus = true;
        }
        if (!empty($_POST['email'])) {
            $Email = Test_User_Input($_POST['email']);
            if (!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}[.]{1}[a-zA-Z0-9._]{2,}/", $Email)) {
                $EmailError = "Invalid Format";
                $emailC = false;
                $emptyField = true;
            } else {
                $emailC = true;
                $changeStatus = true;
            }
        }
        if (!empty($_POST['username'])) {
            $Username = Test_User_Input($_POST['username']);

            if (!preg_match("/^[A-Za-z0-9. ]*$/", $Username)) {
                $UsernameError = "Only Number and lowercase, Uppercase Letter are Allowed!";
                $usernameC = false;
                $emptyField = true;
            } else {
                $usernameC = true;
                $changeStatus = true;
            }
        } else {
            $Username = $id;
        }
        if (!empty($_POST['presentAddress'])) {
            $PresentAddress = Test_User_Input($_POST['presentAddress']);
            if (!preg_match("/^[A-Za-z0-9., ]*$/", $PresentAddress)) {
                $PresentAddressError = "Only letters, number and (. ,) are allowed!";
                $preaddressC = false;
                $emptyField = false;
            } else {
                $preaddressC = true;
                $changeStatus = true;
            }
        }
        if (!empty($_POST['permanentAddress'])) {
            $PresentAddress = $_POST['permanentAddress'];
            if (!preg_match("/^[A-Za-z0-9., ]*$/", $PermanentAddress)) {
                $PermanentAddressError = "Only letters, number and (. ,) are allowed!";
                $peraddressC = false;
                $emptyField = false;
            } else {
                $peraddressC = true;
                $changeStatus = true;
            }
        }
        if (!empty($_POST['password'])) {
            $Password = $_POST['password'];

            $UpperCase = preg_match("@[A-Z]@", $Password);
            $LowerCase = preg_match("@[a-z]@", $Password);
            $Number = preg_match("@[0-9]@", $Password);

            if (!$UpperCase || !$LowerCase || !$Number) {
                $PasswordError = "Password must contain 1 UPPERCASE, 1 LOWERCASE and 1 NUMBER";
                $emptyField = true;
                $passwordC = false;
            } else {
                $paswordC = true;
                $changeStatus = true;
            }
        }
        if (!empty($_POST['dob'])) {
            $DoB = Test_User_Input($_POST['dob']);
            $dobC = true;
            $changeStatus = true;
        }
        if (!empty($_POST['phoneNumber'])) {
            $PhoneNumber = $_POST['phoneNumber'];
            $pattern1 = preg_match("/\+?([0-9]{1,})([0-9]{11})/", $PhoneNumber);
            $pattern2 = preg_match("/^[0-9]{11}/", $PhoneNumber);
            if (!$pattern1 && !$pattern2) {
                $PhoneNumberError = "Invalid Format";
                $emptyField = true;
                $pnumberC = false;
            } else {
                $pnumberC = true;
                $changeStatus = true;
            }
        }
        if (!empty($_POST['bloodGroup'])) {
            $BloodGroup = $_POST['bloodGroup'];
            $bgroupC = true;
            $changeStatus = true;
        }


        if ($changeStatus) {
            if ($fnameC) {
                updateFirstName($FirstName, $id);
            }
            if ($lnameC) {
                updateLastName($LastName, $id);
            }
            if ($emailC) {
                updateEmail($Email, $id);
            }
            if ($genderC) {
                updateGender($Gender, $id);
            }
            if ($religionC) {
                updateReligion($Religion, $id);
            }
            if ($passwordC) {
                updatePassword($Password, $id);
            }
            if ($dobC) {
                updateDob($DoB, $id);
            }
            if ($pnumberC) {
                updatePhonenumber($PhoneNumber, $id);
            }
            if ($bgroupC) {
                updateBloodGroup($BloodGroup, $id);
            }
            if ($preaddressC) {
                updatePresentAddress($PresentAddress, $id);
            }
            if ($peraddressC) {
                updatePermanentAddress($PermanentAddress, $id);
            }
            $_SESSION['message'] = "Information Successfully Saved!";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['message'] = "No information Changed!";
            header("Location: index.php");
            exit();
        }
    }
}

function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
