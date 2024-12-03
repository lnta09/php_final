<?php

    require_once("database.php");


    class initDatabase extends Database  {

        public function create_structure()
        {
            ############### Table USER
            $sql = "CREATE TABLE IF NOT EXISTS user (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                username VARCHAR(30) NOT NULL UNIQUE,
                password VARCHAR(30) NOT NULL,
                role INT(1) NOT NULL DEFAULT 0, 
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

            // Role: 0 user, 1 admin

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
            $this->close();
            echo "INIT COMPLETE";
        } 
    }

    $myinit = new initDatabase();
    $myinit->create_structure();
?>