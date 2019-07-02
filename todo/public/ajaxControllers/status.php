<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'TODOLISTDB');

    require_once '../../app/libraries/Database.php';
    $db;

    // inializing db
    $db = new Database;

    // echo print_r($_POST);

    // Set to variable the data comes from front end
    $action = $_POST['action'];
    $id = $_POST['todo_val'];
    $status_true = 1;
    $status_false = 0;

    if ($action == 'true') {
        $db->query('UPDATE TODOS SET STATUS = :status WHERE ID = :id');
        $db->bind('status', $status_true);
        $db->bind('id', $id);
        if ($db->execute()) {
            // echo true;
            echo 'set status to one success';
        } else {
            echo false;
        }
    } else if ($action == 'false') {
        $db->query('UPDATE TODOS SET STATUS = :status WHERE ID = :id');
        $db->bind('status', $status_false);
        $db->bind('id', $id);
        if ($db->execute()) {
            // echo true;
            echo 'set status to zero success';
        } else {
            echo false;
        }
    }





