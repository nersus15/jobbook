<?php if (isset($_SESSION['user_data']) and $data['pekerjaan']['pembuat'] != $_SESSION['user_data']['username'] or !isset($_SESSION['user_data'])) : ?>
    <div class="cointainer">
        <div class="profile-bg"></div>
        <div class="card profile-card">
            <img style="width: 150px" src="<?= BASEPATH ?>asset/img/pekerjaan/<?= $data['pekerjaan']['thumbnail'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <div><?php flasher::flash() ?></div>
                <h5 class="card-title">Detil Pekerjaan</h5>
                <p>Dibuat Oleh: <?= $data['pekerjaan']['pembuat'] ?></p>
                <form method="POST" action="<?= BASEURL ?>auth_ws/update" class="row" enctype="multipart/form-data">
                    <input type="hidden" name="oldemail" id="olde" value="<?= $data['akun']['email'] ?>">
                    <input type="hidden" name="oldno_hp" id="oldn" value="<?= $data['profile']['no_hp'] ?>">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="nama_pekerjaan">Nama Pekerjaan</label>
                            <input readonly class="form-control" type="text" name="nama_pekerjaan" id="nama_pekerjaan" value="<?= $data['pekerjaan']['nama_pekerjaan'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="deskripsi">Deskripsi Pekerjaan</label>
                            <textarea readonly class="form-control" name="deskripsi" id="deskripsi" value="<?= $data['pekerjaan']['deskripsi'] ?>"><?= $data['pekerjaan']['deskripsi'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="lokasi">Lokasi Pekerjaan</label>
                            <input readonly class="form-control" type="text" name="lokasi" id="lokasi" value="<?= $data['pekerjaan']['lokasi'] ?>">
                            <small>Link Google Map: <?= $data['pekerjaan']['link_gmap'] ?></small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="lama_pengerjaan">Lama Pengerjaan (dalam hari)</label>
                            <input readonly class="form-control" type="text" name="lama_pengerjaan" id="lama_pengerjaan" value="<?= $data['pekerjaan']['lama_pengerjaan'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="biaya">Bayaran Pekerjaan (dalam Rupiah)</label>
                            <input readonly class="form-control" type="text" name="biaya" id="biaya" value="<?= $data['pekerjaan']['biaya'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="tgl_buat">Tanggal Buat Pekerjaan</label>
                            <input readonly class="form-control" type="text" name="tgl_buat" id="tgl_buat" value="<?= $data['pekerjaan']['tgl_buat'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <button class="btn btn-outline-secondary btn-sm" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="cointainer">
        <div class="profile-bg"></div>
        <div class="card profile-card">
            <img style="width: 150px" src="<?= BASEPATH ?>asset/img/pekerjaan/<?= $data['pekerjaan']['thumbnail'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <div><?php flasher::flash() ?></div>
                <h5 class="card-title">Detil Pekerjaan</h5>
                <p>Dibuat Oleh: <?= $data['pekerjaan']['pembuat'] ?></p>
                <form method="POST" action="<?= BASEURL ?>auth_ws/update" class="row" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="nama_pekerjaan">Nama Pekerjaan</label>
                            <input class="form-control" type="text" name="nama_pekerjaan" id="nama_pekerjaan" value="<?= $data['pekerjaan']['nama_pekerjaan'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="deskripsi">Deskripsi Pekerjaan</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" value="<?= $data['pekerjaan']['deskripsi'] ?>"><?= $data['pekerjaan']['deskripsi'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="lokasi">Lokasi Pekerjaan</label>
                            <input class="form-control" type="text" name="lokasi" id="lokasi" value="<?= $data['pekerjaan']['lokasi'] ?>">
                            <small>Link Google Map: <?= $data['pekerjaan']['link_gmap'] ?></small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="lama_pengerjaan">Lama Pengerjaan (dalam hari)</label>
                            <input class="form-control" type="text" name="lama_pengerjaan" id="lama_pengerjaan" value="<?= $data['pekerjaan']['lama_pengerjaan'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="biaya">Bayaran Pekerjaan (dalam Rupiah)</label>
                            <input class="form-control" type="text" name="biaya" id="biaya" value="<?= $data['pekerjaan']['biaya'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="tgl_buat">Tanggal Buat Pekerjaan</label>
                            <input class="form-control" type="text" name="tgl_buat" id="tgl_buat" value="<?= $data['pekerjaan']['tgl_buat'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="image">Ganti gambar</label>
                            <input class="form-control" type="text" name="image" id="tgl_buat">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <button class="btn btn-outline-secondary btn-sm" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>