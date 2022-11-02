<html>
<head>
<meta charset="utf-8">
<title>AddUpdatefee</title>
	
<style>
<?php 


if( $_COOKIE['updatefee'] == 1||$_COOKIE['createfee'] == 1){
  //以下是跳转
  //var_dump($_COOKIE['updatetype']);
  echo"<script>alert('The Type was successfully'); </script>";
  header("Location: ".ROOTURL."/users/listexp/");
}


  // if($_COOKIE('state')==1)  {
  // echo"<script>alert('The Expenses was successfully'); </script>";
  // header("Location: ".ROOTURL."/users/listincome/");
  // }
  // else if($_COOKIE('state')==2){
  //   echo"<script>alert('The income was successfully '); </script>";
  // header("Location: ".ROOTURL."/users/listexp/");
  // }


include 'css/main.css'; 
include 'css/bootstrap-4.4.1.css'; 
 ?>
</style>
</head>

<body class="mainbody"  style="padding-top: 70px; padding-bottom: 70px;">


<?php
    class AddUpdateFee{

        public $data;
        public $feetype;
        private $html;

        function __construct($data,$feetype){

        $this->data = $data;
        $this->feetype = $feetype;

        $this->render();        

        }
        function render(){
            include 'header.php';   

            //var_dump($_COOKIE['createfee']);
            //var_dump($feetype);
            $this->html='
            <div class="container">
            <main>

            ';
     
          //var_dump ($this->data);
          if(!empty($this->data)){


            foreach($this->data as $bill){
              //var_dump ($bill);
            $this->html.='
            <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class=title><h3>Fee Information</h3>
                <br></div>
            </div>
            <div class="row">
          <div class="ExIn">	      
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                ';
                if($bill->state==1){
                 $this->html.='
                  <input type="radio" name="state" id="Expenses" aria-label="placeholder text" value="1" checked="true">';
                }
                else{
                  $this->html.='
                  <input type="radio" name="state" id="Expenses" aria-label="placeholder text" value="1">';
                }
                $this->html.='
                  
                </div>
              </div>
              <input type="text" disabled="disabled" class="form-control" placeholder="Expenses">
                <div class="input-group-prepend">
                <div class="input-group-text">';
                if($bill->state==2){
                  $this->html.='
                  <input type="radio" name="state" id="Income" aria-label="placeholder text" value="2" checked="true">';
                }
                else{
                  $this->html.='
                  <input type="radio" name="state" id="Income" aria-label="placeholder text" value="2">';
                }
                  
                $this->html.='</div>
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
              
              <input type="input" class="form-control" name="amount" id="input_amount" value="'.$bill->amount.'">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <span class="label label-default" id="labeltype">Date</span>
                </div>
              </div>
              <input type="date" id="dateMonth" name="bill_time"  value="'.$bill->bill_time.'"/>
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
              
              <input type="input" class="form-control" name="Remark" id="input_Remark" value="'.$bill->Remark.'">
                
            </div>
      </div>
      <div>  ';


      $i = 0;
    foreach($this->feetype as $feetype){
      
      //echo $i%4;
      if($i%4==0){
        $this->html.='
        
                <div class="row">
                <div class="input-group">
                ';
      }
      $this->html.='
                    <div class="input-group-prepend">
                      <div class="input-group-text">';
                      if($bill->type_id==$feetype->type_id){
                        $this->html.='
                        <input type="radio" name="type_id" value="'.$feetype->type_id.'" id="Expenses" checked="true" aria-label="placeholder text">
                        ';
                      }
                      else{
                        $this->html.='
                        <input type="radio" name="type_id" value="'.$feetype->type_id.'" id="Expenses"  aria-label="placeholder text">
                        ';
                      }
                      
         $this->html.=' </div>
                    </div>
                    <span class="form-control" id="labeltype">'.$feetype->type_name.'</span>
                    ';
      
      if($i%4==3){
        $this->html.='
        </div>
        </div>
       
        '; 
      }
      $i++;
    }   

    }
    $this->html.='
    </div>
      
         
            <div class="row">
            
                  <div class="psbt" >  
                  <br>
                  <input type="submit" name="submit" class="btn btn-dark" value="Submit" />
                      &nbsp;
                      <a class="btn btn-dark" href="'.ROOTURL.'/users/listexp/'.'">Cancel</a>
                  </div>
             
            </div>
                
      
  </form>


  </main>
  </div>';
            
        }
        else{
          $this->html.='<form method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class=title><h3>Fee Information</h3>
              <br></div>
          </div>
          <div class="row">
        <div class="ExIn">	      
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="radio" name="state" id="Expenses" aria-label="placeholder text" value="1" checked="true">
              </div>
            </div>
            <input type="text" disabled="disabled" class="form-control" placeholder="Expenses">
              <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="radio" name="state" id="Income"  aria-label="placeholder text" value="2">
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
            
            <input type="input" class="form-control" name="amount" id="input_amount" placeholder="0.00">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="label label-default" id="labeltype">Date</span>
              </div>
            </div>
            <input type="date" id="dateMonth" name="bill_time"  value="'.date("Y-m-d").'"/>
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
            
            <input type="input" class="form-control" name="Remark" id="input_Remark" placeholder="Remark">
              
          </div>
    </div>
    <div>
    ';

    $i = 0;
    foreach($this->feetype as $feetype){
      
      //echo $i%4;
      if($i%4==0){
        $this->html.='
        
                <div class="row">
                <div class="input-group">
                ';
      }
      $this->html.='
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                      <input type="radio" name="type_id" value="'.$feetype->type_id.'" id="Expenses" aria-label="placeholder text">
                      </div>
                    </div>
                    <span class="form-control" id="labeltype">'.$feetype->type_name.'</span>
                    ';
      
      if($i%4==3){
        $this->html.='
        </div>
        </div>
       
        '; 
      }
      $i++;
    }   

    
        $this->html.='
        </div>
          
             
                <div class="row">
                
                      <div class="psbt" >  
                      <br>
                      <input type="submit" name="submit" class="btn btn-dark" value="Submit" />
                          &nbsp;
                          <a class="btn btn-dark" href="'.ROOTURL.'/users/listexp/'.'">Cancel</a>
                      </div>
                 
                </div>
                    
          
      </form>


      </main>
      </div>';
        
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