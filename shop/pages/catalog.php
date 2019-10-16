<?php
$pdo = Tools::connect();
$list = $pdo->query('select * from items');
?>
<div class="row">
    <div class="col-md-3 clearfix">
        <select name="category_id" class="form-control" id="sel_category">
            <?php
            $categories = $pdo->query('select * from categories');
            ?>
            <?php while ($row = $categories->fetch()) : ?>
                <option value="<?= $row['id'] ?>"> <?= $row['category'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

</div>
<div class="row">
    <div class="catalog">
        <?php while ($row = $list->fetch()) : ?>
            <div class="col-md-3">
                <div class="image_block">
                    <div class="panel panel-success">
                        <div class="panel-heading"><?= $row['item_name'] ?></div>
                        <div class="panel-body" style="height: 200px">
                            <img src="<?= $row['image_path'] ?>" alt="picture" class="img-responsive img-rounded" style="height:100%; margin:0 auto;">
                        </div>
                        <div class="panel-footer clearfix">
                            <div class="pull-left"><?= $row['price_sale'] . '$' ?></div>
                            <div class="pull-right">
                                <button data-cart="<?= "cart_" . $row['id'] ?>" class="btn btn-warning btn_to_cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endwhile; ?>
    </div>
</div>