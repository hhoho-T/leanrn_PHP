<?php
    //Khoi tao mot session
    session_start();
    //Khoi tao mang du lieu ve session
    if(empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    //Lay du lieu tu cac input cua giao dien product_view
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name');
    $cost = filter_input(INPUT_POST, 'cost');
    $qty = filter_input(INPUT_POST, 'qty');
    $item_db = array();
    $item_db[$id] = array(
        'name' => $name,
        'cost' => $cost,
        'qty' => $qty
    );
    require("../model/cart.php");

    $action = filter_input(INPUT_POST, 'action');

    switch($action) {
        case 'tao_gio_hang':
            tao_gio_hang($id, $name, $cost, $qty);
            include("cart_view.php");
            break;
        case 'update_gio_hang':
            $new_qty = filter_input(INPUT_POST, 'new_qty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if (is_array($new_qty)) {
                foreach ($new_qty as $id => $qty) {
                    if ($_SESSION['cart'][$id]['qty'] != $qty) {
                        update_gio_hang($id, $qty);
                    }
                }
            }
            include("cart_view.php");
            break;
        case 'xem_gio_hang':
            include("cart_view.php");
            break;
        case 'them_gio_hang':
            include("../catalog");
            break;
        case 'xoa_gio_hang':
            unset($_SESSION['cart']);
            include("cart_view.php");
            break;    
    }
?>