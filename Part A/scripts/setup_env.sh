#!/bin/bash

echo "[*] Setting up vulnerable app environment..."

# Update system
sudo apt update

# Install Apache, PHP, MySQL
sudo apt install -y apache2 php php-mysql mysql-server unzip

# Start services
sudo systemctl start apache2
sudo systemctl start mysql

# Create database
echo "[*] Creating database..."
mysql -u root <<EOF
CREATE DATABASE vulnerable_app;
USE vulnerable_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username, password)
VALUES ('admin', 'admin123');
EOF

# Deploy app
echo "[*] Deploying app..."
sudo cp -r ../app/original /var/www/html/vulnerable_app

sudo chmod -R 755 /var/www/html/vulnerable_app

echo "[✓] Setup complete. Access app at http://localhost/vulnerable_app"