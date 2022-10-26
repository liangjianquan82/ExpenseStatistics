<?php

    // What is the difference between include and require?
    // include will not break the code if the file doesn't exist
    // require the code in this fille will not execute if the required file doesn't exist
    
    // __DIR__ gives the path to the current directory: htdocs/ExpenseStatistics/models
    // dirname gives the path to the parent directory of the parameter
    //// dirname(__DIR__): htdocs/ExpenseStatistics
    
    require_once(dirname(__DIR__)."/core/database/dbconnectionmanager.php");

    class User {

        public $id;
        public $username;
        public $password;
        public $email;
        public $picture;



        

        private $conn;

        function __construct(){

            $connectionManager = DBConnectionManager::getInstance();

            $this->conn = $connectionManager->getConnection();

        }
        
        // Functions that support the CRUD functionality
        function list($params, $data){

            // if(empty($params[1])){
            //     $query = "select * from users";
            //     $statement = $this->conn->prepare($query); 
            //     $statement->execute(); 
            // }
            // else{
            
            //     $query = "select * from users where id = :id";
            //     $statement = $this->conn->prepare($query) ; 
            //     $statement->execute([ 'id' => $params[1] ]);

            // }
			
			// return $statement->fetchAll(PDO::FETCH_CLASS);           

        }

        function create($params, $data){

            // if(!empty($data)){
            //     if($data["username"]==""||empty($data["username"])
            //     ||$data["password"]==""||empty($data["password"])
            //     ||$data["email"]==""||empty($data["email"])
            //     )
            //     {
            //         echo "textbox is not empty";
            //     }
            //     else{

            //         $query = "insert into users (username, password, email,picture) values (:username, :password, :email,:picture)";
            //         $statement = $this->conn->prepare($query);
                                      

            //         $statement->execute([ 'username' => $data["username"]
            //             ,'password' => $data["password"] 
            //             , 'email' => $data["email"] 
            //             , 'picture' => $_FILES["fileToUpload"]["name"] 
            //             ]);

            //         // Return the number of rows created    
            //         return $statement->rowCount();
            //     }
                
            // }

            return 0;

        }

        // Function getUserbyCredentials used for login
        // if there no match then the login is incorrect
        function getUserbyCredentials($params = null, $data){

            $query = "select user_id,user_email,password from tb_user where user_email = :username and password = :password";

        $statement = $this->conn->prepare($query);           

         
            $statement->execute([ 'username' => $data["username"]
            ,'password' => $data["password"] 
            ]);

			return $statement->fetchAll(PDO::FETCH_CLASS);           

        }   

        function getUserbyID($id){

            return "unimplemented";
    
        }        

    }
?>