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
        unset($_SESSION['login']);
        unset($_SESSION['user_data']);
        header('location:' . BASEURL . '/admin');
        exit;
    }
    public function getUser($params)
    {
        $query = "SELECT * FROM user, profile WHERE ";
        $i = 0;
        foreach ($params as $key => $value) {
            if ($i != count($params) - 1) {
                $query .= $key . "=:" . $key . " OR ";
            } else {
                $query .= $key . "=:" . $key;
            }
            $i++;
        }
        $this->DB->query($query);
        foreach ($params as $key => $value) {
            $this->DB->bind($key, $value);
        }
        $account = $this->DB->resultSet();
        return $account;
    }
    public function editprofile($data)
    {
        $user = $this->getUser($data['email']);
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
            $akun = $this->getUser($data['email']);
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
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $kolom_profile = array("nik", "nama_lengkap", "alamat", "no_hp", "tgl_lahir", "jenis_kelamin", "photo");
        $kolo_user = array("username", "email", "password", "role", "nik");
        // query mysql
        $query = "INSERT INTO profile(`nik`, `nama_lengkap`, `alamat`, `no_hp`) VALUES(";
        $query2 = "INSERT INTO user VALUES (";
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i == 0) {
                if (in_array($key, $kolom_profile)) {
                    $query .= ":" . $key;
                } else if (in_array($key, $kolo_user)) {
                    $query2 .= ":" . $key;
                    $ok = true;
                }
            } else {
                if (in_array($key, $kolom_profile)) {
                    $query .= " ,:" . $key;
                } else if (in_array($key, $kolo_user)) {
                    if ($key != "cpassword") {
                        if (isset($ok) and $ok == true) {
                            $query2 .= " ,:" . $key;
                        } else {
                            $query2 .= " :" . $key;
                            $ok = true;
                        }
                    }
                }
            }
            $i++;
        }
        $query .= " )";
        $query2 .= ",:nik )";
        $this->DB->query($query);
        foreach ($data as $key => $value) {
            if (in_array($key, $kolom_profile)) {
                $this->DB->bind($key, $value);
            }
        }
        $this->DB->execute();
        $this->DB->query($query2);
        foreach ($data as $key => $value) {
            if (in_array($key, $kolo_user)) {
                $this->DB->bind($key, $value);
            }
        }
        $this->DB->execute();
    }
}
