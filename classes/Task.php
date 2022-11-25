<?php

class Task extends DB {

    const DB_TABLE = 'tasks';

    public function __construct($id = null){
        parent::__construct();
        $this->table = Task::DB_TABLE;

        if (!$id) return $this;

        return $this->get($id);
    }

    public function getIncompletes($sort = null) {
        $sql = "SELECT * FROM tasks WHERE is_complete = 0 AND deleted_at IS NULL";
        $order = self::orderBy($sort);
        $sql .= $order;
        $tasks = $this->query($sql);
        return $tasks;
    }

    public function getCompletes($sort = null) {
        $sql = "SELECT * FROM tasks WHERE is_complete = 1 AND deleted_at IS NULL";
        $order = self::orderBy($sort);
        $sql .= $order;
        $tasks = $this->query($sql);
        return $tasks;
    }

    public function delete($id) {
        return $this->softDelete($id);
    }

    public function update($data) {
        parent::update($data);
        $task = $this->get($this->id);
        $this->set($task);
        return $this;
    }

    public function complete() {
        if (!$this->id) return $this;
        $this->update([
            'is_complete' => true,
            'id' => $this->id
        ]);
    }

    public function prioritize() {
        if (!$this->id) return $this;
        $this->update([
            'priority' => true,
            'id' => $this->id
        ]);
    }

    public function get($id) {
        $task = parent::get($id);
        if (!$task) return null;

        $this->set($task);
        return $this;
    }

    public function set($array_values) {
        foreach($array_values as $key => $val) {
            $this->{$key} = $val;
        }
    }

    public static function orderBy($sort = null) {
        $orderBy = "";

        switch($sort) {
            case 'name':
                $orderBy .= " ORDER BY $sort ASC";
                break;
            case 'priority':
                $orderBy .= " ORDER BY $sort DESC, name ASC";
                break;
        }

        return $orderBy;
    }
}