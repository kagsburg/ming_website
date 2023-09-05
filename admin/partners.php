<?php
include("db/config.php");
 if(!isset($_SESSION['user'])){
    header('Location:login');
       }
 $page = "partners";

      if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $update = $db->query("UPDATE `partners` SET `status`='0' WHERE id='".$id."'");
        header('location: partners');
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
    <title>Partners</title>
    <link href="images/icon/favicon.ico" rel="icon">
    <!-- Fontfaces CSS-->
    <script src="ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="ckeditor/samples/sample.css">
            <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                        <h1 class="h3 mb-0 text-gray-800">Our Partners </h1>
                        <a href="javascript.void(0)" data-toggle="modal" data-target="#addPortfolio" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas  fa-plus  fa-sm text-white-50"></i> Add New Partner</a>
                    </div>

                    <?php 
                        if (isset($_POST['submitPartner'])){
                            $website =mysqli_real_escape_string($db,trim($_POST['website'])); 
                            $company =mysqli_real_escape_string($db,trim($_POST['company']));
                            
                            
                            $image_name=$_FILES['image']['name'];
                            $image_size=$_FILES['image']['size'];
                            $image_temp=$_FILES['image']['tmp_name'];
                            $allowed_ext=array('jpg','jpeg','png','gif','');
                            $ext=explode('.',$image_name);
                            $image_ext=  strtolower(end($ext));
                            $status='1';
                            $errors=array();
                            if (in_array($image_ext,$allowed_ext)===false){
                            $errors[]='File type not allowed';
                            }
                            if($image_size>10097152){
                            $errors[]='Maximum size is 10Mb';
                            }
                            if(!empty($errors)){
                            foreach($errors as $error){ 
                            echo ' <div class="alert alert-danger alert-icon" role="alert">
                            <div class="alert-icon-content">
                                '.$error.'
                            </div>
                                </div>';
                            }
                            }else{
                                 // Insert image content into database 
                                    $insert = $db->query("INSERT INTO `partners`(`website`, `company`, `logo`,`status`) VALUES ('".$website."','".$company."','".$image_ext."','".$status."')"); 
             
                                                // get last created Id 
                                                $last_id = $db->insert_id;
                                                $image_file1=md5($last_id).'.'.$image_ext;
                                                move_uploaded_file($image_temp,'../images/partners/'.$image_file1);

                                                echo '<div class="alert alert-success alert-icon" role="alert">
                                                <div class="alert-icon-content">
                                                    <h6 class="alert-heading">Success</h6>
                                                    New Parnter Added Successfully.
                                                </div>
                                            </div>';
                            }
                        }
                        if(isset($_POST["updatePartner"])){
                            $id = mysqli_real_escape_string($db,trim($_POST['id']));
                            $website =mysqli_real_escape_string($db,trim($_POST['website'.$id])); 
                            $company =mysqli_real_escape_string($db,trim($_POST['company'.$id]));

                            if (isset($_FILES['image'.$id]) && !empty($_FILES['image'.$id]) && $_FILES['image'.$id]['size']!=0){
                                $image_name=$_FILES['image'.$id]['name'];
                                $image_size=$_FILES['image'.$id]['size'];
                                $image_temp=$_FILES['image'.$id]['tmp_name'];
                                $allowed_ext=array('jpg','jpeg','png','gif','');
                                $ext=explode('.',$image_name);
                                $image_ext=  strtolower(end($ext));
                                $status='1';
                                $errors=array();
                                if (in_array($image_ext,$allowed_ext)===false){
                                $errors[]='File type not allowed';
                                }
                                if($image_size>10097152){
                                $errors[]='Maximum size is 10Mb';
                                }
                                if(!empty($errors)){
                                    foreach($errors as $error){
                                        echo ' <div class="alert alert-danger alert-icon" role="alert">
                                        <div class="alert-icon-content">
                                        '.$error.'
                                                    </div>
                                        </div>';
                                        }
                                }else{
                                    // update with image content 
                                    $update =$db->query("UPDATE partners SET website='$website', company='$company',logo='$image_ext' WHERE id=$id")
                                    or die(mysqli_error($db));
                                    $image_file1=md5($id).'.'.$image_ext;
                                    move_uploaded_file($image_temp,'../images/partners/'.$image_file1);
                                    echo '<div class="alert alert-success alert-icon" role="alert">
                                                    <div class="alert-icon-content">
                                                    <h6 class="alert-heading">Success</h6>
                                                    Parnter Updated Successfully
                                                </div>
                                            </div>';
                                }

                            }else{
                                // update without image content
                                $insert = $db->query("UPDATE partners SET website='$website', company='$company' WHERE id=$id");  
                                if ($insert){
                                    echo '<div class="alert alert-success alert-icon" role="alert">
                                                    <div class="alert-icon-content">
                                                    <h6 class="alert-heading">Success</h6>
                                                    Parnter Updated Successfully
                                                </div>
                                            </div>';
                                }

                                }
                        }
                    ?>

                    <!-- Content Row -->
                    <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Our Partners </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Logo</th>
                                            <th>Company</th>
                                            <th>Website</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
	                                        $sql=mysqli_query($db,"SELECT * FROM partners where status='1'");
                                            if (mysqli_num_rows($sql) == 0) {
                                                echo '<tr><td colspan="5">No data available</td></tr>';
                                            } else{
	                                        while($row=mysqli_fetch_array($sql)){
                                                	                                    ?>
                                            <tr>
                                            <td><img class="img-profile rounded-circle" src="../images/partners/<?php echo md5($row['id']) ?>.<?php echo $row['logo'] ?>" width="80px" height="80px"/></td>
                                                <td><?php echo $row["company"]; ?></td>
                                                <td><?php echo $row["website"]; ?></td>
                                                <td>
                                                <a href="javascript.void(0)" data-toggle="modal" data-target="#editPort<?php echo $row['id']; ?>" class="btn btn-success btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                                <a href="partners?del=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Remove</span>
                                                </a>
                                                </td>
                                            </tr>
                                             <!-- Edit Service Modal-->
                                             <div class="modal fade" id="editPort<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Edit <?php echo $row['company']  ?></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form id="edit_project" action="" method="post"
                                                                                enctype="multipart/form-data">
                                                                                <input type="hidden" name="id" id="id"
                                                                                    value=<?php echo isset($row['id'])==true?$row['id']:""; ?> />
                                                                                    <div class="row form-group">
                                                <div class="col col-md-2"><label for="company"
                                                        class=" form-control-label">Company:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="company" value="<?php echo $row['company'] ?>"
                                                        name="company<?php echo $row['id']; ?>" placeholder="Company Name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="website"
                                                        class=" form-control-label">Website:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="website" value="<?php echo $row['website'] ?>"
                                                        name="website<?php echo $row['id']; ?>" placeholder="Company Website"
                                                        class="form-control"></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="logo"
                                                        class=" form-control-label">Company
                                                        Logo</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="image<?php echo $row['id']; ?>">
                                                </div>
                                            </div>

                                                                                <div>
                                                                                    <button type="submit" name="updatePartner"
                                                                                        class="btn btn-lg btn-success btn-block">
                                                                                        <span id="payment-button-amount">Edit Partner Details</span>
                                                                                        
                                                                                    </button>
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
            <div class="modal fade" id="addPortfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Add New Partner</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="company"
                                                        class=" form-control-label">Company:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="company"
                                                        name="company" placeholder="Company Name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="website"
                                                        class=" form-control-label">Website:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="website"
                                                        name="website" placeholder="Company Website"
                                                        class="form-control"></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="logo"
                                                        class=" form-control-label">Company
                                                        Logo</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class=" btn btn-dark w-100" type="submit" name="submitPartner">Add New
                                                    Partner</button>
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
    // "order": [[ 0, "desc" ]]
  });
});

</script>

</body>

</html>
<!-- end document-->