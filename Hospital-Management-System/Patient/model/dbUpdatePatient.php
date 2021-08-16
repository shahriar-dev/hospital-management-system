<?php
require 'dbConnect.php';

function updateFirstName($firstname, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set (patient_firstName) = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $firstname, $id);
    return $sql->execute();
}

function updateLastName($lastname, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_lastName = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $lastname, $id);
    return $sql->execute();
}

function updateGender($gender, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_gender = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $gender, $id);
    return $sql->execute();
}

function updateBloodGroup($bloodgroup, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_bloodGroup = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $bloodgroup, $id);
    return $sql->execute();
}

function updatePresentAddress($presentAddress, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_presentAddress = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $presentAddress, $id);
    return $sql->execute();
}

function updatePermanentAddress($permanentAddress, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_permanentAddress = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $permanentAddress, $id);
    return $sql->execute();
}

function updateDob($dob, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_dob = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $dob, $id);
    return $sql->execute();
}

function updateReligion($religion, $id)
{
    $connection = Connect();

    $query = "INSERT patient_information Set patient_religion = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $religion, $id);
    return $sql->execute();
}

function updatePhonenumber($phoneNumber, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_phoneNumber WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $phoneNumber, $id);
    return $sql->execute();
}

function updatePicture($picture, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_picture = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $picture, $id);
    return $sql->execute();
}

function updatePassword($password, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_password = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('ss', $password, $id);
    return $sql->execute();
}

function updateEmail($email, $id)
{
    $connection = Connect();

    $query = "UPDATE patient_information Set patient_email = ? WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('ss', $email, $id);
    return $sql->execute();
}
