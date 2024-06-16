<?php
// Tạo biến $action nhận các yêu cầu từ trình duyệt web
// Các yêu cầu có thể nhận: xem thông tin Ô tô; xoá Ô tô; xem bảng thêm Ô Tô; thêm Ô tô

// $action khi lần đầu ứng dụng được gọi
require ("../model/database.php");
require ("../model/category_db.php");
require ("../model/product_db.php");

$action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'xem_o_to';
        }
    }
// Nếu nhận yêu cầu từ trình duyệt là xem Ô tô
if ($action == 'xem_o_to') {
// Gọi các hàm liên quan lấy thông tin từ database
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $category_name = ten_o_to($category_id);
    $categories = danh_muc_o_to();
    $products = lay_o_to_categoryID($category_id);
    include ("products_list.php");
} elseif ($action == 'xoa_o_to') {
// Nếu nhận yêu cầu từ trình duyệt là xoá Ô tô
// Gọi hàm xoá Ô tô theo productID
// Chuyển hướng tới trang hiện hành theo catgegoryID
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE || $category_id == NULL || $category_id == FALSE) {
        $error = 'Lỗi xác thực mã Ô tô khi thực hiện chức năng xoá';
        include ("../errors/error.php");
    } else {
        xoa_o_to($product_id);
        header("Location: .?category_id=$category_id");
    } 
} elseif ($action == 'xem_bang_them_o_to') {
// Nếu nhận yêu cầu từ trình duyệt là xem form thêm Ô tô
// Gọi hàm liên quan để lấy dữ liệu từ database và chuyển hướng tới form
    $categories =  danh_muc_o_to();
    include ("product_add.php");
} elseif ($action == 'them_o_to') {
// Nếu nhận yêu cầu từ trình duyệt là thêm Ô tô
// Gọi hàm thêm Ô tô
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $product_code = filter_input(INPUT_POST, 'product_code');
    $product_name = filter_input(INPUT_POST, 'product_name');
    $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
    if ($category_id == NULL || $category_id == FALSE || $product_code == NULL 
    || $product_name == NULL || $list_price == NULL || $list_price == FALSE) {
        $error = 'Lỗi xác thực các thông tin về Ô tô';
        include ("../errors/error.php");
    } else {
        them_o_to($category_id, $product_code, $product_name, $list_price);
        header("Location: .?category_id=$category_id");
    }
} elseif ($action == 'xem_danh_muc_o_to') {
// Nhận yêu cầu từ trình duyệt là xem danh mục Ô tô
    $categories = danh_muc_o_to();
    include("category_list.php");

} elseif ($action == 'xoa_loai_o_to') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $error = "Lỗi xác thực ID loại Ô tô";
        include("../erros/error.php");
    } else {
        xoa_loai_o_to($category_id);
        header("Location: .?category_id=$category_id");
    }   
} elseif ($action == 'them_loai_o_to') {
    $category_name = filter_input(INPUT_POST, 'category_name');
    if ($category_name == NULL ) {
        $error = 'Lỗi xác thực các thông tin về Ô tô';
        include ("../errors/error.php");
    } else {
        them_loai_o_to($category_name);
        header("Location: .?category_id=$category_id");
    }
    
}
?>