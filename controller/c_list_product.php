<?php
    require ('../model/m_product.php');
    class C_product {
        public function list_all_product()
        {
            $product = new Product();
            $list_product = $product->list_all_product();
            return  $list_product;
        }
    }

?>
