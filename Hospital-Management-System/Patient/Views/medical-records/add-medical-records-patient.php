<?php
// session_start();
// if (!isset($_SESSION['id'])) {
//     header("location: ../login-patient.php");
//     exit();
// }
?>

<head>
    <meta name="description" content="medical-records">
    <link rel="stylesheet" href="./../assets/css/style-medicalRecords.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<div class="mr">
    <div class="wrapper-mr">
        <header>Add Medical Records</header>
        <form action="#" class="form-mr" method="POST">
            <input type="file" class="file-input" name="file" hidden>
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Browse file to upload</p>
        </form>
        <div class="section-mr progress-area"></div>
        <div class="section-mr uploaded-area"></div>
        <div class="echo"></div>
    </div>

    <script src="./../assets/js/app_medicalRecords.js"></script>
</div>