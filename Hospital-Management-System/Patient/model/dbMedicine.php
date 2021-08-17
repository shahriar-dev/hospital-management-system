<?php


function addMedicineOrder($mname, $mquantity, $mprice, $pid)
{
    require_once 'dbConnect.php';
    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }
    $query = "INSERT INTO medicine_purchaseDetails (mpurchase_medicineName, mpurchase_medicineQuantity, mpurchase_totalPrice, mpurhcase_datetime, mpurchase_patientId) VALUES (?, ?, ?, ?, ?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("sssss", $mname, $mquantity, $mprice, date("Y-m-d h:i"), $pid);
    return $sql->execute();
}
