<?php
class landing extends controller
{
    function __construct()
    {
        if (isset($_SESSION['user_data'])) {
            header("Location: " . BASEURL . "my");
        }
    }
    function index()
    {
        $data['page_title'] = "Job book";
        $data['extra']['css'] = [
            '<link rel="stylesheet" href="' . BASEPATH . '/asset/css/style.css">'
        ];
        $data['extra']['js'] = [
            '<script src="' . BASEPATH . 'asset/js/script.js"></script>',
        ];
        // $data['modal'] = array($this->helper('file_reader')->read(BASEURL . 'apps/views/dropdowns/login.php'));
        $this->view('head/main', $data);
        $this->view('navigasi/main_navbar');
        $this->view('landing/index', $data);
        $this->view('foot/main', $data);
    }
}
