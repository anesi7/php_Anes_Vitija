<?php
session_start();
require_once 'database.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - KTM Shop</title>
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
                        <a class="nav-link" href="motorcycles.php">Motorcycles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
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
            <h1 class="display-4">About KTM</h1>
            <p class="lead">Ready to Race since 1953</p>
        </div>
    </div>

    <!-- About Content -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <h2>Our Story</h2>
                <p class="lead">KTM AG is an Austrian motorcycle and sports car manufacturer owned by Pierer Mobility AG and Indian manufacturer Bajaj Auto.</p>
                
                <p>It was formed in 1992 but traces its foundation to as early as 1934. Today, KTM AG is the parent company of the KTM Group, consisting of a number of motorcycle brands.</p>

                <h3>Ready to Race Philosophy</h3>
                <p>KTM's "READY TO RACE" philosophy is more than just a slogan – it's a way of life. Every KTM motorcycle is developed with racing DNA, ensuring that whether you're on the street, track, or trail, you're riding a machine built for performance.</p>

                <h3>Innovation & Technology</h3>
                <p>We continuously push the boundaries of motorcycle technology. From our advanced engine designs to cutting-edge electronics, KTM motorcycles represent the pinnacle of engineering excellence.</p>

                <div class="row mt-5">
                    <div class="col-md-4 text-center mb-4">
                        <div class="bg-light p-4 rounded">
                            <h1 class="text-primary">70+</h1>
                            <h5>Years of Excellence</h5>
                            <p>Since 1953, we've been crafting exceptional motorcycles</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="bg-light p-4 rounded">
                            <h1 class="text-primary">300+</h1>
                            <h5>Racing Championships</h5>
                            <p>Proven performance on tracks worldwide</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="bg-light p-4 rounded">
                            <h1 class="text-primary">50+</h1>
                            <h5>Countries Worldwide</h5>
                            <p>Global presence with local expertise</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Why Choose KTM?</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <strong>Racing Heritage</strong><br>
                                <small class="text-muted">Born from competition, built for performance</small>
                            </li>
                            <li class="mb-3">
                                <strong>Austrian Engineering</strong><br>
                                <small class="text-muted">Precision craftsmanship and attention to detail</small>
                            </li>
                            <li class="mb-3">
                                <strong>Innovation</strong><br>
                                <small class="text-muted">Cutting-edge technology in every motorcycle</small>
                            </li>
                            <li class="mb-3">
                                <strong>Global Support</strong><br>
                                <small class="text-muted">Worldwide dealer network and service</small>
                            </li>
                            <li class="mb-3">
                                <strong>Community</strong><br>
                                <small class="text-muted">Join the global KTM family</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
                        <li><a href="motorcycles.php?category=Street" class="text-light">Street</a></li>
                        <li><a href="motorcycles.php?category=Adventure" class="text-light">Adventure</a></li>
                        <li><a href="motorcycles.php?category=Sport" class="text-light">Sport</a></li>
                        <li><a href="motorcycles.php?category=Enduro" class="text-light">Enduro</a></li>
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
