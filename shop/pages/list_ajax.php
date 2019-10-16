<?php
include_once 'classes.php';

$pdo = Tools::connect();
$ps = $pdo->query('select * from items where category_id=' . $_POST['category_id']);
echo json_encode($ps->fetchAll());
