<?php
class file_reader
{
    function read($path)
    {
        $filename = explode('/', $path);
        $file = file_get_contents($path);
        // $data = fread($file, filesize(end($filename)));
        // fclose($file);
        return $file;
    }
}
