<?php
    include('../views/header.php'); 
?>
<main>
    <h1>Giỏ hàng</h1>
    <?php
        if (empty($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
        <p>Không có sản phẩm trong giỏ hàng</p>
    <?php else: ?>
        <form action="." method="post">
            <input type="hidden" name="action" value="update_gio_hang">
            <table>
                <tr id=cart_header>
                    <th class="right">Sản phẩm</th>
                    <th class="right">Giá sản phẩm</th>
                    <th class="right">Số lượng</th>
                    <th class="right">Thanh toán</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($_SESSION['cart'] as $id => $item) :
                    $cost = number_format($item['cost'], 2);
                    $total = number_format($item['total'], 2);
                ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td class="right">$<?php echo $cost; ?></td>
                    <td class="right">
                        <input type="text" class="cart_qty" name="new_qty[<?php echo $id; ?>]" value="<?php echo $item['qty']; ?>">
                    </td>
                    <td class="right">$<?php echo $total; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr id="cart_footer">
                    <td colspan="3"><b>Tổng thanh toán</b></td>
                    <td>$<?php echo tong_gia_gh(); ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="right">
                        <input type="submit" value="Update">
                        <button>

                            <a style="text-decoration: none;" href="http://localhost/Car_A20LX12/catalog/index.php">Quay lại cửa hàng</a>
                        </button>
                    </td>
                    
                </tr>
            </table>
        </form>
        <?php endif; ?>
</main>
<?php
    include('../views/footer.php');
?>