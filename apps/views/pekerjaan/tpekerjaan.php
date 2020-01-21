<?php if (!$data['pekerjaan']) : ?>
    <div class="jobs-list" style="position:fixed; top:30%; right:0px; width: 70%">
        <div class="card" style="width: 70%;">
            <div class="card-body">
                <h5 class="card-title">Data Pekerjaan Kosong</h5>
            </div>
        </div>
    <?php else : ?>
        <div class="jobs-list" style="position:fixed; right:0px; width: 70%">
            <?php foreach ($data['pekerjaan'] as $pekerjaan) : ?>
                <div class="card" style="width: 70%;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $pekerjaan['nama_pekerjaan'] ?></h5>
                        <p class="card-text"><?= $pekerjaan['lokasi'] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>