<h1>Admin Page</h1>
<form action="pages/createdb.php">
    <button type="submit">Add DB</button>
</form>
<?php if (!isset($_POST['add_btn'])) : ?>
    <form action="index.php?page=4" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <div class="form-group">
                <label for="category">Add Category</label>
                <input type="text" name="category">
            </div>
            <?php
                $cat = $_POST['category'];
                $pdo = Tools::connect();
                $pdo->query("insert into categories(category) values('$cat')");
                ?>
            <button type="submit" class="btn btn-primary" name="addc_btn">Add</button>
        </div>
    </form>
    <form action="index.php?page=4" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label for="category">Select Category:</label>
            <select name="category_id">
                <?php
                    $pdo = Tools::connect();
                    $list = $pdo->query('select * from categories');
                    ?>
                <?php while ($row = $list->fetch()) : ?>
                    <option value="<?= $row['id'] ?>"> <?= $row['category'] ?></option>
                <?php endwhile; ?>
            </select>
            <div class="form-group">
                <label for="item_name">Name Product:</label>
                <input type="text" name="item_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="price_in">Price in:</label>
                <input type="text" name="price_in" class="form-control">
            </div>
            <div class="form-group">
                <label for="price_sale">Price Sale:</label>
                <input type="text" name="price_sale" class="form-control">
            </div>
            <div class="form-group">
                <label for="info"> Info:</label>
                <input type="text" name="info" class="form-control">
            </div>
            <div class="form-group">
                <label for="image_path">Select image:</label>
                <input type="file" name="image_path" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" name="add_btn">Add</button>
    </form>
<?php else : ?>
    <?php
        if (is_uploaded_file($_FILES['image_path']['tmp_name'])) {
            $path = 'images/' . $_FILES['image_path']['name'];
            move_uploaded_file($_FILES['image_path']['tmp_name'], $path);
        }
        $category_id = $_POST['category_id'];
        $price_in = $_POST['price_in'];
        $price_sale = $_POST['price_sale'];
        $item_name = $_POST['item_name'];
        $info = $_POST['info'];


        $item = new Item($item_name, $category_id, $price_in, $price_sale, $info, $path);
        echo $item->intoDb();
        ?>
<?php endif; ?>