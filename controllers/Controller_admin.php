<?php
Class Controller_admin{
    public function __construct(){
        $this->model = new Model_admin();
        $this->view = new View();
    }
    public function Action_index(){
        $this->view->generate("admin", $this->model->getData());
    }
    public function Action_sort(){
        $this->view->generate("admin", $this->model->getSortData($_GET['by']));
    }
}