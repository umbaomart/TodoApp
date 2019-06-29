<?php 
    // class Todo {
    class Todolist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // public function getUsers() {
        //     // $this->db->query("SELECT * FROM USERS");
        //     $this->db->query("SELECT ID, USERID, NAME, LASTNAME, TODO FROM users, todos WHERE users.id = 2 AND todos.USERID = 2");
        //     return $this->db->resultSet();
        // }
        
        public function getTodoList($user_id) {
            $this->db->query('SELECT * FROM TODOS WHERE USERID = :session_id');
            $this->db->bind('session_id', $user_id);
            return $this->db->resultSet();
        }

        public function editTodo($id) {
            $this->db->query('SELECT * FROM TODOS WHERE TODOS.ID = :id');
            $this->db->bind('id', $id);
            $result = $this->db->single();
            return $result;
        }

        public function deleteTodo($id) {
            $this->db->query('DELETE FROM TODOS WHERE TODOS.ID = :id');
            $this->db->bind('id', $id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        
    }

?>