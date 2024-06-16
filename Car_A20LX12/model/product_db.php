<?php
// Lấy thông tin ô tô trong bảng products theo categoryID
// Lấy thông tin ô tô trong bảng products theo productID
// Xoá thông tin ô tô trong bảng products theo productID
// Thêm thông tin ô tô trong bảng products theo productID

//1. Lấy thông tin ô tô trong bảng products theo categoryID
function lay_o_to_categoryID($category_id) {
    global $db;
    $query = 'SELECT * FROM products WHERE products.categoryID = :category_id ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id",$category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

//2. Lấy thông tin ô tô trong bảng products theo productID
function lay_o_to_productid($product_id) {
    global $db;
    $query = 'SELECT * FROM products WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id",$product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

//3. Xoá thông tin ô tô trong bảng products theo productID
function xoa_o_to($product_id) {
    global $db;
    $query = 'DELETE FROM products WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id",$product_id);
    $statement->execute();
    $statement->closeCursor();
}

//4. Thêm ô tô vào bảng products 
function them_o_to($category_id, $product_code, $product_name, $list_price) {
    global $db;
    $query = 'INSERT INTO products (categoryID, productCode, productName,listPrice) 
                VALUES (:category_id, :product_code, :product_name, :list_price)';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id",$category_id);
    $statement->bindValue(":product_code",$product_code);
    $statement->bindValue(":product_name",$product_name);
    $statement->bindValue(":list_price",$list_price);
    $statement->execute();
    $statement->closeCursor();
}   
?>