<?php
    require_once("database.php");
    
    class User extends Database{
        public function create_1_user( $email, $password, $username, $phone, $role )
        {
            $sql = "INSERT INTO user (username, phone, email, password, role)
                    VALUES ('{$username}', '{$phone}', '{$email}', '{$password}', '{$role}')";
            $this->set_query($sql);
            $this->excute_query();
            $this->close();
        }

        public function edit_user($email, $username, $phone, $gender, $birthday, $role){
            $sql = "
                Update user
                Set username = '$username',
                    phone = '$phone',
                    gender = '$gender',
                    birthday = '$birthday',
                    role = '$role'
                Where email = '$email'
            ";
            $this->set_query($sql);
            $this->excute_query();
        }

        public function delete_user($email){
            $sql = "
                Delete From user 
                Where email = '$email'
            ";
            $this->set_query($sql);
            $this->excute_query();
        }

        public function select_user($email){
            $sql = "
                Select * From user
                Where email='$email'
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

        public function signin_user($email, $password)
        {
            $sql = "SELECT  * 
                    FROM user
                    WHERE email='$email' AND password = '$password'
                    LIMIT 1 ";
            $this->set_query($sql);
            $result = $this->excute_query();
            $this->close();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    session_start();
                    $_SESSION["loginUSER"] = $row["email"];
                    $_SESSION["roleUSER"] = $row["role"];
                    return $row["email"];
                }
            } 
            else {return null;}
        }

        public function list_all_user() {
            $sql = "SELECT * FROM user";
            $this->set_query($sql);
            // echo "$this->query <br>";0799
            $result = $this->excute_query();
            $list_user = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                //    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                   $list_user[] = $row ;
                }
            } 
            return $list_user;
        }

        public function set_reset_token($email, $reset_token, $expiry){
            $sql = "
                Update user
                Set reset_token = '$reset_token', token_expiry = '$expiry' 
                Where email = '$email'
            ";
            $this->set_query($sql);
            $this->excute_query();
        }

        public function exist_token($reset_token){
            $sql = "
                Select *
                From user
                Where reset_token = '$reset_token'
            ";
            $this->set_query($sql);
            $result = $this->excute_query();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return null;
            }
        }
        
        public function change_password($email, $password){
            $sql = "
                Update user
                Set password = '$password', reset_token = null, token_expiry = null
                Where email = '$email'
            ";
            $this->set_query($sql);
            $this->excute_query();
        }
    }
?>