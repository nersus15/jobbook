<?php
class Pekerjaan_model
{
    private $db;
    public function __construct()
    {
        $this->db = new database;
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
