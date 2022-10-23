<?php

   // namespace controllers\User;
    // We need to acces both User Model and View
    require(dirname(__DIR__)."/models/user.php");

    require(dirname(__DIR__)."/core/authentication/auth.php");
    

    // Controller class
    class UsersController {

        private $data;
        private int $upfile;

        private $authProvider;

        function index($action, $params, $payload){
            // Get user data so that it is used by the View
            $user = new User();
           // $upload = new Upload();
            
            // The possible actions are, corresponding to CRUD actions:
            // List to get the data (Retrieve)
            // Create to insert data
            // Update to update data
            // Delete to delete data

            //$this->$action($params, $payload);
            
            // Check if the user is logged in before loading any view
            // if not load the login view

                // NOTE: instead of passing the $data to the user's object functions you could set its properties here:
                // $user->username =  $payload["username"];
                // $user->password = $payload["password"];

            $this->authProvider = new AuthProvider($user);

            //if()

//echo "logged in: ".$this->authProvider->isLoggedIn();
            // Check if the user is already logged in
            if($this->authProvider->isLoggedIn()){


                $this->data = $user->$action($params, $payload);

                
                // Determine which View to load.
                if($action == "list"){

                    // Instead of doing this:
                    // require(dirname(__DIR__)."/views/".users.".php");
                    // we could use class_exists which invokes spl_autoload_register in index.php
                    if(class_exists("UsersView")){ 
                        //$userview = new UsersView($this->data);
                    }
                    
                
                }
                else if ($action == "create"){
                    
                    // require(dirname(__DIR__)."/views/".$action."users".".php");
                    if(class_exists("CreateUsers")){
                        //$userview = new CreateUsers($this->data);
                    }
                
                }else if($action == "login"){

                    // Take the user to the default secured page
                    if(class_exists("UsersView")){ 
                        //$userview = new UsersView($this->data);
                    }
                    

                }
               
            }// if loggedIn
            else{

                //ROOTURL: http://localhost/ExpenseStatistics
                header("Location: ".ROOTURL."/login/");

            }
        }

    }

    // test controller an view interaction

    // $usercontroller = new UserController();

    // $usercontroller->index();

?>