<?php
include 'basketCount.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <meta name="description"
        content="Get in touch with us with any queries, we are happy to help!">
    <meta name="author" content="Amber Degner-Budd">
    <meta name="keywords"
        content="Gift shop, Cafe, Scottish gifts, Handmade, Locally sourced, Scottish makers, Local makers">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="head">
        <header class="header">
            <div class="mobile-nav flex flex-between">
                <nav>
                    <div class="hamburger-container" id="toggle">
                        <div class="hamburger-1 hamburger">
                        </div>
                        <div class="hamburger-2 hamburger">
                        </div>
                        <div class="hamburger-3 hamburger">
                        </div>
                    </div>
                </nav>
                <ul class="navigation flex flex-col" id="myList">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Products.php">Shop</a></li>
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="cafe.php">Cafe</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                    <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart" style="color: #ffffff;"></i></a>
                    <a href="Cart.php"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>
                        <?php
                        // if basket is not empty - display this
                        echo "<div class='basket-counter'><p>{$basketCount}</p></div>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="desk-nav">

                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="Products.php">SHOP</a></li>
                    <li><a href="Gallery.php">GALLERY</a></li>
                    <li><a href="cafe.php">CAFE</a></li>
                    <li><a href="Contact.php">CONTACT US</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                    <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart" style="color: #ffffff;"></i></a>
                    <a href="Cart.php"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>
                        <?php
                        // if basket is not empty - display this
                        echo "<div class='basket-counter'><p>{$basketCount}</p></div>";
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="flex flex-center title">
            <a href="Home.php">
                <h1>Herringbone</h1>
            </a>
        </div>
    </div>

    <!-- banner img -->
     <!-- <div class="contact-banner flex">
        <div class="visit-banner">
            <h2>Visit Us</h2>
            <p>Located next to the Crown Hotel on the High Street, we're at the heart of Peebles. Pop in for a visit to say hello, browse our gifts or enjoy a lovely coffee upstairs.</p>
        </div>
     </div> -->

    <main>
        <div class="flex flex-col contact-desktop">
            <div class="form-cont flex-center">
                <div class="contact">
                    <div class="contact-title">
                        <h3 class="align">GET IN TOUCH</h3>
                    </div>
                    <form method="POST" class="flex flex-col">
                        <div>
                            <em><label for="name">Name</label></em>
                            <br>
                            <input name="name" type="text" class="form-name" required placeholder="Full Name">
                        </div>
                        <br>
                        <div>
                            <em><label for="email">Email Address</label></em>
                            <br>
                            <input name="email" type="email" required placeholder="email@example.com" class="form-email">
                        </div>
                        <br>
                        <div>
                            <em><label for="message">Message</label></em>
                            <br>
                            <textarea name="message" type="text" required class="message" placeholder="Write your message here..."></textarea>
                        </div>
                        <br>
                        <input type="submit" value="SEND" class="send">
                    </form>
                </div>
            </div>

            <!-- PHP for sending emails through form -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get form data
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $message = trim($_POST['message']);

                // Set email address that mail will be delivered to
                $to = "amber.db17@yahoo.com";
                $subject = "Herringbone Form Enquiry";

                // Create the email content
                $email_content = "Name: $name\n";
                $email_content .= "Email: $email\n";
                $email_content .= "Message:\n$message\n";

                // Create email headers that will show in inbox
                $headers = "From: $name <$email>\r\n";
                $headers .= "Reply-To: $email\r\n";

                // Send the email
                if (mail($to, $subject, $email_content, $headers)) {
                    // echo "<script>alert('Email sent successfully')</script>";
                } else {
                    // echo "<script>alert('Failed to send email')</script>";
                }
            }
            ?>

            <div class="flex flex-col contact-info">
                <div class="visitUs">
                    <h3><strong>Visit Us</strong></h3>
                    <p>OPENING HOURS</p>
                    <div class="flex opening-times">
                        <div class="flex-start">
                            <p><strong>Monday-Friday:</strong></p>
                            <p><strong>Saturday:</strong></p>
                            <p><strong>Sunday:</strong></p>
                        </div>
                        <div class="flex-start times">
                            <p>10am - 4pm</p>
                            <p>10am - 3pm</p>
                            <p>Closed</p>
                        </div>
                    </div>
                </div>
                <div class="details flex flex-col">
                    <div class="flex flex-even phone">
                        <i class="fa-solid fa-phone"></i>
                        <p>01721 749 749</p>
                    </div>
                    <div class="flex flex-even email">
                        <i class="fa-solid fa-envelope"></i>
                        <p>info@herringbone.co.uk</p>
                    </div>
                    <div>
                        <p>56 High Street<br>Peebleshire<br>EH45 8SW</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="map flex-center">
            <iframe id="map-canvas" class="map_part radius" width="400" height="200" frameborder="0" scrolling="no"
                marginheight="0" marginwidth="0"
                src="https://maps.google.com/maps?hl=en&amp;q=56 high street peebles&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        </div>



    </main>




    <footer>
        <div class="flex-center">
            <img src="images/cards.jpg" class="cards">
        </div>

        <div class="footer-flex">
            <div class="flex flex-between ft-info">
                <div class="visit">
                    <h6>Visit Us</h6>
                    <p>56 High Street<br>Peebleshire<br>EH45 8SW</p>
                </div>
                <div>
                    <h6>Opening Hours</h6>
                    <p>Mon-Sat: 10-4<br>Sat: 10-4<br>Sun: 10-4</p>
                </div>
            </div>
            <div class="flex flex-between">
            <div class="footer-links links">
                            <h6>Important Links</h6>
                            <a>
                                <p>About Us</p>
                            </a>
                            <a>
                                <p>Cookies Policy</p>
                            </a>
                            <a>
                                <p>Privacy Policy</p>
                            </a>
                            <a>
                                <p>Delivery & Returns</p>
                            </a>
                        </div>
                <div class="flex flex-between">
                    <div class="footer-links ft-contact">
                        <h6>Get In Touch</h6>
                        <a href="Contact.php">
                            <p>Contact Us</p>
                        </a>
                        <p>01721 748 376</p>
                        <p>info@herringbone.co.uk</p>
                    </div>
                </div>

            </div>
        </div>

        <div class=" flex flex-center socials">
            <a href="https://www.facebook.com/Herringbonegiftspeebles/" target="_blank"><img src="images/facebook.png"
                    alt="Facebook Icon" width="20px"></a>
            <a href=""><img src="images/instagram.png" alt="Instagram Icon" width="25px"></a>
        </div>
        <div class="flex flex-center">
            <p>Herringbone 2025 ©</p>
        </div>
    </footer>
    <script>
        document.getElementById('toggle').addEventListener('click', function () {
            const border = document.querySelector('.header');
            border.classList.toggle('shrink'); // Add or remove the 'shrink' class
        });
    </script>
    <script src="navigation.js"></script>
    <script>
      AOS.init({
    offset: 100, 
    easing: 'ease-in-out',
    once: true 
});
    </script>
</body>

</html>