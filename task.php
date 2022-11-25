<?php
$id = $_GET['id'];
$task = new Task($id);
if (!isset($task->id)) {
    header("Location: http://localhost/todo-php?link=tasks&error=1");
}
?>

<h1 class="mb-1">Task</h1>
<form method="POST" action="actions/update-task.php">
    <input name="id" type="text" value=<?= $task->id ?> hidden />
    <div class="flex mb-1">
        <input class="input-text" type="text" placeholder="Enter your task here" name="name" value="<?= $task->name ?>"/>
        <button class="button button-primary" type="submit">Update</button>
    </div>
    <div>
        <input id="priority" class="input-checkbox" type="checkbox" name="priority" <?= $task->priority ? 'checked' : '' ?>>
        <label for="priority" class="font-weight-500 input-checkbox-label"> Priority</label>
        <input id="completed" class="input-checkbox" type="checkbox" name="completed" <?= $task->is_complete ? 'checked' : '' ?>>
        <label for="completed" class="input-checkbox-label font-weight-500"> Completed</label>
    </div>
</form>