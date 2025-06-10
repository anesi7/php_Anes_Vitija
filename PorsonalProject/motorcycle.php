<?php
session_start();
require_once 'database.php';
require_once 'functions.php';

$motorcycle_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$motorcycle = getMotorcycleById($pdo, $motorcycle_id);

if (!$motorcycle) {
    header('Location: motorcycles.php');
    exit;
}

$images = getMotorcycleImages($pdo, $motorcycle_id);
if (empty($images)) {
    $images = [['image_url' => '/placeholder.svg?height=400&width=600', 'image_alt' => $motorcycle['name']]];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($motorcycle['name']); ?> - KTM Shop</title>
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
                <a class="nav-link" href="cart.php">Cart (<?php echo getCartCount(); ?>)</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="motorcycles.php">Motorcycles</a></li>
                <li class="breadcrumb-item"><a href="motorcycles.php?category=<?php echo urlencode($motorcycle['category']); ?>"><?php echo htmlspecialchars($motorcycle['category']); ?></a></li>
                <li class="breadcrumb-item active"><?php echo htmlspecialchars($motorcycle['name']); ?></li>
            </ol>
        </nav>

        <div class="row">
            <!-- Photo Gallery -->
            <div class="col-md-6">
                <!-- Main Image -->
                <div class="mb-3">
                    <img id="mainImage" src="<?php echo htmlspecialchars($images[0]['image_url']); ?>" 
                         class="img-fluid rounded" 
                         alt="<?php echo htmlspecialchars($images[0]['image_alt'] ?? $motorcycle['name']); ?>"
                         style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                
                <!-- Thumbnail Gallery -->
                <?php if (count($images) > 1): ?>
                    <div class="row">
                        <?php foreach ($images as $index => $image): ?>
                            <div class="col-3 mb-2">
                                <img src="<?php echo htmlspecialchars($image['image_url']); ?>" 
                                     class="img-fluid rounded thumbnail-image <?php echo $index === 0 ? 'active' : ''; ?>" 
                                     alt="<?php echo htmlspecialchars($image['image_alt'] ?? $motorcycle['name']); ?>"
                                     style="height: 80px; object-fit: cover; cursor: pointer; border: 2px solid transparent;"
                                     onclick="changeMainImage('<?php echo htmlspecialchars($image['image_url']); ?>', this)">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Motorcycle Details -->
            <div class="col-md-6">
                <h1><?php echo htmlspecialchars($motorcycle['name']); ?></h1>
                <span class="badge bg-primary mb-3"><?php echo htmlspecialchars($motorcycle['category']); ?></span>
                
                <div class="row mb-3">
                    <div class="col-6">
                        <strong>Engine:</strong> <?php echo htmlspecialchars($motorcycle['engine_size']); ?>
                    </div>
                    <div class="col-6">
                        <strong>Power:</strong> <?php echo htmlspecialchars($motorcycle['power']); ?>
                    </div>
                </div>

                <p class="lead"><?php echo htmlspecialchars($motorcycle['description']); ?></p>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary mb-0">€<?php echo number_format($motorcycle['price'], 0, ',', '.'); ?></h2>
                    <?php if($motorcycle['in_stock']): ?>
                        <span class="badge bg-success">In Stock</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Out of Stock</span>
                    <?php endif; ?>
                </div>

                <?php if($motorcycle['in_stock']): ?>
                    <div class="d-grid gap-2">
                        <a href="add_to_cart.php?id=<?php echo $motorcycle['id']; ?>" 
                           class="btn btn-primary btn-lg">Add to Cart</a>
                        <a href="contact.php?motorcycle=<?php echo urlencode($motorcycle['name']); ?>" 
                           class="btn btn-outline-primary">Request Quote</a>
                    </div>
                <?php else: ?>
                    <div class="d-grid">
                        <button class="btn btn-secondary btn-lg" disabled>Out of Stock</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Specifications -->
        <?php if ($motorcycle['specifications']): ?>
            <div class="row mt-5">
                <div class="col-12">
                    <h3>Specifications</h3>
                    <div class="card">
                        <div class="card-body">
                            <pre class="mb-0"><?php echo htmlspecialchars($motorcycle['specifications']); ?></pre>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeMainImage(imageSrc, thumbnail) {
            document.getElementById('mainImage').src = imageSrc;
            
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail-image').forEach(img => {
                img.classList.remove('active');
                img.style.border = '2px solid transparent';
            });
            
            // Add active class to clicked thumbnail
            thumbnail.classList.add('active');
            thumbnail.style.border = '2px solid #ff6600';
        }

        // Set initial active thumbnail
        document.addEventListener('DOMContentLoaded', function() {
            const firstThumbnail = document.querySelector('.thumbnail-image.active');
            if (firstThumbnail) {
                firstThumbnail.style.border = '2px solid #ff6600';
            }
        });
    </script>
</body>
</html>
