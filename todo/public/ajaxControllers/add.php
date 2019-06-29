<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'TODOLISTDB');
    $db = '';

    require_once '../../app/libraries/Database.php';
    $db = new Database;

    $input_val =  $_POST['input'];
    $id = $_POST['id'];

    $db->query('INSERT INTO TODOS(USERID, TODO) VALUES (:user_id, :todo)');
    $db->bind('user_id', $id);
    $db->bind('todo', $input_val);
    if ($db->execute()) {
        // Get all the data todos from the database
        echo 'Successfully inserted the data';
    } else {
        echo 'Problem Occured';
    }



?>