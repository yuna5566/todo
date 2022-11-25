<?php

// Check if Correct DB exists
if (!file_exists($_ENV['DB_PATH'])) {
    $db = new SQLite3(DB_PATH);
    $initial_sql = file_get_contents(ROOT_PATH . '/database/db.sql');
    $db->exec($initial_sql);
}
