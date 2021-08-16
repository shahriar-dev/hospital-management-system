<?php
function Connect()
{
    $host = 'remotemysql.com';
    $db = '2gRx0RVjVI';
    $user = '2gRx0RVjVI';
    $pass = 'iqQ6PDjhKM';
    $charset = 'utf8mb4';
    try {
        $connection = new mysqli($host, $user, $pass, $db);
        return $connection;
    } catch (Exception $e) {
        $Message = "Database Connection Failed!";
    }
}
