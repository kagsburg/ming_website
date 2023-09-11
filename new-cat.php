<?php
include ("includes/config.php");
$page='media';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Minagrico - News</title>
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

        <div class="banner-area" id="banner-area" style="background-image:url(images/newsbanner.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">News</h1>
                            <ol class="breadcrumb">
                                <li><a href="index">Home</a></li>
                                <li><a href="news">News</a></li>
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
                    <div class="col-lg-8">
                        <div class="row">
                        <?php
	                        $sql=mysqli_query($con,"SELECT * FROM news where status='1' and category_id='$id'order by id desc");
	                        while($row=mysqli_fetch_array($sql)){
	                     ?>
                        <div class=" col-lg-6 post news-post">
                            <div class="post-media post-image">
                                <img class="img-fluid"
                                    src="images/news/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>"
                                    style="height: 300px; " width="300px" alt="img">
                            </div>
                            <div class="post-body clearfix">
                                <!-- Post meta left-->
                                <div class="post-content">
                                    <div class="entry-header">
                                        <!-- <div class="post-meta"><span class="post-cat"><i
                                                    class="icon icon-folder"></i><a>
                                                    <?php echo $row["category"]; ?></a></span>
                                            <span class="post-tag"><i class="icon icon-tag"></i>
                                                <?php echo $row["tag"]; ?></span>
                                        </div> -->
                                        <h2 class="entry-title"><a
                                                href="news-single?id=<?php echo $row["id"]?>"><?php echo $row["title"]; ?></a>
                                        </h2>
                                    </div>
                                    <!-- header end-->
                                    <div class="entry-content">
                                        
                                    </div>
                                    <div class="post-footer "><a class="btn btn-primary"
                                            href="news-single?id=<?php echo $row["id"]?>">Read
                                            More ...</a></div>
                                </div>
                                <!-- Post content right-->
                            </div>
                            <!-- post-body end-->
                        </div>
                        <?php } ?>
                        </div>

                        <!-- 1st post end-->
                    </div>
                    <!-- Content Col end-->
                    <div class="col-lg-4">
                        <div class="sidebar sidebar-right">
                            <!-- <div class="widget widget-search">
                                <div class="input-group" id="search">
                                    <input class="form-control" placeholder="Search" type="search"><span
                                        class="input-group-btn"><i class="fa fa-search"></i></span>
                                </div>
                            </div> -->
                            <div class="widget recent-posts">
                                <h3 class="widget-title">Popular Posts</h3>
                                <ul class="unstyled clearfix">
                                    <?php
	                                    $sql=mysqli_query($con,"SELECT * FROM news where status='1' and category_id!='$id' order by id asc limit 5");
	                                    while($row=mysqli_fetch_array($sql)){
                                            $getauthor = mysqli_query($con,"SELECT * FROM users where user_id='".$row['admin_id']."'");
                                            $author = mysqli_fetch_array($getauthor);

	                                 ?>
                                    <li class="media">
                                        <div class="media-left media-middle">
                                            <img alt="img"
                                                src="images/news/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>">
                                        </div>
                                        <div class="media-body media-middle"><span class="post-date"><i
                                                    class="icon icon-calendar-full"></i><a><?php echo $row["date_added"]?></a></span>
                                            <h4 class="entry-title"><a
                                                    href="news-single?id=<?php echo $row["id"]?>"><?php echo $row["title"]?></a>
                                                <small>By <?php echo $author["fullnames"]?></small>
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