<?php 
     session_start();
     ?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<style>
<?php 
include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
 ?>
</style>
</head>
	
<body class="mainbody" style="padding-top: 70px">



    <?php
    class HomeView{

        public $data;
        private $html;
        public $intotal;
        public $exptotal;
        public $datetime;

        
        public $calculate;

        function __construct($data){

        $this->data = $data;
        $this->datetime = $_SESSION["selectdate"];
       

        $this->render();        

        }

        function render(){          
           
           
           include 'header.php';      
          
          
          
            //$datetime = $_COOKIE['selectdate'];
           
           

              
            $html ='
            <div class="container">
            <main>
                <div class="row">
                    <div class="search">
                    <form method="POST">
            
            
                    <input type="date" id="dateMonth" name="dateMonth"  value = "'.$this->datetime.'"/>&nbsp;
                    <input type="submit" name="Check" class="btn btn-dark" value="Check" />
                    </form>
                    </div>	  
                        <br>
                </div>
                <div class="row">
                    <div class="title"><h3> This Month Income and Expenditure</h3>
                    <br></div>
                </div>
                <br>
                <div class="row">
                <div class="col-lg-6"><h4>Expenses</h4>';
                
                if(!empty($this->data)){
                    
                    foreach($this->data as $bill){
                        
                        if($bill->state==1){
                            $this->exptotal = $this->exptotal+$bill->amount;
                            $html.='
                            <div class="row">
                            <div class="input-group">
                            <div class="form-control">'.$bill->type_name.'</div>
                            <div class="form-control">'.$bill->amount.'</div>
                            </div>
                            </div>
                            ';
                        }


                    }
                }
                    
                    
                    $html.='</div> <div class="col-lg-6"><h4>Income</h4>';
                    if(!empty($this->data)){

                        foreach($this->data as $bill){
                            
                            if($bill->state==2){
                                $this->intotal = $this->intotal+$bill->amount;
                                $html.='
                                <div class="row">
                                <div class="input-group">
                                <div class="form-control">'.$bill->type_name.'</div>
                                <div class="form-control">'.$bill->amount.'</div>
                                </div>
                                </div>
                                ';
                            }
    
    
                        }
                    }
                   
                   $this->calculate = bcsub($this->intotal,$this->exptotal,2);
                    $html.='</div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                
                </div>
                <div class="col-lg-6"> 
                    
                    </div>
                </div>
                <div class="row">
                <div class="input-group">
                <div class="form-control">Balance </div>
                <div class="form-control">'.$this->calculate.'</div>
                </div>
                
                </div>
            </main></div>';

            
           
            echo $html;

            include 'footer.php';   
           

  


// echo $this->html;

    }
}
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script  src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 



 

</body>
</html>
