<?php
session_start();
include_once 'pages/classes.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <header>
        <?php
        include_once 'pages/menu.php'
        ?>
    </header>
    <div class="container">
        <div class="row">
            <section class="col-md-12">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if ($page == 1) {
                        include_once 'pages/catalog.php';
                    } else if ($page == 2) {
                        include_once 'pages/cart.php';
                    } else if ($page == 3) {
                        include_once 'pages/registration.php';
                    } else if ($page == 4) {
                        include_once 'pages/admin.php';
                    } else if ($page == 5) {
                        include_once 'pages/reports.php';
                    } else {
                        include_once 'pages/error404.php';
                    }
                }
                ?>
            </section>
        </div>
        <div class="row">
            <footer style="text-align:right;">
                &copy; YeahNot SoftWare 2019
            </footer>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>