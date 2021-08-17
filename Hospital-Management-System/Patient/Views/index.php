<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: asd.php");
}
require './../../../Hospital-Management-System/Patient/Controllers/Validation/data.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./../assets/css/style-home.css">
    <link rel="stylesheet" href="./../assets/css/sidebar-style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="main__container">
        <?php
        require "./../Controllers/Include/sidebar.php";
        ?>


        <div class="main">

            <div class="link nav selected">
                <div class="top__nav">
                    <a href="#" class="logo">Welcome, <?php if (isset($_SESSION['name'])) {
                                                            echo $_SESSION['name'];
                                                        } ?></a>
                    <nav class="navbar">
                        <a href="#home" class="h-link">Home</a>
                        <a href="#prevent" class="h-link">prevent</a>
                        <a href="#symptoms" class="h-link">symptoms</a>
                        <a href="#precautions" class="h-link">precautions</a>
                        <a href="#doctor" class="h-link">doctor</a>
                    </nav>
                </div>

                <section class="s home" id="home">
                    <div class="content">
                        <h1>Prevention From Corona Virus</h1>
                        <h3>Stay Home, Stay Safe</h3>
                        <a href="#" class="btn">how to prevent</a>
                    </div>
                </section>

                <section class="s prevent" id="prevent">
                    <h1 class="heading">how to prevent virus</h1>

                    <div class="box-container">
                        <div class="box">
                            <img src="./../assets/images/pre-1.png" alt="">
                            <h3>wash your place</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi deleniti optio magni accusantium numquam quaerat veritatis ipsa. Repellat ad iste, ex nemo voluptas ut consectetur autem libero sint quidem dolores?</p>
                        </div>
                        <div class="box">
                            <img src="./../assets/images/pre-2.png" alt="">
                            <h3>maintain distance</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi deleniti optio magni accusantium numquam quaerat veritatis ipsa. Repellat ad iste, ex nemo voluptas ut consectetur autem libero sint quidem dolores?</p>
                        </div>
                        <div class="box">
                            <img src="./../assets/images/pre-3.png" alt="">
                            <h3>don't touch face</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi deleniti optio magni accusantium numquam quaerat veritatis ipsa. Repellat ad iste, ex nemo voluptas ut consectetur autem libero sint quidem dolores?</p>
                        </div>
                        <div class="box">
                            <img src="./../assets/images/pre-4.png" alt="">
                            <h3>wash your hand</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi deleniti optio magni accusantium numquam quaerat veritatis ipsa. Repellat ad iste, ex nemo voluptas ut consectetur autem libero sint quidem dolores?</p>
                        </div>
                        <div class="box">
                            <img src="./../assets/images/pre-5.png" alt="">
                            <h3>use napkin</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi deleniti optio magni accusantium numquam quaerat veritatis ipsa. Repellat ad iste, ex nemo voluptas ut consectetur autem libero sint quidem dolores?</p>
                        </div>
                        <div class="box">
                            <img src="./../assets/images/pre-6.png" alt="">
                            <h3>wear a mask</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi deleniti optio magni accusantium numquam quaerat veritatis ipsa. Repellat ad iste, ex nemo voluptas ut consectetur autem libero sint quidem dolores?</p>
                        </div>
                    </div>
                </section>

                <section class="s symptoms" id="symptoms">
                    <h1 class="heading">covid-19 symptoms</h1>
                    <div class="column">
                        <div class="main-image">
                            <img src="./../assets/images/main-symp-img.png" alt="">
                        </div>
                        <div class="box-container">
                            <div class="box">
                                <img src="./../assets/images/symp-a.png" alt="">
                                <h3>dry cough</h3>
                            </div>

                            <div class="box">
                                <img src="./../assets/images/symp-b.png" alt="">
                                <h3>sore throat</h3>
                            </div>
                            <div class="box">
                                <img src="./../assets/images/symp-c.png" alt="">
                                <h3>cold</h3>
                            </div>
                            <div class="box">
                                <img src="./../assets/images/symp-d.png" alt="">
                                <h3>fever</h3>
                            </div>
                            <div class="box">
                                <img src="./../assets/images/symp-e.png" alt="">
                                <h3>headeche</h3>
                            </div>

                            <div class="box">
                                <img src="./../assets/images/symp-f.png" alt="">
                                <h3>vomiting</h3>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="s precautions" id="precautions">
                    <h1 class="heading">take precautions against covid-19</h1>
                    <div class="column">
                        <div class="box-container">
                            <h3 class="title">things you should DO</h3>

                            <div class="box">
                                <img src="./../assets/images/do-img1.png" alt="">
                                <div class="info">
                                    <h3>wash your hand</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vitae provident, rerum cumque, repudiandae voluptatibus quasi eaque doloribus id debitis dicta quaerat repellendus! Quae quasi vero accusamus porro ducimus provident.</p>
                                </div>
                            </div>

                            <div class="box">
                                <img src="./../assets/images/do-img2.png" alt="">
                                <div class="info">
                                    <h3>always wear mask</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vitae provident, rerum cumque, repudiandae voluptatibus quasi eaque doloribus id debitis dicta quaerat repellendus! Quae quasi vero accusamus porro ducimus provident.</p>
                                </div>
                            </div>

                            <div class="box">
                                <img src="./../assets/images/do-img3.png" alt="">
                                <div class="info">
                                    <h3>stay home during fever</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vitae provident, rerum cumque, repudiandae voluptatibus quasi eaque doloribus id debitis dicta quaerat repellendus! Quae quasi vero accusamus porro ducimus provident.</p>
                                </div>
                            </div>
                        </div>
                        <div class="box-container">
                            <h3 class="title">things you should NOT DO</h3>

                            <div class="box">
                                <img src="./../assets/images/dont-img1.png" alt="">
                                <div class="info">
                                    <h3>avoid close contact with animals</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vitae provident, rerum cumque, repudiandae voluptatibus quasi eaque doloribus id debitis dicta quaerat repellendus! Quae quasi vero accusamus porro ducimus provident.</p>
                                </div>
                            </div>

                            <div class="box">
                                <img src="./../assets/images/dont-img2.png" alt="">
                                <div class="info">
                                    <h3>avoid close contacts with peoples</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vitae provident, rerum cumque, repudiandae voluptatibus quasi eaque doloribus id debitis dicta quaerat repellendus! Quae quasi vero accusamus porro ducimus provident.</p>
                                </div>
                            </div>

                            <div class="box">
                                <img src="./../assets/images/dont-img3.png" alt="">
                                <div class="info">
                                    <h3>avoid crowded area</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vitae provident, rerum cumque, repudiandae voluptatibus quasi eaque doloribus id debitis dicta quaerat repellendus! Quae quasi vero accusamus porro ducimus provident.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <section class="s doctor" id="doctor">
                    <h1 class="heading">consult to our doctors</h1>
                    <div class="box-container">
                        <div class="box">
                            <img src="./../assets/images/doc1.png" alt="">
                            <h3>John Doe</h3>
                            <span>senior expert</span>
                            <div class="share">
                                <a href="" class="fab fa-whatsapp"></a>
                                <a href="" class="fab fa-facebook-f"></a>
                                <a href="" class="fab fa-twitter"></a>
                                <a href="" class="fab fa-instagram"></a>
                                <a href="" class="fab fa-linkedin"></a>
                            </div>
                        </div>

                        <div class="box">
                            <img src="./../assets/images/doc2.png" alt="">
                            <h3>John Smith</h3>
                            <span>senior expert</span>
                            <div class="share">
                                <a href="" class="fab fa-whatsapp"></a>
                                <a href="" class="fab fa-facebook-f"></a>
                                <a href="" class="fab fa-twitter"></a>
                                <a href="" class="fab fa-instagram"></a>
                                <a href="" class="fab fa-linkedin"></a>
                            </div>
                        </div>

                        <div class="box">
                            <img src="./../assets/images/doc3.png" alt="">
                            <h3>John Doe</h3>
                            <span>senior expert</span>
                            <div class="share">
                                <a href="" class="fab fa-whatsapp"></a>
                                <a href="" class="fab fa-facebook-f"></a>
                                <a href="" class="fab fa-twitter"></a>
                                <a href="" class="fab fa-instagram"></a>
                                <a href="" class="fab fa-linkedin"></a>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!-- Profile -->
            <div class="link">
                <?php
                include "./profile-patient.php";
                ?>
            </div>
            <!-- Appointment -->
            <div class="link nav">
                <div class="top__nav">
                    <a href="#" class="logo">Appointment</a>
                    <nav class="navbar">
                        <a id="schedule" class="cursor">Schedule Appointment</a>
                        <a id="viewall" class="cursor">View All</a>
                    </nav>
                </div>
                <section>
                    <?php include './schedule-appointment-patient.php' ?>
                </section>
            </div>
            <!-- Medicine -->
            <div class="link nav">
                <div class="top__nav">
                    <a href="#" class="logo">Medicine</a>
                    <nav class="navbar">
                        <a class="medicine-nav">
                            <i class='bx bx-purchase-tag'></i>
                            <span>Buy</span>
                        </a>
                        <a class="medicine-nav">
                            <i class='bx bx-cart'></i>
                            <span>Cart</span>
                        </a>
                        <a class="medicine-nav">
                            <i class="fas fa-history"></i>
                            <span>Order History</span>
                        </a>
                        <a class="medicine-nav">
                            <i class='bx bx-search'></i>
                            <span>Search</span>
                        </a>
                    </nav>
                </div>
                <div class="medicine-section">
                    <?php include './medicine/buy-reserve-medicine.php'; ?>
                </div>
                <div class="medicine-section">
                    <?php include './medicine/cart-medicine.php'; ?>
                </div>
                <div class="medicine-section">
                    <h1>Order History</h1>
                </div>
                <div class="medicine-section">
                    <?php include './medicine/search-medicine-patient.php' ?>
                </div>
            </div>
            <!-- Blood Bank -->
            <div class="link nav">
                <div class="top__nav">
                    <a href="#" class="logo">
                        <i class='bx bx-plus-medical'></i>
                        <span>BLOOD BANK</span>
                    </a>
                    <nav class="navbar">
                        <a id="donate" class="cursor">
                            <i class="fas fa-hand-holding-medical"></i>
                            <span>Donate</span></a>
                        <a id="purchase" class="cursor">
                            <i class="fas fa-shopping-cart"></i>

                            <span>Purchase</span></a>
                        <a id="history" class="cursor">
                            <i class="fas fa-history"></i>
                            <span>Donation History</span>
                        </a>
                    </nav>
                </div>
                <section>
                    <?php include './bloodbank/blood-donation-booking-patient.php' ?>
                </section>
            </div>
            <div class="link">

            </div>
            <!-- Medical Records -->
            <div class="link nav">
                <div class="top__nav">
                    <a href="#" class="logo">
                        <i class='bx bx-plus-medical'></i>
                        <span>Medical Records</span>
                    </a>
                    <nav class="navbar">
                        <a class="record-nav">
                            <i class="fas fa-file-upload"></i>
                            <span>Add</span>
                        </a>
                        <a class="record-nav">
                            <i class='bx bxs-file-archive'></i>
                            <span>View All</span>
                        </a>
                    </nav>
                </div>
                <div class="medical-record-section">
                    <?php include './medical-records/add-medical-records-patient.php'; ?>
                </div>
                <div class="medical-record-section">
                    <?php include './medical-records/medical-records-history-patient.php'; ?>
                </div>
            </div>

            <div class="link nav">

            </div>


            <div class="footer">
                <div class="box-container">
                    <div class="box">
                        <h3>about us</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium possimus, quas tenetur voluptatem quidem temporibus hic nobis vitae nulla minus explicabo? Perspiciatis doloremque soluta eligendi ad! Modi ea molestiae saepe.</p>
                    </div>

                    <div class="box">
                        <h3>locations</h3>
                        <a href="#">bangladesh</a>
                        <a href="#">USA</a>
                        <a href="#">france</a>
                        <a href="#">russia</a>
                        <a href="#">japan</a>
                    </div>

                    <div class="box">
                        <h3>quick links</h3>
                        <a href="#">home</a>
                        <a href="#">prevent</a>
                        <a href="#">symptoms</a>
                        <a href="#">doctor</a>
                    </div>

                    <div class="box">
                        <h3>follow us</h3>
                        <a href="#">facebook</a>
                        <a href="#">twitter</a>
                        <a href="#">instagram</a>
                        <a href="#">linkedin</a>
                        <a href="#">youtube</a>
                    </div>
                </div>

                <h1 class="credit"> created by <a href="#">S A</a> &copy; copyright @ 2021</h1>
            </div>
        </div>

        <div class="toggle">
            <ion-icon name="menu-outline" class="open"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
        </div>
    </div>


    <script src="./../../../Hospital-Management-System/Patient/assets/js/app_home.js"></script>
    <script>

    </script>
</body>

</html>