<?php
class auth_ws extends controller
{
    function __construct()
    {
    }
    function index()
    {
        var_dump($this->model('User_model')->getAllUser());
    }
    function login()
    {
        $data = $_POST;
        $result =  $this->model('User_model')->login($data);
        if ($result) {
            header('Location: ' . BASEURL . 'my');
        } else {
            header('Location: ' . BASEURL);
        }
    }
    function register()
    {
        $data = $_POST;
        // Persiapan
        $params = array("username" => $data['username'], "email" => $data['email'], "no_hp" => $data['no_hp']);
        $accounts = $this->model('User_model')->getUser($params);
        // Logic untuk email boleh kosong
        $data['email'] = ($data['email'] == null) ? '-' : $data['email'] = $data['email'];


        // Logic untuk cek inputan tidak boleh sama
        foreach ($accounts as $account) {
            if ($data['email'] != "-" and $data['email'] == $account['email']) {
                flasher::setFlash("Gagal, Email sudah digunakan", "danger");
                header("Location: " . BASEURL . "/user/register");
            } else if ($data['no_hp'] == $account['no_hp']) {
                flasher::setFlash("Gagal, No Hp sudah digunakan", "danger");
                header("Location: " . BASEURL . "/user/register");
            } elseif ($data['username'] == $account['username']) {
                flasher::setFlash("Gagal, Username sudah digunakan", "danger");
                header("Location: " . BASEURL . "/user/register");
            }
        }
        // Logic untuk menyamakan password
        if ($data['password'] != $data['cpassword']) {
            flasher::setFlash('Gagal, Password tidak sama', 'danger');
            header('Location: ' . BASEURL . 'user/register');
        }
        // more logic
        # code ...

        // post data
        $this->model('User_model')->register($data);
        flasher::setFlash("Berhasil, Akun anda sudah dibuat", "success");
        header('Location: ' . BASEURL . 'user/register');
    }
    function logout()
    {
        unset($_SESSION['user_data']);
        header('location:' . BASEURL);
    }
}
