<?php 
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Method for login
        public function login($email, $password) {
            $this->db->query('SELECT * FROM USERS WHERE EMAIL = :email');
            $this->db->bind('email', $email);


            $row = $this->db->single();
            // return $row->PASSWORD;

            $hashed_password = $row->PASSWORD;
            if (password_verify($password, $hashed_password)) {
                // Return the entire row
                return $row;
            } else {
                // Return false
                return false;
            }
        }
        
        public function findUserByEmail ($email) {
            $this->db->query('SELECT * FROM USERS WHERE EMAIL = :email ');
            // Bind values
            $this->db->bind('email', $email);

            $row = $this->db->single();

            // Check row
            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // register function / method
        public function register($data) {
            $this->db->query('INSERT INTO USERS (NAME, LASTNAME, EMAIL, PASSWORD) VALUES (:name, :lastName, :email, :password)');

            // Bind values
            $this->db->bind('name', $data['name']);
            $this->db->bind('lastName', $data['last_name']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', $data['password']);
            
            if ($this->db->execute()) {
                return true;
                // return 'success';
            } else {
                // return 'error in execute bind';
                return false;
            }
                
            // This is an alternative of bind did not work
            // if ($this->db->executeData([$data['name'], $data['last_name'], $data['email'], $data['password']])) {
            //     return true;
            // } else {
            //     return false;
            // }
        }

    }
?>