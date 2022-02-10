<?php

class toolbox
{


    //--------------------------------------------------------------
    // Database

    private $user;
    private $host;
    private $pass;
    private $db;
    private $conn;

    public function __construct($db)
    {
        $this->user = "php_user";
        $this->host = "localhost";
        $this->pass = "123";
        $this->db = $db;
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function connect()
    {
        return new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    //--------------------------------------------------------------
    // Insert into

    public function InsertInto($subject, array $into, array $what)
    {
        $count = str_repeat("?", count($what));
        $stmt = $this->conn->prepare("INSERT INTO " . $subject . "  (" . $into . "  ) VALUES (  " . $count . " );");

        if (false === $stmt) {
            throw new Exception($this->conn->error);
        }

        $bind = $stmt->bind_param(str_repeat("s", count($into)));
        if (false === $bind) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->execute($what);

        if (false === $bind) {
            throw new Exception($stmt->error);
        }
        $stmt->close();

        echo "Succesfully inserted";


    }
    //--------------------------------------------------------------
    // Select

    public function Select(string $subject, array $param)
    {
        $count = str_repeat("?", count($param));
        $stmt = $this->conn->prepare("SELECT * FROM " . $subject . " VALUES (" . $count . ");");

        if (false === $stmt) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->bind_param(str_repeat("s", count($param)));
        if (false === $bind) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->execute($param);

        if (false === $bind) {
            throw new Exception($stmt->error);
        }
        $stmt->close();

    }

    //--------------------------------------------------------------
    // Update

    public function Update($table, $data, $where)
    {

        $stmt = $this->conn->prepare("UPDATE " . $table . " SET " . $data . " WHERE $where");

        if (false === $stmt) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->execute();

        if (false === $bind) {
            throw new Exception($stmt->error);
        }
        $stmt->close();
    }

    //--------------------------------------------------------------
    // Delete

    public function delete($from, $subject, $where)
    {

        $stmt = $this->conn->prepare("DELETE FROM " . $from . " WHERE " . $subject . " = " . $where . ";");

        if (false === $stmt) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->execute();

        if (false === $bind) {
            throw new Exception($stmt->error);
        }
        $stmt->close();

    }


}
