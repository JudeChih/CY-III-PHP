<?php

class HomeController extends Controller {
    
    function index() {
        echo "home page of HomeController";
    }
    
    function hello($name) {
        $user = $this->model("User");
        $user->name = $name;
        echo "Hello! $user->name"; 
    }
    
}

?>
