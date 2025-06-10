-- Create database
CREATE DATABASE IF NOT EXISTS ktm_shop;
USE ktm_shop;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create motorcycles table
CREATE TABLE motorcycles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    model VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    engine_size VARCHAR(20) NOT NULL,
    power VARCHAR(20) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image_url VARCHAR(500),
    description TEXT,
    specifications TEXT,
    in_stock BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create motorcycle_images table for photo gallery
CREATE TABLE motorcycle_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    motorcycle_id INT,
    image_url VARCHAR(500) NOT NULL,
    image_alt VARCHAR(255),
    is_primary BOOLEAN DEFAULT false,
    sort_order INT DEFAULT 0,
    FOREIGN KEY (motorcycle_id) REFERENCES motorcycles(id) ON DELETE CASCADE
);

-- Create orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(20),
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'confirmed', 'shipped', 'delivered') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create order_items table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    motorcycle_id INT,
    quantity INT DEFAULT 1,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (motorcycle_id) REFERENCES motorcycles(id)
);

-- Create contact_messages table
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert complete KTM motorcycle collection
INSERT INTO motorcycles (name, model, category, engine_size, power, price, image_url, description, specifications, in_stock) VALUES
-- Street/Naked bikes
('KTM 390 Duke', '390 Duke', 'Street', '373cc', '44 HP', 5499.00, '/placeholder.svg?height=300&width=400', 'The KTM 390 DUKE is the embodiment of what we call REAL DUKE. Uncompromising performance and radical design make this bike perfect for urban adventures and weekend rides.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 373.2 cc\nPower: 32 kW (44 hp)\nTorque: 37 Nm\nWeight: 149 kg\nFuel capacity: 13.4 liters', true),

('KTM 790 Duke', '790 Duke', 'Street', '799cc', '105 HP', 9999.00, '/placeholder.svg?height=300&width=400', 'The KTM 790 DUKE is the essence of what we call The Scalpel. Sharp, precise and cuts to the chase with its parallel-twin engine and agile handling.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 799 cc\nPower: 77 kW (105 hp)\nTorque: 87 Nm\nWeight: 169 kg\nFuel capacity: 14 liters', true),

('KTM 890 Duke R', '890 Duke R', 'Street', '889cc', '121 HP', 12999.00, '/placeholder.svg?height=300&width=400', 'The KTM 890 DUKE R is the sharpest tool in the DUKE range with track-focused components and premium suspension setup.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 89 kW (121 hp)\nTorque: 99 Nm\nWeight: 166 kg\nFuel capacity: 14 liters', true),

('KTM 1290 Super Duke R', '1290 Super Duke R', 'Street', '1301cc', '180 HP', 18999.00, '/placeholder.svg?height=300&width=400', 'The KTM 1290 SUPER DUKE R is THE BEAST. Pure adrenaline in motorcycle form with massive torque and aggressive styling.', 'Engine: V-twin, 4-stroke\nDisplacement: 1301 cc\nPower: 132 kW (180 hp)\nTorque: 140 Nm\nWeight: 189 kg\nFuel capacity: 16 liters', true),

-- Adventure bikes
('KTM 390 Adventure', '390 Adventure', 'Adventure', '373cc', '44 HP', 6499.00, '/placeholder.svg?height=300&width=400', 'The KTM 390 ADVENTURE is your gateway to adventure riding with accessible performance and versatile capability both on and off-road.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 373.2 cc\nPower: 32 kW (44 hp)\nTorque: 37 Nm\nWeight: 158 kg\nFuel capacity: 14.5 liters', true),

('KTM 890 Adventure', '890 Adventure', 'Adventure', '889cc', '105 HP', 13999.00, '/placeholder.svg?height=300&width=400', 'The KTM 890 ADVENTURE is built for those who want to explore beyond the beaten path with comfort and capability.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 77 kW (105 hp)\nTorque: 100 Nm\nWeight: 196 kg\nFuel capacity: 20 liters', true),

('KTM 890 Adventure R', '890 Adventure R', 'Adventure', '889cc', '105 HP', 15499.00, '/placeholder.svg?height=300&width=400', 'The KTM 890 ADVENTURE R is designed for serious off-road adventures with enhanced suspension and rugged components.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 77 kW (105 hp)\nTorque: 100 Nm\nWeight: 196 kg\nFuel capacity: 20 liters', true),

('KTM 1290 Super Adventure S', '1290 Super Adventure S', 'Adventure', '1301cc', '160 HP', 19999.00, '/placeholder.svg?height=300&width=400', 'The ultimate adventure touring machine with premium features, comfort, and technology for long-distance exploration.', 'Engine: V-twin, 4-stroke\nDisplacement: 1301 cc\nPower: 118 kW (160 hp)\nTorque: 138 Nm\nWeight: 228 kg\nFuel capacity: 23 liters', true),

-- Sport bikes
('KTM RC 390', 'RC 390', 'Sport', '373cc', '44 HP', 5999.00, '/placeholder.svg?height=300&width=400', 'The KTM RC 390 brings track-focused performance to the street with aggressive ergonomics and sharp handling.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 373.2 cc\nPower: 32 kW (44 hp)\nTorque: 37 Nm\nWeight: 147 kg\nFuel capacity: 9.5 liters', true),

