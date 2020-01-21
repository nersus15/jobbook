<?php
class my extends controller
{
    function __construct()
    {
        if (!isset($_SESSION['user_data'])) {
            header("Location: " . BASEURL);
        }
    }
    function index()
    {
        echo "Login";
    }
    function dashboard()
    {
    }
    function post_job()
    {
    }
}
