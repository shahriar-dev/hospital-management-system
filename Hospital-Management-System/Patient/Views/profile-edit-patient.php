<?php
require "../../../Hospital-Management-System/Patient/Controllers/Validation/profile-edit.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php ?></title>
    <link rel="stylesheet" href="./../assets/css/style-profileEdit.css">
</head>

<body class="main-div-profileEdit">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="container-profile">
            <div class="container-profile-left">
                <h1 class="container-profile-left-h1">Profile</h1>
                <h3 class="container-profile-left-h3">Basic Information</h3>
                <hr>
                <div class="container-profile-left-binfo">
                    <div class="container-profile-left-binfo-left">
                        <div class="binfo-left-data">
                            <div>
                                <h4 class="binfo-left-data-h4">First Name</h4>
                                <input type="text" name="firstName" value="" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $FirstName ?></input>
                            </div>
                            <div>
                                <h4 class="binfo-left-data-h4">Gender</h4>

                                <input type="radio" name="gender" value="Male" style="font-size: 16px; margin-bottom: 10px; color: #919aa3;">Male</input>
                                <input type="radio" name="gender" value="Female" style="font-size: 16px; margin-bottom: 10px; color: #919aa3;">Female</input>


                            </div>
                            <div>
                                <h4 class="binfo-left-data-h4">Religion</h4>

                                <select name="religion" id="input_religion" value="">
                                    <option disabled selected>--Choose a Option--</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christian">Christian</option>
                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="container-profile-left-binfo-right">
                        <div class="binfo-right-data">
                            <div>
                                <h4 class="binfo-right-data-h4">Last Name</h4>

                                <input type="text" name="lastName" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $LastName ?></input>

                            </div>
                            <div>
                                <h4 class="binfo-right-data-h4">Date of Birth</h4>

                                <input type="date" name="dob" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $DoB ?></input>

                            </div>
                            <div>
                                <h4 class="binfo-right-data-h4">Blood Group</h4>

                                <select name="bloodGroup" id="input_bloodGroup" value="">
                                    <option disabled selected>--Choose a Option--</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="container-profile-left-h3" style="color: #353c4e; letter-spacing:5px; text-transform:uppercase;">Contact Information</h3>
                <hr>
                <div class="container-profile-left-cinfo">

                    <div class="container-profile-left-cinfo-left">
                        <div class="cinfo-left-data">
                            <h4 class="cinfo-left-data-h4">Phone Number</h4>
                            <input type="tel" name="phoneNumber" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PhoneNumber ?></input>
                        </div>
                    </div>
                    <div class="cinfo-right">
                        <div class="cinfo-right-data">
                            <h4 class="cinfo-right-data-h4">Email</h4>
                            <input type="email" name="email" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Email ?></input>
                        </div>
                    </div>
                </div>

                <h3 class="container-profile-left-h3">Address</h3>
                <hr>
                <div class="container-profile-left-ainfo">

                    <div class="container-profile-left-ainfo-left">
                        <div class="ainfo-left-data">
                            <h4 class="ainfo-left-data-h4">Present Address</h4>
                            <textarea name="presentAddress" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PresentAddress ?></textarea>
                        </div>
                    </div>
                    <div class="container-profile-left-ainfo-right">
                        <div class="ainfo-right-data">
                            <h4 class="ainfo-right-data-h4">Permanent Address</h4>
                            <textarea name="permanentAddress" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PermanentAddress ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="linfo" style="margin-bottom: 25px;">
                    <h3 class="container-profile-left-h3">Login Information</h3>
                    <hr>
                    <div class="linfo-left">
                        <div class="linfo-left-data">
                            <div>
                                <h4 class="linfo-left-data-h4">Username</h4>
                                <input type="text" name="username" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Username ?></input>
                            </div>
                            <div>
                                <h4 class="linfo-left-data-h4">Password</h4>
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