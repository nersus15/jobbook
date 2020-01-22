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
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="">Nama Pekerjaan</label>
                        <input required type="text" class="form-control" name="nm_pekerjaan">
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea required class="form-control" name="waktu"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Pekerjaan</label>
                        <input required type="text" class="form-control" name="desc">
                    </div>

                    <div class="form-group">
                        <label for="">Lama Pekerjaan</label>
                        <input required type="text" class="form-control" name="tpt_krj">
                    </div>
                    <div class="form-group">
                        <label for="">Biaya</label>
                        <input type="text" class="form-control" name="biaya" placeholder="Rp-">
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