<?php

    // What is the difference between include and require?
    // include will not break the code if the file doesn't exist
    // require the code in this fille will not execute if the required file doesn't exist
    
    // __DIR__ gives the path to the current directory: htdocs/ExpenseStatistics/models
    // dirname gives the path to the parent directory of the parameter
    //// dirname(__DIR__): htdocs/ExpenseStatistics
    
    require_once(dirname(__DIR__)."/core/database/dbconnectionmanager.php");
    //require(dirname(__DIR__)."/models/fee_type.php");
   

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

        function list($params, $data){
            if(count($data)>0){
                $datetime = $data["dateMonth"];
                $this->saveselectdate($datetime);
            }
            else if(empty($_SESSION["selectdate"])){
                $datetime = date("Y-m-d");
            }
            else{
                $datetime =$_SESSION["selectdate"];
            }
            if(!empty($_SESSION["username"])){
                //SELECT fb.bill_id,
                // ft.type_name,fb.amount,
                // date_format(fb.bill_time,'%Y-%m')as bill_time 
                // FROM `fee_bill` as fb
                //  INNER JOIN fee_type ft on ft.type_id=fb.type_id 
                //  where fb.state=1 and fb.user_name = 'user1111@gmail.com';
                 $query = "select fb.bill_id,ft.type_name,
                 fb.amount,date_format(fb.bill_time,'%Y-%m')as bill_time ,fb.state
                 FROM `fee_bill` as fb INNER JOIN fee_type ft 
                 on ft.type_id=fb.type_id 
                 where  fb.user_name = :username 
                 and DATE_FORMAT(fb.bill_time, '%Y-%m')like DATE_FORMAT(:dateMonth, '%Y-%m')";
                $statement = $this->conn->prepare($query); 
                $statement->execute(
                ['username' => $_SESSION["username"] 
                ,'dateMonth' => $datetime ]
                );
            }
           
			
			return $statement->fetchAll(PDO::FETCH_CLASS);            

        }

        function listexp($params, $data){

            if(count($data)>0){
                $datetime = $data["dateMonth"];
                $this->saveselectdate($datetime);
            }
            else if(empty($_SESSION["selectdate"])){
                $datetime = date("Y-m-d");
            }
            else{
                $datetime =$_SESSION["selectdate"];
            }
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
                 fb.user_name = :username and
                 DATE_FORMAT(fb.bill_time, '%Y-%m')like DATE_FORMAT(:dateMonth, '%Y-%m')";
                $statement = $this->conn->prepare($query); 
                $statement->execute(
                ['username' => $_SESSION["username"] 
                ,'dateMonth' => $datetime ]
                );
            }
           
			
			return $statement->fetchAll(PDO::FETCH_CLASS);            

        }
        function listincome($params, $data){
            if(count($data)>0){
                $datetime = $data["dateMonth"];
                $this->saveselectdate($datetime);
            }
            else if(empty($_SESSION["selectdate"])){
                $datetime = date("Y-m-d");
            }
            else{
                $datetime =$_SESSION["selectdate"];
            }
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
                 fb.user_name = :username and
                 DATE_FORMAT(fb.bill_time, '%Y-%m')like DATE_FORMAT(:dateMonth, '%Y-%m')";
                $statement = $this->conn->prepare($query); 
                $statement->execute(
                ['username' => $_SESSION["username"]
                ,'dateMonth' => $datetime ]
                );
            }
           
			
			return $statement->fetchAll(PDO::FETCH_CLASS);    
           
                 

        }

        function saveselectdate($datetime){

            session_start();
            $_SESSION["selectdate"]=$datetime;
            session_write_close();
                       
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
        function Statistic($params, $data){
            $feetype = new Fee_type();
            $datatype = $feetype->listtypeAll();
            $arr_tmp=array();
            $i=0;
            foreach($datatype as $bill){
                $totalsum = $this->sumbyTimeUsernameStateTypeid($params, $data,$bill->type_id);
                if(!empty($totalsum)){
                    $arr_tmp[$i]=array($bill->type_name,$totalsum);
                    $i++;
                }                
                
            }
           
            return $arr_tmp;
             //build an array
             //Sum the same items in the current month according to the fee_type fee type
             //Corresponding to the fee name, put the fee name and amount into a two-dimensional array.

        }

        function sumbyTimeUsernameStateTypeid($params, $data,$type_id){

            //echo $type_id;
            if(count($data)>0){
                $datetime = $data["dateMonth"];
                $this->saveselectdate($datetime);
            }
            else if(empty($_SESSION["selectdate"])){
                $datetime = date("Y-m-d");
            }
            else{
                $datetime =$_SESSION["selectdate"];
            }
            //select SUM(fb.amount)as amount,ft.type_name
            // from fee_bill as fb
            // INNER JOIN fee_type ft on ft.type_id=fb.type_id
            // where 
            // fb.type_id =2 
            // and fb.user_name = 'user1111@gmail.com' 
            // and DATE_FORMAT(fb.bill_time, '%Y-%m')like DATE_FORMAT('2022-11-02', '%Y-%m');

            if(!empty($_SESSION["username"])){

                $query = "
                select SUM(fb.amount) as amount
                from fee_bill as fb
                INNER JOIN fee_type ft on ft.type_id=fb.type_id
                where 
                fb.type_id =:type_id and fb.state = 1
                and  fb.user_name = :username 
                and DATE_FORMAT(fb.bill_time, '%Y-%m')like DATE_FORMAT(:dateMonth, '%Y-%m')";
               $statement = $this->conn->prepare($query); 
               $statement->execute(
               ['username' => $_SESSION["username"] 
               ,'dateMonth' => $datetime 
               ,'type_id' =>$type_id
               ]
               );
               $totalsum = $statement->fetchAll(PDO::FETCH_COLUMN);
               
               return $totalsum[0];
            }
        }


    }
    ?>