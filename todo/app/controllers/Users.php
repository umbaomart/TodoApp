<?php 
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function login() {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Process Form && Sanitize the input array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // echo '<pre>',print_r($_POST),'</pre>';
                // Init data
                $data = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                // Validate name
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter correct password';
                }

                // Check for user email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure the errors are empty
                if (empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // die('SUCCESS');

                    // Check and set login user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    // print_r($loggedInUser);
                    // echo $loggedInUser;

                    if ($loggedInUser) {
                        // Create a Session Variable
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password Incorrect';
                        $this->view('users/login', $data);
                    }

                } else {
                    $this->view('users/login', $data);
                }

            } else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }

        // Create User session
        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->ID;
            $_SESSION['email'] = $user->NAME;
            $_SESSION['name'] = $user->EMAIL;
            // after setting the session redirect it to home
            redirect('');
        }

        // Logout
        public function logout() {
            echo 'jonga';
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

        
    }
?>