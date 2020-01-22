<?php
class user extends controller
{
    function register()
    {
        // persiapan
        $data['extra']['css'] = [
            '<link rel="stylesheet" href=" ' . BASEPATH . 'asset/css/style.css">'

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
        $data['page_title'] = "Buat Akun Baru";

        // Load views
        $this->view('head/main', $data);
        $this->view('user/register', $data);
        $this->view('foot/main');
    }
}
