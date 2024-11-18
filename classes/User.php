<?php

require 'Database.php';

class User extends Database
{

    public function register($request)
    {
        $fname  = $request['first_name'];
        $lname  = $request['last_name'];
        $uname  = $request['username'];
        $pass   = $request['password'];
        // create a hashed password
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES ('$fname', '$lname', '$uname', '$hashed_password')";

        if ($this->conn->query($sql)) {
            header('location:../views/login.php');
        } else {
            die('Error: ' . $this->conn->error);
        }
    }

    public function login($request)
    {
        // if you can login, user should go to dashboard.php

        $username  = $request['username'];
        $password = $request['password'];

        $sql = "SELECT  * FROM users WHERE username = '$username'";

        if ($result = $this->conn->query($sql)) { // check if the username exists'

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    session_start();



                    $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['user_id'] = $user['id'];


                    header('location:../views/dashboard.php');
                } else {
                    die("ERROR: credentials do not match" . $this->conn->error);
                }
            } else {
                die("ERROR: credentials do not match" . $this->conn->error);
            }
        } else {
            die("ERROR: credentials do not match" . $this->conn->error);
        }
    }



    public function displayUsers()
    {
        $sql = "SELECT * FROM users";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die("Error: " . $this->conn->error);
        }
    }
    public function showUser()
    {
        $id  = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id = $id  ";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            die("Error: " . $this->conn->error);
        }
    }
    public function update($request){
        $id = $_SESSION['user_id'];
        $fname = $request['first_name'];
        $lname = $request['last_name'];
        $uname = $request['username'];

        $sql = "UPDATE users SET first_name = '$fname', last_name = '$lname', username = '$uname' WHERE id = $id";

        if ($this->conn->query($sql)) {
            header('location:../views/dashboard.php');
        } else {
            die("Error: " . $this->conn->error);
        }

    }

    public function delete(){
        $id = $_SESSION['user_id'];
        $sql = "DELETE FROM users WHERE id = $id";

        if($this->conn->query($sql)){
            session_destroy();
            header('location:../views/login.php');

        }else{
            die('ERROR: '. $this->conn->error);
        }
    }

    public function logout(){
        session_destroy();
        header('location:../views/login.php');
    }
}
