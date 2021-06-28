<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Module</title>

</head>

<body>
    <div>
        <?php
        include "../Patient/Controllers/Include/header.php"
        ?>
    </div>

    <div style="width: 100%; background: #586ABB; color: #fff;">
        <h1 style="font-size: 60px; letter-spacing: 10px; font-style:italic;">Welcome to Patient Module</h1>
    </div>
    <div style="transform:translate(45%, 60%); color:#fff; ">
        <a href="../Patient/Views/login-patient.php" style="padding:0px 5px 0px 5px; font-size: 30px; letter-spacing:10px; text-decoration:none; border: 1px solid; background: #848CC5; color:#fff;
        border-radius: 20px;">Let's Go <strong>&#x2192;</strong></a>
    </div>
    <div style="top: 90%; left:50%; transform:translate(-90%, -50%); position:fixed;">
        <hr>
        <?php
        include "../Patient/Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>