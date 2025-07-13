CREATE DATABASE IF NOT EXISTS FitAura;
USE FitAura;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(50),
    address TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(8, 2),
    image VARCHAR(255),
    stock_qty INT,
    type ENUM('Shirt', 'Pants', 'T-shirt', 'Skirt', 'Shorts'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE shipping_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    address TEXT,
    city VARCHAR(50),
    postal_code VARCHAR(50),
    phone VARCHAR(50),
    user_id INT,
    payment_type ENUM('credit_card', 'cash on delivery', 'fawry') DEFAULT 'cash on delivery',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total DECIMAL(10, 2),
    shopping_info_id INT,
    status ENUM('pending', 'processing', 'shipped', 'delivered' ,'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ,
    FOREIGN KEY (`shopping_info_id`) REFERENCES shipping_info(`id`) ON DELETE CASCADE
);

CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(8,2),
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);


INSERT INTO products (name, description, price, image, type , stock_qty) VALUES
('Classic Men Shirt', 'Cotton shirt with regular fit', 250.00, 'img/products/f1.jpg', 'Shirt', 10),
('floral shirt', 'Cotton shirt with floral design', 300.00, 'img/products/f2.jpg', 'Shirt', 20),
('red floral shirt', 'Cotton shirt with floral design', 300.00, 'img/products/f3.jpg', 'Shirt', 20),
('pink floral shirt', 'Cotton shirt with floral design', 300.00, 'img/products/f4.jpg', 'Shirt', 20),
('cool shirt', 'Cotton shirt with cool design', 350.00, 'img/products/f6.jpg', 'Shirt', 20),
('casual pants', 'Cotton pants with regular fit', 400.00, 'img/products/f7.jpg', 'Pants', 20),
('woman brown T-shirt', 'Cotton T-shirt with regular fit', 250.00, 'img/products/f8.jpg', 'T-shirt', 20),
('blue men cool T-shirt', 'Cotton T-shirt with regular fit', 250.00, 'img/products/n1.jpg', 'T-shirt',20),
('gray shirt','Cotton shirt with regular fit', 250.00, 'img/products/n2.jpg', 'Shirt', 20),
('white shirt','Cotton shirt with regular fit', 250.00, 'img/products/n3.jpg', 'Shirt', 20),
('zara new cool shirt','Cotton shirt with regular fit', 250.00, 'img/products/n4.jpg', 'Shirt', 20),
('jeans shirt','Cotton shirt with regular fit', 250.00, 'img/products/n5.jpg', 'Shirt', 20),
('shorts','Cotton shorts with regular fit', 250.00, 'img/products/n6.jpg', 'Shorts', 20),
('casual shirt','Cotton shirt with regular fit', 250.00, 'img/products/n7.jpg', 'Shirt', 20),
('black T-shirt','Cotton T-shirt with regular fit', 250.00, 'img/products/n8.jpg', 'T-shirt', 20);


