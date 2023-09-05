<?php
include ("includes/config.php");
$page='media';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title> News Details</title>
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
            <?php include ("includes/navbar.php")?>
            <!-- Header end-->
        </div>

        <div class="banner-area" id="banner-area" style="background-image:url(images/banner/banner2.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title"><?php echo $data['title']; ?></h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="news.php">News</a></li>
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

        <section class="main-container" id="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">

                        <div class="post-content">
                            <div class="post-media post-image ">
                                <img class="img-fluid" src="
                                data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data["image"]); ?>"
                                    class="img-responsive" alt="">
                            </div>

                            <div class="post-body">
                                <div class="entry-header">
                                    <div class="post-meta"><span class="post-cat"><i class="icon icon-folder"></i><a>
                                                <?php echo $data["category"]; ?></a></span>
                                        <span class="post-tag"><i class="icon icon-tag"></i><a>
                                                <?php echo $data["tag"]; ?></a></span>
                                    </div>
                                    <h2 class="entry-title"><a>
                                            <?php echo $data["title"]; ?></a></h2>
                                </div>
                                <!-- header end-->

                                <div class="entry-content">

                                    <?php echo $data["details"]; ?>

                                </div>

                                <div class="tags-area clearfix">
                                    <div class="post-tags pull-left">
                                        <a><i class="fa fa-user"></i> Written
                                            by <?php echo $data["author"]; ?></a>
                                    </div>
                                    <div class="share-items pull-right">
                                        <ul class="post-social-icons unstyled">
                                            <li class="social-icons-head">Share:</li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div><!-- post-body end -->
                        </div><!-- post content end -->

                        <!-- <div class="author-box">
                            <div class="author-img pull-left">
                                <img src="images/team/team1.jpg" alt="">
                            </div>
                            <div class="author-info">
                                <h3>Elton Themen<span>Site Engineer</span></h3>
                                <p>Lisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                    enim ad vene minim veniam, quis nostrud exercitation nisi ex ea commodo.</p>
                                <p class="author-url">Website: <span><a href="#">http://www.cornike.com</a></span></p>

                            </div>
                        </div> -->
                        <!-- Author box end -->



                    </div><!-- Content Col end -->

                    <div class="col-lg-4">
                        <div class="sidebar sidebar-left">
                            <div class="widget recent-posts">
                                <h3 class="widget-title">Popular Posts</h3>
                                <ul class="unstyled clearfix">
                                    <?php
	                                    $sql=mysqli_query($con,"SELECT * FROM news");
	                                    while($row=mysqli_fetch_array($sql)){
	                                 ?>
                                    <li class="media">
                                        <div class="media-left media-middle">
                                            <img alt="img"
                                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>">
                                        </div>
                                        <div class="media-body media-middle"><span class="post-date"><i
                                                    class="icon icon-calendar-full"></i><a><?php echo $row["date_added"]?></a></span>
                                            <h4 class="entry-title"><a
                                                    href="news-single.php?id=<?php echo $row["id"]?>"><?php echo $row["title"]?></a>
                                                <small>By <?php echo $row["author"]?></small>
                                            </h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php } ?>
                                    <!-- 1st post end-->
                                </ul>
                            </div>
                            <!-- Recent post end-->
                        </div>
                        <!-- Sidebar end-->
                    </div>
                    <!-- Sidebar Col end-->
                </div>
                <!-- Main row end-->
            </div>
            <!-- Container end-->
        </section>

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