<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Income</title>
<style>
<?php 
include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
 ?>
</style>
</head>

<body class="mainbody" style="padding-top: 70px; padding-bottom: 70px;">

<?php
    class IncomeView{
        public $data;
        private $html;
        public $total;
        public $datetime;

        function __construct($data){

        $this->datetime = $_SESSION["selectdate"];
        $this->data = $data;
        

        $this->render();        

        }

        function render(){          
           
           
           include 'header.php';   

           $html ='
           <div class="container">
           <main>
           <form method="POST">
               <div class="row">
           <div class="col-xl-6"><a class="btn btn-dark" href="'.ROOTURL.'/users/createfee/'.'">Add</a></div>  
           <div class="col-xl-6"><div class="search">
                 
                 <input type="date" id="dateMonth" name="dateMonth" value = "'.$this->datetime.'"/>&nbsp;
                 <input type="submit" class="btn btn-dark" value="Check" /></div></div>  
             
         
   </div></form>
       
           <div class="row">	
               <div class="title">
               <h3>Income Information</h3>
                   <br>
                   </div>
           </div>';
           if(count($this->data)>0){
            foreach($this->data as $bill){
                $this->total = $this->total+$bill->amount;
                $html.=' 
                <div class="row">		
               
                    <div class="input-group">

                    <a class="form-control" href="'.ROOTURL.'/users/updatefee/'.$bill->bill_id.'">'.$bill->type_name.'</a>
                        <div class="form-control"> '.$bill->amount.' </div>
                        <div class="form-control"> '.$bill->bill_time.'</div>


                    </div>
                </div>
                 ';
            }
           }
           
           $html.='     <div class="row">		
               
           <div class="input-group">

          
               <div class="form-control"> Total Expenses Amount </div>
               <div class="form-control"> '.$this->total.'</div>


           </div>
       </div>                   
         
       </main>
       </div>';
       echo $html;
           include 'footer.php';   
        }
    }
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script  src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="../js/my.js"></script>

</body>
</html>