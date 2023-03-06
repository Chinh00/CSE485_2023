<?php
include_once "configs/DBConnection.php";
include_once "models/Member.php";
    class MemberService {
        public function checkLogin($uname, $upass)
        {
            $dbConn = new DBConnection();
            $conn = $dbConn->getConnection();
            $sql = "SELECT * FROM users WHERE username = '{$uname}' AND password = '{$upass}' ";
            $stmt = $conn->query($sql);
            $users = [];
            while ($row = $stmt->fetch()) {
                $user = new Member($row["username"], $row["password"], $row["isAdmin"]);
                array_push($users, $user);
            }
            if (isset($users)) {
                $user_login = $users[0];
            }
            echo $sql;
            return $user_login;

        }
    }

?>