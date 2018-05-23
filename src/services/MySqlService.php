<?php
/**
 * Created by PhpStorm.
 * User: worasitdaimongkol
 * Date: 5/23/18
 * Time: 11:56 PM
 */

class MySqlService
{
    private $host;
    private $port;
    private $user;
    private $pass;
    private $connStr;
    private $conn;


    public function __construct($host, $port, $user, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $password;
        $this->connStr = "mysql:host=$host;port=$port;";
    }

    public function connect(): bool
    {
        try {
            if (!isset($this->conn)) {
                $this->conn = new PDO($this->connStr, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function createDB($dbName): bool
    {
        try {
            if (!isset($this->conn)) $this->connect();
            $sql = "CREATE DATABASE $dbName";
            $this->conn->exec($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function close(): bool
    {
        $this->conn = null;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return string
     */
    public function getConnStr()
    {
        return $this->connStr;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }
}