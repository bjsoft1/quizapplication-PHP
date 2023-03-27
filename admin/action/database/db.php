<?php

class Database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "quizapplication_db";
    private $result = array();
    private $mysqli = "";
    private $conn = false;
    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if ($this->mysqli->connect_errno > 0) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }
    public function insert($table, $params = array())
    {
        $table_columns = implode(', ', array_keys($params));
        $table_value = implode("', '", $params);
        $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";
        $this->myQuery = $sql;
        if ($this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->insert_id);
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    public function update($table, $params = array(), $where = null)
    {
        $args = array();
        foreach ($params as $key => $value) {
            $args[] = "$key='$value'";
        }
        $sql = "UPDATE $table SET " . implode(',', $args);
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $this->myQuery = $sql;
        if ($query = $this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->affected_rows);
            return true;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    public function delete($table, $where = null)
    {
        $sql = "DELETE FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->affected_rows);
            return true;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    public function select($sql)
    {
        $this->myQuery = $sql;
        $query = $this->mysqli->query($sql);
        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function escapeString($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $this->mysqli->real_escape_string($data);
    }
    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            } else {
                return false;
            }
        }
    }
}
