
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<style>
<?php 



include 'css/main.css'; 
 include 'css/bootstrap-4.4.1.css'; ?>

</style>

</head>

<body class="mainbody" style="padding-top: 70px; padding-bottom: 70px;" >

	  
	 


        <?php 
        class LoginView{
            private $html;
            private $loginMessage;
            function __construct($loginMessage){
                $this->loginMessage = $loginMessage;        
                $this->render();        
            }
            function render(){

              //var_dump($_POST["username"]);
              //var_dump($_POST["password"]);

                $this->html = ' 
                <div class="container" style="background: url(back.png);">
                <header class="mainheader" >
                  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light"> 
                  <a class="navbar-brand" href="#">Expense Statistics</a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> 
                    <span class="navbar-toggler-icon"></span> </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav mr-auto">
                        
                        </ul>          
                    <a class="btn-link" href="">Sign Up</a>
                      </div>
                  </nav>
                </header>
                <main>
                    
                  <div >
                    <br>
                      <div class="titile"><h2 >Login</h2></div>
                      <br>
                    </div>
                    <form method="POST">
                
                        <label for="username">Username:</label>

                        <input type="text" class="form-control" name="username"/><br>

                        <label for="password">Password:</label>

                        <input type="password" class="form-control" name="password"/><br>         
                        
                        <input type="submit" class="btn btn-dark" value="Login" />

                        </form>
                

	 
                        </main>
                        <footer>
                          <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light"> 
                            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                            <ul class="navbar-nav mr-auto">
                                    <div class="row">
                              <div class="col-xl-auto"> Copyright @Liang Jianquan</div>
                                    
                                </div>
                                </ul> 
                            </div>
                            
                          
                            </nav>
                          
                          </footer>
                          
                      </div>';

echo $this->html;
echo "</br>";
echo $this->loginMessage;
}
}        
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

<script>
<?php 
include '../js/jquery-3.4.1.min.js'; 
include '../js/popper.min.js'; 
include '../js/bootstrap-4.4.1.js'; 
include '../js/my.js'; 
?>
 </script>
</body>
</html>
