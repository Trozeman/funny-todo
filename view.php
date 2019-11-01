<?php
class View{

    public function generate($view, $data=array())
    {
        include './views/template.php';
    }

}