<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        include "../Patient/Controllers/Include/header.php"
        ?>
    </div>
    <div style="position: absolute;  width: 100%; height: 100%; display:flex;">
        <div class="left" style="width: 20%; background:#fff; border-top-left-radius: 10px; border-bottom-left-radius: 10px; padding: 30px 25px;">
            <div>
                <a href="login-patient.php" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; 
                border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Home</a>
            </div>
            <div>
                <a href="login-patient.php" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white;
                border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Login</a>
            </div>
            <div>
                <h2>Profile Manager</h2>
                <ul>
                    <li><a href="registration-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Create Account</a></li>
                    <li><a href="profile-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">View Profile</a></li>
                    <li><a href="remove-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Remove</a></li>
                </ul>
            </div>
            <div>
                <h2>Medical Records</h2>
                <ul>
                    <li><a href="medical-records-all-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Show All</a></li>
                    <li><a href="add-medical-records-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Add Medical Records</a></li>
                </ul>
            </div>
            <div>
                <h2>Blood</h2>
                <ul>
                    <li><a href="blood-donation-history-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Blood Donation History</a></li>
                    <li><a href="blood-purchase-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Blood Purchase</a></li>
                </ul>
            </div>
            <div>
                <h2>Medicine Panel</h2>
                <ul>
                    <li><a href="search-buy-reserve-medicine-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                    border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Search Medicine</a></li>
                </ul>
            </div>
            <div>
                <a href="schedule-appointment-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Schedule a Appointment</a>
            </div>
            <div>
                <a href="search-reserve-cabin-patient.php" style="text-decoration: none; display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; 
                border:none; border-radius: 6px; max-width: 40%; text-decoration:none; text-align:center;" target="content-frame">Book Cabin</a>
            </div>
        </div>
        <div class="right" style="width: 80%; background:#fff; border-top-right-radius:10px; border-bottom-right-radius:10px;">
            <iframe src="welcome-page-patient.php" width="100%" height="100%" frameborder="0" name="content-frame"></iframe>
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