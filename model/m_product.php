<?php
    require_once("database.php");

    class Product extends Database{
        public function create_1_product($name, $description, $price, $category_id, $quantity)
        {
            $sql = "INSERT INTO product (name, description, price, category_id, quantity)
            VALUES ('$name', '$description', '$price', '$category_id', '$quantity')";

            $this->set_query($sql);
            $this->excute_query();
            $this->close();
        }
     
        public function list_all_product() {
            $sql = "SELECT  * FROM product";
            $this->set_query($sql);

            // echo "$this->query <br>";0799
            $result = $this->excute_query();
            $list_product = array();
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   $list_product[] = $row ;
                }
            } 
            return $list_product; 
        }
    }
?>