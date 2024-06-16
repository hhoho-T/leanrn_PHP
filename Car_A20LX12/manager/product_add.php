<?php
    include ("../views/header.php");
?>
<main>
    <h1>
        Thêm Ô Tô
    </h1>
    <form action="index.php" method="POST" id="add_product_form">
        <input type="hidden" name="action" value="them_o_to">
        <label for="">Loại Ô Tô</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID'];?>">
                <?php echo $category['categoryName'];?>
            </option>
            <?php endforeach; ?>
        </select> <br>

        <label for="">Hãng và Màu Ô Tô:</label>
        <input type="text" name="product_code"><br>

        <label for="">Tên Ô Tô:</label>
        <input type="text" name="product_name"><br>

        <label for="">Giá tiền:</label>
        <input type="text" name="list_price"><br>

        <label for="">&nbsp;</label>
        <input type="submit" value="Thêm Ô TÔ"><br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=xem_o_to">Xem thông tin cửa hàng Ô tô Car Classic A20LX12</a>
    </p>
</main>
<?php
    include ("../views/footer.php");
?>