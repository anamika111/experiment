<?php

include 'config.php';


class DB
{
    protected $db;

    function __construct()
    {
        try {
            $host = DB_HOST;
            $user = DB_USER;
            $pwd = DB_PASSWORD;
            $dbname = DB_DATABASE;
            $this->db = new PDO("mysql:dbname={$dbname};host={$host}", $user, $pwd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }

    }


    /**
     * Function for insert data into the table
     * @param $table_name
     * @param $data
     * @return bool
     */
    function insert($table_name, $data)
    {
        $return = false;
        $columns = join(',', array_keys($data));

        $values = array();
        foreach (array_values($data) as $value) {
            $values[] = "'$value'";

        }
        $values = join(',', $values);
        $query = "insert into {$table_name}  ({$columns}) values($values) ";
        try {
            $this->db->query($query);
            $return = true;
        } catch (Exception $e) {

        }
        return $return;

    }


    function select($query)
    {
        $data = array();
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();

    }


    function update($table_name, $data, $where)
    {

        $data_to_update = array();
        foreach ($data as $key => $val) {
            $val = trim($val);
            $data_to_update[] = "$key='$val'";
        }
        $data_to_update = join(',', $data_to_update);

        $query = "update information set {$data_to_update} where {$where} ";

        try {
            $this->db->prepare($query)->execute();
            $return = true;
        } catch (Exception $e) {

        }
        return $return;


    }

    function delete($table_name, $where)
    {

        $query="delete from {$table_name} where {$where}";
        try {
            $this->db->query($query)->execute();
            $return = true;
        }
        catch (Exception $e)
        {

        } return $return;

    }


    function __destruct()
    {
        $this->db = null;
    }

}