<?php 
    class Pages extends Controller {
        public function __construct() {
            $this->todoModel = $this->model('Todolist');
            $this->userModel = $this->model('User');
        }

        public function index() {

            if (isset($_SESSION['user_id'])) {
                $result = $this->todoModel->getTodoList($_SESSION['user_id']);
                $data = [
                    'todos' => $result
                ];

                $this->view('index', $data);
            } else if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
                // Process the form
                // echo '<pre>', print_r($_POST), '</pre>';
                // echo '<pre>', print_r($_SERVER), '</pre>';        
                
                // Sanitize post data filter it as array of string
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                

                $data = [
                    'name' => trim($_POST['name']),
                    'last_name' => trim($_POST['lastName']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirmPassword']),
                    'name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email fromm the database model
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }
                // Validate name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }
                // Validate last name
                if (empty($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter last name';
                }
                // Validate password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password'] < 6)) {
                    $data['password_err'] = 'Password atlease 6 characters';
                }
                // Validate confrim password
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confrim_password_err'] = 'Password do not match!';
                    }
                }

                // Make sure errors are empty
                if (empty($data['name_err']) && empty($data['name_err']) && empty($data['last_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    // echo $data['password'];

                    if ($this->userModel->register($data)) {
                        // Call the flash function
                        flash('register_success', 'You are registered and can log in');
                        // echo 'successfully inserted the datas';
                        redirect('users/login');
                    } else {
                        die('Something went wrong');
                    }

                    
                } else {
                    $this->view('index', $data);
                }

            } else { // Load the form
                // Init data
                $data = [
                    'name' => '',
                    'last_name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                $this->view('index', $data);
            }


            // $this->view('Hello'); //view does not exist ==================
            
            // $USERS = $this->todoModel->getUsers();

            // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //     echo print_r($_POST);
            // }
            
            // $data = [
            //     'title' => 'HOMEPAGE',
            //     'description' => 'Simple Todo App with uers login by Mart',
            //     'name' => '',
            //     'last_name' => '',
            //     'email' => '',
            //     'password' => '',
            //     'confirm_password' => '',
            //     'name_err' => '',
            //     'last_name_err' => '',
            //     'email_err' => '',
            //     'password_err' => '',
            //     'confirm_password_err' => ''
            //     // 'USERS' => $USERS
            // ];

            // $this->view('index', $data);
        }

        // public function about() {
        //     $data = [
        //         'title' => 'About Us',
        //         'description' => 'This site is like an exercise for coding!'
        //     ];
        //     $this->view('pages/about', $data);
        // }
    }
?>