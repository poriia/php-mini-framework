<?php

$config = require "config.php";

$id = $_GET['id'];
$db = new Database($config['database']);
$query = "select * from notes where id = :id";
$note = $db->query($query, ['id' => $id])->findOrFail();

$currentUserId = 1;
if ($note['user_id'] !== $currentUserId) {
    abort(403);
}

$title = $note['title'];
require "views/note.view.php";
