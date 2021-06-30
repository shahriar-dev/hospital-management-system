<?php
require "../../../Hospital-Management-System/Patient/Controllers/Validation/registration-validation.php";
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
    <div>
        <?php
        require "../Controllers/Include/header.php";
        ?>
    </div>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
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
                    <input type="submit" name="register" value="Register" style="margin:3px; padding: 10px; font-size: 14px; background-color: #755BBD; color: #fff; border:none; border-radius: 6px; width: 100%; text-decoration:none; text-align:center; cursor:pointer">
                </div>
                <div>
                    <input type="submit" name="back" value="Already Registered? Click here!" style="margin:3px; padding: 10px; font-size: 14px; background-color: #755BBD; color: #fff; border:none; border-radius: 6px; width: 100%; text-decoration:none; text-align:center; cursor:pointer">
                </div>
                <div>
                    <label for="" style="color: red;"><?php echo $ErrorMessage; ?></label>
                </div>
            </form>
        </div>

    </div>
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        include "../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>