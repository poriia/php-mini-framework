<?php

$config = require base_path('config.php');

$id = $_GET['id'];
$db = new Database($config['database']);
$query = "select * from notes where id = :id";
$note = $db->query($query, ['id' => $id])->findOrFail();

$currentUserId = 1;
authorize($note['user_id'] !== $currentUserId);

view('notes/show.view.php', [
    'title' => $note['title'],
    'note' => $note
]);
