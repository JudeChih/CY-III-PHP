<?php

class HomeController extends Controller {
    
    function index() {
        echo "home page of HomeController";
    }
    
    function hello($name) {
        echo "Hello! $name";
    }
    
}

?>
