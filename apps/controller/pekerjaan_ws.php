<?php
class pekerjaan_ws extends controller
{
    function __construct()
    {
        parent::__construct();
    }
    function pekerjaan_post()
    {
        $data = $_POST;
        if ($data['image'] == "") {
            $data['thumbnail'] = "defaultThumbnail.png";
        } else {
            $data['thumbnail'] = $this->helper('uploader')->uploadeImage("public/asset/img/thumbnail/", "defaultThumbnail.png");
        }
        var_dump($data);
    }
}
