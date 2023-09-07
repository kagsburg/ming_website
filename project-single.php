<?php
// include("db/DB.php");
// $db = new DB();
include ("includes/config.php");
$page='service';
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM projects WHERE id = '$id'");
$row = mysqli_fetch_array($sql);
$data = $row;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Work Details</title>
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

        <div class="banner-area" id="banner-area" style="background-image:url(images/porfolio.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title"><?php echo $data['title']; ?></h1>
                            <ol class="breadcrumb">
                                <li><a href="index">Home</a></li>
                                <li><a href="portfolio">Works</a></li>
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

        <section class="single-project" id="single-project">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="column-title"><?php echo $data['title']; ?></h3>
                        <div class="carousel slide " id="main-slide" data-ride="carousel">
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
                                $count = 0;
	                                        $sql=mysqli_query($con,"SELECT gallery.* from gallery inner join projects on gallery.project_id=projects.id where projects.id='1'");
                                            if (mysqli_num_rows($sql)>0) {
                                                while ($row=mysqli_fetch_array($sql)) {
                                                    $count++;
                                                    $image=$row['image'];
                                                    $id=$row['id'];
                                                    ?>
                                <div class="carousel-item <?php if ($count == 1) echo 'active' ?>"
                                    style="background-image:url(images/gallery/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>);">
                                </div>
                                <?php
                                                }
                                            }
                                            ?>
                                <!-- Carousel item 6 end -->
                            </div>
                            <!-- Carousel inner end-->
                            <!-- Controllers-->
                            <a class="left carousel-control carousel-control-prev" href="#main-slide"
                                data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
                            <a class="right carousel-control carousel-control-next" href="#main-slide"
                                data-slide="next">
                                <span><i class="fa fa-angle-right"></i></span></a>
                        </div>
                        <!-- Carousel end-->
                        <div class="tag"><span>Location: </span><?php echo $data['location']; ?></div>
                    </div>
                    <!-- col end -->
                    <div class="col-lg-4 project-right-side">
                        <div class="single-project-content">
                            <h3> Works Details</h3>
                            <?php echo $data['description']; ?>
                        </div>
                        <!-- project content end -->
                        <div id="accordion" class="project-accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link project-btn" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span> Client </span>
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="collapseOne" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p><?php echo $data['client']; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link project-btn collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            <span> Works Manager </span>
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p><?php echo $data['project_manager']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link project-btn collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            <span> Service provided </span>
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <?php 
                                        // get service name
                                        $sql3=mysqli_query($con,"SELECT * FROM services where id='".$data['service']."'");                                        
                                        if (mysqli_num_rows($sql3)>0) {
                                            while ($row3=mysqli_fetch_array($sql3)) {
                                                $service=$row3['name'];
                                        ?>
                                        <p><?php echo $service; ?></p>
                                        <?php
                                            }
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="portfolio" class="btn-block btn btn-primary">View More Works</a>

                    </div>
                    <!-- col end -->
                </div>
                <!-- row end -->
            </div>
            <!-- main container end -->
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