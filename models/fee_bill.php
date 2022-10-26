<?php

    // What is the difference between include and require?
    // include will not break the code if the file doesn't exist
    // require the code in this fille will not execute if the required file doesn't exist
    
    // __DIR__ gives the path to the current directory: htdocs/ExpenseStatistics/models
    // dirname gives the path to the parent directory of the parameter
    //// dirname(__DIR__): htdocs/ExpenseStatistics
    
    require_once(dirname(__DIR__)."/core/database/dbconnectionmanager.php");
   

    class Fee_bill {
        //bill_id	type_id	user_id	bill_time	income	Expenses	Remark	amount	

        public $bill_id;
        public $type_id;
        public $user_id;
        public $bill_time;
        public $income;
        public $Expenses;
        public $Remark;
        public $amount;
        private $conn;

        

        function __construct(){

            $connectionManager = DBConnectionManager::getInstance();

            $this->conn = $connectionManager->getConnection();

        }

        function listincome($params, $data){

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
        function listexp($params, $data){

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

        function listinorexp($params, $data){
        }
    }
    ?>