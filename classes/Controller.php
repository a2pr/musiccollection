<?php

abstract class Controller{
    
    //properties
    protected $request;
    protected $action;

    public function __construct($action, $request){
        $this->action= $action;
        $this->request=$request;
    }

    public function executeAction(){
        return $this->{$this->action}();
    }

    protected function returnView($viewmodel, $fullView){
        $view='views/'. get_class($this). '/' .$this->action.'.php';
        if($fullView){
            require('views/main.php');
        }else{
            require($view);
        }
    }
}