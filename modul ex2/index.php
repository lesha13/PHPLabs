<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['Products'])) {
    $_SESSION['Products'] = new ProductList();
    $_SESSION['Products']->defaultProducts();
}

$actionToDo = $_POST['action'];

if ($actionToDo == 'filter') {
    $_SESSION['Products']->FilterProducts();
} elseif ($actionToDo == 'filterReverse') {
    $_SESSION['Products']->FilterProductsReverse();
}

echo Display::DisplayProducts($_SESSION['Products']->products);
?>
<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='filterForm'>
    Filter <br>
    <input type='hidden' name='action' value='filter'>
    <input type='submit' value='filter'>
</form>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='filterReverseForm'>
    Filter <br>
    <input type='hidden' name='action' value='filterReverse'>
    <input type='submit' value='filterReverse'>
</form>

<style>
    table, th, td {
        border: 1px solid;
        text-align: center;
    }

    th {
        width: 100px;
    }

    td {
        height: 50px;
    }
</style>