<?php

class User_model
{
    private $DB;
    public function __construct()
    {
        $this->DB = new database;
    }
    public function getAllUser()
    {
        $query = "SELECT * FROM user ";
        $this->DB->query($query);
        $account = $this->DB->resultSet();
        return $account;
    }
    public function login($data)
    {
        $user = strtolower(stripslashes($data['user']));
        $password = $data['password'];
        $query = "SELECT * FROM user WHERE email =:user OR username=:user";
        $this->DB->query($query);
        $this->DB->bind('user', $user);
        $akun = $this->DB->single();
        if ($akun) {
            if (password_verify($password, $akun['password'])) {
                $_SESSION['user_data'] = $akun;
                $_SESSION['user_data']['passowrd'] = $data['password'];
                return true;
            } else {
                flasher::setFlash('Password untuk ' . $data['user'] . ' Salah', 'danger');
                header('Location:' . BASEURL . '/akun');
                return false;
            }
        } else {
            flasher::setFlash('User' . $data['user'] . ' tidak ditemukan', 'danger');
            return false;
        }
    }
    public function logout()
    {
        $_SESSION['log'] = [
            'aksi' => 'Logout',
            'user' => $_SESSION['user_data']['nama']
        ];
        $this->addlog();
        unset($_SESSION['login']);
        unset($_SESSION['user_data']);
        header('location:' . BASEURL . '/admin');
        exit;
    }
    public function getUserMenu()
    {
        $role_id =    $_SESSION['user_data']['role_id'];
        $queryMenu = "SELECT user_menu.id , menu from user_menu JOIN user_access_menu
             on user_menu.id=user_access_menu.menu_id WHERE user_access_menu.role_id=$role_id
             ORDER by user_access_menu.menu_id
            ";
        $this->DB->query($queryMenu);
        $this->DB->execute();
        return $this->DB->resultSet();
    }
    public function addlog()
    {
        $date = date('d-m-Y', time());
        $action = $_SESSION['log']['aksi'];
        $user = $_SESSION['log']['user'];
        unset($_SESSION['log']);
        $query = "INSERT INTO log_activity(`tgl`,`aksi`,`user`, `time`) values (:tgl, :aksi, :user, :waktu)";
        $this->DB->query($query);
        $this->DB->bind('tgl', $date);
        $this->DB->bind('waktu', time());
        $this->DB->bind('aksi', $action);
        $this->DB->bind('user', $user);
        $this->DB->execute();
    }
    public function getAllLog()
    {
        $query = "SELECT * FROM log_activity";
        $this->DB->query($query);
        $log = $this->DB->resultSet();
        return $log;
    }
    public function getRole()
    {
        $query = "SELECT * FROM user_role";
        $this->DB->query($query);
        $role = $this->DB->resultSet();
        return $role;
    }
    public function getLogById($userId)
    {
        $query = "SELECT * from log_activity where log_activity.user=(SELECT user.nama from user where user.id=:userId)";
        $this->DB->query($query);
        $this->DB->bind('userId', $userId);
        $log = $this->DB->resultSet();
        return $log;
    }
    public function Akun($email)
    {
        $query = "SELECT * FROM user WHERE email =:email";
        $this->DB->query($query);
        $this->DB->bind('email', $email);
        $account = $this->DB->single();
        return $account;
    }
    public function editprofile($data)
    {
        $user = $this->Akun($data['email']);
        if ($_FILES['image']['error'] == 4) {
            $image = $user['image'];
            $nama_image = $image;
        } else {
            $nama_image = $this->upload();
        }
        if (!$nama_image) {
            return false;
        } else {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $query = "UPDATE user SET `nama`=:nama, `email`=:email, `password`=:pass, `image`=:foto where `id`=:id";
            $this->DB->query($query);
            $this->DB->bind('nama', $data['username']);
            $this->DB->bind('email', $data['email']);
            $this->DB->bind('pass', $password);
            $this->DB->bind('id', $_SESSION['user_data']['id']);
            $this->DB->bind('foto', $nama_image);
            $this->DB->execute();
            flasher::setFlash('Profle berhasil di Update', 'success');
            $akun = $this->Akun($data['email']);
            $_SESSION['user_data'] = [
                'id' => $akun['id'],
                'email' => $akun['email'],
                'nama' => $akun['nama'],
                'role_id' => $akun['role_id'],
                'image' => $nama_image,
                'password' => $data['password']
            ];
            $_SESSION['log'] = [
                'aksi' => 'Edit Profile',
                'user' => $_SESSION['user_data']['nama']
            ];
            $this->addlog();
            header('location: ' . BASEURL . '/user/profile');
        }
    }
    public function upload()
    {
        $nama_file = $_FILES['image']['name'];
        $ukuran_file = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmp = $_FILES['image']['tmp_name'];
        $format_sesuai = ['jpg', 'jpeg', 'png'];
        $format_file = explode('.', $nama_file);
        $format_file = strtolower(end($format_file));
        if (!in_array($format_file, $format_sesuai)) {
            flasher::setFlash('Gagal, Pilih file yang Valid jpg/jpeg/png', 'danger');
            header('location: ' . BASEURL . '/user/editprofile');
        } elseif ($ukuran_file > 2500000) {
            flasher::setFlash('Gagal, size file yang dipilih terlalu besar', 'danger');
            header('location: ' . BASEURL . '/user/editprofile');
        } else {
            $nama_image = uniqId();
            $nama_image .= ".";
            $nama_image .= $format_file;
            move_uploaded_file($tmp, 'public/asset/img/profile/' . $nama_image);
            if ($_SESSION['user_data']['image'] != 'default.jpg') {
                unlink('public/asset/img/profile/' . $_SESSION['user_data']['image']);
            }
            return $nama_image;
        }
    }
    public function register($data)
    {
        // persiapan
        $password = password_hash($data['Password'], PASSWORD_DEFAULT);
        $email = $data['Email'];
        $name = $data['FullName'];
        $tgl_buat = time();
        $role_id = $data['role'];
        // query mysql
        $query = "INSERT into user(`id`,`nama`,`email`,`password`,`tgl_buat`,`role_id`, `image`)VALUES(:id, :nama, :email,:pass, :tgl,:role_id, 'default.jpg')";
        $this->DB->query($query);
        $this->DB->bind('nama', $name);
        $this->DB->bind('email', $email);
        $this->DB->bind('pass', $password);
        $this->DB->bind('tgl', $tgl_buat);
        $this->DB->bind('id', $id);
        $this->DB->bind('role_id', $role_id);
        $this->DB->execute();
    }

