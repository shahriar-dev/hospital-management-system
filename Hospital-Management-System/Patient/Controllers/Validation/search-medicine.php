<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../login-patient.php");
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['submit'])) {
            header("Location: buy-reserve-medicine.php");
        }
    }
}
