<script src="<?= BASEPATH ?>asset/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEPATH ?>asset/js/popper.js"></script>
<script src="<?= BASEPATH ?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Extra Js for page only -->
<?php if (isset($data['extra']['css'])) :
    foreach ($data['extra']['js'] as $js) :
        echo $js;
    endforeach;
endif; ?>
</body>

</html>