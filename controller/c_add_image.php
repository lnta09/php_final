<?php
    require('../model/m_image.php');

    if(isset($_POST)){
        $product_id = $_POST['product_id'];
    }else{
        die('something wrong about Post-method');
    }
    //echo '';
    // Xử lý ảnh đại diện
    if (isset($_FILES['path']) && $_FILES['path']['error'] == 0) {
        $picture_tmp = $_FILES['path']['tmp_name'];
        $picture_name = basename($_FILES['path']['name']);
        $picture_path = "../uploads/" . $picture_name;

        // Di chuyển tệp ảnh vào thư mục uploads
        if (move_uploaded_file($picture_tmp, $picture_path)) {
            $message = "Avatar uploaded successfully.";
        } else {
            $message = "Error uploading avatar.";
            $picture_path = NULL; // Nếu không tải lên được, set giá trị NULL
            die($message);
        }
    } 
    else {
        $picture_path = NULL; // Không có ảnh thì set NULL
        die('Error path image');
    }
    $new_image = new Image();
    $new_image->create_1_image($product_id, $picture_path);
    //echo $picture_path. " - ". $product_id;
    header("Location: ../admin/list_image.php");
?>

