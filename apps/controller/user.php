<?php
class user extends controller
{
    function register()
    {
        // persiapan
        $data['extra']['css'] = [
            '<link rel="stylesheet" href=" ' . BASEPATH . 'asset/css/style.css">'

        ];
        $data['page_title'] = "Buat Akun Baru";
        // Load views
        $this->view('head/main', $data);
        $this->view('user/register', $data);
        $this->view('foot/main');
    }
}
