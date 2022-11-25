<?php

class DB {

    protected $db;
    protected $table = null;

    public function __construct() {
        $this->db = new SQLite3(ROOT_PATH.'/'.DB_PATH);
    }

    public function all() {
        $results = $this->db->query("SELECT * FROM $this->table WHERE deleted_at IS NULL");
        $data = [];
        while ($result = $results->fetchArray(SQLITE3_ASSOC)) {  
            array_push($data, (object) $result);
        }
        return $data;
    }

    public function query($query) {
        $results = $this->db->query($query);
        $data = [];
        while ($result = $results->fetchArray(SQLITE3_ASSOC)) {  
            array_push($data, (object) $result);
        }
        return $data;
    }

    public function get($id) {
        $results = $this->db->query("SELECT * FROM $this->table WHERE id = '$id' AND deleted_at IS NULL");
        $data = [];
        while ($result = $results->fetchArray(SQLITE3_ASSOC)) {  
            array_push($data, $result);
        }
        return $data[0] ?? null;
    }

    public function add($data) {
        $cols = [];
        $vals = [];
        foreach($data as $col => $val) {
            array_push($cols, $col);
            array_push($vals, $val);
        }
        $cols = implode(",", $cols);
        $vals = implode("','", $vals);
        $sql = "INSERT INTO $this->table ($cols) VALUES ('$vals');";
        $result = $this->db->exec($sql);
        return $result;
    }

    public function update($data) {
        $id = $data['id'];
        $sql = "UPDATE $this->table SET ";
        $bindParams = [];
        foreach ($data as $key => $val) {
            if ($key === 'id') continue;
            $bindParams[] = "$key = '$val'";
        }
        $bindParams[] = "updated_at = '" . date('Y-m-d H:i:s') . "'";
        $sql .= implode(", ", $bindParams) . " WHERE id = $id";
        return $this->db->exec($sql);
    }

    public function softDelete($id) {
        $deleted_at = date('Y-m-d H:i:s');
        $sql = "UPDATE $this->table SET deleted_at = '$deleted_at' WHERE id = '$id'";
        return $this->db->exec($sql);
    }
}