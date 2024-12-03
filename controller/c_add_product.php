<?php
    require('../model/m_product.php');

    session_start();

    $name = $_POST['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Xử lý ảnh đại diện
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        $avatar_name = basename($_FILES['avatar']['name']);
        $avatar_path = "../uploads/" . $avatar_name;

        // Di chuyển tệp ảnh vào thư mục uploads
        if (move_uploaded_file($avatar_tmp, $avatar_path)) {
            $message = "Avatar uploaded successfully.";
        } else {
            $message = "Error uploading avatar.";
            $avatar_path = NULL; // Nếu không tải lên được, set giá trị NULL
        }
    } else {
        $avatar_path = NULL; // Không có ảnh thì set NULL
    }
    $new_product = new Product();
    $new_product->create_1_product($name, $description, $price, $category_id, $avatar_path);

    header("Location: ../admin/list_product.php");
?>

