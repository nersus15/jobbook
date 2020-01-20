<?php
class jobs extends controller
{
    function index()
    {
        $data['page_title'] = "Jobbook";
        $this->view('head/main', $data);
        $this->view('navigasi/main_navbar');
        $this->view('navigasi/filter_sidebar');
        $this->view('pekerjaaan/tpekerjaan', $data);
        $this->view('foot/main', $data);
    }
}
