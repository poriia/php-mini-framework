<?php

$config = require "config.php";

$db = new Database($config['database']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (!Validator::string($_POST['title'], 3, 50)) {
        $errors['title'] = 'A title of no more than 50 characters is required';
    }

    if (!Validator::string($_POST['body'], 3, 255)) {
        $errors['body'] = 'A body of no more than 255 characters is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title,:body,:user_id)', [
            "title" => $_POST['title'],
            "body" => $_POST['body'],
            "user_id" => 1,
        ]);
    }
};

$title = "Create Note";
require "views/note-create.view.php";
