<?php

    // What is the difference between include and require?
    // include will not break the code if the file doesn't exist
    // require the code in this fille will not execute if the required file doesn't exist
    
    // __DIR__ gives the path to the current directory: htdocs/ExpenseStatistics/models
    // dirname gives the path to the parent directory of the parameter
    //// dirname(__DIR__): htdocs/ExpenseStatistics
    
    require_once(dirname(__DIR__)."/core/database/dbconnectionmanager.php");
   

    class Fee_type {
        //type_id	type_name	

        public $type_id;
        public $type_name;
        private $conn;

        

        function __construct(){

            $connectionManager = DBConnectionManager::getInstance();

            $this->conn = $connectionManager->getConnection();

        }

        function listtype($params, $data){
        }

        function createtype($params, $data){
        }

        function updatetype($params, $data){
        }
        
    }