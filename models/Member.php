<?php

class Member {
    private $username;
    private $password;  
    private $isAdmin;

    public function __construct($username, $password, $isAdmin)
    {
        $this->username = $username;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }



    public function get_username() {
        return $this->username;
    }
    public function get_password() {
        return $this->password;
    }
    public function get_isAdmin() {
        return $this->isAdmin;
    }

}

?>