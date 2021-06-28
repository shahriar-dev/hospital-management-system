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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div style="margin:20px 0 20px 0;">
        <?php
        include "../../Controllers/Include/header.php";
        ?>
    </div>
    <div style="margin: 0 10px 0 10px;">
        <?php
        include "../../Controllers/Include/navigation.php";
        ?>
    </div>
    <div class="box" style="position: absolute; top: 50%; left: 50%;transform:translate(-50%, -50%); width: 500px;">
        <h1 style="margin: 0 0 10px; padding: 0; color:#fff; font-size: 30px;">Search</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="searchbox" name="search" placeholder="Type..." style="position: relative; display: inline-block; font-size:20px; box-sizing: border-box; 
            width:340px; height:50px; border-radius: 25px 0 0 25px; outline:none; padding: 0 25px;">
            <input type="submit" name="submit" value="Search" style="position: relative; display: inline-block; font-size:20px; box-sizing: border-box; border-radius: 0 25px 25px 0; 
            border: none; background:#755BBD; color:#fff; width:150px; height:50px;">
        </form>
    </div>
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        include "../../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>