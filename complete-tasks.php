<?php
$sort = $_GET['sort'] ?? null;
$tasks = (new Task())->getCompletes($sort);
?>

<h1 class="mb-1">Completed Tasks</h1>
<div class="mb-1">
    Sort By: <a class="a-link" href="<?= APP_URL ?>?link=complete-tasks&sort=priority">Priority</a> / <a class="a-link" href="<?= APP_URL ?>/?link=complete-tasks&sort=name">Name</a>
</div>
<ul class="list">
    <?php foreach($tasks as $task): ?>
        <li class="list-item-card mb-1 border flex justify-content-between">
            <div class="p-1">
                <div>
                    <span class="font-weight-700"><?= $task->name ?></span> <br>
                    <span class="font-weight-300"><?= $task->updated_at ?></span>
                </div>
            </div>
            <div class="p-1">
                <div>
                    <?= $task->priority ? '<span class="priority">Priority</span>' : '' ?>
                </div>
            </div>
        </li>
    <?php endforeach ?> 
</ul>