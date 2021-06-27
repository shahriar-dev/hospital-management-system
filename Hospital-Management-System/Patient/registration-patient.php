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

$flag = 0;
$emptyField = false;

define("filepath", "data/patient-details.txt");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
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
                "phoneNumber" => $PhoneNumber, "email" => $Email, "userName" => $Username, "password" => $Password,
            );
            $_SESSION['id'] = $Username;
            if (file_get_contents(filepath) != null) {

                $retrievedData = json_decode(file_get_contents(filepath));
                $retrievedData[] = $data;
                $result = file_put_contents(filepath, json_encode($retrievedData, JSON_PRETTY_PRINT));
                if ($result) {
                    header("Location: profile-patient.php");
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="registration-patient">
    <title>Registration - PATIENT</title>

</head>

<style>
</style>

<body style="background-image: url(img/undraw_medicine.svg); background-position:cover; background-size:700px 1200px; background-repeat:no-repeat;">
    <div style="border-radius: 15px 15px 0px 0px; background-color:rgb(0,0,0,6); margin:auto; color:#6460A4; width:800px;">
        <h1 align="center">Patient Resigtration</h1>
    </div>
    <div style="max-width: 600px;  margin: 0 auto;">
        <style>
            table {
                max-width: 600px;
                width: 450px;
                font-size: .8rem;
            }
        </style>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <div>
                    <fieldset>
                        <legend align="center">Basic Information</legend>
                        <table style="margin: 0 auto;">
                            <style>
                                td {
                                    max-width: 900px;
                                    padding: 10px 20px 10px 20px;
                                }
                            </style>
                            <tr>
                                <td><label for="input_firstname">First Name</label></td>
                                <td><input type="text" id="input_firstname" name="firstName" value="<?php echo $FirstName; ?>" placeholder="Enter your First Name"></td>
                                <td><label for="" style="color: red;"><?php echo $FirstNameError; ?></label></td>
                            </tr>
                            <tr>
                                <td><label for=" input_lastname">Last Name</label></td>
                                <td><input type="text" id="input_lastname" name="lastName" value="<?php echo $LastName; ?>" placeholder="Enter your Last Name"></td>
                                <td><label for="" style="color: red;"><?php echo $LastNameError; ?></label></td>
                            </tr>
                            <tr>
                                <td><label for=" input_gender">Gender</label></td>
                                <td>
                                    <input type="radio" id="input_gender" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male") echo "checked"; ?> value="Male">Male</input>
                                    <input type="radio" id="input_gender" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female") echo "checked"; ?> value="Female">Female</input>
                                </td>
                                <td><label for="" style="color: red;"><?php echo $GenderError; ?></label></td>
                            </tr>
                            <tr>
                                <td><label for="input_religion">Religion</label></td>
                                <td>
                                    <select name="religion" id="input_religion" value="">
                                        <option disabled selected value="default">--Choose a Option--</option>
                                        <option name="religion" <?php if (isset($_POST['religion']) && $_POST['religion'] == "muslim") echo "selected"; ?> value="Muslim">Muslim</option>
                                        <option name="religion" <?php if (isset($_POST['religion']) && $_POST['religion'] == "hindu") echo "selected"; ?> value="Hindu">Hindu</option>
                                        <option name="religion" <?php if (isset($_POST['religion']) && $_POST['religion'] == "christian") echo "selected"; ?> value="Christian">Christian</option>
                                    </select>
                                </td>
                                <td><label for="" style="color: red;"><?php echo $ReligionError; ?></label></td>
                            </tr>
                            <tr>
                                <td><label for="input_dob">Date of Birth</label></td>
                                <td><input type="date" id="input_dob" name="dob" value="<?php echo $DoB; ?>"></td>
                                <td><label for="" style="color: red;"><?php echo $DoBError; ?></label></td>
                            </tr>
                            <tr>
                                <td><label for="input_bloodgroup">Blood Group</label></td>
                                <td>
                                    <select name="bloodgroup" id="input_bloodgroup" value="">
                                        <option disabled selected value="default">--Choose a Option--</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A+") echo "selected"; ?> value="A+">A+</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A-") echo "selected"; ?> value="A-">A-</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B+") echo "selected"; ?> value="B+">B+</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B-") echo "selected"; ?> value="B-">B-</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O+") echo "selected"; ?> value="O+">O+</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O-") echo "selected"; ?> value="O-">O-</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB+") echo "selected"; ?> value="AB+">AB+</option>
                                        <option id="bloodgroup" name="bloodGroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB-") echo "selected"; ?> value="AB-">AB-</option>
                                    </select>
                                </td>
                                <td><label for="" style="color: red;"><?php echo $BloodGroupError; ?></label></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>


                <fieldset>
                    <legend align=" center">Contact Informatin</legend>
                    <table align="center">
                        <style>
                            td {
                                padding: 10px 20px 10px 20px;
                            }
                        </style>
                        <tr>
                            <td><label for="input_phonenumber">Phone Number</label></td>
                            <td><input type="tel" id="input_phonenumber" name="phoneNumber" value="<?php echo $PhoneNumber; ?>" placeholder="(+88)01xxxxxxxxx"></td>
                            <td><label for="" style="color: red;"><?php echo $PhoneNumberError; ?></label></td>
                        </tr>
                        <tr>
                            <td><label for=" input_email">Email</label></td>
                            <td><input type="email" id="input_email" name="email" value="<?php echo $Email; ?>" placeholder="something@gmail.com"></td>
                            <td><label for="" style="color: red;"><?php echo $EmailError; ?></label></td>
                        </tr>
                    </table>
                </fieldset>

                <fieldset>
                    <legend align=" center">Login Details</legend>
                    <table style="margin: 0 auto;">
                        <style>
                            td {
                                padding: 10px 20px 10px 20px;
                            }
                        </style>
                        <tr>
                            <td><label for="input_username">Username</label></td>
                            <td><input type="text" id="input_usernamme" name="userName" value="<?php echo $Username; ?>" placeholder="Type your username here"></td>
                            <td><label for="" style="color: red;"><?php echo $UsernameError; ?></label></td>
                        </tr>
                        <tr>
                            <td><label for=" input_password">Password</label></td>
                            <td><input type="password" id="input_password" name="password" value="<?php echo $Password; ?>" placeholder="Give a Password"></td>
                            <td><label for="" style="color: red;"><?php echo $PasswordError; ?></label></td>
                        </tr>
                    </table>
                </fieldset>
                </fieldset>
                <div>
                    <input type="submit" name="submit" value="Register" style="margin:3px; padding: 10px; font-size: 14px; background-color: #755BBD; color: #fff; border:none; border-radius: 6px; width: 100%; text-decoration:none; text-align:center; cursor:pointer">
                </div>
                <div>
                    <label for="" style="color: red;"><?php echo $ErrorMessage; ?></label>
                </div>
            </form>
        </div>

    </div>
</body>

</html>