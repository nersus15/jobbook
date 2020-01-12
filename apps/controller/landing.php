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
            '<script src="' . BASEPATH . 'asset/js/dropdown.inject.js"></script>',
        ];
        $data['modal'] = array($this->helper('file_reader')->read(BASEURL . 'apps/views/modals/auth.php'));
        $this->view('head/main', $data);
        $this->view('landing/index', $data);
        $this->view('foot/main', $data);
    }
}
