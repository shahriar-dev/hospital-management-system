<?php require "../../../../Hospital-Management-System/Patient/Controllers/Validation/blood-donation-booking.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div style="margin: 20px 0 20px 0;">
        <?php
        include "../../../../Hospital-Management-System/Patient/Controllers/Include/header.php";
        ?>
    </div>
    <div style="margin: 0 10px 0 10px;">
        <?php
        include "../../../../Hospital-Management-System/Patient/Controllers/Include/navigation.php";
        ?>
    </div>
    <h1>Blood Donation - Patient</h1>
    <hr>
    <div style="position:absolute; width: 100%; height: 100%; display:flex;">
        <div class="left" style="width:65%;">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="info" style="display: flex;">
                    <div style="margin-right: 80px;">
                        <h3>Blood Group</h3>
                        <select name="bloodgroup" id="input_bloodgroup" value="">
                            <option disabled selected value="default">--Choose a Option--</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A+") echo "selected"; ?> value="A+">A+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A-") echo "selected"; ?> value="A-">A-</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B+") echo "selected"; ?> value="B+">B+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B-") echo "selected"; ?> value="B-">B-</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O+") echo "selected"; ?> value="O+">O+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O-") echo "selected"; ?> value="O-">O-</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB+") echo "selected"; ?> value="AB+">AB+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB-") echo "selected"; ?> value="AB-">AB-</option>
                        </select>
                        <label for="bloodgroupError" style="color: red; display: block;"><?php echo $BloodGroupError; ?></label>
                    </div>
                    <div style="margin-right: 80px;">
                        <h3>Donation Date</h3>
                        <input type="date" name="donationdate" value="<?php echo $DonationDate; ?>" style="height: 18px;">
                        <label for="donationdateError" style="color: red; display: block;"><?php echo $DonationDateError; ?></label>
                    </div>
                    <div style="margin-right: 80px;">
                        <h3>Time Slot</h3>
                        <select name="timeslot" id="input_timeslot" value="">
                            <option disabled selected value="default">--Choose a Option--</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "10:00AM - 10:30AM") echo "selected"; ?> value="10:00AM - 10:30AM">10:00AM - 10:30AM</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "10:30AM - 11:00AM") echo "selected"; ?> value="10:30AM - 11:00AM">10:30AM - 11:00AM</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "11:00AM - 11:30AM") echo "selected"; ?> value="11:00AM - 11:30AM">11:00AM - 11:30AM</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "11:30AM - 12:00PM") echo "selected"; ?> value="11:30AM - 12:00PM">11:30AM - 12:00PM</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "12:00PM - 12:30PM") echo "selected"; ?> value="12:00PM - 12:30PM">12:00PM - 12:30PM</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "12:30PM - 01:00PM") echo "selected"; ?> value="12:30PM - 01:00PM">12:30PM - 01:00PM</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "01:00PM - 01:30PM") echo "selected"; ?> value="01:00PM - 01:30PM">01:00PM - 01:30PM</option>
                            <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "01:30PM - 02:00PM") echo "selected"; ?> value="01:30PM - 02:00PM">01:30PM - 02:00PM</option>
                        </select>
                        <label for="donationtimeslotError" style="color: red; display: block;"><?php echo $DonationTimeSlotError; ?></label>
                    </div>
                    <div style="margin-right: 80px;">
                        <h3>Remarks</h3>
                        <textarea type="textbox" name="remarks" value="<?php echo $Remarks; ?>" style="height: 18px;" rows="10" cols="30" placeholder="Reason of buying"></textarea>
                    </div>
                </div>
                <div>
                    <input type="submit" name="submit" value="Generate Booking" style="margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                    <input type="reset" name="reset" value="Try Again" style="margin:3px; padding: 10px; font-size: 14px; background-color: red; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                    <input type="text" for="" style="color: <?php echo $color; ?>; border:none;" value="<?php echo $Message; ?>" readonly>
                </div>
            </form>

        </div>
        <div class="right" style=" width:35%; height:auto;">
            <div class="bag">
                <!-- <embed src="" type="aplication/pdf"> -->
                <h1><?php echo $Header; ?></h1>
                <p>
                    <textarea name="bookingdetails" cols="30" rows="10"><?php echo $BookingDetails; ?></textarea>
                </p>

            </div>
        </div>
    </div>
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        include "../../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>