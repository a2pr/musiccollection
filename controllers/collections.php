<?php
class Collections extends Controller{
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new CollectionModel();
        $this->ReturnView($viewmodel->Index(), true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new CollectionModel();
        $this->ReturnView($viewmodel->add(), true);
    }
    protected function showCollection(){
        $viewmodel= new CollectionModel();
        $this->ReturnView($viewmodel->showCollection(), true);
    }
    
    
}