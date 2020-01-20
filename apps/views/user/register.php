<!-- card -->
<div class="row mt-2 justify-content-md-center">
    <div class="col-5">
        <div class="card w-100 ShadowBox" style="margin-left: 18px;">
            <div class="card-body">
                <div>
                    <?= flasher::flash() ?>
                </div>
                <form method="POST" action="<?= BASEURL ?>auth_ws/register">
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input required type="text" class="form-control" name="nik">
                    </div>
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input required type="text" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label for="nama">username</label>
                        <input required type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Alamat</label>
                        <textarea required class="form-control" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Boleh Kosong">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Hp</label>
                        <input type="text" class="form-control" name="no_hp" placeholder="Boleh Kosong">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                                <input required type="password" class="form-control" name="password">
                            </div>
                            <div class="col">
                                <label for="password">Confirmation Password</label>
                                <input required type="password" class="form-control" name="cpassword">
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="role" value="1">
                    <button class="btn btn-warning w-100" type="submit">Daftar</button>
                    <small>Klik <a href="<?= BASEURL ?>"><b>disini </b></a> untuk kembali dan Login</small>
                </form>
            </div>
        </div>

    </div>

</div>