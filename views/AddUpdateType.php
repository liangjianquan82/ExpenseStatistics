<html>
<head>
<meta charset="utf-8">
<title>Type Information</title>
	
<style>
<?php 
 if( $_COOKIE['updatetype'] == 1||$_COOKIE['createtype'] == 1){
  //以下是跳转
  //var_dump($_COOKIE['updatetype']);
  echo"<script>alert('The Type was successfully created'); </script>";
  header("Location: ".ROOTURL."/users/listtype/");
}
include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
 ?>
</style>
</head>

<body class="mainbody"  style="padding-top: 70px; padding-bottom: 70px;">

<?php


?>

	
<?php
    class AddUpdateType{

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
		  
	  <div class="row" >';
		  
    if( $_COOKIE['createtype'] == 0 && empty($this->data)){
      $this->html.='<div class="title"><h2>Add Type</h2></div>';
    }else if($_COOKIE['updatetype'] == 0 && !empty($this->data)){
      $this->html.='<div class="title"><h2>Update Type</h2></div>';

    }
		    
        $this->html.='<br>
	    </div>	  ';
     
          //var_dump ($this->data);
          if(!empty($this->data)){
            foreach($this->data as $type){
            $this->html.='<form method="POST" enctype="multipart/form-data" >
              <div class="row">
                <label for="exampleInputEmail1">Type Name:</label>
                <input type="text" class="form-control" name="type_name"  value="'.$type->type_name.'">
                <br> </div>
                <br>	 
            <div>
            <div class="row">
              <div class="psbt" > 
              <input type="submit" name="submit" class="btn btn-dark" value="Submit" />
            
                &nbsp;
              
              <a class="btn btn-dark" href="'.ROOTURL.'/users/listtype/'.'">Cancel</a>
              </div>
            </div>
            </div>
              </form>
            </main>
            </div>
              ';
            }
        }
        else{
          $this->html.='<form method="POST" enctype="multipart/form-data" >
              <div class="row">
                <label for="exampleInputEmail1">Type Name:</label>
                <input type="text" class="form-control" name="type_name"  value="">
                <br> </div>
                <br>	 
            <div>
            <div class="row">
              <div class="psbt" > 
              <input type="submit" name="submit" class="btn btn-dark" value="Submit" />
            
                &nbsp;
              
              <a class="btn btn-dark" href="'.ROOTURL.'/users/listtype/'.'">Cancel</a>
              </div>
            </div>
            </div>
              </form>
            </main>
            </div>
              ';
        }
	        
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
