<?php

$config = require base_path('config.php');

$db = new Database($config['database']);

$query = "select * from notes";
$notes = $db->query($query)->get();

view('notes/index.view.php', [
    'title' => "Notes",
    'notes' => $notes,
]);
