
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

        function __construct($data){

        $this->data = $data;

        $this->render();        

        }

        function render(){          
           
           
           include 'header.php';           

            $html ='
            <div class="container">
            <main>
                <div class="row">
                    <div class="search">
                    <form method="POST">
            
            
                    <input type="date" id="dateMonth"  value = "'.date("Y-m-d").'"/>&nbsp;
                    <input type="submit" class="btn btn-dark" value="Check" />
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
                <div class="col-lg-6"><h4>Expenses</h4>
                    <div class="row">
                    <div class="col-xl-6">Expenses1</div>
                    <div class="col-xl-6">1</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Expenses2</div>
                    <div class="col-xl-6">2</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Expenses1</div>
                    <div class="col-xl-6">1</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Expenses2</div>
                    <div class="col-xl-6">2</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Expenses1</div>
                    <div class="col-xl-6">1</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Expenses2</div>
                    <div class="col-xl-6">2</div>
                    </div>
                    </div>
                <div class="col-lg-6"><h4>Income</h4>
                    <div class="row">
                    <div class="col-xl-6">Income3</div>
                    <div class="col-xl-6">3</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Income4</div>
                    <div class="col-xl-6">4</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Income3</div>
                    <div class="col-xl-6">3</div>
                    </div>
                    <div class="row">
                    <div class="col-xl-6">Income4</div>
                    <div class="col-xl-6">4</div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                
                </div>
                <div class="col-lg-6"> 
                    
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                    <h5>Monthly Statistics </h5></div>
                <div class="col-lg-6">$0.00</div>
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
<script type="text/javascript" src="my.js"></script>


 

</body>
</html>
