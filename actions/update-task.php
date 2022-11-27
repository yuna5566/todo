<?php 
include '../init.php';
$app_url = APP_URL;
$message = '';
$status = '';
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
        $status = 'success';
        $message = 'Task successfully updated.';
    } else {
        $status = 'error';
        $message = 'Unable to update task.';
    }
}
setcookie('status', $status, time()+1, '/');
setcookie('message', $message, time()+1, '/');
header("Location: $app_url/?link=task");