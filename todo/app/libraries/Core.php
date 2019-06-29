<?php 
    /*
    *  App Core Class
    * Creates URL & loads core controler
    * URL FORMAT - /controller/method/params
    */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            // creating a constructor and calling the getUrl() function/method
            // print_r($this->getUrl());
            $url = $this->getUrl();

            // Look in controllers folder for first value/index which is in the url variable
            if (file_exists('../app/controllers/' . ucwords($url[0]). '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                // echo $this->currentController;
                // Unset the 0 index
                unset($url[0]);
            }

            // Require the controller
            require_once '../app/controllers/'. $this->currentController . '.php';

            // Instantiate controller class
            $this->currentController = new $this->currentController;
            // it lookes like $pages = new $pages;

            // Check for second part of the URL
            if (isset($url[1])) {
                // Check to see if method exist in controller
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    // unset 1 index
                    unset($url[1]);
                }
            }
            // echo $this->currentMethod;

            // Get params
            $this->params = $url ? array_values($url) : [];

            // echo print_r($this->params);

            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        // get the url
        public function getUrl() {
            // create an if asking if url is set or have data in it because in index it displays an undefined url index
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
                // // break the url into pieces this url post/edit using rtrim by removing the '/'
                // // rtrim strips whitespace into the url
                // $url = rtrim($_GET['url'], '/');
                // // filter variables in certain ways
                // $url = filter_var($url, FILTER_SANITIZE_URL);
                // // saving the url into an array
                // $url = explode('/', $url);
                // // echo print_r($url);
                // return $url;
            }
        }
    }