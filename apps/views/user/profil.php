<div class="cointainer">
    <div class="profile-bg"></div>
    <div class="card profile-card">
        <img style="width: 150px" src="<?= BASEPATH ?>asset/img/profile/<?= $data['profile']['photo'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <div><?php flasher::flash() ?></div>
            <h5 class="card-title">Detil Akun</h5>
            <form method="POST" action="<?= BASEURL ?>auth_ws/update" class="row" enctype="multipart/form-data">
                <input type="hidden" name="oldemail" id="olde" value="<?= $data['akun']['email'] ?>">
                <input type="hidden" name="oldno_hp" id="oldn" value="<?= $data['profile']['no_hp'] ?>">
                <div class="col-md-12">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" readonly id="username" value="<?= $data['akun']['username'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="<?= $data['akun']['email'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" value="<?= $_SESSION['user_data']['password'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cpassword">Ulangi Password</label>
                        <input class="form-control" type="password" name="cpassword" id="cpassword" value="<?= $_SESSION['user_data']['password'] ?>">
                    </div>
                    <div class="form-group col-md-6"> <small onclick="show()" id="see" style="cursor: pointer">perlihatkan password</small></div>
                </div>
                <h5 class="card-title">Detil Profile</h5>
                <div class="col-md-12">
                    <div class="form-group col-md-6">
                        <label for="nik">NIK</label>
                        <input class="form-control" type="text" name="nik" readonly id="nik" value="<?= $data['profile']['nik'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" value="<?= $data['profile']['nama_lengkap'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" type="text" name="alamat" id="alamat" value="<?= $data['profile']['alamat'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_hp">No Hp</label>
                        <input class="form-control" type="text" name="no_hp" id="no_hp" value="<?= $data['profile']['no_hp'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $data['profile']['tgl_lahir'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_hp">Jenis Kelmain</label>
                        <div class="col-md-4">
                            <?php if ($data['profile']['jenis_kelamin'] == "perempuan") : ?>
                                <input type="radio" id="pr" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                                <br>
                                <input type="radio" id="lk" name="jenis_kelamin" value="Perempuan" checked> Perempuan
                            <?php else : ?>
                                <input type="radio" id="pr" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                                <br>
                                <input type="radio" id="lk" name="jenis_kelamin" value="Perempuan"> Perempuan
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tgl_lahir">ganti photo</label>
                        <input class="form-control" type="file" name="image" id="photo">
                    </div>
                </div>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>