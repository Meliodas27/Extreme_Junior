<?php 
class Index_Controller extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('Login');
    }

    function saludo(){
        echo "<p>Hola a todos<p>";
    }
}

?>