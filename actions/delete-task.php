<?php
include '../init.php';
$app_url = APP_URL;
$message = '';
$status = '';
if ($_POST) {
    $id = $_POST['delete-id'];
    if ($id) {
        $task = new Task($id);
        $task->delete($id);
        $message = 'Task has been successfully deleted';
        $status = 'success';
    } else {
        $message = 'Unable to delete task';
        $status = 'error';
    }
} else {
    $status = 'error';
    $message = 'Something went wrong.';
    
}
setcookie('status', $status, time()+1, '/');
setcookie('message', $message, time()+1, '/');
header("Location: $app_url/?link=tasks");
