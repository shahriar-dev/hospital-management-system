<?php
session_start();
$id = Test_User_Input($_SESSION['pid']);
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
define("filepath", "../data/patient-details.json");


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
            $PresentAddress = Test_User_Input($_POST['permanentAddress']);
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
            $Password = Test_User_Input($_POST['password']);

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
            $PhoneNumber = Test_User_Input($_POST['phoneNumber']);
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
            $BloodGroup = Test_User_Input($_POST['bloodGroup']);
            $bgroupC = true;
            $changeStatus = true;
        }
        $retrievedData = file_get_contents(filepath);
        $retrievedData = json_decode($retrievedData);
        if ($changeStatus) {
            $_SESSION['id'] = $Username;
            if ($retrievedData != null) {
                foreach ($retrievedData as $user) {
                    if ($user->userName == $id) {
                        if ($fnameC) {
                            $user->firstName = $FirstName;
                        }
                        if ($lnameC) {
                            $user->lastName = $LastName;
                        }
                        if ($emailC) {
                            $user->email = $Email;
                        }
                        if ($genderC) {
                            $user->gender = $Gender;
                        }
                        if ($religionC) {
                            $user->religion = $Religion;
                        }
                        if ($usernameC) {
                            $user->userName = $Username;
                        }
                        if ($passwordC) {
                            $user->password = $Password;
                        }
                        if ($dobC) {
                            $user->dob = $DoB;
                        }
                        if ($pnumberC) {
                            $user->phoneNumber = $PhoneNumber;
                        }
                        if ($bgroupC) {
                            $user->bloodGroup  = $BloodGroup;
                        }
                        if ($preaddressC) {
                            $user->presentAddress  = $PresentAddress;
                        }
                        if ($peraddressC) {
                            $user->permanentAddress  = $PermanentAddress;
                        }
                        break;
                    }
                }
                $data_en = json_encode($retrievedData, JSON_PRETTY_PRINT);
                file_put_contents(filepath, $data_en);
                $_SESSION['eid'] = $Username;
                $_SESSION['message'] = "Information Successfully Saved!";
                header("Location: profile-patient.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "No information Changed!";
            header("Location: profile-patient.php");
            exit();
        }
    }
}
$retrievedData = file_get_contents(filepath);
$retrievedData = json_decode($retrievedData);
if ($retrievedData != null) {
    foreach ($retrievedData as $user) {
        if ($user->userName == $id) {
            //echo $user->firstName;
            $FirstName = $user->firstName;
            $LastName = $user->lastName;
            $Gender = $user->gender;
            $Religion = $user->religion;
            $Email = $user->email;
            $Username = $user->userName;
            $Password = $user->password;
            $DoB = $user->dob;
            $PhoneNumber = $user->phoneNumber;
            $BloodGroup = $user->bloodGroup;

            $LoginSuccess = true;
            break;
        }
    }
} else {
    $Message = "The Database is Empty!";
}

if (!$LoginSuccess) {
    $Message = "User not found!";
}
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