    public function filterLog($param1, $param2)
    {

        if ($param1 == 'semua' && $param2 == 'semua') {
            return $this->getAllLog();
        } else if ($param1 != 'semua' && $param2 != 'semua') {
            $param2 = strtotime($param2);
            $param2 = date('d-m-Y', $param2);
            $query = "SELECT * from log_activity where log_activity.tgl=:tgl and log_activity.user=(SELECT user.nama from user where user.id=:userId)";
            $user = $this->DB->query($query);
            $this->DB->bind('userId', $param1);
            $this->DB->bind('tgl', $param2);
            $log = $this->DB->resultSet();
            return $log;
        } else if ($param1 == 'semua' && $param2 != 'semua') {
            $param2 = strtotime($param2);
            $param2 = date('d-m-Y', $param2);
            $query = "SELECT * from log_activity where tgl=:tgl";
            $this->DB->query($query);
            $this->DB->bind('tgl', $param2);
            $log = $this->DB->resultSet();
            return $log;
        } else if ($param1 != 'semua' && $param2 == 'semua') {
            $query = "SELECT * from log_activity where log_activity.user=(SELECT user.nama from user where user.id=:userId)";
            $this->DB->query($query);
            $this->DB->bind('userId', $param1);
            $log = $this->DB->resultSet();
            return $log;
        } else {
            return null;
        }
    }
}
