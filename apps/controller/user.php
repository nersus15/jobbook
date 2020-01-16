<?php
class user extends controller
{
    function register()
    {
        // persiapan
        $data['extra']['css'] = [
            '<link rel="stylesheet" href=" '.BASEPATH.'asset/css/style.css">'
            
        ];
        // Load views
        $this->view('head/main',$data);
        $this->view('user/register',$data);
        $this->view('foot/main');
    }
    function _register()
    {
        $data = $_POST;
        // Logic untuk email boleh kosong
        $data['email'] = $data['email'] ?? '-';

        // Logic untuk menyamakan password
        if ($data['password'] != $data['password2'])
            flasher::setFlash('Gagal, Password tidak sama', 'danger');
        header('Location: ' . BASEURL . 'user/register');
        // more logic
        # code ...

        // post data
        $this->model('user_model')->register($data);
    }
}
