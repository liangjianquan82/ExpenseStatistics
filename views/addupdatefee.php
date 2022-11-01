<html>
<head>
<meta charset="utf-8">
<title>AddUpdatefee</title>
	
<style>
<?php 
include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
 ?>
</style>
</head>

<body class="mainbody"  style="padding-top: 70px; padding-bottom: 70px;">


<?php
    class AddUpdateFee{

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
            <form method="post">
            <div class="row">
                <div class=title><h3>Income/Expense Information</h3>
                <br></div>
            </div>
            <div class="row">
          <div class="ExIn">	      
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Expenses" aria-label="placeholder text" checked="true">
                </div>
              </div>
              <input type="text" disabled="disabled" class="form-control" placeholder="Expenses">
                <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" disabled="disabled" placeholder="Income">
            </div>
          </div>
      </div>
             <div class="row">
          <div class="">	      
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <span class="label label-default" id="labeltype">Amount</span>
                </div>
              </div>
              
              <input type="input" class="form-control" id="input_amount" placeholder="0.00">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <span class="label label-default" id="labeltype">Date</span>
                </div>
              </div>
              <input type="date" id="dateMonth"  value = "'.date("Y-m-d").'"/>
            </div>
          </div>
      </div>
            <div class="row">
                   
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <span class="label label-default" id="labeltype">Remark</span>
                </div>
              </div>
              
              <input type="input" class="form-control" id="input_Remark" placeholder="Remark">
                
            </div>
      </div>
              <div class="row">
                <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Expenses" aria-label="placeholder text" checked="true">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type1">
                <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type2">
                      <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type3">
                      <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type4">
            </div>
                  
              </div>
            
             <div class="row">
                <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Expenses" aria-label="placeholder text" >
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type1">
                <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type2">
                      <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type3">
                      <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type4">
            </div>
                  
              </div>
            
             <div class="row">
                <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Expenses" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type1">
                <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type2">
                      <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type3">
                      <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" id="Income" aria-label="placeholder text">
                </div>
              </div>
              <input type="text" class="form-control" placeholder="type4">
            </div>
                  
              </div>
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
</body>
</html>