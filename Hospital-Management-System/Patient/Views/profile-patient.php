    <?php
    require "../../../Hospital-Management-System/Patient/Controllers/Validation/profile-patient-validation.php";
    ?>

    <head>
        <link rel="stylesheet" href="../../../Hospital-Management-System/Patient/assets/css/style-profile.css">
    </head>
    <div class="main-div-profile">
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
                                <p class="binfo-left-data-p"><?php echo $FirstName; ?></p>
                            </div>
                            <div>
                                <h4 class="binfo-left-data-h4">Gender</h4>
                                <p class="binfo-left-data-p"><?php echo $Gender; ?></p>
                            </div>
                            <div>
                                <h4 class="binfo-left-data-h4">Religion</h4>
                                <p class="binfo-left-data-p"><?php echo $Religion; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container-profile-left-binfo-right">
                        <div class="binfo-right-data">
                            <div>
                                <h4 class="binfo-right-data-h4">Last Name</h4>
                                <p class="binfo-right-data-p"><?php echo $LastName; ?></p>
                            </div>
                            <div>
                                <h4 class="binfo-right-data-h4">Date of Birth</h4>
                                <p class="binfo-right-data-p"><?php echo $DoB; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="container-profile-left-h3">Contact Information</h3>
                <hr>
                <div class="container-profile-left-cinfo">
                    <div class="container-profile-left-cinfo-left">
                        <div class="cinfo-left-data">
                            <h4 class="cinfo-left-data-h4">Phone Number</h4>
                            <p class="cinfo-left-data-p"><?php echo $PhoneNumber; ?></p>
                        </div>
                    </div>
                    <div class="cinfo-right">
                        <div class="cinfo-right-data">
                            <h4 class="cinfo-right-data-h4">Email</h4>
                            <p class="cinfo-right-data-p"><?php echo $Email; ?></p>
                        </div>
                    </div>
                </div>

                <h3 class="container-profile-left-h3">Address</h3>
                <hr>
                <div class="container-profile-left-ainfo">
                    <div class="container-profile-left-ainfo-left">
                        <div class="ainfo-left-data">
                            <h4 class="ainfo-left-data-h4">Present Address</h4>
                            <p class="ainfo-left-data-p"><?php echo $PresentAddress; ?></p>
                        </div>
                    </div>
                    <div class="container-profile-left-ainfo-right">
                        <div class="ainfo-right-data">
                            <h4 class="ainfo-right-data-h4">Permanent Address</h4>
                            <p class="ainfo-right-data-p"><?php echo $PermanentAddress; ?></p>
                        </div>
                    </div>
                </div>

                <div class="linfo">
                    <h3 class="container-profile-left-h3">Login Information</h3>
                    <hr>
                    <div class="linfo-left">
                        <div class="linfo-left-data">
                            <div>
                                <h4 class="linfo-left-data-h4">Username</h4>
                                <p class="linfo-left-data-p"><?php echo $Username; ?></p>
                            </div>
                            <div>
                                <h4 class="linfo-left-data-h4">Password</h4>
                                <input class="linfo-left-data-p" type="password" value="<?php echo $Password; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="linfo-right">
                        <div class="linfo-right-data">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-profile-right" style="width: 35%;">
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