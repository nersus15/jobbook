<?php
class jobs extends controller
{
    function index()
    {
        $data['page_title'] = "Jobbook";
        $this->view('head/main', $data);
        $this->view('pekerjaaan/tpekerjaan', $data);
        $this->view('foot/main', $data);
    }
}
