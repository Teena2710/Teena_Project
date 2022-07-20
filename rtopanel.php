<?php
session_start();
// echo $_SESSION['email'];
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>RTO  - Regional Transport Authority</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
               <script type="text/javascript">
  window.history.forward();
  function noBack() {
      window.history.forward();
  }
</script>
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
                                <h1>RTO</h1>
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Opening Hour</h3>
                                        <p>Mon - Fri, 8:00 - 5:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>info@example.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                          
                           <!--<a href="service.html" class="nav-item nav-link">Service</a>--> 
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                                <div class="dropdown-menu">
                                    
                                    <a href="rto_drivinglic.php" class="dropdown-item">Driving License</a>
                                    <a href="rto_duplicatelic.php" class="dropdown-item">Duplicate License</a>
                                    <a href="rto_ownership.php" class="dropdown-item">Ownership Transfer</a>
                                    <a href="rto_renewal.php" class="dropdown-item">Renewal License</a>
                                    <a href="rto_vreg.php" class="dropdown-item">Vehicle Registration</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Generated List</a>
                                <div class="dropdown-menu">
                                    
                                    <a href="drivinglic_approve.php" class="dropdown-item">Driving License</a>
                                    <a href="duplicatelic_approve.php" class="dropdown-item">Duplicate License</a>
                                    <a href="Ownership_approve.php" class="dropdown-item">Ownership Transfer</a>
                                    <a href="renewal_approve.php" class="dropdown-item">Renewal License</a>
                                    <a href="vreg_approve.php" class="dropdown-item">Vehicle Registration</a>
                                </div>
                            </div>
                            <?php if(@$_GET['q']==4) echo'class="active"'; ?><a href="dash.php?q=4" class="nav-item nav-link">Add Exams</a>
                            <a href="number.php" class="nav-item nav-link">Number Plate</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Certificates</a>
                                <div class="dropdown-menu">
                                    
                                    <a href="drivinglic_certificate.php" class="dropdown-item">Driving License</a>
                                    <a href="duplicatelic_certificate.php" class="dropdown-item">Duplicate License</a>
                                    <a href="ownership_certificate.php" class="dropdown-item">Ownership Transfer</a>
                                    <a href="renewal_certificate.php" class="dropdown-item">Renewal License</a>
                                    <a href="vehicle_certificate.php" class="dropdown-item">Vehicle Registration</a>
                                </div>
                            </div>
                            <a href="appointment_approval.php" class="nav-item nav-link">Appointment</a>
                            <a href="rto_ins_vehicle.php" class="nav-item nav-link">Institution Vehicle</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profile</a>
                                <div class="dropdown-menu">
                                    
                                    <a href="forgot_password.php" class="dropdown-item">Change Password</a>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                  
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->


        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/pic4.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            
                            <h3>REGIONAL TRANSPORT AUTHORITY</h3>
                            <h1>USE HELMET ENSURE SAFETY</h1>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/pic1.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>REGIONAL TRANSPORT AUTHORITY</h3>
                            <h1>USE SEAT BELT</h1>
                            <p>REDUCE 45-65% INJURIES CAUSED BY THE ACCIDENT</p>
                            <a class="btn btn-custom" href="">Explore More</a>
                           
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/pic2.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>REGIONAL TRANSPORT AUTHORITY</h3>
                            <h1>KEEP AWAY MOBILE PHONES WHILE DRIVING</h1>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/about-img.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>Regional Transport Authority and detailing</h2>
                        </div>
                        <div class="about-content">
                            <p>
                                Kerala Motor vehicles department functions as taxation and regulatory authority in the transportation Sector, provides efficient and transparent services to citizen, and ensures safety on roads through implementation and enforcement of Motor Vehicles Act 1988 and associated rules.
                                By adopting smarter technological solutions and by embracing a data driven ,
                                research oriented, scientific approach;
                                RTO Seeks to,
                            </p>
                            <ul>
                                <li><i class="far fa-check-circle"></i>Deliver transparent and efficient services to the citizen by reducing
                                    compliance burdens.</li>
                                <li><i class="far fa-check-circle"></i>Encourage sustainable and green transportation systems.</li>
                                <li><i class="far fa-check-circle"></i>Function as a think-tank and advisory body in the area of mobility.</li>
                                <li><i class="far fa-check-circle"></i>Assist in developing a seamless and integrated mobility matrix with a goal to
                                    improve existing transportation culture.</li>
                            </ul>
                            <a class="btn btn-custom" href="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2> Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="">
                            <img src="img/drivinglicense-icon.png" alt="Image">
                        </i>   
                            <h3>Apply for Driving License</h3>
                            <p>Applying for a driving license in Kerala is an easy process as the applicant can do the same by following the online procedure or offline one.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="">
                                <img src="img/renewal-icon.png" alt="Image">
                            </i>
                            <h3>Apply for DL Renewal</h3>
                            <p>In the state of Kerala, a driving license is valid for 20 years or until the age of 50, whichever is earlier. A driving license is subject to renewal within a grace period of 30 days from the date of expiry. 
                                If the applicant applies for a DL after the grace period, then an additional fee of Rs. 300 will be charged.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="">
                                <img src="img/duplicate-icon.png" alt="Image">
                            </i>
                            <h3>Apply for Duplicate DL</h3>
                            <p>A duplicate driving license in Kerala can be obtained if an individual’s driving license is lost, torn or misplaced.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="">
                                <img src="img/vehicle-icon.png" alt="Image">

                            </i>
                            <h3>Apply for Vehicle Registeration</h3>
                            <p>Registration of motor vehicles is mandatory in India as per the Central Motor Vehicles Act of 1988. The act prohibits vehicle owners whose vehicles are not register from driving vehicles in any public place in India. Therefore, it is of great importance to get your vehicle registered in order to avoid any legal troubles.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="">
                                <img src="img/ownership_icon.png" alt="Image">

                            </i>
                            <h3>Apply for Vehicle Ownership Transfer</h3>
                            <p>
                                <b>Transfer of ownership in case of normal sale</b>
                                When a vehicle is sold, the name of the purchaser is noted as the registered owner in place of the previous registered owner and the process is known as transfer of ownership.
                            </p>
                                <p>
                                <b>Transfer of ownership on death of owner of the vehicle</b> 
                                When the registered owner of a vehicle dies, transfer of ownership is affected in favour of the legal heirs of the deceased registered owner. Where the owner ofa motor vehicle dies, the person succeeding to the possession of the vehicle may for a period of three months, use the vehicle as if it has been transferred to him where such person has, within thirty days of the death of the owner informs the registering authority of the occurrence of the death of the owner and of his own intention to use the vehicle
                                </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="">
                                <img src="img/rc_icon.png" alt="Image">
                            </i>
                            <h3>Apply for RC Book</h3>
                            <p>RC can apply online or offline. Registration certificate (RC) is very use full document for vehicle.
                                 RC have information such as Engine number, chassis number, owner name, vehicle type and etc</p>
                        </div>
                    </div>
                   
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        


        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Meet Our Team</p>
                    <h2>Our  Workers</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-1.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Donald John</h2>
                                <p>RTO Officer</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-2.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Adam Phillips</h2>
                                <p>Sub Officer</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-3.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Thomas Olsen</h2>
                                <p>Worker</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-4.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>James Alien</h2>
                                <p>Worker</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        
        
       


        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Blog</p>
                    <h2>Latest news & articles</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="img/blog1.PNG" alt="Image">
                                <div class="meta-date">
                                    <span>28</span>
                                    <strong>Dec</strong>
                                    <span>2021</span>
                                </div>
                            </div>
                            <div class="blog-text">
                                <h3><a href="#">DECISION OF RTA ERNAKULAM HELD ON 28 10 2021</a></h3>
                                <p>
                                    Heard. This is the application for the grant of fresh intra district regular
                                    permit on the route Elanthikkara-North Paravur-Vyttila Hub as ordinary
                                    moffusil service.This authority considered the application in detail.Route
                                    enquiry officer reported that Elanathikkara,Kanakkankadavu,Kuthiyathode
                                    sector is ill served one, with an average time gap of 20-35 minutes. The
                                    proposed route will not objectionable overlaps notified routes published vide
                                    GO(P) No.42/2009/Tran dtd 14/07/2009 which is further amended by
                                    GO(P) No.08/2017/Tran dtd 23/03/2017.
                                </p>
                                <p>    
                                    But this route touching AluvaVadakkumpuram Complete exclusion scheme only for Crossing at Vedimara
                                    Jn and it is an inevitable overlapping. Several objections have been received
                                    against the grant of proposed route stating that the route is well served and
                                    there is no requirement for the further permit. But the objection cannot be
                                    sustainable since as per Motor Vehicles Act-1988 , permit cannot be denied
                                    to anyone on the applied route ,if there is no legal impediment.
                                </p>
                            </div>
                            <div class="blog-meta">
                                <p><i class="fa fa-user"></i><a href="">Admin</a></p>
                                <p><i class="fa fa-folder"></i><a href="">Web Design</a></p>
                                <p><i class="fa fa-comments"></i><a href="">15 Comments</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="img/blog2.PNG" alt="Image">
                                <div class="meta-date">
                                    <span>22</span>
                                    <strong>Dec</strong>
                                    <span>2021</span>
                                </div>
                            </div>
                            <div class="blog-text">
                                <h3><a href="#">AGENDA OF THE STA MEETING SCHEDULED TO BE HELD ON 22</a></h3>
                                <p>
                                   <b>ITEM NO. 1</b> ITEM NO. 1
                                Agenda: To consider the application for renewal of Permit No. 94/STA/1985
                                valid upto 31.12.2021 operating by the S/C KL 70 B 7888 on the
                                Interstate route Palakkad to Pollachi via Para, Kozhinjampara and
                                Gopalapuram on Single Point tax basis - reg.
                                Applicant: Sri. Velayee, 7/499, Main Road, Eruthiyampathy, Kozhinjampara,
                                Palakkad.
                                D2/198/2021-TC

                                </p>
                                <p>
                                    <b>ITEM NO. 2</b>
                                Agenda: To consider the application for Transfer of Permit (death) and renewal of
                                Permit No. 97/STA/1985 valid upto 31.12.2021 operating by the S/C KL
                                70 E 9789 on the Interstate route Palakkad to Pollachi via Chittur,
                                Nallapally, Kozhinjampara and Gopalapuram on Single Point tax basis -
                                reg.
                                Applicant: Sri. Manickam, 7/469, Main Road, Eruthiyampathy, Kozhinjampara,
                                Palakkad.
                                D2/48/2020-TC

                                </p>
                            </div>
                            <div class="blog-meta">
                                <p><i class="fa fa-user"></i><a href="">Admin</a></p>
                                <p><i class="fa fa-folder"></i><a href="">Web Design</a></p>
                                <p><i class="fa fa-comments"></i><a href="">15 Comments</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="img/blog3.PNG" alt="Image">
                                <div class="meta-date">
                                    <span>18</span>
                                    <strong>Dec</strong>
                                    <span>2021</span>
                                </div>
                            </div>
                            <div class="blog-text">
                                <h3><a href="#"> Abstract of agenda for RTA 21-12-2021</a></h3>
                                <p>
                                   <b>Item No. 1 New or suitable Vehicle</b> 
                                    C1/2914/2019
                                    Agenda : To consider the application for fresh regular permi in respect of a new or suitable
                                    vehicle to operate on the Route Erumanathoor-Thalappuzha(44)-Mananthavady via
                                    Alattil, Ayanikkal, Periya and Kaniyaram
                                    Applicant: Sri. George P V , Pulpara P O, Thazhamunda P O, Poothady, Kenichira
                                </p>
                                <p>   
                                   <b> Item No. 2 New or suitable Vehicle</b>
                                    C1/5354/2019/W
                                    Agenda : To consider the application for fresh regular permi in respect of to operate on the
                                    Route Mundakutty-Padinjarathara-Mananthavady via Kuppadithara, Edakadan mukku, Alakandy,
                                    Pulinjal, Vellamunda,Thettamala,Moolithodu,Kallody as ordinary service
                                    Applicant: Sri. Sabeesh A K , Ayanikandiyail House, Padinjarathara P O 

                                </p>
                            </div>
                            <div class="blog-meta">
                                <p><i class="fa fa-user"></i><a href="">Admin</a></p>
                                <p><i class="fa fa-folder"></i><a href="">Web Design</a></p>
                                <p><i class="fa fa-comments"></i><a href="">15 Comments</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->


        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                            <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                            <p><i class="fa fa-envelope"></i>info@example.com</p>
                            <div class="footer-social">
                                <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="">About Us</a>
                            <a href="">Contact Us</a>
                            <a href="">Our Service</a>
                            <a href="">Service Points</a>
                            <a href="">Pricing Plan</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Useful Links</h2>
                            <a href="">Terms of use</a>
                            <a href="">Privacy policy</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <form>
                                <input class="form-control" placeholder="Full Name">
                                <input class="form-control" placeholder="Email">
                                <button class="btn btn-custom">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <p>&copy; <a href="#">Your Site Name</a>, All Right Reserved. Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
