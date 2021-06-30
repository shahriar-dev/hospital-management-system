<?php
require "../../../Hospital-Management-System/Patient/Controllers/Validation/schedule-appointment.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="schedule-apointment-patient">
    <title>Schedule Appointment - Patient</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div style="margin:20px 0 20px 0;">
        <?php
        require '../Controllers/Include/header.php';
        ?>
    </div>

    <div style="margin: 0 10px 0 10px;">
        <?php
        include "../Controllers/Include/navigation.php";
        ?>
    </div>
    <div style="margin-top: 20px;">
        <h1>Schedule Appointment - Patient</h1>
        <hr>
        <div style="position:absolute; width: 100%; height: 100%; display:flex;">

            <div class="left" style="width:65%;">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="info" style="display: flex;">
                        <div style="margin-right: 50px;">
                            <h3>Appointment Date</h3>
                            <input type="date" name="appointmentdate" value="<?php echo $AppointmentDate; ?>">
                            <label for="appointmentDateError" style="display: block; color: red;"><?php echo $AppointmentDateError; ?></label>
                        </div>
                        <div style="margin-right: 50px;">
                            <h3>Department</h3>
                            <select name="department" id="input_department" value="" style="height:30px;">
                                <option disabled selected value="default">--Choose a Option--</option>
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
                            <label for="departmentError" style="color: red; display: block;"><?php echo $DepartmentError; ?></label>
                        </div>
                        <div style="margin-right: 50px;">
                            <h3>Doctor Name</h3>
                            <input type="text" name="consultant" value="<?php echo $ConsultantName; ?>" style="height: 18px;">
                            <label for="consultantError" style="color: red; display: block;"><?php echo $ConsultantNameError; ?></label>
                        </div>
                        <div style="margin-right: 50px;">
                            <h3>Time</h3>
                            <input type="time" name="appointmenttime" value="<?php echo $AppointmentTime; ?>" style="height: 18px;">
                            <label for="appointmentTimeError" style="color: red; display: block;"><?php echo $AppointmentTimeError; ?></label>
                        </div>
                        <div style="margin-right: 50px;">
                            <h3>Symptoms</h3>
                            <textarea type="textbox" name="symptoms" value="<?php echo $Symptoms; ?>" style="height: 18px;" placeholder="Write your symptoms here!"></textarea>
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Create" style="margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                        <input type="reset" name="reset" value="Try Again" style="margin:3px; padding: 10px; font-size: 14px; background-color: red; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                    </div>
                </form>

            </div>
            <div class="right" style=" width:35%; height:auto;">
                <div class="adetails">
                    <!-- <embed src="" type="aplication/pdf"> -->
                    <h1 align="center"><?php $Header; ?></h1>
                    <p>
                        <textarea name="appointmentDetails" cols="30" rows="10"><?php echo $AppointmentDetails; ?></textarea>
                    </p>
                </div>
            </div>
        </div>
        <div style="top: 90%; left:45%; position:fixed;">
            <hr>
            <?php
            include "../Controllers/Include/footer.php";
            ?>
        </div>
    </div>

</body>

</html>