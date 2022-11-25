<?php
require_once 'init.php';
require_once 'init.db.php';

$link = $_GET['link'] ?? 'tasks';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <title>To Do - PHP</title>
    
</head>
<body id="main">
    <div class="container card">
        <div class="grid-container mt-1">
            <div class="grid-item grid-item-1 h-full">
                <div class="p-1 flex justify-content-center align-items-center">
                    <h1>My To-Do's</h1>
                </div>
                <hr />
                <ul class="list p-1">
                    <li class="list-item">
                        <h3 class="flex justify-content-between align-items-center">
                            <a class="a-link font-weight-500" href="<?= APP_URL ?>?link=tasks">Tasks</a>
                            <a class="a-link font-weight-500" href="<?= APP_URL ?>?link=add-task"><ion-icon name="add-circle-outline"></ion-icon></a>
                        </h3>
                    </li>
                    <li class="list-item">
                        <h3><a class="a-link font-weight-500" href="<?= APP_URL ?>?link=complete-tasks">Completed</a></h3>
                    </li>
                </ul>
            </div>
            <div class="grid-item grid-item-2 p-2">
                <?php include_once "$link.php"; ?>
            </div>
        </div>
    </div>
</body>
<script src="assets/script.js"></script>
</html>