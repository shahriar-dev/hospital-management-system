<?php
// require "../../../Hospital-Management-System/Patient/Controllers/Validation/schedule-appointment.php";
?>
<!-- <!DOCTYPE html>
<html lang="en"> -->

<head>
    <link rel="stylesheet" href="./../assets/css/style_appointment.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<!-- <body> -->
<div class="container">
    <div class="forms__container">
        <div class="schedule">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="schedule-form" method="POST" onsubmit="scheduleAppointment(); return false;">
                <h2 class="title_appointment">Schedule Appointment</h2>
                <div class="input-field">
                    <i class='bx bxs-calendar'></i>
                    <input type="date" name="appointmentdate" id="" placeholder="Select a Date" class="inputs-schedule">
                </div>
                <div class="input-field">
                    <i class='bx bxs-select-multiple'></i>
                    <select name="department" id="input_department" class="inputs-schedule" value="">
                        <option disabled selected value="default">--Select Department--</option>
                        <option id="deparment" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Medicine") echo "selected"; ?> value="Medicine">Medicine</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Arthopedic") echo "selected"; ?> value="Arthopedic">Arthopedic</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Neuromedicine") echo "selected"; ?> value="Neuromedicine">Neuromedicine</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Neurosurgeon") echo "selected"; ?> value="Neurosurgeon">Neurosurgeon</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Dermatologist") echo "selected"; ?> value="Dermatologist">Dermatologist</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Psychiatrist") echo "selected"; ?> value="Psychiatrist">Psychiatrist</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Cardiologist") echo "selected"; ?> value="Cardiologist">Cardiologist</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Paediatrician") echo "selected"; ?> value="Paediatrician">Paediatrican</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Dentistry") echo "selected"; ?> value="Dentistry">Dentistry</option>
                        <option id="department" name="department" <?php if (isset($_POST['department']) && $_POST['department'] == "Gynecologist") echo "selected"; ?> value="Gynecologist">Gynecologist</option>
                    </select>
                </div>
                <div class="input-field">
                    <i class="fas fa-user-md"></i>
                    <input type="text" name="consultant" id="" placeholder="Give Doctor Preferences" class="inputs-schedule">
                </div>
                <div class="input-field">
                    <i class='bx bxs-time'></i>
                    <input type="time" name="appointmenttime" class="inputs-schedule" id="">
                </div>
                <div class="input-field">
                    <i class="fas fa-user-injured"></i>
                    <textarea name="symptoms" id="" cols="25" rows="2" class="inputs-schedule" placeholder="Symptoms(Optional)"></textarea>
                </div>

                <input type="submit" class="btn solid" value="submit" name="submit-appointment">
                <div class="message">
                    <?php echo "asdasdasd"; ?>
                </div>
            </form>
        </div>
        <div class="all-appointment">
            <h3>Appointments</h3>
            <div id="appointment-table">
            </div>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>View All Appointment?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati saepe blanditiis alias et vel nesciunt iste, corrupti enim minima, similique, aspernatur cumque! Vero earum amet, delectus est blanditiis alias eligendi!</p>
                <button type="button" class="btn transparent" id="view-all-button">View All</button>
            </div>
            <img src="./../assets/img/Doctor_Isometric.svg" alt="" class="image" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Schedule Appointment?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati saepe blanditiis alias et vel nesciunt iste, corrupti enim minima, similique, aspernatur cumque! Vero earum amet, delectus est blanditiis alias eligendi!</p>
                <button type="button" class="btn transparent" id="schedule-button">Schedule</button>
            </div>
            <img src="./../assets/img/log.svg" alt="" class="image" />
        </div>
    </div>
</div>
<script src="./../assets/js/app-schedule.js"></script>