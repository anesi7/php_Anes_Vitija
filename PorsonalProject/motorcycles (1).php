<?php
session_start();
require_once 'database.php';
require_once 'functions.php';

$category = isset($_GET['category']) ? $_GET['category'] : null;
$motorcycles = getAllMotorcycles($pdo, $category);
$categories = getCategories($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motorcycles - KTM Shop</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="motorcycles.php">Motorcycles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="orders.php">My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            Cart (<?php echo getCartCount(); ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="bg-primary text-white py-5">
        <div class="container">
            <h1 class="display-4">Our Motorcycles</h1>
            <p class="lead">Discover the complete range of KTM motorcycles - Ready to Race</p>
        </div>
    </div>

    <div class="container my-5">
        <!-- Category Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <h4>Filter by Category</h4>
                <div class="btn-group flex-wrap" role="group">
                    <a href="motorcycles.php" class="btn <?php echo !$category ? 'btn-primary' : 'btn-outline-primary'; ?>">All</a>
                    <?php foreach($categories as $cat): ?>
                        <a href="motorcycles.php?category=<?php echo urlencode($cat['category']); ?>" 
                           class="btn <?php echo $category === $cat['category'] ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <?php echo htmlspecialchars($cat['category']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Motorcycles Grid -->
        <div class="row">
            <?php if (empty($motorcycles)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <h4>No motorcycles found</h4>
                        <p>No motorcycles available in this category at the moment.</p>
                        <a href="motorcycles.php" class="btn btn-primary">View All Motorcycles</a>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach($motorcycles as $motorcycle): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 motorcycle-card">
                            <img src="<?php echo htmlspecialchars(getPrimaryImage($pdo, $motorcycle['id'])); ?>" 
                                 class="card-img-top" alt="<?php echo htmlspecialchars($motorcycle['name']); ?>"
                                 style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($motorcycle['name']); ?></h5>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <small class="text-muted"><?php echo htmlspecialchars($motorcycle['engine_size']); ?></small>
                                    </div>
                                    <div class="col-6 text-end">
                                        <small class="text-muted"><?php echo htmlspecialchars($motorcycle['power']); ?></small>
                                    </div>
                                </div>
                                <span class="badge bg-secondary mb-2"><?php echo htmlspecialchars($motorcycle['category']); ?></span>
                                <p class="card-text flex-grow-1"><?php echo htmlspecialchars(substr($motorcycle['description'], 0, 100)) . '...'; ?></p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="text-primary mb-0">€<?php echo number_format($motorcycle['price'], 0, ',', '.'); ?></h4>
                                        <?php if($motorcycle['in_stock']): ?>
                                            <span class="badge bg-success">In Stock</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Out of Stock</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a href="motorcycle.php?id=<?php echo $motorcycle['id']; ?>" 
                                           class="btn btn-outline-primary btn-sm">View Details</a>
                                        <?php if($motorcycle['in_stock']): ?>
                                            <a href="add_to_cart.php?id=<?php echo $motorcycle['id']; ?>" 
                                               class="btn btn-primary btn-sm">Add to Cart</a>
                                        <?php else: ?>
                                            <button class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>KTM Shop</h5>
                    <p>Your official KTM dealer. Ready to Race since 1953.</p>
                </div>
                <div class="col-md-3">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <?php foreach($categories as $cat): ?>
                            <li><a href="motorcycles.php?category=<?php echo urlencode($cat['category']); ?>" class="text-light"><?php echo htmlspecialchars($cat['category']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Support</h5>
                    <ul class="list-unstyled">
                        <li><a href="contact.php" class="text-light">Contact Us</a></li>
                        <li><a href="#" class="text-light">Warranty</a></li>
                        <li><a href="#" class="text-light">Service</a></li>
                        <li><a href="#" class="text-light">Parts</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Connect</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Facebook</a></li>
                        <li><a href="#" class="text-light">Instagram</a></li>
                        <li><a href="#" class="text-light">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2024 KTM Motorcycle Shop. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
