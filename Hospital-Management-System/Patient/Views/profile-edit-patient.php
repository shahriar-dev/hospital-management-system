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
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body style="background:#f3f3f3; background-image: url(../../Patient/img/undraw_profile_details.svg); background-position:right bottom; background-size:650px 700px; background-repeat:no-repeat; background-attachment: fixed; height:1000px;">
    <div>
        <?php
        include "../Controllers/Include/header.php";
        ?>
    </div>
    <div>
        <?php
        include "../Controllers/Include/navigation.php";
        ?>
    </div>
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
                            <input type="tel" name="phoneNumber" style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PhoneNumber ?></input>
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
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        include "../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>