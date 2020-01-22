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
        // page content here
        $this->view('foot/main', $data);
    }
    function dashboard()
    {
    }
    function jobs()
    {
        //persiapan
        $data['extra']['css'] = [
            '<link rel="stylesheet" href="' . BASEPATH . '/asset/css/style.css">'
        ];
        $data['extra']['js'] = [
            '<script src="' . BASEPATH . 'asset/js/script.js"></script>',
        ];
        $data['page_title'] = "Jobbook";
        $data['pekerjaan'] = $this->model('Pekerjaan_model')->getPekerjaanByUser($_SESSION['user_data']['username']);
        $this->view('head/main', $data);
        $this->view('navigasi/main_navbar');
        $this->view('navigasi/filter_sidebar');
        $this->view('pekerjaan/tpekerjaan', $data);
        $this->view('foot/main', $data);
    }
    function profile()
    {
        // persiapan
        $data['page_title'] = "My Profile";
        $data['extra']['css'] = [
            '<link rel="stylesheet" href="' . BASEPATH . '/asset/css/style.css">'
        ];
        $data['extra']['js'] = [
            '<script src="' . BASEPATH . 'asset/js/script.js"></script>',
            '<script>
            function show() {
                if ($("#password").attr("type") == "password") {
                    $("#password").attr("type", "text")
                    $("#cpassword").attr("type", "text")
            
                } else {
                    $("#password").attr("type", "password")
                    $("#cpassword").attr("type", "password")
                }
            }</script>'
        ];
        $data['user'] = $this->model('User_model')->profile($_SESSION['user_data']['username']);
        extract($data['user']);
        $data['akun'] = $akun;
        $data['profile'] = $profile;
        $this->view('head/main', $data);
        $this->view('navigasi/main_navbar', $data);
        $this->view('user/profil', $data);
        $this->view('foot/main', $data);
    }
}
