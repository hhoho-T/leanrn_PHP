<?php
// Lấy danh mục ô tô
// Lấy tên ô tô
// Thêm loại ô tô

//1. Hàm lấy danh mục ô tô trong bảng categories
function danh_muc_o_to() {
    global $db;
    $querry_categories = "SELECT * FROM categories ORDER BY categoryID";
    $statement = $db->prepare($querry_categories);
    $statement->execute();
    return $statement;
}

//2. Hàm lấy tên ô tô trong bảng categories
function ten_o_to($category_id) {
    global $db;
    $querry_category_name = "SELECT * FROM categories WHERE categoryID = :category_id";
    $statement = $db->prepare($querry_category_name);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category['categoryName'];      
    return $category_name;
}

// Thêm loại ô tô
function them_loai_o_to($category_name) {
    global $db;
    $querry = "INSERT INTO categories (categoryName) VALUES (:category_name)";
    $statement = $db->prepare($querry);
    $statement->bindValue(":category_name", $category_name);
    $statement->execute();
    $statement->closeCursor();
}

// Xoá loại ô tô
function xoa_loai_o_to($category_id){
    global $db;
    $querry = "DELETE FROM categories WHERE categoryID = :category_id";
    $statement = $db->prepare($querry);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $statement->closeCursor();
}

?>