('KTM RC 8C', 'RC 8C', 'Sport', '889cc', '128 HP', 24999.00, '/placeholder.svg?height=300&width=400', 'The KTM RC 8C is a limited edition track weapon with carbon fiber bodywork and race-derived technology.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 95 kW (128 hp)\nTorque: 103 Nm\nWeight: 154 kg\nFuel capacity: 10 liters', true),

-- Enduro/Off-road
('KTM 300 EXC TPI', '300 EXC TPI', 'Enduro', '293cc', '55 HP', 10999.00, '/placeholder.svg?height=300&width=400', 'The KTM 300 EXC TPI is the ultimate 2-stroke enduro machine with fuel injection and championship-winning DNA.', 'Engine: Single-cylinder, 2-stroke\nDisplacement: 293.2 cc\nPower: 41 kW (55 hp)\nTorque: 54 Nm\nWeight: 103.2 kg\nFuel capacity: 9.25 liters', true),

('KTM 450 EXC-F', '450 EXC-F', 'Enduro', '449cc', '63 HP', 11499.00, '/placeholder.svg?height=300&width=400', 'The KTM 450 EXC-F is a championship-winning enduro bike with electric start and premium components.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 449.3 cc\nPower: 46 kW (63 hp)\nTorque: 54 Nm\nWeight: 109.8 kg\nFuel capacity: 8.5 liters', true),

('KTM 500 EXC-F', '500 EXC-F', 'Enduro', '510cc', '63 HP', 11999.00, '/placeholder.svg?height=300&width=400', 'The KTM 500 EXC-F offers maximum torque for challenging terrain with smooth power delivery.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 510.9 cc\nPower: 46 kW (63 hp)\nTorque: 58.5 Nm\nWeight: 111.7 kg\nFuel capacity: 8.5 liters', true),

-- Motocross
('KTM 250 SX', '250 SX', 'Motocross', '249cc', '48 HP', 8999.00, '/placeholder.svg?height=300&width=400', 'The KTM 250 SX is a championship-winning 2-stroke motocross bike with explosive power and lightweight chassis.', 'Engine: Single-cylinder, 2-stroke\nDisplacement: 249 cc\nPower: 36 kW (48 hp)\nTorque: 45 Nm\nWeight: 100.6 kg\nFuel capacity: 7.5 liters', true),

('KTM 450 SX-F', '450 SX-F', 'Motocross', '449cc', '63 HP', 10499.00, '/placeholder.svg?height=300&width=400', 'The KTM 450 SX-F dominates motocross tracks worldwide with its powerful engine and advanced suspension.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 449.3 cc\nPower: 46 kW (63 hp)\nTorque: 56.5 Nm\nWeight: 100.2 kg\nFuel capacity: 7.5 liters', true),

('KTM 350 SX-F', '350 SX-F', 'Motocross', '349cc', '57 HP', 9999.00, '/placeholder.svg?height=300&width=400', 'The KTM 350 SX-F offers the perfect balance of power and weight for competitive motocross racing.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 349.7 cc\nPower: 42 kW (57 hp)\nTorque: 42 Nm\nWeight: 99.8 kg\nFuel capacity: 7.5 liters', true);

-- Insert sample images for photo galleries
INSERT INTO motorcycle_images (motorcycle_id, image_url, image_alt, is_primary, sort_order) VALUES
(1, '/placeholder.svg?height=300&width=400', 'KTM 390 Duke Front View', true, 1),
(1, '/placeholder.svg?height=300&width=400', 'KTM 390 Duke Side View', false, 2),
(1, '/placeholder.svg?height=300&width=400', 'KTM 390 Duke Engine Detail', false, 3),
(2, '/placeholder.svg?height=300&width=400', 'KTM 790 Duke Front View', true, 1),
(2, '/placeholder.svg?height=300&width=400', 'KTM 790 Duke Side View', false, 2),
(3, '/placeholder.svg?height=300&width=400', 'KTM 890 Duke R Front View', true, 1),
(3, '/placeholder.svg?height=300&width=400', 'KTM 890 Duke R Side View', false, 2),
(4, '/placeholder.svg?height=300&width=400', 'KTM 1290 Super Duke R Front View', true, 1),
(5, '/placeholder.svg?height=300&width=400', 'KTM 390 Adventure Front View', true, 1),
(6, '/placeholder.svg?height=300&width=400', 'KTM 890 Adventure Front View', true, 1),
(7, '/placeholder.svg?height=300&width=400', 'KTM 890 Adventure R Front View', true, 1),
(8, '/placeholder.svg?height=300&width=400', 'KTM 1290 Super Adventure S Front View', true, 1),
(9, '/placeholder.svg?height=300&width=400', 'KTM RC 390 Front View', true, 1),
(10, '/placeholder.svg?height=300&width=400', 'KTM RC 8C Front View', true, 1),
(11, '/placeholder.svg?height=300&width=400', 'KTM 300 EXC TPI Front View', true, 1),
(12, '/placeholder.svg?height=300&width=400', 'KTM 450 EXC-F Front View', true, 1),
(13, '/placeholder.svg?height=300&width=400', 'KTM 500 EXC-F Front View', true, 1),
(14, '/placeholder.svg?height=300&width=400', 'KTM 250 SX Front View', true, 1),
(15, '/placeholder.svg?height=300&width=400', 'KTM 450 SX-F Front View', true, 1),
(16, '/placeholder.svg?height=300&width=400', 'KTM 350 SX-F Front View', true, 1);
