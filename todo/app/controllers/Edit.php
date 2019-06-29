<?php
    class Edit extends Controller {
        public function __construct() {
            $this->editModel = $this->model('Todolist');
        }


        public function index($id) {
            $result = $this->editModel->editTodo($id);
            echo print_r($result);
        }
    }