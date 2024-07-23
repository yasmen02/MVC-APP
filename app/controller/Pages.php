<?php

class Pages extends Controller {
    public function __construct(){
            //load a model
        $this->postModel = $this->model('Post');
    }

    public function index(){
        //get model function
        $posts = $this->postModel->getPosts();
        $data = ['title' => 'Welcome',
            'posts' => $posts];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = ['title' => 'About Us'];

        $this->view('pages/about', $data);
    }
}