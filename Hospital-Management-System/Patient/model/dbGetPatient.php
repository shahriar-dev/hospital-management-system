<?php


function dbGetAllPatient()
{
    require_once 'dbConnect.php';
    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }
    $query = "SELECT * from patient_information";
    $sql = $connection->prepare($query);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}

function dbLogin($username, $password)
{
    require_once 'dbConnect.php';
    $connection = Connect();
    $query = "SELECT * FROM patient_information WHERE patient_username = ? AND patient_password =?";
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }
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

function dbGetPatientInfo($id)
{
    require_once 'dbConnect.php';
    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }

    $query = "SELECT * FROM patient_information WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $id);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}

function dbGetPatientName($id)
{
    require_once 'dbConnect.php';
    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }

    $query = "SELECT * FROM patient_information WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $id);
    $sql->execute();
    $res = $sql->get_result();
    if ($res->num_rows === 1) {
        $result = mysqli_fetch_assoc($res);
        $name = $result['patient_firstName'] . " " . $result['patient_lastName'];
        return $name;
    } else {
        return false;
    }
}

function dbGetPatientId($uname)
{
    require_once 'dbConnect.php';
    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }

    $query = "SELECT * FROM patient_information WHERE patient_username = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $uname);
    $sql->execute();
    $res = $sql->get_result();
    if ($res->num_rows === 1) {
        $result = mysqli_fetch_assoc($res);
        $id = $result['patient_id'];
        return $id;
    } else {
        return false;
    }
}
