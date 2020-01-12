<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS - Bootstrap -->
    <link rel="stylesheet" href="<?= BASEPATH ?>asset/vendor/bootstrap/css/bootstrap.min.css">
    <?php if (isset($data['extra']['css'])) :
        foreach ($data['extra']['css'] as $css) :
            echo $css;
        endforeach;
    endif; ?>
    <title><?= $data['page_title'] ?></title>
</head>

<body>