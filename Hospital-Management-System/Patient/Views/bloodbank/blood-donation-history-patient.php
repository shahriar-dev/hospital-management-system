<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../login-patient.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation History</title>
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
        include "../../Controllers/Include/header.php";
        ?>
    </div>
    <div style="margin: 0 10px 0 10px;">
        <?php
        include "../../Controllers/Include/navigation.php";
        ?>
    </div>
    <div style="position: absolute; top: 20%; left:20%; width:1000px;">
        <h1>Blood Donation History</h1>
        <div>
            <table style="position: absolute; width:100%;" border="1px">
                <tr>
                    <th>Donation Date</th>
                    <th>Donation Time</th>
                    <th>Blood Group</th>
                    <th>Name</th>
                </tr>
                <?php
                define("filepath", "../../data/blooddonationbooking.json");
                $id = Test_User_Input($_SESSION['id']);
                $retrievedData = file_get_contents(filepath);
                if ($retrievedData != null) {
                    $retrievedData = json_decode($retrievedData);
                    foreach ($retrievedData as $user) {
                        if ($user->userName == $id) {
                            echo "
                                <tr> 
                                    <td>" . $user->donation . "</td>
                                    <td>" . $user->timeslot . "</td>
                                    <td>" . $user->bloodGroup . "</td>
                                    <td>" . $user->patientName . "</td>
                                </tr>";
                        }
                    }
                }
                function Test_User_Input($Data)
                {
                    return trim(htmlspecialchars(stripslashes($Data)));
                }
                ?>
            </table>
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