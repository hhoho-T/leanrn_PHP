<?php
    include ("../views/header.php");
?>
<main>
    <h1>Thông tin các loại Ô tô Car Classic A20LX12</h1>
    <aside>
            <h2>Loại Ô tô</h2>
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
            <?php echo $category_name; ?>
        </h2>
        <table>
                <tr>
                    <th>Hãng và Màu Ô Tô</th>
                    <th>Tên Ô Tô</th>
                    <th>Giá Ô Tô</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['productCode'];?></td>
                    <td><?php echo $product['productName'];?></td>
                    <td><?php echo $product['listPrice'];?></td>
                    <td>
                        <form action="." method="POST">
                            <input type="hidden" name="action" value="xoa_o_to">
                            <input type="hidden" name="product_id" value="<?php echo $product['productID'];?>">
                            <input type="hidden" name="category_id" value="<?php echo $product['categoryID'];?>">
                            <input type="submit" value="Xoá Ô Tô">
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
        <p class="last_paragraph">
            <a href="?action=xem_bang_them_o_to">Thêm Ô tô</a>
        </p>
        <p class="last_paragraph">
            <a href="?action=xem_danh_muc_o_to">Thêm loại Ô tô</a>
        </p>
    </section>
</main>
<?php
    include ("../views/footer.php");
?>