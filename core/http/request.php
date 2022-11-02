<?php

// we made this class to have immutable objects
// Made the class final
// Made the properties readonly
// Set the properties using the contrcutor only
// Do not implement setters
// Only implement Getters

final class Request{

    private array $payload;
    private array $urlparams;
    private string $method;// GET, POST, ....
    private array $header;
    private string $url;

    function __construct($method, $url, $urlparams, $header, $payload){

        //    var_dump($payload);

       //var_dump($payload);

       // echo "file name: ".$_FILES["profileimage"]["name"];


        $this->method = $method;
        $this->url = $url;
        $this->urlparams = $urlparams;
        $this->header = $header;
        $this->payload = $payload;

    }

    function getMethod(){

        return $this->method;

    }

    function getURL(){

        return $this->url;

    }
    function getURLParams(){

        return $this->urlparams;

    }
    function getHeader(){

        return $this->header;

    }
    function getPayload(){

        return $this->payload;

    } 
}

?>