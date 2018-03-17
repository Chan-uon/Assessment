<?php

include "Db.class.php";

class User
{
    private $data = array();

    public function __construct()
    {
        $this->getColumns();
    }

    private function getColumns()
    {
        //get column names and place it into $data
        $pdo = Db::getInstance();

        $sql  = "SELECT * ";
        $sql .= "FROM users ";
        $sql .= "LIMIT 0;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        for ($i = 0; $i < $stmt->columnCount() ; $i++) {
           $column = $stmt->getColumnMeta($i);
           $this->data[$column['name']] = null;
        }
        unset($this->data['ts_inserted']);
        unset($this->data['dt_modified']);
    }

    public function save()
    {
        $pdo = Db::getInstance();

        $sql  = "INSERT INTO users ";
        $sql .= "(user_inserted, user_modified , first_name, last_name, job_title,
                email, address_1, address_2, city, postal_code,
                province, country, phone, password, salt,
                date_of_birth, disable, reset_password, role_id)";
        $sql .= "values (";
        $sql .= "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $sql .= ")";

        $stmt = $pdo->prepare($sql);
        unset($this->data['user_id']);
        $stmt->execute(array_values($this->data));
    }

    public function update()
    {
        $pdo = Db::getInstance();

        $sql  = "UPDATE users ";
        $sql .= "SET ";
        $sql .= "user_inserted = ?, user_modified = ?, first_name = ?, last_name = ?, job_title = ?,
                email = ?, address_1 = ?, address_2 = ?, city = ?, postal_code = ?,
                province = ?, country = ?, phone = ?, password = ?, salt = ?,
                date_of_birth = ?, disable = ?, reset_password = ?, role_id = ?";
        $sql .= " WHERE user_id = ?";

        $stmt = $pdo->prepare($sql);
        $user_id = $this->data['user_id'];
        unset($this->data['user_id']);
        $param = array_values($this->data);
        array_push($param, $user_id);

        $stmt->execute($param);
    }

    public static function delete($user_id)
    {
       $pdo = Db::getInstance();

       $sql  = "DELETE ";
       $sql .= "FROM users ";
       $sql .= "WHERE user_id = ?";
       $sql .= "LIMIT 1";

       $stmt = $pdo->prepare($sql);
       $stmt->execute(array($user_id));
    }

    public static function read($user_id)
    {
       $pdo = Db::getInstance();

       $sql  = "SELECT * ";
       $sql .= "FROM users ";
       $sql .= "WHERE user_id = ?";

       $stmt = $pdo->prepare($sql);
       $stmt->execute(array($user_id));
       return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function __get($var_name)
    {
        try {
            if (array_key_exists($var_name, $this->data)) {
                return $this->data[$var_name];
            } else {
                throw new Exception('Error __get: ' . __CLASS__ . ' class does not have attribute ' . $var_name);
            }
        } catch (Exception $e) {
            echo  "<br />" . $e;
        }
    }

    public function __set($var_name,$value)
    {
        try {
            if (array_key_exists($var_name, $this->data)) {
                $this->data[$var_name] = $value;
            } else {
                throw new Exception('Error __set: ' . __CLASS__ . ' class does not have attribute ' . $var_name);
            }
        } catch (Exception $e) {
            echo  "<br />" . $e;
        }
    }
}
