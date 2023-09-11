<?php

include("db/config.php");
if(!isset($_SESSION['user'])){
   header('Location:login');
      }
$page = "gallery";



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
    <title>Gallery</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Our Gallery</h1>
                        <a href="javascript.void(0)" data-toggle="modal" data-target="#addPortfolio" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas  fa-plus  fa-sm text-white-50"></i> Add to Gallery</a>
                    </div>

                    <?php 
                        if(isset($_POST["submitGallery"])){ 
                            $price ='';// mysqli_real_escape_string($db,trim($_POST['price'])); 
                            $name = mysqli_real_escape_string($db,trim($_POST['title']));
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
                                    $insert = $db->query("INSERT INTO `photo_albums`(`title`, `descrption`,`image`,`status`) 
                                    VALUES ('".$name."','".$description."','".$image_ext."','".$status."')"); 
                                    // get last created Id 
                                    $last_id = $db->insert_id;
                                    $image_file1=md5($last_id).'.'.$image_ext;
                                    move_uploaded_file($image_temp,'../images/albums/'.$image_file1);

                                    echo '<div class="alert alert-success alert-icon" role="alert">
                                    <div class="alert-icon-content">
                                        <h6 class="alert-heading">Success</h6>
                                        New Album Created Successfully.
                                    </div>
                                </div>';
                            }
                        } 
                        if(isset($_POST["updateGallery2"])){
                            $id = mysqli_real_escape_string($db,trim($_POST['id']));
                            $price ='';// mysqli_real_escape_string($db,trim($_POST['price'.$id]));
                            $name = mysqli_real_escape_string($db,trim($_POST['name'.$id]));
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
                                    $update = $db->query("UPDATE `photo_albums` SET `title`='".$name."',`descrption`='".$description."',`image`='".$image_ext."' WHERE id='".$id."'");
                                    $image_file1=md5($id).'.'.$image_ext;
                                    move_uploaded_file($image_temp,'../images/albums/'.$image_file1);
                                    echo '<div class="alert alert-success alert-icon" role="alert">
                                                    <div class="alert-icon-content">
                                                    <h6 class="alert-heading">Success</h6>
                                                    Album Updated Successfully
                                                </div>
                                            </div>';
                                }

                            }else{
                                // update without image content 
                                $update = $db->query("UPDATE `photo_albums` SET `title`='".$name."',`descrption`='".$description."' WHERE id='".$id."'");
                                echo '<div class="alert alert-success alert-icon" role="alert">
                                                <div class="alert-icon-content">
                                                <h6 class="alert-heading">Success</h6>
                                                Album Updated Successfully
                                            </div>
                                        </div>';
                            }
                        }
                    ?>

                    <!-- Content Row -->
                    <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Our Albums</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Albums Title</th>
                                            <th>Description</th>
                                            <!-- <th>Service</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
	                                        $sql=mysqli_query($db,"SELECT * from photo_albums where status ='1' order by id desc");
                                            if (mysqli_num_rows($sql) == 0) {
                                                echo '<tr><td colspan="8">No data available</td></tr>';
                                            } else{
	                                        while($row=mysqli_fetch_array($sql)){                                               
	                                    ?>
                                            <tr>
                                            <td><img class="img-profile rounded-circle" src="../images/albums/<?php echo md5($row['id']) ?>.<?php echo $row['image'] ?>" width="80px" height="80px"/></td>
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["descrption"]; ?></td>
                                                <td>
                                                    <a href="javascript.void(0)" data-toggle="modal" data-target="#editAlbum<?php echo $row['id']; ?>" class="btn btn-success btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                                    <a href="album_gallery?id=<?php echo $row['id'];?>"  class="btn btn-secondary btn-icon-split btn-sm">
                                                    
                                                        <span class="text">View Photos</span>
                                                    </a>
                                                <!-- <a href="project_gallery?id=<?php echo $row['id'];?>"  class="btn btn-secondary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Remove</span>
                                                </a> -->
                                                </td>
                                            </tr>
                                             <!-- Edit Service Modal-->
                                             <div class="modal fade" id="editAlbum<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                                    <label for="title" class="control-label mb-1"> Title</label>
                                                                                    <input id="title" name="name<?php echo $row['id'] ?>" type="text" class="form-control"
                                                                                        <?php echo "value='".$row['title']."'"; ?>>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="description">Description</label>

                                                                                    <textarea id="description" name="description<?php echo $row['id'] ?>" class="ckeditor" cols="70"><?php echo $row['descrption']; ?></textarea>
                                                                                </div>

                                                                                <div class="row form-group">
                                                                                    <div class=" col col-md-3"><label for="image"
                                                                                            class=" form-control-label">Upload Cover
                                                                                            Photo</label>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-9"> <input type="file" name="image<?php echo $row['id'] ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div>
                                                                                    <button type="submit" name="updateGallery2"
                                                                                        class="btn btn-lg btn-success btn-block">
                                                                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                                                        <span id="payment-button-amount">Edit ALbum Details</span>
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
                            <h5 class="modal-title" id="exampleModalLabel"> Add New Album</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="caption"
                                                        class=" form-control-label">Title:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="caption"
                                                        name="title" placeholder="Title for the Album"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="image"
                                                        class=" form-control-label">Upload Cover
                                                        Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="image" required
                                                        > 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="description"
                                                        class=" form-control-label">Description:</label>
                                                </div>
                                                <div class="col-12 col-md-12"><textarea id="description"
                                                        name="description" class="ckeditor" cols="70" id="editor1"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button class=" btn btn-dark w-100" type="submit" name="submitGallery">Add
                                                    Album</button>
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