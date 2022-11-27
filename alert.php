<?php 
$message = $_COOKIE['message'] ?? '';
$status = $_COOKIE['status'] ?? '';
?>
<?php if(!empty($status)): ?>
    <div class="p-1 mb-1 border alert alert-<?= $status ?> font-weight-500">
        <?= $message ?>
    </div>
<?php endif ?>