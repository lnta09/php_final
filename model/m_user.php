<?php
    require_once("database.php");
    
    class User extends Database{
        public function create_1_user( $username, $password, $firstname, $lastname, $role )
        {
            $sql = "INSERT INTO user (firstname, lastname, username, password, role)
                    VALUES ('{$firstname}', '{$lastname}', '{$username}', '{$password}', '{$role}')";
            $this->set_query($sql);
            $this->excute_query();
            $this->close();
        }

        public function signin_user($username, $password)
        {
            $sql = "SELECT  * 
                    FROM user
                    WHERE username='$username' AND password = '$password'
                    LIMIT 1 ";
            $this->set_query($sql);
            // echo "$this->query <br>";0799
            $result = $this->excute_query();
            $this->close();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                session_start();
                $_SESSION["loginUSER"] = $row["username"];
                $_SESSION["roleUSER"] = $row["role"];
                return $row["username"];
                }
            } 
            else {return null;}
        }


        public function list_all_user() {
            $sql = "SELECT  * 
            FROM user";
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
    }
?>