
<?php
include ("includes/config.php");
$page='quote';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Minagrico - Quote</title>
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
    <link rel="stylesheet" href="js/select2/select2.min.css">
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


        <div class="banner-area" id="banner-area" style="background-image:url(images/contactbanner.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">Quote</h1>
                            <ol class="breadcrumb">
                                <li><a href="index">Home</a></li>
                                <li><a href="quote">Quote</a></li>
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


        <section class="main-container contact-area" id="main-container">
            <?php
               if (isset ($_POST['submitquote'])){
                $name = mysqli_real_escape_string($con,trim($_POST['name']));
                $location = mysqli_real_escape_string($con,trim($_POST['location']));
                $email = mysqli_real_escape_string($con,trim($_POST['email']));
                $contact = mysqli_real_escape_string($con,trim($_POST['contact']));
                $company = isset($_POST['company']) ? mysqli_real_escape_string($con,trim($_POST['company'])) : '';
                if ($company == '1'){
                    $companyname = mysqli_real_escape_string($con,trim($_POST['companyname']));
                    $companylocation = mysqli_real_escape_string($con,trim($_POST['companylocation']));
                    $companycontact = mysqli_real_escape_string($con,trim($_POST['companycontact']));
                }else{
                    $companyname = '';
                    $companylocation = '';
                    $companycontact = '';
                }

                $types = $_POST['types'];
                if (empty($name) || empty($location) || empty($contact) || empty($types)){
                    echo "<div class='alert alert-danger'>Please fill all the fields</div>";
                }else{
                    $date = date('Y-m-d H:i:s');
                    $status = '0';
                    $sql = "INSERT INTO quoteinfo (names,location,email,contact,companyname,companylocation,companycontact,date_added,status) 
                    VALUES ('$name','$location','$email','$contact','$companyname','$companylocation','$companycontact','$date','$status')";
                    $query = mysqli_query($con,$sql);
                    if ($query){
                        $last_id = mysqli_insert_id($con);
                        if($types == 'services'){
                            $details = $_POST['details'];
                            foreach($_POST['type_services'] as $service){
                                $sql1 = "INSERT INTO quote_services (quote_id,service_id,details) VALUES ('$last_id','$service','$details')";
                                $query1 = mysqli_query($con,$sql1);
                            }
                        }else{
                            $quantity = $_POST['quantity'];
                            $count = count($_POST['type_product']);
                            for ($i=0; $i < $count; $i++) { 
                                $sql2 = "INSERT INTO quote_products (quote_id,product_id,quantity) VALUES ('$last_id','".$_POST['type_product'][$i]."','".$_POST['quantity'][$i]."')";
                                $query1 = mysqli_query($con,$sql2);
                            }
                        }
                        echo "<div class='alert alert-success'>Your Quote has been submitted successfully</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Error Occured</div>";
                    }
                }
               }
            ?>
            <div class="ts-form form-boxed" id="ts-form">
                <div class="container">
                    <div class="row">
                        <div class="contact-wrapper full-contact">
                            <div class="col-lg-6">
                                <h3 class="column-title">Quote</h3>
                                
                                <div class="contact-info-box contact-box info-box ">
                                    <div class="contact-info">
                                        <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                                    class="icon icon-map-marker2"></i></span>
                                            <div class="ts-contact-content">
                                                <h3 class="ts-contact-title">Postal Address</h3>
                                                <p>P.O BOX 96265 Dar es salaam, Tanzania</p>
                                            </div>
                                            <!-- Contact content end-->
                                        </div>
                                        <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                                    class="icon icon-phone3"></i></span>
                                            <div class="ts-contact-content">
                                                <h3 class="ts-contact-title">Call Us</h3>
                                                <p>+255-767-145-678 | +255-772-888-003</p>
                                            </div>
                                            <!-- Contact content end-->
                                        </div>
                                        <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i
                                                    class="icon icon-envelope"></i></span>
                                            <div class="ts-contact-content">
                                                <h3 class="ts-contact-title">Mail Us</h3>
                                                <p>info@minagricoengineering.com</p>
                                            </div>
                                            <!-- Contact content end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact info end -->
                            <div class="col-lg-6">
                                <h3 class="column-title">Request Quote</h3>
                                <div class="contact-submit-box contact-box form-box">
                                    <form action="" method="POST">
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
                                                    <input class="form-control form-website" id="website" name="location"
                                                        placeholder="Location" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-email" id="email" name="email"
                                                        placeholder="Email" type="email" >
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-email" id="email" name="contact"
                                                        placeholder="Contact " type="tel" >
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label >
                                                    <input class="" id="company" name="company" value="1"
                                                         type="checkbox" > Are you an organization or Company? 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="forcompany row" style="display: none;">
                                           
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-name" id="name" name="companyname"
                                                        placeholder=" Name of the Organization or Company" type="text" >
                                                </div>
                                            </div>
                                                        
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-name" id="name" name="companylocation"
                                                        placeholder="Location" type="text" >
                                                </div>
                                            </div>
                                                        
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-name" id="name" name="companycontact"
                                                        placeholder="Contacts" type="text" >
                                                </div>
                                            </div>


                                            </div>
                                            <div class="col-lg-12">
                                            <h6>* What are you interested in? </h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group" id="services">
                                                    <label >
                                                    <input class="types" id="" name="types" value="services"
                                                         type="radio" > Services
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group" id="products">
                                                    <label >
                                                    <input class="types" id="" name="types" value="products"
                                                         type="radio" > Products
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 forservices" style="display: none;">
                                                <div class="col-lg-12">
                                                    <select name="type_services[]" class="form-control services"  style="width: 100%" multiple="multiple">
                                                        <?php 
                                                        $getservices = mysqli_query($con , "SELECT * FROM services where status = '1'  order by id desc");
                                                        while($row=mysqli_fetch_array($getservices)){
                                                        ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="label-control">Details</label>
                                                        <textarea class="form-control form-message required-field"
                                                            id="message" name="details" placeholder="Note some Details ...."
                                                            rows="8"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row forproducts" style="display: none;">
                                                <div class="col-lg-6">
                                                <label class="label-control">Products</label>
                                                    <select name="type_product[]" class="form-control">
                                                        <?php 
                                                        $getservices1 = mysqli_query($con , "SELECT * FROM products where status = '1'  order by id desc");
                                                        while($row=mysqli_fetch_array($getservices1)){
                                                        ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="label-control">Quantity</label>
                                                        <input class="form-control form-name" id="name" name="quantity[]"
                                                            placeholder="Quantity" type="number" >
                                                    </div>
                                                </div>
                                                <div class="products"></div>
                                                <div class="col-lg-12">
                                                <button class="btn btn-primary tw-mt-30 " type="button" id="addproduct">
                                                    Add More Product
                                                </button>
                                                </div>

                                            </div>                                          
                                            <!-- Col 12 end-->
                                        </div>

                                        <!-- Form row end-->
                                        <div class="col-lg-12  mt-3" >
                                        <button class="btn btn-primary tw-mt-30 pull-right" type="submit" name="submitquote"><i
                                                class="fa fa-paper-plane-o"></i>
                                            Submit Quote</button>
                                        </div>
                                    </form>
                                    <!-- Form end-->
                                </div>
                            </div>
                            <!-- Contact form end -->
                        </div>
                    </div>
                </div>
            </div>
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


        <!-- Google Map API Key-->
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
        </script>
        <!-- Google Map Plugin-->
        <script type="text/javascript" src="js/gmap3.js"></script>
        <!-- Template custom-->
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="js/select2/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.services').select2();
            });
            // for company
            $(document).on('change','#company',function(){
                if($(this).is(':checked')){
                    $('.forcompany').show();                    
                    // remove css display: inline-block
                    // reinitialize select2
                    $('.services').select2('destroy');
                    // add css display: inline-block
                    // reinitialize select2
                    $('.services').select2({
                        width: 'resolve'
                    });
                    $('.select2').attr('style', 'width: 500px !important');
                    

                }else{
                    $('.forcompany').hide();
                }
            });
            // for services
            $(document).on('change','.types',function(){
                if($(this).val() == 'services'){
                    $('.forproducts').hide();
                    $('#products').hide();
                    $('.forservices').show();
                }else{
                    $('.forproducts').show();
                    $('#services').hide();
                    $('.forservices').hide();
                }
            });

            // add more product
            $(document).on('click','#addproduct',function(){
                $('.products').append(`<div class="row"><div class="col-lg-5">
                <label class="label-control">Products</label><select name="type_product[]" class="form-control">
                <?php $getservices1 = mysqli_query($con , "SELECT * FROM products where status = '1'  order by id desc");
                while($row=mysqli_fetch_array($getservices1)){?><option value="<?php echo $row['id']; ?>">
                <?php echo $row['name'] ?></option><?php } ?></select></div>
                <div class="col-lg-5"><div class="form-group"><label class="label-control">Quantity</label>
                <input class="form-control form-name" id="name" name="quantity[]" placeholder="Quantity" type="number" ></div>
                </div>
                <button class="btn btn-danger tw-mt-30 " type="button" id="removeproduct" style="height:30px;margin-left: 40px;margin-top:22px;padding-top:5px;">-</button>
                </div>
                `);
            });
            $(document).on('click','#removeproduct',function(e){
                e.preventDefault();
            $(this).parent('div').remove();
            // x--;
            });
        </script>
    </div>
    <!--Body Inner end-->
</body>

</html>