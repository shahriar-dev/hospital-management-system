<?php
require "../../../Hospital-Management-System/Patient/Controllers/Validation/profile-patient-validation.php";
?>
<div style="background:#f3f3f3;">
    <div style="position: absolute; top: 35%; left:50%; transform:translate(-50%, -50%); width:1000px; display:flex; box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08); ">
        <div class="left" style="width: 65%; background:#fff; border-top-right-radius: 5px; border-bottom-right-radius: 5px; padding: 30px 25px;">
            <h1 align="center" style="padding-bottom: 10px;">Profile</h1>
            <h3 style="color: #353c4e; letter-spacing:5px; text-transform:uppercase;">Basic Information</h3>
            <hr>
            <div class="binfo" style="display: flex; margin-bottom: 25px;">
                <div class="binfo-left" style="width:45%;">
                    <div class="binfo-left-data">
                        <div>
                            <h4 style="color: 353c4e; margin-bottom: 5px;">First Name</h4>
                            <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $FirstName; ?></p>
                        </div>
                        <div>
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Gender</h4>
                            <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Gender; ?></p>
                        </div>
                        <div>
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Religion</h4>
                            <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Religion; ?></p>
                        </div>
                    </div>
                </div>
                <div class="binfo-right">
                    <div class="binfo-right-data">
                        <div>
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Last Name</h4>
                            <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $LastName; ?></p>
                        </div>
                        <div>
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Date of Birth</h4>
                            <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $DoB; ?></p>
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
                        <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PhoneNumber; ?></p>
                    </div>
                </div>
                <div class="cinfo-right">
                    <div class="cinfo-right-data">
                        <h4 style="color: 353c4e; margin-bottom: 5px;">Email</h4>
                        <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Email; ?></p>
                    </div>
                </div>
            </div>

            <h3 style="color: #353c4e; letter-spacing:5px; text-transform:uppercase;">Address</h3>
            <hr>
            <div class="ainfo" style="display: flex; margin-bottom: 25px;">

                <div class="ainfo-left" style="width:45%;">
                    <div class="ainfo-left-data">
                        <h4 style="color: 353c4e; margin-bottom: 5px;">Present Address</h4>
                        <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PresentAddress; ?></p>
                    </div>
                </div>
                <div class="ainfo-right">
                    <div class="ainfo-right-data">
                        <h4 style="color: 353c4e; margin-bottom: 5px;">Permanent Address</h4>
                        <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $PermanentAddress; ?></p>
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
                            <p style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3;"><?php echo $Username; ?></p>
                        </div>
                        <div>
                            <h4 style="color: 353c4e; margin-bottom: 5px;">Password</h4>
                            <input style="display: block; font-size: 16px; margin-bottom: 10px; color: #919aa3; border:none; background: #f3f3f3;" type="password" value="<?php echo $Password; ?>" readonly>
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
            <h4><?php echo $Message; ?></h4>
            <!-- Edit Profile Option -->
            <div style="margin: 10px 0px 10px 0px;">
                <!-- <button type="submit" value="submit" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px;">Edit Profile</button> -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"><a href="profile-edit-patient.php" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;" onclick="<?php $_SESSION['pid'] = $Username; ?>">Edit Profile</a></form>
            </div>
        </div>
    </div>
</div>