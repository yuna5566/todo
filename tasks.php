<?php
$sort = $_GET['sort'] ?? null;
$tasks = (new Task())->getIncompletes($sort);
?>

<h1 class="mb-1">Tasks</h1>
<?php include_once 'task-analytics.php' ?>
<div class="mb-1">
    Sort By: <a class="a-link" href="<?= APP_URL ?>/?link=tasks&sort=priority">Priority</a> / <a class="a-link" href="<?= APP_URL ?>/?link=tasks&sort=name">Name</a>
</div>
<?php include_once 'alert.php' ?>
<ul class="list">
    <?php foreach($tasks as $task): ?>
        <a href="<?= APP_URL ?>/?link=task&id=<?= $task->id ?>" class="a-link">
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