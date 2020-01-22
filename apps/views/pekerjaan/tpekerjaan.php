<?php if (!$data['pekerjaan']) : ?>
    <div class="jobs-list" style="position:fixed; top:30%; right:0px; width: 70%">
        <div class="card" style="width: 70%;">
            <div class="card-body">
                <h5 class="card-title">Data Pekerjaan Kosong</h5>
            </div>
        </div>
    <?php else : ?>
        <div class="jobs-list" style="position:absolute;margin-top:15%; right:0px; width: 70%">
            <?php foreach ($data['pekerjaan'] as $pekerjaan) : ?>
                <div class="card" style="width: 70%; margin-top: 25px;">
                    <div class="card-body ">
                        <h5 class="card-title"><?= $pekerjaan['nama_pekerjaan'] ?></h5>
                        <img style="width: 30%; height: 100%; margin-right: 40px;" src="<?= BASEPATH ?>asset/img/pekerjaan/<?= $pekerjaan['thumbnail'] ?>" class="card-img-left float-left" alt="...">
                        <div class="info ">
                            <p class="card-text"><?= $pekerjaan['lokasi'] ?></p>
                            <p>Rp. <?= $pekerjaan['biaya'] ?></p>
                            <p><?= $pekerjaan['lama_pengerjaan'] ?> Hari</p>
                        </div>
                        <div class="pembuat ">
                            <p><?= $pekerjaan['pembuat'] ?></p>

                        </div>
                        <div class="action">
                            <a href="<?= BASEURL ?>/jobs/detail/<?php $pekerjaan['kode'] ?>" class="btn btn-sm btn-outline-secondary">Lihat Detil</a>
                            <a href="<?= BASEURL ?>/jobs/lamar/<?php $pekerjaan['kode'] ?>" class="btn btn-sm btn-success">Lamara Pekerjaan</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>