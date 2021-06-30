<?php
$Username = $UsernameError = $Password = $PasswordError = $ConfirmPassword = $ConfirmPasswordError = $Message = $Email = $EmailError = "";
define("filepath", "../data/patient-details.json");
$emptyField = true;
$changeStatus = false;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username'])) {
            $Username = Test_User_Input($_POST['username']);
            $emptyField = false;
        } else {
            $UsernameError = "You must give your username!";
            $emptyField = true;
        }
        if (!empty($_POST['email'])) {
            $Email = Test_User_Input($_POST['email']);
            $emptyField = false;
        } else {
            $EmailError = "You must provide email associated with your account!";
            $emptyField = true;
        }
        if (!empty($_POST['password'])) {
            $Password = Test_User_Input($_POST['password']);
            $emptyField = false;
        } else {
            $PasswordError = "Give a new Password!";
            $emptyField = true;
        }
        if (!empty($_POST['confirmpassword'])) {
            $ConfirmPassword = Test_User_Input($_POST['confirmpassword']);
            $emptyField = false;
        } else {
            $ConfirmPasswordError = "Give a new Password again!";
            $emptyField = true;
        }

        if (!$emptyField) {
            $retrievedData = file_get_contents(filepath);
            if ($retrievedData != null) {
                $retrievedData = json_decode($retrievedData);
                $count = count($retrievedData) - 1;
                for ($i = 0; $i < count($retrievedData); $i++) {
                    $user = $retrievedData[$i];
                    if ($user->userName == $Username) {
                        if ($user->email == $Email) {
                            if ($Password == $ConfirmPassword) {
                                $user->password = $ConfirmPassword;
                                $changeStatus = true;
                                break;
                            } else {
                                $Message = "Password & Confirmed Password does not MATCH! Try Again...";
                                $color = "red";
                                $changeStatus = false;
                                break;
                            }
                        } else {
                            $Message = "Email does not match";
                            $color = "red";
                            $changeStatus = false;
                            break;
                        }
                    }
                    if ($i == $count) {
                        $Message = "User not found!";
                        $color = "red";
                        $changeStatus = false;
                        break;
                    }
                }
                if ($changeStatus) {
                    $data_en = json_encode($retrievedData, JSON_PRETTY_PRINT);
                    file_put_contents(filepath, $data_en);
                    $Message = "Password Changed Successfully!";
                    $color = "green";
                }
            }
        }
    }
}
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
