<?php

class Uri{

    public $uri="";

    public function __construct(){
        $this->uri=$_SERVER['REQUEST_URI'];
    }

    public function getUri(){
        return $this->uri;
    }
    public function getParse_uri(){
        return parse_url($this->getUri());
    }

    public function getUriPaths(){
        $uri_parts_path=explode('/',$this->getParse_uri()['path']);   
        return $uri_parts_path;
    }
}