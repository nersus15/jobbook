<?php
class Pekerjaan_model
{
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    //get pekerjaan by kode
    function getPekerjaanByKode($kode)
    {
        $this->db->query("SELECT * FROM pekerjaan WHERE kode =:kode");
        $this->db->bind('kode', $kode);
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
    function pekerjaan_get()
    {
        // persiapan
        $this->db->query("SELECT * FROM pekerjaan WHERE pekerjaan.status='open'");
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
}
