<?php
class pekerjaan_ws extends controller
{
    function __construct()
    {
        if (!isset($_SESSION['user_data'])) {
            flasher::setFlash("Untuk memposting pekerjaan silahkan login dulu", "danger");
            header("Location: " . BASEURL . 'jobs/buat');
        }
    }
    function pekerjaan_post()
    {

        $data = $_POST;
        if ($_FILES['image']['name'] == "") {
            $data['thumbnail'] = "defaultThumbnail.png";
        } else {
            $data['thumbnail'] = $this->helper('uploader')->uploadImage("/opt/lampp/htdocs/jobbook/public/asset/img/pekerjaan/", "defaultThumbnail.png", BASEURL . "jobs/buat");
        }
        $this->model('Pekerjaan_model')->post_pekerjaan($data);
        header('Location: ' . BASEURL . 'jobs/buat');
    }
}
