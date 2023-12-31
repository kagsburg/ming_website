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
    <title>Minagrico - Videos</title>
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
           <?php include ("includes/navbar.php")?>
            <!-- Header end-->
        </div>


        <div class="banner-area" id="banner-area" style="background-image:url(images/videbanner.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">Vidoes</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">Videos</a></li>
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

        <section id="main-container" class="main-container">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="section-title"><span>Take a look at </span>Our Videos</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                            $sql=mysqli_query($con,"SELECT * FROM youtube_links where status ='1' order by id desc");
                            while($row=mysqli_fetch_array($sql)){
                            ?>
                    <div class="col-md-4">
                        <iframe height="320" width="320"
                            src="<?php echo $row["link"]."?autoplay=1&mute=1"; ?>"></iframe>
                        <br>
                        <span><?php echo $row['caption'] ?></span>
                    </div>
                    <?php } ?>
                    <!--  item 1 end -->
                </div>
                <!--/ Content row 1 end -->
                <div class="gap-60"></div>
                <div class="row">
                    <?php
	                        $fetchVideos = mysqli_query($con, "SELECT * FROM videos where status ='1' ORDER BY id DESC");
                            while($row = mysqli_fetch_assoc($fetchVideos)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $caption = $row['caption'];
                                $location = $row['location'];
                                $status = $row['status'];
	                    ?>
                    <div class="col-md-4">
                            <div style='float: left; margin-right: 5px;'>
                            <video src='admin/videos/<?php echo md5($row['id']) ?>.<?php echo $row['location'] ?>' controls width='320px' height='320px' ></video>     
                            <br>
                            <span><?php echo $caption; ?></span>
                         </div>
                    </div>
                    <?php } ?>
                </div>
                <!--/ Content row 1 end -->

            </div>
            <!--/ Container end -->
        </section><!-- Main container end -->


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