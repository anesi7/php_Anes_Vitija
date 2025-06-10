<?php
session_start();
require_once 'database.php';
require_once 'functions.php';

if (isset($_GET['id'])) {
    $motorcycle_id = (int)$_GET['id'];
    $motorcycle = getMotorcycleById($pdo, $motorcycle_id);
    
    if ($motorcycle && $motorcycle['in_stock']) {
        addToCart($motorcycle_id, 1);
        $_SESSION['cart_message'] = 'Motorcycle added to cart successfully!';
    } else {
        $_SESSION['cart_error'] = 'Sorry, this motorcycle is not available.';
    }
}

// Redirect back to the previous page or to motorcycles page
$redirect = $_SERVER['HTTP_REFERER'] ?? 'motorcycles.php';
header('Location: ' . $redirect);
exit;
?>
