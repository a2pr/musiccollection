<?php

class Bootstrap{

    // properties
    private $controller;
    private $action;
    private $request;

    //contruct logic
    public function __construct($request){
        $this->request=$request;

        //setting controllers
        if($this->request['controller']==''){
            $this->controller='home';
        }else{
            $this->controller= $this->request['controller'];
        }

        //setting actions
        if($this->request['action']==''){
            $this->action='index';
        }else{
            $this->action= $this->request['action'];
        }
        
    }

    public function createController(){
        //check class
        if(class_exists($this->controller)){
            $parents= class_parents($this->controller);
            //check extended
            if(in_array('Controller', $parents)){
                if(method_exists($this->controller,$this->action)){
                    return new $this->controller($this->action, $this->request);
                }else{
                    //method does not exist
                    echo '<h1> Method does not exist</h1>';
                    return;
                }
            }else{
                //Base Controller does not exit
                echo '<h1> Base Controller not found</h1>';
                return; 
            }
        }else{
             // Controller class does not exist
             echo '<h1> Controller class not Exist</h1>';
             return; 
        }
    }

}