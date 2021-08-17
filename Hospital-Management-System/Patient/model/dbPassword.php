<?php
function  changePassword($uname, $em, $pass)
{
    require "dbConnect.php";

    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }

    $query = "UPDATE patient_information SET patient_password = ? WHERE patient_username = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $pass, $uname);
    return $sql->execute();
}
