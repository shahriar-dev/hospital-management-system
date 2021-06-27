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

$changeStatus = false;
$LoginSuccess = false;

$fnameC = $lnameC = $genderC = $religionC = $emailC = $usernameC = $passwordC = $dobC = $pnumberC = $bgroupC = false;
define("filepath", "data/patient-details.txt");


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['firstName'])) {
            $FirstName = Test_User_Input($_POST['firstName']);
            $fnameC = true;
            $changeStatus = true;
        }
        if (!empty($_POST['lastName'])) {
            $LastName = Test_User_Input($_POST['lastName']);
            $lnameC = true;
            $changeStatus = true;
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
            $emailC = true;
            $changeStatus = true;
        }
        if (!empty($_POST['username'])) {
            $Username = Test_User_Input($_POST['username']);
            $usernameC = true;
            $changeStatus = true;
        } else {
            $Username = $id;
        }
        if (!empty($_POST['password'])) {
            $password = Test_User_Input($_POST['password']);
            $paswordC = true;
            $changeStatus = true;
        }
        if (!empty($_POST['dob'])) {
            $DoB = Test_User_Input($_POST['dob']);
            $dobC = true;
            $changeStatus = true;
        }
        if (!empty($_POST['phoneNumber'])) {
            $PhoneNumber = Test_User_Input($_POST['phoneNumber']);
            $pnumberC = true;
            $changeStatus = true;
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body style="background:#f3f3f3; background-image: url(img/undraw_profile_details.svg); background-position:right bottom; background-size:650px 700px; background-repeat:no-repeat; background-attachment: fixed; height:1000px;">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div style="position: absolute; top: 50%; left:50%; transform:translate(-50%, -50%); width:1000px; height:75%; display:flex; box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);">
            <div class="left" style="width: 65%; background:#fff; border-top-right-radius: 5px; border-bottom-right-radius: 5px; padding: 30px 25px;">
                <h1 align="center" style="padding-bottom: 10px;">Profile</h1>
                <h3 style="color: #353c4e; letter-spacing:5px; text-transform:uppercase;">Basic Information</h3>
                <hr>
                <div class="binfo" style="display: flex; margin-bottom: 25px;">
                    <div class="binfo-left" style="width:45%;">
                        <div class="binfo-left-data">
                            <div>
                                <h4 style="color: 353c4e; margin-bottom: 5px;">First Name</h4>
                                <input type="text" name="firstName" value="" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $FirstName ?></input>
                            </div>
                            <div>
                                <h4 style="color: 353c4e; margin-bottom: 5px;">Gender</h4>

                                <input type="radio" name="gender" value="Male" style="font-size: 16px; margin-bottom: 10px; color: #919aa3;">Male</input>
                                <input type="radio" name="gender" value="Female" style="font-size: 16px; margin-bottom: 10px; color: #919aa3;">Female</input>


                            </div>
                            <div>
                                <h4 style="color: 353c4e; margin-bottom: 5px;">Religion</h4>

                                <select name="religion" id="input_religion" value="">
                                    <option disabled selected>--Choose a Option--</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christian">Christian</option>
                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="binfo-right">
                        <div class="binfo-right-data">
                            <div>
                                <h4 style="color: 353c4e; margin-bottom: 5px;">Last Name</h4>

                                <input type="text" name="lastName" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $LastName ?></input>

                            </div>
                            <div>
                                <h4 style="color: 353c4e; margin-bottom: 5px;">Date of Birth</h4>

                                <input type="date" name="dob" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $DoB ?></input>

                            </div>
                        </div>
                    </div>
                </div>
                <h3 style="color: #353c4e; letter-spacing:5px; text-transform:uppercase;">Contact Information</h3>
                <hr>
                <div class="cinfo" style="display: flex; margin-bottom: 25px;">

                    <div class="cinfo-left" style="width:45%;">
                        <div class="cinfo-left-data">
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Phone Number</h4>
                            <input type="tel" name="phoneNumber" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $FirstName ?>/input>
                        </div>
                    </div>
                    <div class="cinfo-right">
                        <div class="cinfo-right-data">
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Email</h4>
                            <input type="email" name="email" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Email ?></input>
                        </div>
                    </div>
                </div>

                <h3 style="color: #353c4e; letter-spacing:5px; text-transform:uppercase;">Address</h3>
                <hr>
                <div class="ainfo" style="display: flex; margin-bottom: 25px;">

                    <div class="ainfo-left" style="width:45%;">
                        <div class="ainfo-left-data">
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Present Address</h4>
                            <textarea name="presentAddress" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PresentAddress ?></textarea>
                        </div>
                    </div>
                    <div class="ainfo-right">
                        <div class="ainfo-right-data">
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Permanent Address</h4>
                            <textarea name="permanentAddress" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PermanentAddress ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="linfo" style="margin-bottom: 25px;">
                    <h3 style="color: #353c4e; letter-spacing:5px; text-transform:uppercase;">Login Information</h3>
                    <hr>
                    <div class="linfo-left">
                        <div class="linfo-left-data">
                            <div>
                                <h4 style="color: 353c4e; margin-bottom: 5px;">Username</h4>
                                <input type="text" name="username" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Username ?></input>
                            </div>
                            <div>
                                <h4 style="color: 353c4e; margin-bottom: 5px;">Password</h4>
                                <input name="password" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3; border:none; background: #f3f3f3;" type="password" value="">
                                <?php echo $Password ?></input>
                            </div>
                        </div>
                    </div>
                    <div class="linfo-right">
                        <div class="linfo-right-data">
                        </div>
                    </div>
                </div>
            </div>
            <div class="right" style="width: 35%;">
                <!-- Profile Picture of the patient -->
                <img src="" alt="user" width="100">
                <!-- Name of the Patient -->
                <h4><?php  ?></h4>
                <!-- Edit Profile Option -->
                <div style="margin: 10px 0px 10px 0px;">
                    <!-- <button type="submit" value="submit" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px;">Edit Profile</button> -->
                    <input type="submit" name="submit" value="Submit" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 25%; text-decoration:none; text-align:center;">
                    <input type="reset" name="reset" value="Reset" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 25%; text-decoration:none; text-align:center;">
                </div>
            </div>
        </div>
    </form>

</body>

</html>