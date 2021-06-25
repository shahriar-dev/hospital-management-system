<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="registration-patient">
    <title>Registration - PATIENT</title>
</head>

<style>
</style>

<body style="background-image: url(img/undraw_medicine.svg); background-position:cover; background-size:700px 1200px; background-repeat:no-repeat;">
    <div style="border-radius: 15px 15px 0px 0px; background-color:rgb(0,0,0,6); margin:auto; color:#6460A4; width:800px;">
        <h1 align="center">Patient Resigtration</h1>
    </div>
    <div style="max-width: 600px;  margin: 0 auto;">
        <style>
            table {
                max-width: 600px;
                width: 450px;
                font-size: .8rem;
            }

            td {
                width: 280px;
            }
        </style>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <div>
                    <fieldset>
                        <legend align="center">Basic Information</legend>
                        <table style="margin: 0 auto;">
                            <style>
                                td {
                                    padding: 10px 20px 10px 20px;
                                }
                            </style>
                            <tr>
                                <td><label for="input_firstname">First Name</label></td>
                                <td><input type="text" id="input_firstname" name="firstName" placeholder="Enter your First Name"></td>
                                <td><label for=""></label></td>
                            </tr>
                            <tr>
                                <td><label for=" input_lastname">Last Name</label></td>
                                <td><input type="text" id="input_lastname" name="lastName" placeholder="Enter your Last Name"></td>
                                <td><label for=""></label></td>
                            </tr>
                            <tr>
                                <td><label for=" input_gender">Gender</label></td>
                                <td>
                                    <input type="radio" id="input_gender" name="gender" value="Male">Male</input>
                                    <input type="radio" id="input_gender" name="gender" value="Female">Female</input>
                                </td>
                                <td><label for=""></label></td>
                            </tr>
                            <tr>
                                <td><label for="input_religion">Religion</label></td>
                                <td>
                                    <select name="religion" id="input_religion" value="">
                                        <option disabled selected>--Choose a Option--</option>
                                        <option value=" muslim">Muslim</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="christian">Christian</option>
                                    </select>
                                </td>
                                <td><label for=""></label></td>
                            </tr>
                            <tr>
                                <td><label for="input_dob">Date of Birth</label></td>
                                <td><input type="date" id="input_dob" name="dob"></td>
                                <td><label for=""></label></td>
                            </tr>

                        </table>
                    </fieldset>
                </div>


                <fieldset>
                    <legend align=" center">Contact Informatin</legend>
                    <table align="center">
                        <style>
                            td {
                                padding: 10px 20px 10px 20px;
                            }
                        </style>
                        <tr>
                            <td><label for="input_phonenumber">Phone Number</label></td>
                            <td><input type="tel" id="input_phonenumber" name="phoneNumber" placeholder="(+88)01xxxxxxxxx"></td>
                            <td><label for=""></label></td>
                        </tr>
                        <tr>
                            <td><label for=" input_email">Email</label></td>
                            <td><input type="email" id="input_email" name="email" placeholder="something@gmail.com"></td>
                            <td><label for=""></label></td>
                        </tr>
                    </table>
                </fieldset>

                <fieldset>
                    <legend align=" center">Login Details</legend>
                    <table style="margin: 0 auto;">
                        <style>
                            td {
                                padding: 10px 20px 10px 20px;
                            }
                        </style>
                        <tr>
                            <td><label for="input_username">Username</label></td>
                            <td><input type="text" id="input_usernamme" name="userName" placeholder="Type your username here"></td>
                            <td><label for=""></label></td>
                        </tr>
                        <tr>
                            <td><label for=" input_password">Password</label></td>
                            <td><input type="password" id="input_password" name="password" placeholder="Give a Password"></td>
                            <td><label for=""></label></td>
                        </tr>
                    </table>
                </fieldset>
                </fieldset>

            </form>
        </div>

    </div>
</body>

</html>