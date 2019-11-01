<?php


class Route{

    public static function Start(){
        $controller = "./controllers/Controller_";
        $model = "./models/Model_";
        $controller_name = 'Controller_';
        $action = 'Action_';

        $url = explode('/',$_GET['route']);	

        if(strlen($url[0])>0){
            if (file_exists($controller.$url[0].'.php')) {
                $controller_name.=$url[0];
                $controller.=$url[0];
                $model.=$url[0];
            }else{
                $controller.='404';
                $controller_name.='404';
                $model.='404';
            }
            $controller.='.php';
            $model.='.php';

        }else{
            $controller.='index.php';
            $controller_name.='index';
            $model.='index.php';
        }

        if(!empty($url[1])){
            $action.=$url[1];
        }else{
            $action.='index';
        }


        require_once($model);
        require_once($controller);


        $cont = new $controller_name();
        $cont->$action();

    }
}