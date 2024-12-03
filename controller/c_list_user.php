<?php
    require ('../model/m_user.php');

    class C_user {
        public function list_all_user()
        {
            $user = new User();
            $list_user = $user->list_all_user();

            return  $list_user;
        }
    }
?>