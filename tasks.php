<?php
$sort = $_GET['sort'] ?? null;
$tasks = (new Task())->getIncompletes($sort);
?>

<h1 class="mb-1">Tasks</h1>
<div class="mb-1">
    Sort By: <a class="a-link" href="http://localhost/todo-php/?link=tasks&sort=priority">Priority</a> / <a class="a-link" href="http://localhost/todo-php/?link=tasks&sort=name">Name</a>
</div>
<ul class="list">
    <?php foreach($tasks as $task): ?>
        <a href="http://localhost/todo-php/?link=task&id=<?= $task->id ?>" class="a-link">
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
        </a>
    <?php endforeach ?> 
</ul>