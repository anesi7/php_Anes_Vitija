<?php
session_start();
require_once 'database.php';
require_once 'functions.php';

$success = '';
$error = '';

if ($_POST) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        if (saveContactMessage($pdo, $name, $email, $phone, $subject, $message)) {
            $success = 'Thank you for your message! We will get back to you soon.';
            // Clear form data
            $_POST = array();
        } else {
            $error = 'Sorry, there was an error sending your message. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - KTM Shop</title>
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
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
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
            <h1 class="display-4">Contact Us</h1>
            <p class="lead">Get in touch with our KTM experts</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Send us a Message</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                        <?php endif; ?>
                        
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" 
                                               value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject *</label>
                                        <select class="form-control" id="subject" name="subject" required>
                                            <option value="">Select a subject</option>
                                            <option value="General Inquiry" <?php echo (($_POST['subject'] ?? '') === 'General Inquiry') ? 'selected' : ''; ?>>General Inquiry</option>
                                            <option value="Motorcycle Information" <?php echo (($_POST['subject'] ?? '') === 'Motorcycle Information') ? 'selected' : ''; ?>>Motorcycle Information</option>
                                            <option value="Service & Maintenance" <?php echo (($_POST['subject'] ?? '') === 'Service & Maintenance') ? 'selected' : ''; ?>>Service & Maintenance</option>
                                            <option value="Parts & Accessories" <?php echo (($_POST['subject'] ?? '') === 'Parts & Accessories') ? 'selected' : ''; ?>>Parts & Accessories</option>
                                            <option value="Test Ride" <?php echo (($_POST['subject'] ?? '') === 'Test Ride') ? 'selected' : ''; ?>>Test Ride</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="6" 
                                          placeholder="Tell us how we can help you..." required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Contact Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Address</strong><br>
                            <small class="text-muted">
                                KTM Motorcycle Shop<br>
                                123 Racing Street<br>
                                Motorcycle City, MC 12345
                            </small>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Phone</strong><br>
                            <small class="text-muted">+1 (555) 123-4567</small>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Email</strong><br>
                            <small class="text-muted">info@ktmshop.com</small>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Business Hours</strong><br>
                            <small class="text-muted">
                                Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 9:00 AM - 5:00 PM<br>
                                Sunday: 10:00 AM - 4:00 PM
                            </small>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Follow Us</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-primary btn-sm">Facebook</a>
                            <a href="#" class="btn btn-outline-primary btn-sm">Instagram</a>
                            <a href="#" class="btn btn-outline-primary btn-sm">YouTube</a>
                        </div>
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
