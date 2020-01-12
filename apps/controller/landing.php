<?php
class landing extends controller
{
    function index()
    {
        $data['page_title'] = "Job book";
        $data['extra']['css'] = [
            '<link rel="stylesheet" href="' . BASEPATH . '/asset/css/style.css">'
        ];
        $data['extra']['js'] = [
            '<script src="' . BASEPATH . 'asset/js/script.js"></script>',
        ];
        $this->view('head/main', $data);
        $this->view('landing/index', $data);
        $this->view('foot/main', $data);
    }
}
