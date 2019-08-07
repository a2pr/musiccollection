<?php
class Albums extends Controller{
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new AlbumModel();
        $this->ReturnView($viewmodel->Index(), true);
    }
    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new AlbumModel();
        $this->ReturnView($viewmodel->add(), true);
    }
    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new AlbumModel();
        $this->ReturnView($viewmodel->edit(), true);
    }
}