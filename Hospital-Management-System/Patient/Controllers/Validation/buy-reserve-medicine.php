<?php
session_start();

require './../../model/dbMedicine.php';

$Header = $MedicineType = $MedicineTypeError = $MedicineName = $MedicineNameError = $PerPieceCostError = $CostError = $Remarks = $RemarksError = $Quantity =  $QuantityError = "";
$PerPieceCost = 10;
$Cost = 0;
$emptyField = false;
$BagDetails = "";
$Message = "";


if (!isset($_SESSION['id'])) {

    // header("location: ../login-patient.php");
    exit();
} else {
    $id = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (empty($_POST['medicineName'])) {
            $MedicineNameError = "Enter Name";
            $emptyField = true;
        } else {
            $MedicineName = $_POST['medicineName'];
        }
        if (empty($_POST['quantity'])) {
            $QuantityError = "Give QUANTITY!";
            $emptyField = true;
        } else {
            $Quantity = $_POST['quantity'];
            if ($Quantity == 0) {
                $QuantityError = "Value must be > 0";
                $emptyField = true;
            }
        }
        if (empty($_POST['price'])) {
            $emptyField = true;
        } else {
            $Cost = $_POST['price'];
        }

        if (!$emptyField) {
            $response = addMedicineOrder($MedicineName, $Quantity, $Cost, $id);
            if ($response) {
                echo "Successfully Place Order!";
            }
        } else {
            echo "Please Complete the Required FIELDS!";
        }
    }
}
