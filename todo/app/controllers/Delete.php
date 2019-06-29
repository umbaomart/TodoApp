<?php 
    class Delete extends Controller {
        public function __construct() {
            $this->deleteModel = $this->model('Todolist');
        }

        public function index($id) {
            // echo $id;
            $result = $this->deleteModel->deleteTodo($id);

            // Check if the result is true
            if ($result) {
                redirect('index');
            } else {
                echo 'Error occured in deleting this data';
            }

        }
    }
?>