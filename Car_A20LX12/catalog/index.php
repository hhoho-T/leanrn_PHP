<?php
// Tạo một biến $action để nhận thông tin yêu cầu từ trình duyệt web
// Các yêu có thể nhận được: 1. Xem giao diện danh mục o_to
// 2. Xem giao diện về thông tin chi tiết của Ô Tô
// Dựa vào 2 yêu cầu trên để lấy data từ lớp model để tạo view

// Kiểm tra thông tin biến $action
// Nếu $action == NULL; set $action = 'xem_o_to'
require("../model/database.php");
require("../model/category_db.php");
require("../model/product_db.php");

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'xem_o_to';
    }
}
if ($action == 'xem_o_to') {
 // Gọi hàm lấy danh mục loại Ô Tô
 // Gọi hàm lấy tên Ô Tô được chọn
 // Gọi hàm lấy các Ô Tô được chọn theo tên loại Ô Tô
 // Xác thực mã ID của loại Ô Tô
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;    
    } 
    $categories = danh_muc_o_to();
    $category_name = ten_o_to($category_id);
    $products = lay_o_to_categoryID($category_id);
    include("product_list.php");
} elseif ($action == 'chi_tiet_o_to') {
 // Nếu nhận được yêu cầu từ trình duyệt gửi tới là xem chi tiết Ô Tô
 // Gọi hàm lấy tên Ô Tô được chọn
 // Gọi hàm lấy tên danh mục loại Ô Tô
 // Gọi hàm lấy thông tin Ô Tô
 // Xác thực mã ID của Ô Tô 
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $error = 'Lỗi xác thực mã ID Ô Tô được lựa chọn';
        include("../errors/error.php");
    } else {
        $categories = danh_muc_o_to();
        $product = lay_o_to_productid($product_id);

        // Lấy thông tin chi tiết về Ô Tô
        $product_code = $product['productCode'];
        $product_name = $product['productName'];
        $list_price = $product['listPrice'];

        // Xử lý tính toán với thông tin Ô Tô
        $product_percent = 30;
        $product_amount = round(($product_percent * $list_price) / 100.0, 2);
        $price = $list_price - $product_amount;

        // Định dạng lại số liệu theo form
        $list_price_f = number_format($list_price, 2);
        $product_amount_f = number_format($product_amount, 2);
        $price_f = number_format($price, 2);

        // Lấy URL ảnh Ô Tô được chọn
        $image_url = '../images/' . $product_code . '.png';
        $image_alt = 'Image: ' .$product_code . '.png';
        
        include("product_view.php");
    } 
    
}



?>