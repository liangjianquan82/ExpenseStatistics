<html>
<head>
<meta charset="utf-8">
<title>Type Information</title>
	
<style>
<?php 
include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
 ?>
</style>
</head>

<body class="mainbody"  style="padding-top: 70px; padding-bottom: 70px;">
	
<?php
    class AddUpdateView{

        public $data;
        private $html;

        function __construct($data){

        $this->data = $data;

        $this->render();        

        }
        function render(){
            include 'header.php';   
            $this->html='
            <div class="container">
            <main>
		  
	  <div class="row" >
		  
		    <div class="title"><h2>Add/UpdateType</h2></div>
			  <br>
	    </div>	  
	 
	 <form method="post">
      <div class="row">
        <label for="exampleInputEmail1">Type Name:</label>
        <input type="email" class="form-control" id="TypeName" placeholder="Type Name">
         <br> </div>
         <br>	 
	   <div>
		<div class="row">
		  <div class="psbt" > <button type="submit" class="btn btn-dark" id="Submit">Submit</button>
			  &nbsp;
		  <button type="submit" class="btn btn-dark" id="Cancel">Cancel</button></div>
		</div>
	  </div>
      </form>
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
