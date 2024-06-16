<?php
    include("../views/header.php");
?>
<main>
    <h1>Thông tin Cửa hàng Ô tô Car Classic A20LX12</h1>
        <aside>
            <h2>Loại Ô Tô</h2>
            <nav>
                <table>
                    <tr>
                        <th>Loại Ô Tô</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td>
                            <?php echo $category['categoryName'];?>
                        </td>
                        <td>
                            <form action="." method="POST">
                                <input type="hidden" name="action" value="xoa_loai_o_to">
                                <input type="hidden" name="category_id" value="<?php echo $category['categoryID'];?>">
                                <input type="submit" value="Xoá">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </nav>
        </aside>
        <section>
            <h2>Thêm loại Ô Tô</h2>
            <form action="index.php" method="POST" id="add_product_form">
                <input type="hidden" name="action" value="them_loai_o_to">
                <label>Loại Ô Tô:</label>
                <input type="text" name="category_name"><br>
                <input type="submit" value="Thêm">
            </form>
        </section>
        <p class="last_paragraph">
            <a href="?action=xem_o_to">Xem Ô Tô</a>
        </p>
</main>
<?php
    include("../views/footer.php");
?>