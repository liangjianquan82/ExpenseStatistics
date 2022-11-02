<?php

require_once(dirname(__DIR__)."/core/authentication/auth.php");

require_once(dirname(__DIR__)."/models/user.php");

class LoginController{

    private $authProvider;

    private $user;

    private $loginMessage;

    function index($action, $params, $payload){
    
        // var_dump ($params);
        // var_dump ($payload);
        $this->user = new User();

        $this->authProvider = new AuthProvider();

        if($this->authProvider->isLoggedIn($params, $payload)){
           // var_dump ("1");
            // If the user is already logged in direct them to a default page
            header("Location: ".ROOTURL."/users/list/");

        }
        else{
           
           
            if(!empty($payload)){
               
                // // If the user credentials are valid
                if($this->authProvider->login($params, $payload)){
                    // If the user is logged in, direct them to a default page
                    header("Location: ".ROOTURL."/users/list/");
        
                }
                else{

                    $this->loginMessage = "Invalid credentials, please verify your rusername and password and try again.";
                   
                }
                
            }

            // URL: http://localhost/ExpenseStatistics/login/
            if(class_exists("LoginView")){

                $loginview = new LoginView($this->loginMessage);
                //header("Location: ".ROOTURL."/login/");

            }
            

        }
    
    }    

}


?>