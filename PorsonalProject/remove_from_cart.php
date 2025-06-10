<?php
session_start();
require_once 'functions.php';

if (isset($_GET['id'])) {
    $motorcycle_id = (int)$_GET['id'];
    removeFromCart($motorcycle_id);
    $_SESSION['cart_message'] = 'Item removed from cart.';
}

header('Location: cart.php');
exit;
?>
