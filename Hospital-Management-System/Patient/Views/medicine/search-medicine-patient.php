<?php
require "../../../Hospital-Management-System/Patient/Controllers/Validation/search-medicine.php";
?>

<body>
    <h1 style="margin: 0 0 10px; padding: 10px 0 0 10px; color:black; font-size: 30px;">Search</h1>
    <hr>
    <div style="position: absolute; top: 50%; left: 50%;transform:translate(-50%, -50%); width: 500px;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="searchbox" name="search" placeholder="Type..." style="position: relative; display: inline-block; font-size:20px; box-sizing: border-box; 
            width:340px; height:50px; border-radius: 25px 0 0 25px; outline:none; padding: 0 25px;">
            <input type="submit" name="submit" value="Search" style="position: relative; display: inline-block; font-size:20px; box-sizing: border-box; border-radius: 0 25px 25px 0; 
            border: none; background:#755BBD; color:#fff; width:150px; height:50px;">
        </form>
    </div>
</body>