<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Statistic</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style>
<?php 
include 'css/main.css'; 
//include 'css/bootstrap-4.4.1.css'; 
//include 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css';

 ?>
</style>
<script  src ="https://cdnjs.com/libraries/Chart.js"></script> 
<script src="http://localhost/ExpenseStatistics/js/chart.js"></script>
</head>
	
<body class="mainbody" style="padding-top: 70px">
<?php
    class Statistic{

        public $data;
        private $html;
        public $intotal;
        public $exptotal;
        public $datetime;

        
        public $calculate;

        function __construct($data){

            //var_dump($data);
            // var_dump($data[2][0]);
            // var_dump($data[2][1]);
            // var_dump(count($data));
        $this->data = $data;
        $this->datetime = $_SESSION["selectdate"];
        $i=0;
        // foreach($this->data as $bill){
        //     var_dump($bill[$i][0]);
        //     var_dump($bill[$i][1]);
        //     $i++;
        // }
        // for($i=0;$i<count($data);$i++)
        // {
        //     var_dump($data[$i][0]);
        //     var_dump($data[$i][1]);
           
        // }
       

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
            
            
                    <input type="date" id="dateMonth" name="dateMonth"  value = "'.$this->datetime.'"/>&nbsp;
                    <input type="submit" name="Check" class="btn btn-dark" value="Check" />
                    </form>
                    </div>	  
                        <br>
                </div>
                <div class="row">	
                <div class="title">
                    <h3>Expenditure Statistic</h3>
                    </div>
                </div>
                <div class="row">
                <div class="col-xl-2"></div>  
                    <div class="col-xl-8">
                        <div class="chart">
                    <canvas id="myChart" width="100%" height="100%" ></canvas>
                </div></div> 
                
                <div class="col-xl-2"></div>  
                </div>
                </main>
                </div>';
           
                echo $html;
           include 'footer.php';   

           $html= '<script>
                    var myCars1=new Array();';
          

           for($i=0;$i<count($this->data);$i++)
           {
               
               $html.= ' myCars1['.$i.']="'.$this->data[$i][0].'";';
               //var_dump($data[$i][1]);
           
           }
           $html.= 'var ctx = document.getElementById("myChart");';
           $html.= ' var myChart = new Chart(ctx, {';
            $html.= '  type: "doughnut",';
            $html.= '   data: { ';
                $html.= '       labels: myCars1,';
                $html.= '       datasets: [{';
                    $html.= '           label: "# of Votes", ';
                    $html.= '           data: [';
           
               for($i=0;$i<count($this->data);$i++)
                {
                    if($i!=0){
                        $html.= ',';
                    }
                    $html.= ''.$this->data[$i][1].'';
                    //var_dump($data[$i][1]);
                
                }
                        // 12, 19, 3, 5, 2, 3
            $html.= '],           backgroundColor: [';

            for($a=0;$a<count($this->data);$a++){
                if($a!=0){
                    $html.= ',';
                }
                if($a%6==0){
                    $html.= ' "#8a704f" ';
                }else if($a%6==1){
                    $html.= ' "#efe8de" ';
                }else if($a%6==2){
                    $html.= ' "#5a5250" ';
                }else if($a%6==3){
                    $html.= ' "#d5ad70" ';
                }
                else if($a%6==4){
                    $html.= ' "#9d5070" ';
                }
                else if($a%6==5){
                    $html.= ' "#dcbb86" ';
                }
                // else if($a%7==6){
                //     $html.= ' "#AA1111" ';
                // }
                
            }
            $html.= '],';
            $html.= 'borderColor: [';
                    
                    for($a=0;$a<count($this->data);$a++){
                        if($a!=0){
                            $html.= ',';
                        }
                        $html.= '"#000000"';
                    }
                    $html.= '],';
                    $html.= '           borderWidth: 1 ';
                    $html.= '       }]
               },
               options: {
                   scales: {
                       yAxes: [{
                           ticks: {
                               beginAtZero:true
                           }
                       }]
                   }
               }
           });';


            
           $html.= '</script>';
           echo $html;

        }


    }

?>
<?php



?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script  src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script  src ="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script> 









 

</body>
</html>