<?php
// include("edit_service_code.php");
include("db/config.php");
if(!isset($_SESSION['user'])){
    header('Location:login');
       }
$page = "categories";

      if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $update = $db->query("UPDATE `category` SET `status`='0' WHERE category_id='".$id."'");
        header('location: category');
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
    <title>Update Categories</title>
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
        <?php include ("includes/sidebar.php")?>
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include ("includes/header.php")?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Our Categories </h1>
                        <a href="javascript.void(0)" data-toggle="modal" data-target="#addService" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add Categories </a>
                    </div>                   
                        <?php 
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                       
                                    if(isset($_POST["submitNew"])){ 
                                        // $price = mysqli_real_escape_string($db,trim($_POST['price'])); 
                                        $name = mysqli_real_escape_string($db,trim($_POST['name']));
                                        $check= $db->query("SELECT * from category where category='$name' and status='1'");
                                        if (mysqli_num_rows($check) > 0){
                                            
                                            echo '<div class="alert alert-danger alert-icon" role="alert">
                                            <div class="alert-icon-content">
                                                <h6 class="alert-heading">Error</h6>
                                                Category Already exists
                                            </div>
                                        </div>';
                                        }else{

                                            // Insert image content into database 
                                            $insert = $db->query("INSERT INTO `category`(`category`,`status`) VALUES ('".$name."','1')"); 
                                            // get last created Id 
                                            // $last_id = $db->insert_id;
                                            // $image_file1=md5($last_id).'.'.$image_ext;
                                            // move_uploaded_file($image_temp,'../images/services/'.$image_file1);
    
                                            echo '<div class="alert alert-success alert-icon" role="alert">
                                            <div class="alert-icon-content">
                                                <h6 class="alert-heading">Success</h6>
                                                New Category Added Successfully.
                                            </div>
                                        </div>';
                                        }
                                            
                                    } 

                                    if(isset($_POST["updateService"])){
                                        $id = mysqli_real_escape_string($db,trim($_POST['id']));
                                        $name2 = mysqli_real_escape_string($db,trim($_POST['name'.$id]));
                                        // $description = mysqli_real_escape_string($db,trim($_POST['description'.$id]));
                                            // update without image content 
                                            $update = $db->query("UPDATE `category` SET category='".$name2."' WHERE category_id='".$id."'");
                                            echo '<div class="alert alert-success alert-icon" role="alert">
                                                            <div class="alert-icon-content">
                                                            <h6 class="alert-heading">Success</h6>
                                                            Category Updated Successfully
                                                        </div>
                                                    </div>';
                                        }
                                    
                        
                        ?>
                    <!-- Content Row -->
                    <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th >Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th> Name</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    <?php
	                                        $sql=mysqli_query($db,"SELECT * FROM category where status = '1' order by category_id desc");
                                            if (mysqli_num_rows($sql) == 0) {
                                                echo '<tr><td colspan="8">No data available</td></tr>';
                                            } else{
	                                        while($row=mysqli_fetch_array($sql)){
	                                    ?>
                                            <tr>
                                                <!-- <td><img class="img-profile rounded-circle" src="../images/services/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>" width="100px" height="100px"/></td> -->
                                                <td><?php echo $row["category"]; ?></td>
                                                <td>
                                                <a href="javascript.void(0)" data-toggle="modal" data-target="#editService<?php echo $row['category_id']; ?>" class="btn btn-success btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                                <a href="category?del=<?php echo $row['category_id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Remove</span>
                                                </a>
                                                    <!-- <a href="javascript.void(0)" data-toggle="modal"  class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> -->
                                                    <!-- <a href="services.php?del=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                                                </td> 

                                            </tr>
                                            <!-- Edit Service Modal-->
                                            <div class="modal fade" id="editService<?php echo $row['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit <?php echo $row['category']  ?></h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row['category_id']  ?>">
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="name"
                                                        class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name<?php echo $row['category_id']  ?>" value="<?php echo $row['category']  ?>"
                                                        placeholder="Service Name" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button class=" btn btn-success w-100" type="submit" name="updateService">Edit Service</button>
                                            </div>
                                        </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                        </div>
                    </div>
                </div>
            </div>

                                            <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Add Service Modal-->
            <div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Add New Category</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="name"
                                                        class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name"
                                                        placeholder="Category Name" class="form-control" required>
                                                </div>
                                            </div>

                                            <!-- <div class="row form-group">
                                                <div class="col col-md-2"><label for="price"
                                                        class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="price" name="price"
                                                        placeholder="Price of Service" class="form-control"></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="image"
                                                        class=" form-control-label">
                                                        Photo*</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="image" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>

                                                <textarea name="description" class="ckeditor" cols="70" id="editor1" ></textarea>
                                            </div> -->
                                            <div class="form-group">
                                                <button class=" btn btn-success w-100" type="submit" name="submitNew">Add
                                                    New
                                                    Category</button>
                                            </div>
                                        </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                        </div>
                    </div>
                </div>
            </div>
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
    <script>$(document).ready(function() {
  $('#dataTable').DataTable({
    "order": [[ 0, "desc" ]]
  });
});

</script>

</body>

</html>
<!-- end document-->