<?php
$total = 0;
$indexes =  '';
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Price</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_COOKIE as $key => $value) : ?>
            <?php $pos = strpos($key, '_'); ?>
            <?php if (substr($key, 0, $pos) == 'cart') : ?>
                <?php
                        $item_id = substr($key, $pos + 1);
                        $item = Item::fromDb($item_id);
                        $total += $item->Price;

                        ?>
                <tr>
                    <td> <img src="<?= $item->Image ?>" alt="picture" style="width:100px;"> </td>
                    <td><?= $item->Name ?></td>
                    <td><?= $item->Price ?>$</td>
                    <td> <span data-target="<?= 'cart_' . $item->Id ?>" style="color:red; cursor:pointer;" class="glyphicon glyphicon-remove"></span></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    <tfoot class="bg-info">
        <tr>
            <td colspan="3">Total</td>
            <td><?= $total ?>$</td>
        </tr>
    </tfoot>
</table>
<input type="submit" data-indexes=<?= $indexes ?> value="Buy" class="btn btn-success buy_btn">