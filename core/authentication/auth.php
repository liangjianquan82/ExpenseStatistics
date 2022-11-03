<?php

//require_once to avoid the error: 
//Fatal error: Cannot declare class User, because the name is already in use in C:\xampp\htdocs\ExpenseStatistics\models\user.php on line 13

    require_once(dirname(dirname(__DIR__))."/models/user.php");

    class AuthProvider{

        public $user;

        function __construct(){

            $user = new User();

           $this->user = $user;

        }

        // Check if the user set in the cookie is logged in.
        public function isLoggedIn($params, $data){

            //var_dump ($data["user_email"]);
            // var_dump ($data);
            

            $loggedIn = false;

            session_name("expstat");

            session_start();

            if(isset($_SESSION)){
                if(!empty($_SESSION["username"])){

                    if(isset($_COOKIE)){
                        if(!empty($_COOKIE["expstat"])){

                            if(session_id() == $_COOKIE["expstat"]){
                                $loggedIn = true;

                            }
                        }
                    }
                }
            }

            session_write_close();

            return $loggedIn;

        }

        // Login the user
        // We can use an identifier for the user and session instead of the username
        public function login($params, $data){

            //var_dump ("1");
           
            $loggedIn = false;
            $result = $this->user->getUserbyCredentials($params, $data);

            //var_dump($result);

            if(!empty($result)){
            session_name("expstat");

            session_start();

            $_SESSION["username"] = $data["username"];

            $_SESSION["password"] = $data["password"];
            $_SESSION['selectdate'] = date("Y-m-d");
            //$_SESSION["user_id"] = $result["user_id"];

           

            session_write_close();

            $loggedIn = true;

        }
        else{

            $loggedIn = false;
        }
           

            return $loggedIn;
            

        }

    }

?>