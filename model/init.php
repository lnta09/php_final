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
                gender VARCHAR(10),
                birthday VARCHAR(11),
                reset_token VARCHAR(255),
                token_expiry DATETIME,
                role INT(1) NOT NULL DEFAULT 0, 
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            // Role: 0 admin, 1 user
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
                description TEXT,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
                price DECIMAL(10, 2) NOT NULL,
                quantity INT(4) UNSIGNED,
                category_id INT(6) UNSIGNED,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL
            );";
            $this->set_query($sql);
            $result = $this->excute_query();

            $sql = " INSERT INTO `product` (`id`, `name`, `description`, `quantity`, `price`, `category_id`) VALUES
                (1, 'Jingle Bubble-Glass Highball', '', 100, 231.00, 3),
                (3, 'Christmas Garland Champagne Glasses', 'This lovely hand painted champagne flute is from our Mosaic collection and inspired by the colorful tiles of the Alhambra. This collection is perfect for Christmas or any occasion. Something to be handed down from generation to generation. Proudly hand painted in the USA.', 100, 60.00, 3),
                (4, 'Tall Double Old Fashioned Glasses', 'Decorate your bar with this set of six double old fashioned glasses featuring an etched stag head design. This set is a perfect rustic accent to your holiday glassware collection. Hand wash only.', 38, 95.00, 3),
                (5, 'Waterford 12 Days of Christmas', 'Waterford 12 Days of Christmas Lismore Partridge Gold Flute\r\nThe Waterford 12 Days of Christmas Lismore Partridge Gold Flute is the first in a new series of 12 Waterford Christmas flutes - \"two days\" of clear and gold flutes and ornaments will be introduced annually over six years.', 23, 100.00, 3),
                (6, 'Polish Pottery Coffee Mug', 'Product details: Dimensions: Height: 3.8\" Diameter: 3.5\" Capacity: 12 Oz.', 100, 27.00, 3),
                (7, 'Christmas Garland Wine Glasses', 'This lovely hand painted wine glass is from our Mosaic collection and inspired by the colorful tiles of the Alhambra. Something to be handed down from generation to generation. Proudly hand painted in the USA.', 60, 60.00, 3);
            ";
            $this->set_query($sql);
            $result = $this->excute_query();

            $sql = " CREATE TABLE IF NOT EXISTS image (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                product_id INT(6) UNSIGNED NULL,
                path VARCHAR(500),
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE SET NULL
            );";
            $this->set_query($sql);
            $result = $this->excute_query();

            $sql = "INSERT INTO `image` (`id`, `product_id`, `path`) VALUES
                (1, 1, '../uploads/image1'),
                (2, 3, '../uploads/image2'),
                (3, 4, '../uploads/image3'),
                (4, 5, '../uploads/image4'),
                (5, 6, '../uploads/image5'),
                (6, 7, '../uploads/image6');
            ";
            $this->set_query($sql);
            $result = $this->excute_query();

            $sql = "CREATE TABLE IF NOT EXISTS `order` (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT(6) UNSIGNED NULL,
                status VARCHAR(20),
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE SET NULL
            );";
            $this->set_query($sql);
            $result = $this->excute_query();

            $sql = "CREATE TABLE IF NOT EXISTS orderDetail (
                order_id INT(6) UNSIGNED NOT NULL,
                product_id INT(6) UNSIGNED NOT NULL,
                quantity INT(4) UNSIGNED NOT NULL,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (order_id, product_id),
                FOREIGN KEY (order_id) REFERENCES `order`(id) ON DELETE CASCADE,
                FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
            );";
            $this->set_query($sql);
            $result = $this->excute_query();

            $this->close();
            echo "INIT COMPLETE";
        } 
    }

    $myinit = new initDatabase();
    $myinit->create_structure();
?>