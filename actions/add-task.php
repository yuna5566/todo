<?php 
include '../init.php';
$app_url = APP_URL;
$message = '';
$status = '';
if ($_POST) {
    $name = $_POST['name'] ?? '';
    $prio = isset($_POST['priority']) ? 1 : 0;
    if ($name && !empty($name)) {
        $task = new Task();
        $task->add([
            "name" => $name,
            "priority"  => $prio
        ]);
        $status = 'success';
        $message = 'Task successfully added';
    } else {
        $status = 'error';
        $message = 'Unable to add task';
    }
}
setcookie('status', $status, time()+1, '/');
setcookie('message', $message, time()+1, '/');
header("Location: $app_url/?link=tasks&success=1");

