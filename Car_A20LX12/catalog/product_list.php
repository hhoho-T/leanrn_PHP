<?php
include("../views/header.php");
?>
<main>
    <aside>
        <h1>Loại Ô Tô</h1>
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    <section>
        <h1><?php echo $category_name; ?></h1>
        <nav>
            <ul>
                <?php foreach ($products as $product) : ?>
                    <li>
                        <p>
                            <img style="width: 50px; height: 60px;" src="../images/<?php
                            
                             echo $product['productName'];?>.png" alt="<?php echo $product['productName'] ?>">
                        </p>
                        <a href="?action=chi_tiet_o_to&amp;product_id=<?php echo $product['productID']; ?>">
                            <?php echo $product['productName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </section>
</main>
<?php
include("../views/footer.php");
?>