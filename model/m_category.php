<?php
    require_once("database.php");

    class Category extends Database{
        public function create_1_category($name, $description)
        {
            $sql = "INSERT INTO category (name, description)
            VALUES ('$name', '$description')";

            $this->set_query($sql);
            $this->excute_query();
            $this->close();
        }
     
        public function list_all_category() {
            $sql = "SELECT  * FROM category";
            $this->set_query($sql);

            // echo "$this->query <br>";0799
            $result = $this->excute_query();
            $list_category = array();
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   $list_category[] = $row ;
                }
            } 
            return $list_category; 
        }
    }
?>