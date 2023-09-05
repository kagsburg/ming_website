<?php

include("db/config.php");
if(!isset($_SESSION['user'])){
   header('Location:login');
      }
$page = "videos";

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $update = $db->query("UPDATE `videos` SET `status`='0' WHERE id='".$id."'");
    header('location: new_video');
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
    <title>Videos</title>
    <link href="images/icon/favicon.ico" rel="icon">

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
                        <h1 class="h3 mb-0 text-gray-800">Our Videos</h1>
                        <a href="javascript.void(0)" data-toggle="modal" data-target="#addPortfolio" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas  fa-plus  fa-sm text-white-50"></i> Add New Videos</a>
                    </div>
                   

                    <?php 
                        if (isset($_POST['but_upload'])){
                            $caption = mysqli_real_escape_string($db,trim($_POST['caption']));

                            $image_name=$_FILES['file']['name'];
                            $image_size=$_FILES['file']['size'];
                            $image_temp=$_FILES['file']['tmp_name'];
                            $allowed_ext=array("mp4","avi","3gp","mov","mpeg",'');
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
                                                $insert = $db->query("INSERT INTO videos(name,caption,location,status) VALUES('".$image_name."','".$caption."','".$image_ext."','".$status."')"); 
                                                // get last created Id 
                                                $last_id = $db->insert_id;
                                                $image_file1=md5($last_id).'.'.$image_ext;
                                                move_uploaded_file($image_temp,'videos/'.$image_file1);

                                                echo '<div class="alert alert-success alert-icon" role="alert">
                                                <div class="alert-icon-content">
                                                    <h6 class="alert-heading">Success</h6>
                                                    New Video Added Successfully.
                                                </div>
                                            </div>';
                            }
                        }
                        if(isset($_POST["updatePortfolio"])){
                            $id = mysqli_real_escape_string($db,trim($_POST['id']));
                            $project_manager = mysqli_real_escape_string($db,trim($_POST['project_manager'.$id]));
                            $title = mysqli_real_escape_string($db,trim($_POST['title'.$id]));
                            $location = mysqli_real_escape_string($db,trim($_POST['location'.$id]));
                            $service = mysqli_real_escape_string($db,trim($_POST['service'.$id]));
                            $client = mysqli_real_escape_string($db,trim($_POST['client'.$id]));
                            $description = mysqli_real_escape_string($db,trim($_POST['description'.$id]));

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
                                    $update =$db->query("UPDATE projects SET title='$title', project_manager='$project_manager', location='$location', service='$service', client='$client', description='$description', image='$image_ext' WHERE id=$id")
                                    or die(mysqli_error($db));
                                    $image_file1=md5($id).'.'.$image_ext;
                                    move_uploaded_file($image_temp,'../images/projects/'.$image_file1);
                                    echo '<div class="alert alert-success alert-icon" role="alert">
                                                    <div class="alert-icon-content">
                                                    <h6 class="alert-heading">Success</h6>
                                                    Portfolio Updated Successfully
                                                </div>
                                            </div>';
                                }

                            }else{
                                // update without image content
                                $insert = $db->query("UPDATE projects SET title='$title', project_manager='$project_manager', location='$location', service='$service', client='$client', description='$description' WHERE id=$id");  

                                echo '<div class="alert alert-success alert-icon" role="alert">
                                                <div class="alert-icon-content">
                                                <h6 class="alert-heading">Success</h6>
                                                Portfolio Updated Successfully
                                            </div>
                                        </div>';
                            }
                        }
                    ?>

                    <!-- Content Row -->
                    <div class="container-fluid">
                        <div class="row">
                            <?php 
                             $fetchVideos = mysqli_query($db, "SELECT * FROM videos where status ='1' ORDER BY id DESC");
                             if (mysqli_num_rows($fetchVideos) ==0 ){
                                echo '<div class="alert alert-success alert-icon" role="alert">
                                <div class="alert-icon-content">
                                <h6 class="alert-heading">Nope</h6>
                                No Videos Uploaded Yet.
                            </div>
                        </div>';
                             }else{
                                while ($row = mysqli_fetch_array($fetchVideos)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $caption = $row['caption'];
                                    $location = $row['location'];
                                    $status = $row['status'];
                            ?>
                            <div class="col-sm-6 col-lg-3">
                            <div class="card">
                            <video src='videos/<?php echo md5($row['id']) ?>.<?php echo $row['location'] ?>' controls height="200px"class="card-img-top"></video>
                                <!-- <img  src="images/bg-title-01.jpg" alt="..."> -->
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Card Image Cap (Top)</h5> -->
                                    <p class="card-text"><?php echo $caption ?></p>
                                    <!-- <a href="#" class="btn btn-info btn-circle ">
                                    <i class="fas fa-edit"></i>
                                    </a> -->
                                    <a href="new_video?del=<?php echo $row['id'] ?>" class="btn btn-danger btn-circle " onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    <!-- <a href="javascript.void(0)" data-toggle="modal" data-target="#editPortfolio<?php echo $id ?>" class="btn btn-primary">Edit</a> -->
                                    <!-- <a href="javascript.void(0)" data-toggle="modal" data-target="#deletePortfolio<?php echo $id ?>" class="btn btn-danger">Delete</a> -->
                                </div>
                            </div>
                            </div>
                            <?php }} ?>

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
                            <h5 class="modal-title" id="exampleModalLabel"> Add New Video</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="" enctype='multipart/form-data'>
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="caption"
                                                        class=" form-control-label">Caption:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="caption"
                                                        name="caption" placeholder="Caption for the Video"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <!-- <div class="row form-group">
                                                <div class="col col-md-2"><label for="description"
                                                        class=" form-control-label">Description:</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <textarea id="description"
                                                        name="description" rows="4" cols="100"
                                                        style="margin-left: 20px; border-color: lightgray; border-radius: 4px;"></textarea>
                                                </div>
                                            </div> -->
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="file"
                                                        class=" form-control-label">Select Video</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="file" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class=" btn btn-success w-100" type="submit"
                                                    name="but_upload">Upload New
                                                    Video</button>
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