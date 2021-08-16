<?php
// require 'dbConnect.php';

function insertPatient($username, $email, $password)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_username, patient_email, patient_password) VALUES (?, ?, ?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("sss", $username, $email, $password);
    return $sql->execute();
}

function addFirstName($firstname)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_firstName) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $firstname);
    return $sql->execute();
}

function addLastName($lastname)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_lastName) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $lastname);
    return $sql->execute();
}

function addGender($gender)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_gender) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $gender);
    return $sql->execute();
}

function addBloodGroup($bloodgroup)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_bloodGroup) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $bloodgroup);
    return $sql->execute();
}

function addPresentAddress($presentAddress)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_presentAddress) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $presentAddress);
    return $sql->execute();
}

function addPermanentAddress($permanentAddress)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_permanentAddress) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $permanentAddress);
    return $sql->execute();
}

function addDob($dob)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_dob) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $dob);
    return $sql->execute();
}

function addReligion($religion)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_religion) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $religion);
    return $sql->execute();
}

function addPhonenumber($phoneNumber)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_phoneNumber) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $phoneNumber);
    return $sql->execute();
}

function addPicture($picture)
{
    $connection = Connect();

    $query = "INSERT INTO patient_information (patient_picture) VALUES (?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("s", $picture);
    return $sql->execute();
}
