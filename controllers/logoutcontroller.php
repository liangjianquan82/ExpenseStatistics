<?php

require_once(dirname(__DIR__)."/core/authentication/auth.php");


class LogoutController{

    function index($action, $params, $payload){

        $this->destroySession();

        header("Location: ".ROOTURL."/login/");

    }

    function destroySession(){

        session_name("expstat");
        session_start();

        $_SESSION = array();

        setcookie("expstat", "", time()-3600, "/");

        session_destroy(); 

    }


}

?>