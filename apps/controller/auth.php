<?php
class auth extends controller
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
        $this->model('User_model')->login();
    }
}
