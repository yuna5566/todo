<?php 
include '../init.php';

if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'] ?? '';
    $prio = isset($_POST['priority']) ? 1 : 0;
    $complete = isset($_POST['completed']) ? 1 : 0;
    if ($name && !empty($name)) {
        $task = new Task($id);
        $task->update([
            'name' => $name,
            'priority'  => $prio,
            'is_complete' => $complete,
            'id' => $id
        ]);
        header("Location: http://localhost/todo-php/?link=task&success=1");
    } else {
        header("Location: http://localhost/todo-php/?link=add-task&error=1");
    }
    
}