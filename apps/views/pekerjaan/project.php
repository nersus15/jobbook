<!-- card -->
<br>
<br>
<br>
<div class="row mt-2 justify-content-md-center">
    <div class="col-5">
        <div class="card w-100 ShadowBox" style="margin-left: 18px;">
            <div class="card-body">
                <div>
                    <?= flasher::flash() ?>
                </div>
                <form enctype="multipart/form-data" method="POST" action="<?= BASEURL ?>pekerjaan_ws/pekerjaan_post">
                    <div class="form-group">
                        <label for="">Nama Pekerjaan</label>
                        <input required type="text" class="form-control" name="nama_pekerjaan">
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea required class="form-control" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Pekerjaan</label>
                        <input required type="text" class="form-control" name="lokasi">
                    </div>

                    <div class="form-group">
                        <label for="">Lama Pengerjaan</label>
                        <input required type="text" class="form-control" name="lama_pengerjaan">
                    </div>
                    <div class="form-group">
                        <label for="">Biaya</label>
                        <input required type="text" class="form-control" name="biaya">
                    </div>
                    <div class="form-group">
                        <label for="">Link Google Map</label>
                        <input type="text" class="form-control" name="link_gmap" placeholder="Rp-">
                    </div>
                    <div class="form-group">
                        <label for="">Upload Gambar</label>
                        <input type="file" name="image" id="">
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-danger w-50 float-left" type="submit">Batal</button>
                        <button class="btn btn-primary w-50" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>