<?php 
include '../init.php';

if ($_POST) {
    $name = $_POST['name'] ?? '';
    $prio = isset($_POST['priority']) ? 1 : 0;
    if ($name && !empty($name)) {
        $task = new Task();
        $task->add([
            "name" => $name,
            "priority"  => $prio
        ]);
        header("Location: http://localhost/todo-php/?link=tasks&success=1");
    } else {
        header("Location: http://localhost/todo-php/?link=add-task&error=1");
    }
    
}

