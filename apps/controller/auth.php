<?php
class auth extends controller
{
    function __construct()
    {
    }
    function index()
    {
        // ada
    }
    function login()
    {
        $this->model('User_model')->login();
    }
}
