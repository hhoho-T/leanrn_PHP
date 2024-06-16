<?php
    function tao_gio_hang($id, $name, $cost, $qty){
        global $item_db;
        if ($qty < 1) return;
        //Khi gio hang da co san sp, can update ve so luong
        if(isset($_SESSION['cart'][$id])) {
            $qty += $_SESSION['cart'][$id]['qty'];
            update_gio_hang($id, $qty);
            return;
        }
        //Gan san pham vao gio hang
        $cost = $item_db[$id]['cost'];
        $total = $cost * $qty;
        $item = array(
            'name' => $item_db[$id]['name'],
            'cost' => $cost,
            'qty' => $qty,
            'total' => $total
        );
        $_SESSION['cart'][$id] = $item;
    }
    function update_gio_hang($id, $qty) {
        $qty = (int) $qty;
        if(isset($_SESSION['cart'][$id])){
            if($qty <=0){
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$id]['qty'] = $qty;
                $total = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['cost'];
                $_SESSION['cart'][$id]['total'] = $total;
            }
        }
    }

    function tong_gia_gh(){
        $sum_total = 0;
        foreach($_SESSION['cart'] as $item) {
            $sum_total += $item['total'];
        }
        $sum_total_f = number_format($sum_total,2);
        return $sum_total_f;
    }
    
    
?>