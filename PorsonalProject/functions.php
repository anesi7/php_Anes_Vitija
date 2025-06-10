<?php
// Get all motorcycles with optional category filter
function getAllMotorcycles($pdo, $category = null, $limit = null) {
    $sql = "SELECT * FROM motorcycles";
    $params = [];
    
    if ($category) {
        $sql .= " WHERE category = ?";
        $params[] = $category;
    }
    
    $sql .= " ORDER BY name";
    
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;  // Cast to int and concatenate directly
    }
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

// Get motorcycle by ID
function getMotorcycleById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM motorcycles WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Get all categories
function getCategories($pdo) {
    $stmt = $pdo->query("SELECT DISTINCT category FROM motorcycles ORDER BY category");
    return $stmt->fetchAll();
}

// Get motorcycle images for photo gallery
function getMotorcycleImages($pdo, $motorcycle_id) {
    $stmt = $pdo->prepare("SELECT * FROM motorcycle_images WHERE motorcycle_id = ? ORDER BY sort_order, id");
    $stmt->execute([$motorcycle_id]);
    return $stmt->fetchAll();
}

// Get primary motorcycle image
function getPrimaryImage($pdo, $motorcycle_id) {
    $stmt = $pdo->prepare("SELECT image_url FROM motorcycle_images WHERE motorcycle_id = ? AND is_primary = 1 LIMIT 1");
    $stmt->execute([$motorcycle_id]);
    $result = $stmt->fetch();
    return $result ? $result['image_url'] : '/placeholder.svg?height=300&width=400';
}

// User authentication functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getCurrentUser($pdo) {
    if (!isLoggedIn()) {
        return null;
    }
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

function requireLogin() {
    if (!isLoggedIn()) {
        $current_page = $_SERVER['REQUEST_URI'];
        header('Location: login.php?redirect=' . urlencode($current_page));
        exit;
    }
}

// Shopping cart functions
function addToCart($motorcycle_id, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    if (isset($_SESSION['cart'][$motorcycle_id])) {
        $_SESSION['cart'][$motorcycle_id] += $quantity;
    } else {
        $_SESSION['cart'][$motorcycle_id] = $quantity;
    }
}

function getCartCount() {
    if (!isset($_SESSION['cart'])) {
        return 0;
    }
    return array_sum($_SESSION['cart']);
}

function getCartItems($pdo) {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return array();
    }
    
    $items = array();
    foreach ($_SESSION['cart'] as $motorcycle_id => $quantity) {
        $motorcycle = getMotorcycleById($pdo, $motorcycle_id);
        if ($motorcycle) {
            $motorcycle['quantity'] = $quantity;
            $motorcycle['subtotal'] = $motorcycle['price'] * $quantity;
            $items[] = $motorcycle;
        }
    }
    return $items;
}

function getCartTotal($pdo) {
    $items = getCartItems($pdo);
    $total = 0;
    foreach ($items as $item) {
        $total += $item['subtotal'];
    }
    return $total;
}

function removeFromCart($motorcycle_id) {
    if (isset($_SESSION['cart'][$motorcycle_id])) {
        unset($_SESSION['cart'][$motorcycle_id]);
    }
}

function clearCart() {
    unset($_SESSION['cart']);
}

// Contact form function
function saveContactMessage($pdo, $name, $email, $phone, $subject, $message) {
    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$name, $email, $phone, $subject, $message]);
}

// Create order function
function createOrder($pdo, $customer_name, $customer_email, $customer_phone) {
    $total = getCartTotal($pdo);
    $user_id = isLoggedIn() ? $_SESSION['user_id'] : null;
    
    // Insert order
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, customer_name, customer_email, customer_phone, total_amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $customer_name, $customer_email, $customer_phone, $total]);
    $order_id = $pdo->lastInsertId();
    
    // Insert order items
    $cart_items = getCartItems($pdo);
    foreach ($cart_items as $item) {
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, motorcycle_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
    }
    
    return $order_id;
}
?>
