<?php

$config = require base_path('config.php');

$db = new Database($config['database']);

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!Validator::string($_POST['title'], 3, 50)) {
        $errors['title'] = 'A title of no more than 50 characters is required';
    }

    if (!Validator::string($_POST['body'], 3, 255)) {
        $errors['body'] = 'A body of no more than 255 characters is required';
    }
    // dd($errors);
    if (empty($errors)) {
        $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title,:body,:user_id)', [
            "title" => $_POST['title'],
            "body" => $_POST['body'],
            "user_id" => 1,
        ]);
    }
};

view('notes/create.view.php', [
    'title' => "Create Note",
    'errors' => $errors
]);
