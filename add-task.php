<?php

?>

<h1 class="mb-1">Add Task</h1>
<form method="POST" action="actions/add-task.php">
    <div class="flex mb-1">
        <input class="input-text" type="text" placeholder="Enter your task here" name="name" />
        <button class="button button-primary" type="submit">Add</button>
    </div>
    <div>
        <input id="priority" class="input-checkbox" type="checkbox" name="priority">
        <label for="priority" class="font-weight-500"> Priority</label>
    </div>
</form>
