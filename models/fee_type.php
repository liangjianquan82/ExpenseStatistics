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
             if(empty($params[1])){
                $query = "select * from fee_type";
                $statement = $this->conn->prepare($query); 
                $statement->execute(); 
                return $statement->fetchAll(PDO::FETCH_CLASS);   
            }          
            else{               
                $feetype = new Fee_type();
                //var_dump($params[1]);
                return $feetype->getTypebyID($params[1]); 
            }		
			
        }
        function getTypebyID($id){
            //return "unimplemented";    
            $query = "select * from fee_type where type_id = :id";
            $statement = $this->conn->prepare($query) ; 
            $statement->execute([ 'id' => $id ]);
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } 

        function createtype($params, $data){
            
            if(!empty($data)){
                if($data["type_name"]==""||empty($data["type_name"]))
                {
                    echo "textbox is not empty";
                }
                else{
                    $_COOKIE['createtype'] = 1;
                    $query = "insert into fee_type (type_name) values (:type_name)";
                    $statement = $this->conn->prepare($query);                
                   

                    $statement->execute([ 'type_name' => $data["type_name"]                       
                        ]);
                   
                    return $statement->rowCount();
                }
                
            }

            return 0;
        }

        function updatetype($params, $data){

            
            if(empty($data)){
                $feetype = new Fee_type();
                return $feetype->listtype($params, $data);     
            }
            else{
               
                $query = "update  fee_type set type_name = :type_name  where type_id=:id";
                $statement = $this->conn->prepare($query);
                
                $statement->execute([
                    'type_name' => $data["type_name"]
                    
                    ,'id' => $params[1]  
                    ]);
                $_COOKIE['updatetype'] = 1;
                $feetype = new Fee_type();
                return $feetype->listtype($params, $data);  
            }
            //return 0;
        }

         
        
    }