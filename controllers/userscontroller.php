<?php

   // namespace controllers\User;
    // We need to acces both User Model and View
    require(dirname(__DIR__)."/models/user.php");
    require(dirname(__DIR__)."/models/fee_bill.php");
    require(dirname(__DIR__)."/models/fee_type.php");

    require(dirname(__DIR__)."/core/authentication/auth.php");
    

    // Controller class
    class UsersController {

        private $data;
        private $databill;
        private $datatype;
        private int $upfile;

        private $authProvider;

        function index($action, $params, $payload){
            // Get user data so that it is used by the View
            
           
           
           
            //var_dump($action);

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

            $this->authProvider = new AuthProvider();

            $feebill = new Fee_bill();
            $feetype = new Fee_type();

            //if()

            //echo "logged in: ".$this->authProvider->isLoggedIn();
            // Check if the user is already logged in

            
            if($this->authProvider->isLoggedIn($params, $payload)){

                //$this->data = $user->$action($params, $payload);
                //$this->data1 = $feebill->$action($params, $payload);                
                // Determine which View to load.
                if($action == "list"){

                    // Instead of doing this:
                    // require(dirname(__DIR__)."/views/".users.".php");
                    // we could use class_exists which invokes spl_autoload_register in index.php
                    $this->databill = $feebill->$action($params, $payload);
                    if(class_exists("HomeView")){ 
                        $userview = new HomeView($this->databill);
                    }                   
                
                }
                else if ($action == "listexp"){
                    $this->databill = $feebill->$action($params, $payload);
                    if(class_exists("expensesview")){
                        $userview = new ExpensesView($this->databill);
                    }                
                } 
                else if ($action == "listincome"){
                    $this->databill = $feebill->$action($params, $payload);
                    if(class_exists("incomeview")){
                        $userview = new IncomeView($this->databill);
                    }                
                }      
                else if($action == "createfee"){
                    $this->databill = $feebill->$action($params, $payload);
                    $this->datatype = $feetype->listtype($params, $payload);
                    if(class_exists("addupdatefee")){ 
                        $userview = new AddUpdateFee($this->databill,$this->datatype);
                    }     
                } 
                else if($action == "updatefee"){
                    $this->databill = $feebill->$action($params, $payload);
                    $this->datatype = $feetype->listtypeAll();
                    if(class_exists("addupdatefee")){ 
                        $userview = new AddUpdateFee($this->databill,$this->datatype);
                    }     
                } 
                else if($action == "createtype"){
                    $this->datatype = $feetype->$action($params, $payload);
                    
                    if(class_exists("addupdatetype")){ 
                        $userview = new AddUpdateType($this->datatype);
                    }     
                }
                else if($action == "updatetype"){

                  
                    $this->datatype = $feetype->$action($params, $payload);
                    
                    if(class_exists("addupdatetype")){ 
                        $userview = new AddUpdateType($this->datatype);
                    }     
                   
                } 
                else if($action == "listtype"){

                    
                    $this->datatype = $feetype->$action($params, $payload);
                    if(class_exists("typeview")){ 
                        $userview = new TypeView($this->datatype);
                    }     
                }    
                else if($action == "login"){
                   
                    $this->data = $user->$action($params, $payload);
                    if(class_exists("HomeView")){ 
                        $userview = new HomeView($this->data);
                    }
                }
                else if($action == "Statistic"){
                    
                     $this->databill = $feebill->$action($params, $payload);
                     if(class_exists("Statistic")){ 
                         $userview = new Statistic($this->databill);
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