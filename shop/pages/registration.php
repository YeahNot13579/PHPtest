<? if (!isset($_POST['reg_btn'])) : ?>
    <form action="index.php?page=3" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" name="login" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="image_path">Select image:</label>
            <input type="file" name="image_path" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" name="reg_btn">Register</button>
    </form>
<? else : ?>
    <?php
        if (is_uploaded_file($_FILES['image_path']['tmp_name'])) {
            $path = 'images/' . $_FILES['image_path']['name'];
            move_uploaded_file($_FILES['image_path']['tmp_name'], $path);
        }
        if (Tools::register($_POST['login'], $_POST['password'], $path)) {
            echo "
                <script>
                    alert('New User Added!');
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('User not Added!');
                </script>
            ";
        }
        ?>
<? endif; ?>