<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Car rental portal</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/font/font-awesome.css" rel="stylesheet" /> 
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet"> 
</head>

<body id="body">
     <?php include('includes/header.php');?>
  
    <section id="hero" class="clearfix">
      <div class="container">

        <div class="hero-banner">
        </div>

        <div class="hero-content">
          <div>
            <?php   if(strlen($_SESSION['login'])==0)
            { 
              ?>
              <a href="#loginform" data-toggle="modal" data-dismiss="modal" class="btn-banner">Login / Register</a> 
              <?php 
            }?>
         </div>
       </div>

     </div> 
   </section><!-- #Hero -->

   <main id="main">
    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Find the Best Car for you</h2>
            <p>Save money on hire cars by searching for car hire deals on CarRental. CarRental searches for car hire deals on hundreds of websites to help you find the cheapest hire car. Whether you are looking for an airport hire car or just a cheap alternative near you, you can compare discount car hires and find the best deals faster at CarRental.</p>
          </div>

          <div class="row">
           <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by rand() limit 9 ";
           $query = $dbh -> prepare($sql);
           $query->execute();
           $results=$query->fetchAll(PDO::FETCH_OBJ);
           $cnt=1;
           if($query->rowCount() > 0)
           {
            foreach($results as $result)
            {  
              ?> 
              <div class="col-lg-4">
                <div class="box wow  fadeInLeft">
                  <div class="car-info-box">
                    <a href="car_details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" style="height: 180px; width: 280px;" class="img-responsive"  alt="image" >
                    </a>
                    <ul style=" width: 280px;">
                      <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
                      <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
                    </ul>
                    <div class="car-title-m">
                      <h6><a href="car_details.php?vhid=<?php echo htmlentities($result->id);?>"> <?php echo substr($result->VehiclesTitle,0,21);?></a></h6>
                      <span class="price">$<?php echo htmlentities($result->PricePerDay);?> /Day</span> 
                    </div>
                    <div class="inventory_info_m ">
                      <p><?php echo substr($result->VehiclesOverview,0,70);?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
            }
          }?>
        </div>
      </div>
    </section><!-- #services -->

    <!--==========================
      Clients Section
      ============================-->
      <section id="clients" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Client Reviews</h2>
            <div class="owl-carousel clients-carousel ">
            <p>Driver was excellent, very well maintained and neat car, very professional and nice person</p>
             <p>Service was excellent. Toney followed up promptly, was there on time, drove safely following all traffic rules and got me to the airport with plenty of time to spare.</p>
             <p>I had a comfortable and safe journey today. As such no suggestions as all the requirement were fulfilled.</p>
             <p>My overall experience with regards to my travel in cochin is very good and the Service staff Mr. Sanoop Santeesh was a nice person and would like to recommend him for my next travel too.</p>
             <p>Chauffeur was very co-operative and made sure we have a safe drive to the airport.</p>
             <p>The services offered by you felt safe & comfortable Journey. I would rate “4” to the availed services.</p>
          </div>

          <div class="owl-carousel clients-carousel">
            <img src="img/clients/client-1.png" alt="">
            <img src="img/clients/client-2.png" alt="">
            <img src="img/clients/client-3.png" alt="">
            <img src="img/clients/client-4.png" alt="">
            <img src="img/clients/client-5.png" alt="">
            <img src="img/clients/client-6.png" alt="">
          </div>

        </div>
      </section><!-- #clients --> 
   
      <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="cta-title">Get Our Service</h3>
              <p class="cta-text">Search cheap hire cars with CarRental. Search for the cheapest car hire deal for all major destinations around the world. CarRental searches different travel sites to help you find and book the hire car deal that suits you best. CarRental also helps you find the right hotels for your needs.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="contact.php">Contact Us</a>
            </div>
          </div>

        </div>
      </section><!-- #call-to-action -->


    </main>

  <!--==========================
    Footer
    ============================-->
   <?php include('includes/footer.php');?><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!--Login-Form -->
    <?php include('includes/login.php');?>
    <!--/Login-Form --> 

    <!--Register-Form -->
    <?php include('includes/registration.php');?>

    <!--/Register-Form --> 

    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php');?>
    <!-- JavaScript  -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="lib/sticky/sticky.js"></script> 
    <script src="contact/jqBootstrapValidation.js"></script>
    <script src="contact/contact_me.js"></script>
    <script src="js/main.js"></script>

  </body>
  </html>