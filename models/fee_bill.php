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

        function listexp($params, $data){

            if(!empty($_SESSION["username"])){
                //SELECT fb.bill_id,
                // ft.type_name,fb.amount,
                // date_format(fb.bill_time,'%Y-%m')as bill_time 
                // FROM `fee_bill` as fb
                //  INNER JOIN fee_type ft on ft.type_id=fb.type_id 
                //  where fb.state=1 and fb.user_name = 'user1111@gmail.com';
                 $query = "select fb.bill_id,ft.type_name,
                 fb.amount,date_format(fb.bill_time,'%Y-%m')as bill_time 
                 FROM `fee_bill` as fb INNER JOIN fee_type ft 
                 on ft.type_id=fb.type_id 
                 where fb.state= 1 and 
                 fb.user_name = :username ";
                $statement = $this->conn->prepare($query); 
                $statement->execute(
                ['username' => $_SESSION["username"] ]
                );
            }
           
			
			return $statement->fetchAll(PDO::FETCH_CLASS);            

        }
        function listincome($params, $data){

           if(!empty($_SESSION["username"])){
                //SELECT fb.bill_id,
                // ft.type_name,fb.amount,
                // date_format(fb.bill_time,'%Y-%m')as bill_time 
                // FROM `fee_bill` as fb
                //  INNER JOIN fee_type ft on ft.type_id=fb.type_id 
                //  where fb.state=1 and fb.user_name = 'user1111@gmail.com';
                 $query = "select fb.bill_id,ft.type_name,
                 fb.amount,date_format(fb.bill_time,'%Y-%m')as bill_time 
                 FROM `fee_bill` as fb INNER JOIN fee_type ft 
                 on ft.type_id=fb.type_id 
                 where fb.state= 2 and 
                 fb.user_name = :username ";
                $statement = $this->conn->prepare($query); 
                $statement->execute(
                ['username' => $_SESSION["username"] ]
                );
            }
           
			
			return $statement->fetchAll(PDO::FETCH_CLASS);    
           
                 

        }

      
        function listinorexp($params, $data){
            if(empty($params[1])){
               $query = "select * from fee_bill";
               $statement = $this->conn->prepare($query); 
               $statement->execute(); 
               return $statement->fetchAll(PDO::FETCH_CLASS);   
           }          
           else{               
               $feebill = new Fee_bill();
               //var_dump($params[1]);
               return $feebill->getBillbyID($params[1]); 
           }		
           
       }
        function getBillbyID($params){
            //return "unimplemented";    
            $query = "select * from fee_bill where bill_id = :id";
            $statement = $this->conn->prepare($query) ; 
            $statement->execute([ 'id' => $params[1] ]);
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } 

        function createfee($params, $data){
            if(!empty($data)){
                if($data["amount"]==""||empty($data["amount"]))
                {
                    echo "amount is not empty";
                }
                else if($data["type_id"]==""||empty($data["type_id"])  ){
                    echo "Select a type";
                }
                else{
                    $_COOKIE['createfee'] = 1;
                    $query = "insert into fee_bill (type_id, user_name, bill_time,Remark,amount,state) 
                    values (:type_id, :user_name, :bill_time,:Remark,:amount,:state)";
                    $statement = $this->conn->prepare($query);                   
                  

                    $statement->execute([ 'type_id' => $data["type_id"]
                        ,'user_name' => $_SESSION["username"] 
                        , 'bill_time' => $data["bill_time"] 
                        , 'Remark' => $data["Remark"]
                        , 'amount' => $data["amount"]
                        , 'state' => $data["state"]
                        ]);

                    // Return the number of rows created    
                    return $statement->rowCount();
                }
                
            }

            return 0;
        }
        function updatefee($params, $data){
            var_dump($params[1]);
        //    var_dump(count($data));
            if(count($data)==0){             

                $feebill = new Fee_bill();
                return $feebill->getBillbyID($params);     
            }
            else{
                $_COOKIE['updatefee'] = 1;
               
                $query = "update  fee_bill set 
                type_id = :type_id,
                bill_time = :bill_time,
                Remark = :Remark,
                amount = :amount,
                state = :state
                where bill_id=:id";
                $statement = $this->conn->prepare($query);
                
                $statement->execute([
                    'type_id' => $data["type_id"]                    
                    ,'bill_time' => $data["bill_time"]                    
                    ,'type_id' => $data["type_id"]                    
                    ,'Remark' => $data["Remark"]                    
                    ,'amount' => $data["amount"]                    
                    ,'state' => $data["state"]                    
                    ,'id' => $params[1]  
                    ]);
                $feebill = new Fee_bill();
                return $feebill->getBillbyID($params);     
            }
            //return 0;
        }


    }
    ?>