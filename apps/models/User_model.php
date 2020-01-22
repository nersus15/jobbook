<?php

class User_model
{
    private $DB;
    public function __construct()
    {
        $this->DB = new database;
    }
    public function profile($username)
    {
        $this->DB->query("SELECT * FROM user WHERE username=:username");
        $this->DB->bind('username', $username);;
        $akun = $this->DB->single();
        $nik = $akun['nik'];
        $this->DB->query("SELECT * FROM profile WHERE nik=:nik");
        $this->DB->bind("nik", $nik);
        $profile = $this->DB->single();

        return array("akun" => $akun, "profile" => $profile);
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
                $_SESSION['user_data']['password'] = $password;
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
    public function update($data)
    {
        // persiapan
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $kolom_profile = array("nama_lengkap", "alamat", "no_hp", "tgl_lahir", "jenis_kelamin", "photo");
        $kolo_user = array("email", "password", "role");
        // query mysql
        $query = "UPDATE profile set";
        $query2 = "UPDATE  user set";
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i == 0) {
                if (in_array($key, $kolom_profile)) {
                    $query .= "$key=:" . $key;
                    $ok2 = true;
                } else if (in_array($key, $kolo_user)) {
                    $query2 .= "$key=:" . $key;
                    $ok = true;
                }
            } else {
                if (in_array($key, $kolom_profile)) {
                    if (isset($ok2) and $ok2 == true) {
                        $query .= " ,$key=:" . $key;
                    } else {
                        $query .= " $key=:" . $key;
                        $ok2 = true;
                    }
                } else if (in_array($key, $kolo_user)) {
                    if ($key != "cpassword" or $key != "nik") {
                        if (isset($ok) and $ok == true) {
                            $query2 .= " ,$key=:" . $key;
                        } else {
                            $query2 .= " $key=:" . $key;
                            $ok = true;
                        }
                    }
                }
            }
            $i++;
        }
        $query .= " WHERE nik=:nik ";
        $query2 .= " WHERE username=:username ";
        $this->DB->query($query);
        $this->DB->bind('nik', $data['nik']);
        foreach ($data as $key => $value) {
            if (in_array($key, $kolom_profile)) {
                $this->DB->bind($key, $value);
            }
        }
        $this->DB->execute();
        $this->DB->query($query2);
        $this->DB->bind('username', $data['username']);
        foreach ($data as $key => $value) {
            if (in_array($key, $kolo_user)) {
                $this->DB->bind($key, $value);
            }
        }
        $this->DB->execute();
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
