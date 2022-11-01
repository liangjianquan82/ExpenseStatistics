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

        function __construct($data){

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
                 <input type="checkbox" id="year" aria-label="placeholder text" >
                 <label>Year</label>
                 <input type="checkbox" id="month" aria-label="placeholder text" checked="true">
                 <label>Month</label>
                 <input type="date" id="dateMonth"  value = "'.date("Y-m-d").'"/>&nbsp;
                 <input type="submit" class="btn btn-dark" value="Check" /></div></div>  
             
         
   </div></form>
       
           <div class="row">	
               <div class="title">
               <h3>Income Information</h3>
                   <br>
                   </div>
           </div>
                   
           <div class="row">		
                <div class="col-xl-2 border-dark"></div>  
             <div class="col-xl-4">Income1</div>
             <div class="col-xl-4">1</div>  
                <div class="col-xl-2"></div>  
           </div>
           <div class="row">		
                <div class="col-xl-2"></div>  
             <div class="col-xl-4">Income2</div>
             <div class="col-xl-4">2</div>  
                <div class="col-xl-2"></div>  
           </div>
           <div class="row">		
                <div class="col-xl-2"></div>  
             <div class="col-xl-4">Income3</div>
             <div class="col-xl-4">3</div>  
                <div class="col-xl-2"></div>  
           </div>
           
           <div class="row">		
               <div class="col-xl-2"></div>  
             <div class="col-xl-4">Total:</div>
             <div class="col-xl-4">6</div> 
               <div class="col-xl-2"></div>  
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