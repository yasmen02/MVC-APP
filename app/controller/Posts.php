<?php
class Posts extends Controller{
    public function __construct(){
        if(!isloggedIN()){
            redirect('/users/login');
        }
        $this->postModel =$this->model('Post');
    }
    public function index()
    {
        //get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }
    public function add(){
        $data = [
            'title' => '',
            'body' => ''
        ];

        $this->view('posts/add', $data);
    }
}