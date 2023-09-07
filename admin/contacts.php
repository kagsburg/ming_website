<?php
 include("db/config.php");
 if(!isset($_SESSION['user'])){
    header('Location:login');
       }
 $page = "contacts";

      if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $update = $db->query("UPDATE `contact` SET `status`='0' WHERE id='".$id."'");
        header('location: portfolio');
    }
    if (isset($_GET['mail'])){
        $id = $_GET['mail'];
        $sql = mysqli_query($db,"SELECT * FROM contact WHERE id='".$id."'");
        $row = mysqli_fetch_array($sql);
        $to = $row['email'];
        $subject = "Reply from ".$row['name'];
        $message = $_POST['message'];
        $headers = "From:kagsburg@gmail.com" . "\r\n";
        mail($to,$subject,$message,$headers);
        $update = $db->query("UPDATE `contact` SET `status`='1' WHERE id='".$id."'");
        header('location: contacts');

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
    <title>Portfolio</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Contact Form</h1>
                        <!-- <a href="javascript.void(0)" data-toggle="modal" data-target="#addPortfolio" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas  fa-plus  fa-sm text-white-50"></i> Add Portfolio</a> -->
                    </div>

                    <?php 
                        if (isset($_POST['submitPort'])){
                            $title = mysqli_real_escape_string($db,trim($_POST['title']));
                            $project_manager =mysqli_real_escape_string($db,trim($_POST['project_manager']));
                            $location = mysqli_real_escape_string($db,trim($_POST['location']));
                            $service = mysqli_real_escape_string($db,trim($_POST['service']));
                            $client = mysqli_real_escape_string($db,trim($_POST['client']));
                            $description = mysqli_real_escape_string($db,trim($_POST['description']));
                            
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
                                                $insert = $db->query("INSERT INTO `projects`(`title`, `project_manager`, `service`, `client`, `description`, `location`,`image`,`status`) VALUES ('".$title."','".$project_manager."','".$service."','".$client."','".$description."','".$location."','".$image_ext."','".$status."')"); 
                                                // get last created Id 
                                                $last_id = $db->insert_id;
                                                $image_file1=md5($last_id).'.'.$image_ext;
                                                move_uploaded_file($image_temp,'../images/projects/'.$image_file1);

                                                echo '<div class="alert alert-success alert-icon" role="alert">
                                                <div class="alert-icon-content">
                                                    <h6 class="alert-heading">Success</h6>
                                                    New Portfolio Added Successfully.
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Contact Form</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
	                                        $sql=mysqli_query($db,"SELECT * FROM contact where status='0' order by id desc");
                                            if (mysqli_num_rows($sql) == 0) {
                                                echo '<tr><td colspan="8">No data available</td></tr>';
                                            } else{
	                                        while($row=mysqli_fetch_array($sql)){


	                                    ?>
                                            <tr>
                                            <!-- <td><img class="img-profile rounded-circle" src="../images/projects/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>" width="80px" height="80px"/></td> -->
                                                <td><?php echo $row["name"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td><?php echo $row["message"]; ?></td>
                                                <td>
                                                    <!-- button to email that use back  -->
                                                    <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-primary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                    <span class="text">Reply</span>
                                                </a>
                                                <!-- <a href="javascript.void(0)" data-toggle="modal" data-target="#editPort<?php echo $row['id']; ?>" class="btn btn-success btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a> -->
                                                <!-- <a href="portfolio?del=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Remove</span>
                                                </a>
                                                <a href="gallery"  class="btn btn-primary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Add Photos</span>
                                                </a> -->
                                                </td>
                                            </tr>
                                             <!-- Edit Service Modal-->
                                             <div class="modal fade" id="editPort<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Edit <?php echo $row['title']  ?></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form id="edit_project" action="" method="post"
                                                                                enctype="multipart/form-data"><input type="hidden" name="id" id="id"
                                                                                    value=<?php echo isset($row['id'])==true?$row['id']:""; ?> />
                                                                                <div class="form-group">
                                                                                    <label for="title" class="control-label mb-1">Project Title</label>
                                                                                    <input id="title" name="title<?php echo $row['id'] ?>" type="text" class="form-control"
                                                                                        <?php echo "value='".$row['title']."'"; ?>>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="form-group">
                                                                                            <label for="project_manager" class="control-label mb-1">Project
                                                                                                Manager</label>
                                                                                            <input id="project_manager" name="project_manager<?php echo $row['id'] ?>" type="text"
                                                                                                class="form-control"
                                                                                                <?php echo "value='".$row['project_manager']."'"; ?>>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group">
                                                                                            <label for="client" class="control-label mb-1">Client</label>
                                                                                            <input id="client" name="client<?php echo $row['id'] ?>" type="text"
                                                                                                class="form-control"
                                                                                                <?php echo "value='".$row['client']."'"; ?>>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="form-group">
                                                                                            <label for="location"
                                                                                                class="control-label mb-1">Location</label>
                                                                                            <input id="location" name="location<?php echo $row['id'] ?>" type="text"
                                                                                                class="form-control"
                                                                                                <?php echo "value='".$row['location']."'"; ?>>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group">
                                                                                            <label for="service" class="control-label mb-1">Service</label>
                                                                                            <select class="form-control" id="service" name="service<?php echo $row['id'] ?>"
                                                                                                required="required">
                                                                                                <?php
                                                                                                $sql2=mysqli_query($db,"SELECT * FROM services where status='1'");
                                                                                                while($row2=mysqli_fetch_array($sql2)){
                                                                                                    echo "<option value='".$row2['id']."'
                                                                                                    ".($row['service']==$row2['id']?"selected":"")."
                                                                                                    >".$row2['name']."</option>";
                                                                                                }
                                                                                            ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="description">Description</label>

                                                                                    <textarea id="description" name="description<?php echo $row['id'] ?>" class="ckeditor" cols="70"><?php echo $row['description']; ?></textarea>
                                                                                </div>

                                                                                <div class="row form-group">
                                                                                    <div class=" col col-md-3"><label for="image"
                                                                                            class=" form-control-label">Upload New
                                                                                            Photo</label>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-9"> <input type="file" name="image<?php echo $row['id'] ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div>
                                                                                    <button type="submit" name="updatePortfolio"
                                                                                        class="btn btn-lg btn-success btn-block">
                                                                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                                                        <span id="payment-button-amount">Edit Project Details</span>
                                                                                        <span id="payment-button-sending"
                                                                                            style="display:none;">Sending…</span>
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
                            <h5 class="modal-title" id="exampleModalLabel"> Add New Portfolio</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="title" class="control-label mb-1">Project Title</label>
                                                <input id="title" name="title" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="project_manager" class="control-label mb-1">Project
                                                            Manager</label>
                                                        <input id="project_manager" name="project_manager" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="client" class="control-label mb-1">Client</label>
                                                        <input id="client" name="client" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="location"
                                                            class="control-label mb-1">Location</label>
                                                        <input id="location" name="location" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="service" class="control-label mb-1">Service</label>
                                                        <select class="form-control" id="service" name="service"
                                                            required="required">
                                                            <option selected disabled hidden>Choose
                                                                Service
                                                            </option>
                                                            <?php
                                                            $sql=mysqli_query($db,"SELECT * FROM services where status='1'");
                                                            while($row=mysqli_fetch_array($sql)){
                                                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class=" col col-md-3"><label for="image"
                                                        class=" form-control-label">Upload New
                                                        Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="image" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>

                                                <textarea id="description" name="description" class="ckeditor" cols="70" id="editor1"></textarea>
                                            </div>


                                            <div>
                                                <button type="submit" name="submitPort"
                                                    class="btn btn-lg btn-success btn-block">
                                                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Add New Project</span>
                                                    <span id="payment-button-sending"
                                                        style="display:none;">Sending…</span>
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