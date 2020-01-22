<?php
class jobs extends controller
{
    function index()
    {
        //persiapan
        $data['extra']['css'] = [
            '<link rel="stylesheet" href="' . BASEPATH . '/asset/css/style.css">'
        ];
        $data['extra']['js'] = [
            '<script src="' . BASEPATH . 'asset/js/script.js"></script>',
        ];
        $data['page_title'] = "Jobbook";
        if (isset($_SESSION['user_data'])) {
            $data['pekerjaan'] = $this->model('Pekerjaan_model')->pekerjaan_get($_SESSION['user_data']['username']);
        } else {
            $data['pekerjaan'] = $this->model('Pekerjaan_model')->pekerjaan_get();
        }
        $this->view('head/main', $data);
        $this->view('navigasi/main_navbar');
        $this->view('navigasi/filter_sidebar');
        $this->view('pekerjaan/tpekerjaan', $data);
        $this->view('foot/main', $data);
    }
    function buat()
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
        $this->view('pekerjaan/project', $data);
        $this->view('foot/main', $data);
    }
}
