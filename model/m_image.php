<?php
    require_once("database.php");

    class Image extends Database{
        public function create_1_image($product_id, $path)
        {
            $sql = "INSERT INTO image (product_id, path)
            VALUES ('$product_id', '$path')";

            $this->set_query($sql);
            $this->excute_query();
            $this->close();
        }

        public function edit_image($id, $product_id){
            $sql = " Update image
                Set product_id = '$product_id'
                Where id = '$id'
            ";
            $this->set_query($sql);
            $this->excute_query();
        }

        public function delete_image($id){
            $sql = "
                Delete From image 
                Where id = '$id'
            ";
            $this->set_query($sql);
            $this->excute_query();
        }
     
        public function list_all_image() {
            $sql = "SELECT * FROM image";
            $this->set_query($sql);

            // echo "$this->query <br>";0799
            $result = $this->excute_query();
            $list_image = array();
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   $list_image[] = $row ;
                }
            } 
            return $list_image; 
        }

        public function select_image($id){
            $sql = "Select * 
                From image
                Where id = '$id'
            ";

            $this->set_query($sql);
            $result = $this->excute_query();
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
            else{
                return null;
            }
        }
    }
?>