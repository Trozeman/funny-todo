<?php
Class Controller_index{
    public function __construct(){
        $this->model = new Model_index();
        $this->view = new View();
    }
    public function Action_index(){
        $this->view->generate("index", $this->model->getData());
    }
    public function Action_sort(){
        $this->view->generate("index", $this->model->getSortData($_GET['by']));
    }
}