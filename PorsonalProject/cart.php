<?php
session_start();
require_once 'database.php';
require_once 'functions.php';

$cart_items = getCartItems($pdo);
$cart_total = getCartTotal($pdo);

// Display cart messages
$cart_message = $_SESSION['cart_message'] ?? '';
$cart_error = $_SESSION['cart_error'] ?? '';
unset($_SESSION['cart_message'], $_SESSION['cart_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - KTM Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <strong style="color: #ff6600;">KTM</strong> 
                <small>READY TO RACE</small>
            </a>
            <div class="navbar-nav ms-auto">
                <?php if (isLoggedIn()): ?>
                    <span class="navbar-text me-3">Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?></span>
                    <a class="nav-link" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="nav-link" href="login.php">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1>Shopping Cart</h1>

        <?php if ($cart_message): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($cart_message); ?></div>
        <?php endif; ?>

        <?php if ($cart_error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($cart_error); ?></div>
        <?php endif; ?>

        <?php if (empty($cart_items)): ?>
            <div class="alert alert-info">
                <h4>Your cart is empty</h4>
                <p>Browse our <a href="motorcycles.php">motorcycle collection</a> to add items to your cart.</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Motorcycle</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo htmlspecialchars(getPrimaryImage($pdo, $item['id'])); ?>" 
                                             alt="<?php echo htmlspecialchars($item['name']); ?>"
                                             style="width: 80px; height: 60px; object-fit: cover;" 
                                             class="me-3">
                                        <div>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($item['name']); ?></h6>
                                            <small class="text-muted"><?php echo htmlspecialchars($item['category']); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>€<?php echo number_format($item['price'], 2, ',', '.'); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td>€<?php echo number_format($item['subtotal'], 2, ',', '.'); ?></td>
                                <td>
                                    <a href="remove_from_cart.php?id=<?php echo $item['id']; ?>" 
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Remove this item from cart?')">Remove</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total:</th>
                            <th>€<?php echo number_format($cart_total, 2, ',', '.'); ?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="motorcycles.php" class="btn btn-outline-primary">Continue Shopping</a>
                </div>
                <div class="col-md-6 text-end">
                    <a href="checkout.php" class="btn btn-primary btn-lg">Proceed to Checkout</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
