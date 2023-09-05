<?php
include ("includes/config.php");
$page='port';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Portfolio</title>
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
    <!-- Morris -->
    <link rel="stylesheet" href="css/morris.css">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Icon font-->
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Owl Carousel-->
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

        <div class="site-top-2">
            <header class="header nav-down" id="header-2">
                <div class="container">
                    <div class="row">
                        <div class="logo-area clearfix">
                            <div class="logo col-lg-3 col-md-12">
                                <a href="index.php">
                                    <img src="images/footer-logo.png" alt="" />
                                </a>
                            </div>
                            <!-- logo end-->
                            <div class="col-lg-9 col-md-12 pull-right">
                                <ul class="top-info unstyled">
                                    <li>
                                        <span class="info-icon"><i class="icon icon-phone3"></i></span>
                                        <div class="info-wrapper">
                                            <p class="info-title">24/7 Response Time</p>
                                            <p class="info-subtitle">+255-767-145-678</p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="info-icon"><i class="icon icon-envelope"></i></span>
                                        <div class="info-wrapper">
                                            <p class="info-title">Send Your Query</p>
                                            <p class="info-subtitle">info@minagricoengineering.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Col End-->
                        </div>
                        <!-- Logo Area End-->
                    </div>
                </div>
                <!-- Container end-->
                <div class="site-nav-inner site-navigation navigation navdown">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
                            </button>
                            <!-- End of Navbar toggler-->
                            <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <!-- li end-->
                                    <li class="nav-item dropdown"><a class="nav-link" href="#"
                                            data-toggle="dropdown">Company<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="about.php">About Us</a></li>
                                            <li><a href="team.php">Our Team</a></li>
                                            <li><a href="faq.php">Faq</a></li>
                                        </ul>
                                    </li>
                                    <!-- li end-->
                                    <li class="nav-item dropdown">
                                        <a href="service.php">Our Services</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="portfolio.php">Our Portfolio</a>
                                    </li>
                                    <li class="nav-item dropdown"><a class="nav-link" href="#"
                                            data-toggle="dropdown">Multimedia<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="gallery.php">Gallery</a></li>
                                            <li><a href="videos.php">Videos</a></li>
                                            <li><a href="news.php">News</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="contact.php">Contact</a>
                                    </li>
                                </ul>
                                <!--Nav ul end-->
                            </div>
                            <a href="" class="top-right-btn btn btn-primary">Request a Quote</a>
                            <!-- Top bar btn -->
                        </nav>
                        <!-- Collapse end-->
                    </div>
                </div>
                <!-- Site nav inner end-->
            </header>
            <!-- Header end-->
        </div>

        <div class="banner-area" id="banner-area" style="background-image:url(images/banner/banner1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">All Projects</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="portfolio.php">Projects</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- Col end-->
                </div>
                <!-- Row end-->
            </div>
            <!-- Container end-->
        </div>
        <!-- Banner area end-->

        <section class="projects" id="projects">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="section-title"><span>Take a look at </span>Our Projects</h2>
                    </div>
                </div>
                <div class="row ">
                    <?php
	                    $sql=mysqli_query($con,"SELECT * FROM projects");
	                    while($row=mysqli_fetch_array($sql)){
	                ?>
                    <div class="col-lg-4 ">
                        <div class="latest-post post-large project-post-large">
                            <div class="latest-post-media project-post-media">
                                <a class="latest-post-img" href="project-single.php">
                                    <img class="img-fluid"
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                        style="height: 230px; width: 100%;" alt="img">
                                </a>

                                <div class="post-body project-body project-post-body">
                                    <a class="post-cat" href="project-single.php"><?php echo $row["title"]; ?></a>
                                    <a class="btn btn-primary" href="project-single.php?id=<?php echo $row["id"]?>">Read
                                        More</a>
                                </div>
                                <!-- Post body end-->
                            </div>
                            <!-- Post media end-->
                        </div>
                        <!-- Latest post end-->
                    </div>
                    <?php } ?>
                    <!-- Col 1 end-->
                </div>
                <!-- row 1 end-->
            </div>
            <!-- Container end-->
        </section>
        <!-- Projects end-->


        <!-- Footer start-->

        <?php include ("includes/footer.html")?>

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