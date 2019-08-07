<?php
class Artists extends Controller{
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new ArtistModel();
        $this->ReturnView($viewmodel->Index(), true);
    }
    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new ArtistModel();
        $this->ReturnView($viewmodel->add(), true);
    }
    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new ArtistModel();
        $this->ReturnView($viewmodel->edit(), true);
    }
    protected function showAlbums(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '. ROOT_URL.'users/login');
        }
        $viewmodel= new ArtistModel();
        $this->ReturnView($viewmodel->showAlbums(), true);
    }
}