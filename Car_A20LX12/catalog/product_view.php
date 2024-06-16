<?php
    include("../views/header.php");
?>
<main>
        <h1>Thông tin cửa hàng Ô tô Car Classic A20LX12</h1>
        <aside>
            <h2>Loại Ô Tô</h2>
            <nav>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                    <li>
                        
                        <a href="?category_id=<?php echo $category['categoryID'];?>">
                        <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </nav>
        </aside>
        <section>
            <h2>
                <?php echo $product_name?>
            </h2>
            <div id="left_column">
                <p>
                    <img style="width: 160px; height: 140px;" src="<?php echo $image_url;?>" alt="<?php echo $image_alt;?>">
                </p>
            </div>
            <div id="right_column">
                <p><b>Đơn giá:</b>$<?php echo $list_price_f;?></p>
                <p><b>Chiết khấu:</b><?php echo $product_percent;?>%</p>
                <p><b>Giá SP:</b><?php echo $price_f;?></p>
                <p><b>Tiết kiệm:</b><?php echo $product_amount_f;?></p>
                <form action="../cart/index.php" method="POST">
                    <input type="hidden" name="action" value="tao_gio_hang">
                    <input type="hidden" name="id" value="<?php echo $product['productID'];?>"> 
                    <input type="hidden" name="name" value="<?php echo $product_name;?>"> 
                    <input type="hidden" name="cost" value="<?php echo $price_f;?>">    
                    <b>Số lượng:</b>
                    <select name="qty">
                        <?php for($i=1; $i<=5; $i++) : ?>
                            <option value="<?php echo $i;?>">
                                <?php echo $i;?>
                        <?php endfor; ?>
                    </select><br>
                    <input type="submit" name="dat_hang" value="Đặt hàng">
                </form>
            </div>
        </section>
</main>
<?php
    include("../views/footer.php");
?>