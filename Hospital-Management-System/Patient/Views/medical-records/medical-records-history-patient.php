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
    <title>Medical Records - History</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div style="margin: 20px 0 20px 0">
        <?php
        include "../../Controllers/Include/header.php";
        ?>
    </div>
    <div style="margin: 0 10px 0 10px;">
        <?php
        include "../../Controllers/Include/navigation.php";
        ?>
    </div>
    <div>
        <h1>Previous Medical Records</h1>
    </div>
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        require "../../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>