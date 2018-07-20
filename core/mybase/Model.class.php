<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28
 * Time: 16:11
 */

namespace core\mybase;


class Model
{
    private $dsn = "mysql:dbname=classicstyle;host=localhost:3306";
    private $username = "root";
    private $password = "888";
    private $option = array(\PDO::ATTR_PERSISTENT => TRUE, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_ORACLE_NULLS => true);
    private $pdo;

    public function __construct()
    {
        global $c;
        $this->dsn = isset($c['db']['dsn']) ? $c['db']['dsn'] : $this->dsn;
        $this->username = isset($c['db']['username']) ? $c['db']['username'] : $this->username;
        $this->password = isset($c['db']['password']) ? $c['db']['password'] : $this->password;
        $this->option = isset($c['db']['option']) ? $c['db']['option'] : $this->option;
    }

    public function getPDO()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO($this->dsn, $this->username, $this->password, $this->option);
        }
        return $this->pdo;
    }

    public function destoryPDO()
    {
        if ($this->pdo != null) {
            $this->pdo = null;
        }
    }

    public function execute($sql, $args)
    {
        $result = 0;
        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            $result = $pdostmt->rowCount();
        } catch (\PDOException $e) {
            echo "持久化异常：" . $e->getMessage();
        }
        return $result;
    }

    public function query($sql, $args)
    {
        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            return $pdostmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "持久化异常：" . $e->getMessage();
            return null;
        }
    }
}