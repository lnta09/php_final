<?php

    require_once("database.php");


    class initDatabase extends Database  {

        public function create_structure()
        {
            ############### Table USER
            $sql = "CREATE TABLE IF NOT EXISTS user (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(30) NOT NULL,
                phone VARCHAR(11) NOT NULL,
                email VARCHAR(30) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                reset_token VARCHAR(255),
                token_expiry DATETIME,
                role INT(1) NOT NULL DEFAULT 0, 
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            // Role: 0 user, 1 admin
           $this->set_query($sql);
           $result = $this->excute_query();
           
           $sql = "INSERT INTO user (username, phone, email, password, role)
                VALUES 
                    ('user', '0379254384', 'user@example.com', 'abc123', 1),
                    ('admin', '0364062775', 'admin@example.com', 'abc123', 0)";

            $this->set_query($sql);
            $result = $this->excute_query();

            ############### Table CATEGORY  
            $sql = "CREATE TABLE IF NOT EXISTS category (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL UNIQUE,
                description TEXT
            );";
            $this->set_query($sql);
            $result = $this->excute_query();

            $sql = "INSERT INTO category (name, description) 
                    VALUES 
                        ('living_room', 'Create a warm and welcoming space with fresh living room'),
                        ('bedroom', 'Dream in comfort with bedroom'),
                        ('kitchen', 'White kitchen and breakfast room with fireplace and arches'),
                        ('furniture', 'about lightning');";

            $this->set_query($sql);
            $result = $this->excute_query();

            ############### Table product  
            $sql = "CREATE TABLE IF NOT EXISTS product (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                description TEXT,
                avatar VARCHAR(500),
                price DECIMAL(10, 2) NOT NULL,
                category_id INT(6) UNSIGNED,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL
            );";
                // Role: 0 user, 1 admin
            $this->set_query($sql);
            $result = $this->excute_query();

            $sql = "
                INSERT INTO `product` (`id`, `name`, `description`, `avatar`, `price`, `category_id`, `create_time`) VALUES
                (1, 'Jingle Bubble-Glass Highball', '', '../uploads/7e61afc20e4ebdf4_7310-w458-h458-b1-p0--.webp', 231.00, 3, '2024-12-03 13:46:19'),
                (3, 'Christmas Garland Champagne Glasses', 'This lovely hand painted champagne flute is from our Mosaic collection and inspired by the colorful tiles of the Alhambra. This collection is perfect for Christmas or any occasion. Something to be handed down from generation to generation. Proudly hand painted in the USA.', '../uploads/8b510aaa0eb0510c_7876-w458-h458-b1-p0--.webp', 60.00, 3, '2024-12-03 14:10:19'),
                (4, 'Tall Double Old Fashioned Glasses', 'Decorate your bar with this set of six double old fashioned glasses featuring an etched stag head design. This set is a perfect rustic accent to your holiday glassware collection. Hand wash only.', '../uploads/308146fe0b913ea9_3328-w458-h458-b1-p0--.webp', 95.00, 3, '2024-12-03 14:13:23'),
                (5, 'Waterford 12 Days of Christmas', 'Waterford 12 Days of Christmas Lismore Partridge Gold Flute\r\nThe Waterford 12 Days of Christmas Lismore Partridge Gold Flute is the first in a new series of 12 Waterford Christmas flutes - \"two days\" of clear and gold flutes and ornaments will be introduced annually over six years.', '../uploads/75c180d506e510c9_1749-w458-h458-b1-p0--.webp', 100.00, 3, '2024-12-03 14:15:44'),
                (6, 'Polish Pottery Coffee Mug', 'Product details: Dimensions: Height: 3.8\" Diameter: 3.5\" Capacity: 12 Oz.', '../uploads/39618b7905b25124_9551-w458-h458-b1-p0--.webp', 27.00, 3, '2024-12-03 14:17:31'),
                (7, 'Christmas Garland Wine Glasses', 'This lovely hand painted wine glass is from our Mosaic collection and inspired by the colorful tiles of the Alhambra. Something to be handed down from generation to generation. Proudly hand painted in the USA.', '../uploads/d60126490eb05012_7501-w458-h458-b1-p0--.webp', 60.00, 3, '2024-12-03 14:20:21');
            ";
            $this->set_query($sql);
            $result = $this->excute_query();

            $this->close();
            echo "INIT COMPLETE";
        } 
    }

    $myinit = new initDatabase();
    $myinit->create_structure();
?>