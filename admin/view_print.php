<?php
// include("edit_service_code.php");
include("db/config.php");
if(!isset($_SESSION['user'])){
    header('Location:login');
       }
$page = "quotes";
$id = $_GET['id'];


if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $update = $db->query("UPDATE `quoteinfo` SET `status`='".$status."' WHERE id='".$id."'");
    if ($update) {
        // $_SESSION['msg'] = '<div class="alert alert-success">Quote updated successfully</div>';
        // header('location: view_quote?id='.$id);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Quotes</title>
    <link href="images/icon/favicon.ico" rel="icon">
    <script src="ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="ckeditor/samples/sample.css">

            <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="" -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">                        
                        <div style="
                          display: flex;
                          justify-content: center;
                          align-items: center;">
                    <img alt="image" src="images/icon/logo.png" />
                </div>
                    <h1 class="text-center" style="font-family:Times New roman;color: #000; margin-left:40px;">Minagrico Engineering </h1><br/>
                    
                    <hr/>
                    </div>                   
                        <?php 
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        
                        ?>
                    <!-- Content Row -->
                    <div class="container-fluid">
                    <div class="card  mb-4">
                        <div class="card-header py-3">
                        <h1 class="h3 mb-0 text-gray-800">Quote Requests </h1>
                        </div>
                        <div class="card-body">
                            <?php 
                               $getquoteinfo = mysqli_query($db, "SELECT * FROM quoteinfo WHERE id='".$id."'");
                                 $quoteinfo = mysqli_fetch_assoc($getquoteinfo);
                                 $quote_id = $quoteinfo['id'];
                                    $quote_name = $quoteinfo['names'];
                                    $quote_email = $quoteinfo['email'];
                                    $quote_phone = $quoteinfo['contact'];
                                    $quote_address = $quoteinfo['location'];
                                    $companyname = $quoteinfo['companyname'];
                                    $companylocation= $quoteinfo['companylocation'];
                                    $companycontact = $quoteinfo['companycontact'];
                                    $checkquoteservice = mysqli_query($db, "SELECT * FROM quote_services WHERE quote_id='".$quote_id."'");
                                    $checkquoteproduct = mysqli_query($db, "SELECT * FROM quote_products WHERE quote_id='".$quote_id."'");

                                    
                            ?>
                           <div>
                                 <h4>Quote Information</h4>
                                 <p><b>Name:</b> <?php echo $quote_name; ?></p>
                                 <p><b>Email:</b> <?php echo $quote_email; ?></p>
                                 <p><b>Phone:</b> <?php echo $quote_phone; ?></p>
                                 <p><b>Address:</b> <?php echo $quote_address; ?></p>
                                 <?php if ($companyname != "") { ?>
                                    <p><b>Company Name:</b> <?php echo $companyname; ?></p>
                                    <p><b>Company Location:</b> <?php echo $companylocation; ?></p>
                                    <p><b>Company Contact:</b> <?php echo $companycontact; ?></p>
                                    <?php } ?>
                                 <?php if (mysqli_num_rows($checkquoteservice) > 0) { ?>
                                    <p><b>Services:</b></p>
                                    <ul>
                                    <?php
                                    $details = "";
                                    while ($quote_service = mysqli_fetch_assoc($checkquoteservice)) {
                                        $service_id = $quote_service['service_id'];
                                        $details= $quote_service['details'];
                                        $getservice = mysqli_query($db, "SELECT * FROM services WHERE id='".$service_id."'");
                                        $service = mysqli_fetch_assoc($getservice);
                                        $service_name = $service['name'];
                                        echo "<li>".$service_name."</li>";
                                    }
                                    ?>
                                    </ul>
                                    <p>Details: <?php echo $details; ?></p>
                                    <?php } ?>
                                    <?php if (mysqli_num_rows($checkquoteproduct) > 0) { ?>
                                    <p><b>Products:</b></p>
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $grand=0;
                                    while ($quote_product = mysqli_fetch_assoc($checkquoteproduct)) {
                                        $product_id = $quote_product['product_id'];
                                        $quantity = $quote_product['quantity'];
                                        $getproduct = mysqli_query($db, "SELECT * FROM products where status = '1'and id='".$product_id."'");
                                        $product = mysqli_fetch_assoc($getproduct);
                                        $product_name = $product['name'];
                                        $product_price = $product['price'];
                                        $total = $product_price * $quantity;
                                        $grand += $total;
                                        $product_price=number_format($product_price);
                                        $total= number_format($total);

                                        echo "<tr><td>".$product_name."</td><td>".$quantity."</td><td>".$product_price."</td><td>".$total."</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan='3'>Grand Total</td>
                                            <td><?php echo  number_format($grand); ?></td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                    <?php } ?>
                           </div>
                            <hr>
                           
                            <!-- end button to process quote -->
                            
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <!-- <span>Copyright &copy; Your Website 2021</span> -->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        window.print();

</script>

</body>

</html>
<!-- end document-->