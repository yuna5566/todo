<?php

$taskCounts = (new Task())->getTaskCounts();

?>

<div class="mb-1 flex justify-content-between">
    <div>Completed Tasks: <span class="font-weight-500"><?= $taskCounts['completed'] ?></span></div>
    <div>Total Tasks: <span class="font-weight-500"><?= $taskCounts['total'] ?></span></div>
</div>
<hr class="mb-1"/>