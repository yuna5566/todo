<?php 
include '../init.php';
$app_url = APP_URL;
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
        header("Location: $app_url/?link=task&success=1");
    } else {
        header("Location: $app_url/?link=add-task&error=1");
    }
    
}