<?php
include('includes/config.php');
$page="home";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Minagrico - Home</title>
    <!--
    Mobile Specific Metas
    ==================================================
    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--
    CSS
    ==================================================
    -->

    <link href="images/icon/favicon.ico" rel="icon">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animation-->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Morris CSS -->
    <link rel="stylesheet" href="css/morris.css">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Icon font-->
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Owl Carousel-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Owl Theme -->
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Colorbox-->
    <link rel="stylesheet" href="css/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file.-->
    <!--if lt IE 9
    script(src='js/html5shiv.js')
    script(src='js/respond.min.js')
    -->
</head>

<body>

    <div class="body-inner">

        <?php include ("includes/navbar.php")?>

        <div class="carousel slide" id="main-slide" data-ride="carousel">
            <!-- Indicators-->
            <ol class="carousel-indicators visible-lg visible-md">
                <li class="active" data-target="#main-slide" data-slide-to="0"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!-- Indicators end-->
            <!-- Carousel inner-->
            <div class="carousel-inner">
                
                <?php
	                                        $sql=mysqli_query($con,"SELECT * FROM slider_images where status='1'");
                                            if (mysqli_num_rows($sql) > 0) {
                                                $i=0;
                                                while($row=mysqli_fetch_array($sql)){
                                                    $i++;
                                                        ?>
                <!-- Carousel item 2 end-->
                <div class="carousel-item <?php if ($i == 1) echo "active"  ?>" style="background-image:url(images/slider/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>);">
                    <div class="container">
                        <div class="slider-content text-right">
                            <div class="col-md-12">
                                <h2 class="slide-title title-light"><?php echo $row["subtitle"];?></h2>
                                <h3 class="slide-sub-title"><?php echo $row["title"];  ?></h3>
                                <p><a class="slider btn btn-primary" href="<?php echo BASE_URL;?>/<?php echo $row["first_button_link"];  ?>"><?php echo $row["first_button"];  ?></a></p>
                            </div>
                            <!-- Col end-->
                        </div>
                        <!-- Slider content end-->
                    </div>
                    <!-- Container end-->
                </div>
                <?php
                                                }
                                            }
                                            ?>
                <!-- Carousel item 3 end-->
            </div>
            <!-- Carousel inner end-->
            <!-- Controllers--><a class="left carousel-control carousel-control-prev" href="#main-slide"
                data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
            <a class="right carousel-control carousel-control-next" href="#main-slide" data-slide="next"><span><i
                        class="fa fa-angle-right"></i></span></a>
        </div>
        <!-- Carousel end-->

        <section class="ts-service-area service-area-pattern" id="ts-service-area">
            <div class="service-area-bg">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h2 class="section-title"><span>Avoid Costly Rework and Stay on Schedule</span>Why
                                Minagrico?</h2>
                        </div>
                    </div>
                    <!-- Title row end-->
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="ts-service-wrapper">
                                <div class="ts-service-box">
                                    <div class="ts-service-box-img">
                                        <img src="images/icon/why-1.png" alt="" />
                                    </div>
                                    <div class="ts-service-box-info">
                                        <h3 class="service-box-title">Quality Assurance</h3>
                                        <p>We provide quality products and services.</p>
                                    </div>
                                </div><!-- Service 1 end -->
                                <div class="gap-15"></div>
                                <div class="ts-service-box">
                                    <div class="ts-service-box-img">
                                        <img src="images/icon/why-2.png " alt="" />
                                    </div>
                                    <div class="ts-service-box-info">
                                        <h3 class="service-box-title">Safety </h3>
                                        <p>We maintain safe and healthy working environment. </p>
                                    </div>
                                </div><!-- Service 2 end -->
                                <div class="gap-15"></div>
                                <div class="ts-service-box">
                                    <div class="ts-service-box-img">
                                        <img src="images/icon/why-4.png " alt="" />
                                    </div>
                                    <div class="ts-service-box-info">
                                        <h3 class="service-box-title">Accountability </h3>
                                        <p>We conduct business with integrity and fairness </p>
                                    </div>
                                </div><!-- Service 3 end -->
                            </div>
                        </div><!-- Col end -->
                        <div class="col-lg-4 col-md-12">
                            <span class="service-img"><img class="img-fluid" src="images/icon/why-9.png"
                                    alt="" /></span>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="ts-service-wrapper ml-lg-auto">
                                <div class="ts-service-box">
                                    <div class="ts-service-box-img ">
                                        <img src="images/icon/service-3.png" alt="" />
                                    </div>
                                    <div class="ts-service-box-info">
                                        <h3 class="service-box-title">Fair Price</h3>
                                        <p>Our price is affordable and cost-effective</p>
                                    </div>
                                </div><!-- Service 4 end -->
                                <div class="gap-15"></div>
                                <div class="ts-service-box">
                                    <div class="ts-service-box-img">
                                        <img src="images/icon/why-8.png" alt="" style="width: 95px;"/>
                                    </div>
                                    <div class="ts-service-box-info">
                                        <h3 class="service-box-title">Solution-Oriented</h3>
                                        <p>We full focus on our customer needs.</p>
                                    </div>
                                </div><!-- Service 5 end -->
                                <div class="gap-15"></div>
                                <div class="ts-service-box">
                                    <div class="ts-service-box-img">
                                        <img src="images/icon/why-7.png" alt="" style="width: 95px;"/>
                                    </div>
                                    <div class="ts-service-box-info">
                                        <h3 class="service-box-title">Support</h3>
                                        <p>We offer timely support to all our customers </p>
                                    </div>
                                </div><!-- Service 6 end -->
                            </div>
                        </div><!-- Col end -->
                    </div><!-- Content row end -->
                    <!-- Content row end-->
                </div>
                <!-- Container end-->
            </div>
        </section>
        <!-- Service Section end-->

        <section class="ts-services solid-bg" id="ts-services">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="section-title"><span>What We Do</span>Our Services</h2>
                    </div>
                </div>
                <!-- Title row end-->
                <div class="row ts-service-row-box">
                    <?php
	                        $sql=mysqli_query($con,"SELECT * FROM services where status = '1' order by id desc limit 3");
	                        while($row=mysqli_fetch_array($sql)){
	                    ?>
                    <div class="col-lg-4 col-md-12">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">
                                <img class="img-fluid"
                                    src="images/services/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>"
                                    style="height: 300px; width: 100%;" alt="">
                            </div>
                            <div class="ts-service-content">
                                <h3 class="service-title"><?php echo $row["name"]; ?></h3>
                                <p><a class="link-more" href="service-single?id=<?php echo $row["id"]?>">Read More<i
                                            class="icon icon-right-arrow2"></i></a></p>
                            </div>
                        </div>
                        <!-- Service1 end-->
                    </div>
                    <?php } ?>
                </div>
                <!-- Content row end-->
                <div class="gap-60"></div>
            </div>
            <!-- Container end-->
        </section>
        <!-- Service end-->

        <section class="testimonial-area" id="testimonial-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion-title">
                            <h3 class="column-title"><span>Our FAQ</span> Frequently Asked Questions</h3>
                        </div>
                        <div id="accordion" class="accordion-area">
                            <?php
	                        $sql=mysqli_query($con,"SELECT * FROM faqs limit 3");
	                        while($row=mysqli_fetch_array($sql)){
	                        ?>
                            <div class="card">
                                <div class="card-header" id="headingOne<?php echo $row["id"]?>">
                                    <h5 class="mb-0">
                                        <a href="#" class="btn btn-link" data-toggle="collapse"
                                            data-target="#collapseOne<?php echo $row["id"]?>" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <?php echo $row["question"]?>
                                        </a>
                                    </h5>
                                </div>
                                <div class="collapse show" id="collapseOne<?php echo $row["id"]?>"
                                    aria-labelledby="headingOne<?php echo $row["id"]?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <?php echo $row["answer"]?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Accordion end -->
                    </div>
                    <!-- Col end-->
                    <div class="col-lg-6 testimonial-client">
                        <h2 class="column-title "><span>What They Said</span> Client Testimonials</h2>
                        <div class="owl-carousel owl-theme testimonial-slide owl-dark" id="testimonial-slide">
                            <?php
	                        $sql=mysqli_query($con,"SELECT * FROM testimonials");
	                        while($row=mysqli_fetch_array($sql)){
	                        ?>
                            <div class="item" style="width: 100%">
                                <div class="quote-item quote-square"><span class="quote-text">
                                        <?php echo $row["testimony"]?></span>
                                    <div class="quote-item-footer">
                                        <?php 
                                            if(empty(($row["image"]))){ ?>
                                        <img class="testimonial-thumb" src="images/profile.jpg" alt="testimonial" /> <?php
                                            }else {
                                            ?> <img class="testimonial-thumb"
                                            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                            alt="testimonial">
                                        <?php }
                                            ?>
                                        <div class="quote-item-info">
                                            <p class="quote-author"><?php echo $row["name"]?></p><span
                                                class="quote-subtext"><?php echo $row["title"]?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quote item end-->
                            </div>
                            <!-- Item 1 end-->
                            <?php } ?>

                        </div>
                        <!-- Testimonial carousel end-->
                    </div>
                    <!-- Col end-->
                </div>
                <!-- Content row end-->
            </div>
            <!-- Container end-->
        </section>
        <!-- Quote area end-->

        <section id="ts-facts-area" class="ts-facts-area-bg bg-overlay">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 column-left-title">
                        <h2 class="column-title">To provide our customers with valued reliable high quality solutions for global
engineering problems, always ensuring that integrity, safety and sustainability are of the heart of
everything we do.</h2>
                    </div>
                    <!-- <div class="col-lg-7 col-md-12">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-4">
                                    <div class="ts-facts-bg">
                                        <img src="images/icon/fact1.png" alt="" />
                                        <div class="ts-facts-content">
                                            <h4 class="ts-facts-num"><span class="counterUp">2435</span></h4>
                                            <p class="facts-desc">Office Worldwide</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="ts-facts-bg">
                                        <img src="images/icon/fact2.png" alt="" />
                                        <div class="ts-facts-content">
                                            <h4 class="ts-facts-num"><span class="counterUp">467</span></h4>
                                            <p class="facts-desc">KM Per Year</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="ts-facts-bg">
                                        <img src="images/icon/fact3.png" alt="" />
                                        <div class="ts-facts-content">
                                            <h4 class="ts-facts-num"><span class="counterUp">858588</span></h4>
                                            <p class="facts-desc">Tons of Goods</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Row end-->
            </div>
            <!-- Container 2 end-->
        </section>
        <!-- Facts Area End -->

        <section class="news" id="news">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="section-title"><span>Whats going on</span>Latest News</h2>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6 ">
                        <?php
                        $selected='';
	                        $getnews=mysqli_query($con,"SELECT * FROM news where status='1' order by id desc limit 1");
                            if (mysqli_num_rows($getnews) > 0) {
	                        while($row=mysqli_fetch_array($getnews)){
                                $selected=$row['id'];
	                    ?>
                        <div class="latest-post post-large">
                            <div class="latest-post-media">
                                <a class="latest-post-img" href="news-single.html">
                                    <img class="img-fluid"
                                        src="images/news/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>"
                                        alt="img">
                                </a>

                                <div class="post-body">
                                    <a class="post-cat" href="news.php">News</a>
                                    <h4 class="post-title"><a
                                            href="news-single.php?id=<?php echo $row["id"]?>"><?php echo $row["title"]; ?></a>
                                    </h4>
                                    <span class="post-item-date"><?php echo $row["date_added"]; ?></span>
                                    <a class="btn btn-primary" href="news-single.php?id=<?php echo $row["id"]?>">Read
                                        More</a>
                                </div>
                                <!-- Post body end-->
                            </div>
                            <!-- Post media end-->
                        </div>
                        <!-- Latest post end-->
                        <?php }} ?>

                    </div>
                    <!-- Col big news end-->
                    <div class="col-lg-6 ">
                        <div class="row">
                            <?php
	                        $sql=mysqli_query($con,"SELECT * FROM news where status='1' and id!='$selected' order by id asc limit 5");
	                        while($row=mysqli_fetch_array($sql)){
	                    ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="latest-post">
                                    <div class="post-body"><a class="post-cat" href="news.php">News</a>
                                        <h4 class="post-title"><a
                                                href="news-single.php?id=<?php echo $row["id"]?>"><?php echo $row["title"]; ?></a>
                                        </h4><span class="post-item-date"><?php echo $row["date_added"]; ?></span>
                                        <div class="post-text">
                                            <p><?php echo $row["title"]; ?>...
                                            </p>
                                            <div class="text-left"><a class="btn btn-primary"
                                                    href="news-single.php?id=<?php echo $row["id"]?>">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Latest post end-->
                            </div>
                            <?php } ?>

                            <!-- Col end-->
                        </div>
                        <!-- row end-->
                    </div>
                    <!-- Col small news end-->
                </div>
                <!-- Content row end-->
            </div>
            <!-- Container end-->
        </section>
        <!-- News end-->

        <section class="quote-area solid-bg" id="quote-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="quote_form">
                            <h2 class="column-title "><span>Delivery & return solutions worldwide</span>Get a Quick
                                Quote</h2>
                            <div class="quote-img">
                                <img class="img-fluid" src="images/quote.png" alt="img">
                            </div>
                        </div>
                        <!-- Quote form end-->
                    </div>
                    <!-- Col end-->
                    <div class="col-lg-7 qutoe-form-inner-le">
                        <form action="contact-form.php" method="POST">
                            <h2 class="column-title "><span>We are always ready</span> Request a call back</h2>
                            <div class="error-container"></div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control form-name" id="name" name="name"
                                            placeholder="Full Name" type="text" required="">
                                    </div>
                                </div>
                                <!-- Col end-->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control form-website" id="website" name="website"
                                            placeholder="Subject" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control form-email" id="email" name="email"
                                            placeholder="Email" type="email" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control form-message required-field" id="message"
                                            name="message" placeholder="Your Message" rows="8"></textarea>
                                    </div>
                                </div>
                                <!-- Col 12 end-->
                            </div>
                            <!-- Form row end-->
                            <div class="text-right">
                                <button class="btn btn-primary tw-mt-30" type="submit">Contact US</button>
                            </div>
                        </form>
                        <!-- Form end-->
                    </div>
                    <!-- Col end-->
                </div>
                <!-- Content row end-->
            </div>
            <!-- Container end-->
        </section>
        <!-- Quote area end-->


        <section class="clients-area " id="clients-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 owl-carousel owl-theme text-center partners" id="partners-carousel">
                        <?php
	                        $sql=mysqli_query($con,"SELECT * FROM partners order by id");
	                        while($row=mysqli_fetch_array($sql)){
	                     ?>
                        <figure class="item partner-logo">
                            <a href="<?php echo $row["website"]; ?>">
                                <img class="img-fluid"
                                    src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["logo"]); ?>"
                                    alt="">
                            </a>
                        </figure>
                        <?php } ?>
                    </div>
                    <!-- Owl carousel end-->
                </div>
                <!-- Content row end-->
            </div>
            <!-- Container end-->
        </section>
        <!-- Partners end-->

        <section id="call-to-action" class="call-to-action-bg ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <h3 class="call-to-action-title">Delivery & return solutions worldwide</h3>
                        <p>
                            We would love to hear from you, tell us little bit about your project
                        </p>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-box" href="contact.php">Contact Us <br />Or Call +255-767-145-678</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to action end -->

        <!-- Footer start-->

        <?php include ("includes/footer.php")?>

        <!-- Footer end-->

        <div class="back-to-top affix" id="back-to-top" data-spy="affix" data-offset-top="10">
            <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i>
                <!-- icon end-->
            </button>
            <!-- button end-->
        </div>
        <!-- End Back to Top-->

        <!--
      Javascript Files
      ==================================================
      -->
        <!-- initialize jQuery Library-->
        <script type="text/javascript" src="js/jquery.js"></script>


        <!-- Bootstrap jQuery-->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- Owl Carousel-->
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <!-- Counter-->
        <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
        <!-- Waypoints-->
        <script type="text/javascript" src="js/waypoints.min.js"></script>
        <!-- Color box-->
        <script type="text/javascript" src="js/jquery.colorbox.js"></script>


        <!-- Template custom-->
        <script type="text/javascript" src="js/custom.js"></script>
    </div>
    <!--Body Inner end-->
</body>

</html>