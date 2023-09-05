<?php
	session_start();

//If file upload form is submitted 
include("db/config.php");

$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
   
    $id = $_POST['id'];
	$name = $_POST['name'];
    $title = $_POST['title'];
    $testimony = $_POST['testimony'];
    $image = $_POST['image'];

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            $insert = $db->query("UPDATE testimonials SET name='$name', title='$title', testimony='$testimony', image='$imgContent' WHERE id=$id"); 
             
            if($insert){ 
                $_SESSION['message'] = "Testimonial Successfully Updated!"; 
                header('location: testimonials.php'); 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $insert = $db->query("UPDATE testimonials SET name='$name', title='$title', testimony='$testimony' WHERE id=$id"); 
             
            if($insert){ 
                $_SESSION['message'] = "Testimonial Successfully Updated!"; 
                header('location: testimonials.php'); 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            } 
    } 

} 
?>