<?php

$html=' <header>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="#">Expense Statistics</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent1">
<ul class="navbar-nav mr-auto">
    <li class="nav-item active"> <a class="nav-link" href="'.ROOTURL.'/users/list/'.'">Home <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item dropdown"> 
        
        <a class="nav-link dropdown-toggle" href="Statistic.html" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Statistics</a> 
    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
        <a class="dropdown-item" href="Statistic.html">Year or Month Statistic</a> 
        <a class="dropdown-item" href="ConsumptionAnalysis.html">Consumption Analysis</a>
        <div class="dropdown-divider"></div></li>
    
    
    <li class="nav-item"> <a class="nav-link" href="'.ROOTURL.'/users/listincome/'.'">Income</a> </li>
    <li class="nav-item"> <a class="nav-link" href="'.ROOTURL.'/users/listexp/'.'">Expenses</a> </li>
    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="'.ROOTURL.'/users/listtype/'.'" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
        <a class="dropdown-item" href="'.ROOTURL.'/users/listtype/'.'">Type List</a>
        <a class="dropdown-item" href="'.ROOTURL.'/users/createtype/'.'">Add Type</a> 
       
<!--	            <a class="dropdown-item" href="#">Something else here</a> -->
    </div>
    </li>
    
</ul>
<!--
<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
-->
</div>

<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<li class="nav-item"> <a class="nav-link " href="'.ROOTURL.'/logout/'.'">Log out</a> </li>
</li>

</ul>
</div>
</nav>
</header>
';
echo $html;

?>