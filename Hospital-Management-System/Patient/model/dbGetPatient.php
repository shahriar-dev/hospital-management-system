<?php

// require 'dbConnect.php';

function dbGetAllPatient()
{
    $connection = Connect();
    $query = "SELECT * from patient_information";
    $sql = $connection->prepare($query);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}

function dbLogin($username, $password)
{
    $connection = Connect();
    $query = "SELECT * FROM patient_information WHERE patient_username = ? AND patient_password =?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $username, $password);
    $sql->execute();
    $res = $sql->get_result();
    if ($res->num_rows === 1) {
        $result = mysqli_fetch_assoc($res);
        return $result['patient_id'];
    } else {
        return false;
    }
}
