<?php
class auth_ws extends controller
{
    function __construct()
    {
    }
    function index()
    {
        var_dump($this->model('User_model')->getAllUser());
    }
    function login()
    {
        $data = $_POST;
        $result =  $this->model('User_model')->login($data);
        if ($result) {
            header('Location: ' . BASEURL . 'my');
        } else {
            header('Location: ' . BASEURL);
        }
    }
    function register()
    {
    }
}
