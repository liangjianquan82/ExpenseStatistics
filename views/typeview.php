<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Type list</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<style>
<?php 
include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
include 'js/jquery-3.4.1.min.js'; 
include 'js/popper.min.js'; 
include 'js/bootstrap-4.4.1.js'; 
include 'js/my.js'; 
 ?>
</style>
</head>

<body class="mainbody"  style="padding-top: 70px; padding-bottom: 70px;">
	
<?php
    class TypeView{

        public $data;
        private $html;

        private int $i;

        function __construct($data){

        $this->data = $data;

        $this->render();        

        }
        function render(){
            include 'header.php';   

           
            $this->html='
        
	
	<div class="container">
    <main>
		  <div class="row">
		<div class="col-xl-6"><a  class="btn btn-dark" href="'.ROOTURL.'/users/createtype/'.'">Add</a></div>  
		<div class="col-xl-6"></div>  
		  
	  
      </div>
      <div class="row">
			  <div class="title"><h3>Type List</h3><br></div>
		  </div>	
      
            ';

            $i = 0;
            foreach($this->data as $type){
              
              //echo $i%4;
              if($i%4==0){
                $this->html.='
                        <div class="row">
                        <div class="input-group">';
              }
              $this->html.='
                            <a class="form-control" href="'.ROOTURL.'/users/updatetype/'.$type->type_id.'">'.$type->type_name.'</a>';
              
              if($i%4==3){
                $this->html.='
                </div>
                </div>
                '; 
              }
              $i++;
            }   


$this->html.='
		    
	   
		  
            </main>
    </div>
            ';
            echo $this->html;
            
             include 'footer.php';  
        }
    }
    ?>
	

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script  src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script  src ="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script> 
<script>
<?php 

?>
</script>
</body>
</html>

