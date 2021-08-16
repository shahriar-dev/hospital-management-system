<?php
// require "../../../Hospital-Management-System/Patient/Controllers/Validation/blood-donation-booking.php"; 
?>

<head>
    <link rel="stylesheet" href="./../assets/css/style-bloodbooking.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="container-booking">
    <div class="forms__container-booking">
        <div class="booking">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="booking-form" method="POST" onsubmit="generateDonationRequest(); return false;">
                <h2 class="title_booking">Blood Donation Booking</h2>
                <div class="input-field-booking">
                    <i class='bx bxs-calendar'></i>
                    <input type="date" name="" id="" placeholder="Select a Date" class="inputs-donation">
                </div>
                <div class="input-field-booking">
                    <i class='bx bxs-select-multiple'></i>
                    <select name="bloodgroup" id="input_bloodgroup" value="" class="inputs-donation">
                        <option disabled selected value="default">--Select Blood Group--</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A+") echo "selected"; ?> value="A+">A+</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A-") echo "selected"; ?> value="A-">A-</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B+") echo "selected"; ?> value="B+">B+</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B-") echo "selected"; ?> value="B-">B-</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O+") echo "selected"; ?> value="O+">O+</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O-") echo "selected"; ?> value="O-">O-</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB+") echo "selected"; ?> value="AB+">AB+</option>
                        <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB-") echo "selected"; ?> value="AB-">AB-</option>
                    </select>
                </div>
                <div class="input-field-booking">
                    <i class='bx bxs-time'></i>
                    <select name="timeslot" id="input_timeslot" value="" class="inputs-donation">
                        <option disabled selected value="default">--Select a Timeslot--</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "10:00AM - 10:30AM") echo "selected"; ?> value="10:00AM - 10:30AM">10:00AM - 10:30AM</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "10:30AM - 11:00AM") echo "selected"; ?> value="10:30AM - 11:00AM">10:30AM - 11:00AM</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "11:00AM - 11:30AM") echo "selected"; ?> value="11:00AM - 11:30AM">11:00AM - 11:30AM</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "11:30AM - 12:00PM") echo "selected"; ?> value="11:30AM - 12:00PM">11:30AM - 12:00PM</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "12:00PM - 12:30PM") echo "selected"; ?> value="12:00PM - 12:30PM">12:00PM - 12:30PM</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "12:30PM - 01:00PM") echo "selected"; ?> value="12:30PM - 01:00PM">12:30PM - 01:00PM</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "01:00PM - 01:30PM") echo "selected"; ?> value="01:00PM - 01:30PM">01:00PM - 01:30PM</option>
                        <option id="timeslot" name="timeslot" <?php if (isset($_POST['timeslot']) && $_POST['timeslot'] == "01:30PM - 02:00PM") echo "selected"; ?> value="01:30PM - 02:00PM">01:30PM - 02:00PM</option>
                    </select>
                </div>
                <div class="input-field-booking">
                    <i class="fas fa-user-injured"></i>
                    <textarea name="" id="" cols="25" rows="2" placeholder="Symptoms(Optional)" class="inputs-donation"></textarea>
                </div>

                <input type="submit" class="btn solid" value="submit" name="submit-donationRequest">
                <div class="message-blood">asdasdawdsadawdsad</div>
            </form>
        </div>
        <div class="all-donation">
            <h3>History - Blood Donation</h3>
            <div id="donationHistory-table">
            </div>
        </div>
    </div>

    <div class="panels-container-booking">
        <div class="panel-booking left-panel-booking">
            <div class="content-booking">
                <h3>View Donation History?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati saepe blanditiis alias et vel nesciunt iste, corrupti enim minima, similique, aspernatur cumque! Vero earum amet, delectus est blanditiis alias eligendi!</p>
                <button type="button" class="btn transparent" id="view-all-button-booking">View All</button>
            </div>
            <img src="./../assets/img/Doctor_Isometric.svg" alt="" class="image" />
        </div>
        <div class="panel-booking right-panel-booking">
            <div class="content-booking">
                <h3>Blood Donation Booking?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati saepe blanditiis alias et vel nesciunt iste, corrupti enim minima, similique, aspernatur cumque! Vero earum amet, delectus est blanditiis alias eligendi!</p>
                <button type="button" class="btn transparent" id="booking-button">booking</button>
            </div>
            <img src="./../assets/img/log.svg" alt="" class="image" />
        </div>
    </div>
</div>
<script src="./../assets/js/app_bloodBooking.js"></script>