<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'TODOLISTDB');

    require_once '../../app/libraries/Database.php';
    $db;

    // inializing db
    $db = new Database;
    // echo json_encode($_POST);

    // varibles and data comes from the view
    $input = $_POST['todo'];
    $id = $_POST['todo_id'];

    $db->query('UPDATE TODOS SET TODO = :todo WHERE ID = :id');
    $db->bind('todo', $input);
    $db->bind('id', $id);
    if ($db->execute()) {
        echo 'Successfully edited';
    } else {
        echo 'Error';
    }

?>