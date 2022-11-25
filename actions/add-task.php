<?php 
include '../init.php';

$app_url = APP_URL;

if ($_POST) {
    $name = $_POST['name'] ?? '';
    $prio = isset($_POST['priority']) ? 1 : 0;
    if ($name && !empty($name)) {
        $task = new Task();
        $task->add([
            "name" => $name,
            "priority"  => $prio
        ]);
        header("Location: $app_url/?link=tasks&success=1");
    } else {
        header("Location: $app_url/?link=add-task&error=1");
    }
    
}

