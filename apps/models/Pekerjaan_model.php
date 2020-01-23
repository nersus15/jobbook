<?php
class Pekerjaan_model
{
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    // Post Pekerjaan
    function post_pekerjaan($data)
    {
        //persiapan
        $data['kode'] = uniqid();
        $data['status'] = "open";
        $data['pembuat'] = $_SESSION['user_data']['username'];
        $query = "INSERT INTO pekerjaan ( ";
        $i = 0;
        $kolom = ["kode", "nama_pekerjaan", "deskripsi", "lokasi", "link_gmap", "lama_pengerjaan", "biaya", "status", "pembuat", "thumbnail"];
        foreach ($data as $key => $value) {
            if (in_array($key, $kolom)) {
                if (isset($ok) and $ok == true) {
                    $query .= ", `$key`";
                } else {
                    $query .= "`$key`";
                    $ok = true;
                }
            }
            $i++;
        }
        $query .= ") VALUES(";
        $i = 0;
        foreach ($data as $key => $value) {
            if (in_array($key, $kolom)) {
                if ($i == 0) {
                    $query .= ":$key";
                    $ok = true;
                } else {
                    if (isset($ok) and $ok == true) {
                        $query .= ", :$key";
                    } else {
                        $query .= ":$key";
                        $ok = true;
                    }
                }
            }
            $i++;
        }
        $query .= ")";
        $this->db->query($query);
        foreach ($data as $key => $value) {
            if (in_array($key, $kolom)) {
                $this->db->bind($key, $value);
            }
        }
        $this->db->execute();

        flasher::setFlash("Pekerjaan berhasil di post", "success");
    }
    //get pekerjaan by kode
    function getPekerjaanByKode($kode)
    {
        $this->db->query("SELECT * FROM pekerjaan WHERE kode =:kode");
        $this->db->bind('kode', $kode[0]);
        return $this->db->single();
    }
    // update pekerjaan 
    function updatePekerjaan($kode, $data)
    {
        $query = "UPDATE pekerjaan set";
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i == 0) {
                $query .= "$key=:$key";
            } else {
                $query .= ", $key=:$key";
            }
            $i++;
        }
        $query .= " WHERE kode=:kode";
        $this->db->query($query);
        $this->db->bind('kode', $kode);
        foreach ($data as $key => $value) {
            $this->db->bind($key, $value);
        }
        $this->db->execute();
    }
    // pekerjaan yang open
    function pekerjaan_get($username = null)
    {
        // persiapan
        if (is_null($username)) {
            $this->db->query("SELECT * FROM pekerjaan WHERE pekerjaan.status='open'");
        } else {
            $this->db->query("SELECT * FROM pekerjaan WHERE pekerjaan.status='open' and pekerjaan.pembuat != :username");
            $this->db->bind('username', $username);
        }
        return $this->db->resultSet();
    }
    // get pekerjaan by user
    function getPekerjaanByUser($pembuat)
    {
        $this->db->query("SELECT * FROM pekerjaan WHERE pekerjaan.pembuat=:pembuat");
        $this->db->bind("pembuat", $pembuat);
        return $this->db->resultSet();
    }
    // Filter pekerjaan sync
    function filter_pekerjaan($params)
    {
        $query = "SELECT * FROM pekerjaan WHERE ";
        $batasindex = count($params) - 1;
        foreach ($params as $key => $value) {
            $i = 0;
            $query .= $key . "LiKE %" . $value . "%";
            $query .= ($i < $batasindex) ? " OR " : null;
            $i++;
        }
        $this->db->query($query);
        return $this->db->resultSet();
    }
    function lamarPekerjaan($kode, $username)
    {
        //persiapan
        $kodeLamaran = uniqid();

        //post data
        $this->db->query("INSERT into lamaran VALUES(:kodeLamaran, :kodePekerjaan, :username)");
        $this->db->bind("kodeLamaran", $kodeLamaran);
        $this->db->bind("kodePekerjaan", $kode);
        $this->db->bind("username", $username);
        $this->db->execute();
        $this->db->query("UPDATE pekerjaan set status='On Progress'");
    }
    function getPelamarByPekerjaan($kodePekerjaan)
    {
        $this->db->query("SELECT * FROM lamaran JOIN user on (lamaran.pelamar=user.username) WHERE lamaran.pekerjaan=:pekerjaan");
        $this->db->bind("pekerjaan", $kodePekerjaan);
        $users = $this->db->resultSet();
        $query = "SELECT * FROM profile where";
        $i = 0;
        foreach ($users as $key => $value) {
            $key .= $i;
            if ($i == 0) {
                $query .= "nik=:$key";
            } else {
                $query .= " OR nik=:$key ";
            }
            $i++;
        }
        $this->db->query($query);
        $j = 0;
        foreach ($users as $key => $value) {
            $key .= $j;
            $this->db->bind($key, $value);
        }
        $profile = $this->db->resultSet();
        return array($users, $profile);
    }
}
