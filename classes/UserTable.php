<?php

class UserTable {
    private $connection;
    private $roles;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->roles = array("user", "staff", "admin");
    }

    public function insert($email, $password, $role) {
        if (!isset($email)) {
            throw new Exception("Email required");
        }
        if (!isset($password)) {
            throw new Exception("Password required");
        }
        if (!isset($role) || !in_array($role, $this->roles)) {
            throw new Exception("Role required");
        }

        $sql = "INSERT INTO users(email, password, role) "
             . "VALUES (:email, :password, :role)";

        $params = array(
            'email' => $email,
            'password' => $password,
            'role' => $role
        );

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save user: " . $errorInfo[2]);
        }

        $id = $this->connection->lastInsertId('users');

        return $id;
    }

    public function delete($id) {
        if (!isset($id) || $id === null) {
            throw new Exception("User id required");
        }

        $sql = "DELETE FROM users WHERE id = :id";

        $params = array('id' => $id);

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete user: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }

    public function update($id, $email, $password, $role) {
        if (!isset($id) || $id === null) {
            throw new Exception("User id required");
        }
        if (!isset($email)) {
            throw new Exception("Email required");
        }
        if (!isset($password)) {
            throw new Exception("Password required");
        }
        if (!isset($role) || !in_array($role, $this->roles)) {
            throw new Exception("Role required");
        }

        $sql = "UPDATE users SET "
                . "email = :email, "
                . "password = :password, "
                . "role = :role "
                . "WHERE id = :id";

        $params = array(
            'id' => $id,
            'email' => $email,
            'password' => $password,
            'role' => $role
        );

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not update user: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";

        $params = array('id' => $id);

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $row = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
        }
        return $row;
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array('email' => $email);
        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $row = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
        }
        return $row;
    }

    public function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve users: " . $errorInfo[2]);
        }

        $users = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $users[$id] = $row;

            $row = $stmt->fetch();
        }
        return $users;
    }
}

?>
