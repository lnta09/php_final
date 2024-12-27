<?php
    require('../model/m_category.php');

    class C_category {
        public function list_all_category(){
            $category = new Category();
            $list_category = $category->list_all_category();
            return $list_category;
        }
    }
?>