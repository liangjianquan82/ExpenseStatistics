<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Type list</title>
	
<style>
<?php 
include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
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
		<div class="col-xl-6"><a class="btn btn-dark" href="'.ROOTURL.'/users/createtype/'.'">Add</a></div>  
		<div class="col-xl-6"></div>  
		  
	  
      </div>
      <div class="row">
			  <div class="title"><h3>Type Information</h3><br></div>
		  </div>	
      
            ';

            $i = 0;
            foreach($this->data as $type){
              
              echo $i%4;
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
	
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap-4.4.1.js"></script>
<script src="../js/my.js"></script>
<script>
<?php 
include 'js/jquery-3.4.1.min.js'; 
include 'js/popper.min.js'; 
include 'js/bootstrap-4.4.1.js'; 
include 'js/my.js'; 
?>
</script>
</body>
</html>

