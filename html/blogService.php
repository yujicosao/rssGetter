<?php
require_once('data.php');
class BlogService{
    private $name;
    private $url;

    public function __construct($name,$url){
        $this->name = $name;
        $this->url = $url;
    }

    // getter ==================================
    public function getName(){
        return $this->name;
    }
    public function getUrl(){
        return $this->url;
    }
}

?>