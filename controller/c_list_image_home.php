<?php
    require('model/m_image.php');

    class C_image {
        public function list_all_image(){
            $image = new Image();
            $list_image = $image->list_all_image();
            return $list_image;
        }
    }
?>