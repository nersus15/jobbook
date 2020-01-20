<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../asset/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../asset/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Righteous|Kanit|Exo+2|Mada|Sonsie+One
          |Condiment|Sedgwick+Ave+Display|Marck+Script|Faster+One|Aladin|Black+Ops+One&display=swap"
    >
    <link rel="stylesheet" href="../../asset/css/style.css">
    <link rel="stylesheet" href="../../asset/css/style.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
   
    <link rel="shortcut icon" href="../../asset/icon/1x/Asset 5.png" type="image/x-icon">
    <title>SiRent</title>

</head>

<body>


<!-- Header -->
<!-- <div class="card-header gardient"
     style="width: 100%; border-radius: 0; height: 350px; border: none; background-color: #18ffff; margin-top: 88px;">
    <br>
    <div class="row" style="width: 100%;">
        <div class="col-7">
            <h5 style="color: white; font-size: 40px; font-family: 'Kanit', sans-serif;">
                Rental Mobil untuk Semua Kebutuhan Perjalanan Anda
            </h5>
            <br>
            <p style="color: white; font-family: 'Kanit', sans-serif;">
                Ketika kemudahan bepergian tercapai, Anda dapat menikmati kota tujuan dengan maksimal. Mulai dari
                menjelajahi tempat populer, berwisata kuliner, atau sekadar berkeliling dalam kota, partner rental
                mobil tepercaya kami siap untuk mengantar Anda.
            </p>
        </div>
        <div class="col-5">
            <img src="../../asset/image/mobil-pameran-honda.png" alt=""
                 style="width: 100%; height: 80%; float: right; margin-top: 155px;">

        </div>
    </div>
</div> -->
    
<!-- container -->
<div class="container" style="margin-top: 200px; margin-bottom: 150px">
    <div class="card ShadowBox" style="background-color: rgb(1, 83, 134); height: 45px; ">
        <div class="card-body" style="margin-top: -10px">
        </div>
    </div>
    <br>
    <!-- Search data -->
    <form action="" method="post">
        <div class="row">
            <div class="col-7">
                <div class="card ShadowBox" style="height: 75px">
                    <div class="card-body">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="border: 0px; background-color: white">
                                    <img src="../../asset/icon/search.png" alt="" style="width: 24px">
                                </div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                   placeholder="Search . . ." style="border: 0px; width: 100px" name="keyword">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-link" name="btncari"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5   ">
                <div class="card ShadowBox position-sticky" style="height: 75px">
                    <div class="card-body">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" style="border: 0px" name="opsi">
                                <?php if (isset($_GET['opsi'])) : ?>
                                    <?php if ($_GET['opsi'] == "harga") : ?>
                                        <option value="harga">Harga sewa</option>
                                        <option value="type">Type kendaraan</option>
                                    <?php elseif ($_GET['opsi'] == "type") : ?>
                                        <option value="type">Type kendaraan</option>
                                        <option value="harga">Harga sewa</option>
                                    <?php else: ?>
                                        <option>Pilih kategori pencarian . .</option>
                                        <option value="harga">Harga sewa</option>
                                        <option value="type">Type kendaraan</option>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <option>Pilih kategori pencarian . .</option>
                                    <option value="harga">Harga sewa</option>
                                    <option value="type">Type kendaraan</option>
                                <?php endif; ?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    <div class="card-body">
                        <div class="row" style="width: 100%">
                            <div class="col">
                                
    <div class="search-result-item">
                                    <fl-project-tile project="project" user="search.user" tracking-event-section="search.trackingEventSection" display-location="search.searchType === 'projects'" last-tracking-event="search.lastTrackingEvent" index="$index + search.filters.common.offset + 1"><figure class="info-card-iconBox">
    <span class="Icon">
        <fl-icon name="ui-fixed-project" ng-if="ProjectTile.project.price.type === 'fixed'"><svg class="Icon-image" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 15.5v1c0 1.103.897 2 2 2h9v2H7v2h10v-2h-4v-2h9c1.103 0 2-.897 2-2v-1H0zm24-1v-11c0-1.103-.897-2-2-2H2c-1.103 0-2 .897-2 2v11h24z" fill="#0087E0"></path></svg></fl-icon>
    </span>
</figure>
<div class="info-card-inner">
    <h2 class="info-card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        Perbaiki formulir pemesanan yang tidak berfungsi di Situs Web Wordpress
    </font></font></h2>
    <p class="info-card-description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        Kami adalah agen web dengan beberapa pelanggan. </font><font style="vertical-align: inherit;">Proyek kami adalah: 1 - Salah satu pelanggan kami memiliki situs berbasis Wordpress 2 - Di Halaman Beranda ada formulir pemesanan online 3 - Ketika seseorang mencoba mengisi formulir, sistem akan mengirimkan email konfirmasi kepada pengguna dan kepada pemilik. 4 - Email-email ini datang tanpa data. </font><font style="vertical-align: inherit;">Hanya formulir kosong tanpa memasukkan data dari pengguna 5 - Kami menyediakan akses admin lengkap untuk memeriksanya sebelum memulai pekerjaan 6 - Kami ingin tahu waktu dan harga untuk menyelesaikan masalah 7 - Kami membayar jumlah pada akhir pekerjaan melalui Freelancer dengan ulasan bertanda bintang tinggi
    </font></font></p>
    <div class="info-card-grid">
        <div class="info-card-details info-card-grid-item" ng-if="ProjectTile.project.startTime">
            <span class="Icon Icon--small info-card--iconSpace" title="Status proyek" i18n-title-id="497c102c4f5c881a850f44b3e73975dd" i18n-title-msg="Project status" i18n-id="">
                <fl-icon name="ui-hourglass-2"><svg class="Icon-image" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none"><path d="M20.5 3.805V1.2c0-.662-.536-1.2-1.196-1.2H4.946C4.286 0 3.75.538 3.75 1.2v2.606c0 .948.383 1.876 1.052 2.546L10.433 12l-5.631 5.65a3.577 3.577 0 0 0-1.052 2.545V22.8c0 .662.536 1.2 1.196 1.2h14.358c.66 0 1.196-.538 1.196-1.2v-2.605a3.58 3.58 0 0 0-1.052-2.547L13.817 12l5.631-5.648A3.63 3.63 0 0 0 20.5 3.805z" fill="#363F4D"></path><path fill="#FFF" d="M8.536 20.4l3.589-3.6 3.59 3.6z"></path></g></svg></fl-icon>
            </span>
            <!-- ngIf: ProjectTile.project.status --><span class="info-card-projectStatus--open info-card-details-item" ng-if="ProjectTile.project.status"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
              Buka
            </font></font></span><!-- end ngIf: ProjectTile.project.status -->
            <time class="info-card-details-item" i18n-id="1cccf7a129a4dc254fa40766bd3ec40e" i18n-msg="${ ProjectTile.project.startTime | timeAgoFilter } ago"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                1 menit yang lalu
            </font></font></time>
            <span class="info-card-details-item">
                <span class="info-card-bids" i18n-id="4384ecda9eae12054e8c61b20faf9ab0" i18n-msg="— ${ProjectTile.pluralize.bids}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    - 13 tawaran
                </font></font></span>
            </span>
        </div>
        <div class="info-card-details info-card-details--hasTooltip info-card-grid-item">
            <span class="Icon Icon--small info-card--iconSpace" title="Pemilik kontes" i18n-title-id="d4a1ba56edb003f1e379139218be68e7" i18n-title-msg="Contest owner" i18n-id="">
                <fl-icon name="ui-user-non-verified"><svg class="Icon-image" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.125 13.5C5.87 13.5 1.5 17.2 1.5 22.5V24h21.25v-1.5c0-5.3-4.368-9-10.625-9zm0-2.833c2.93 0 5.313-2.394 5.313-5.334 0-2.94-2.383-5.333-5.313-5.333-2.93 0-5.313 2.393-5.313 5.333 0 2.94 2.384 5.334 5.313 5.334z" fill="#363F4D"></path></svg></fl-icon>
            </span>
            <span>
               <span class="Tooltip Tooltip--bottom" data-tooltip="3 jobs completed" ng-if="ProjectTile.project.employer.complete &amp;&amp; ProjectTile.project.employer.reviews">
                    <div class="Rating Rating--labeled info-card-rating" data-star_rating="5.0">
                        <span class="Rating-total">
                            <span class="Rating-progress"></span>
                        </span>
                    </div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    (3 ulasan)
                </font></font></span></span>
        </div>
        <!-- Project skills -->
       
        <div class="info-card-details info-card-grid-item info-card-skillsContainer" ng-if="ProjectTile.project.skills">
            <span class="Icon Icon--small info-card--iconSpace" title="Keterampilan" i18n-title-id="aa79c5d1cbe3d96218a92481bcfaa39c" i18n-title-msg="Skills" i18n-id="">
                <fl-icon name="ui-tag"><svg class="Icon-image" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.648 13.551l-13.2-13.2A1.197 1.197 0 0 0 9.6 0H1.2C.536 0 0 .536 0 1.2v8.4c0 .32.126.623.352.848l13.2 13.2a1.197 1.197 0 0 0 1.696 0l8.4-8.4c.47-.469.47-1.227 0-1.697zM6 8.4a2.4 2.4 0 1 1-.001-4.8 2.4 2.4 0 0 1 0 4.799z" fill="#363F4D"></path></svg></fl-icon>
            </span>
            <div class="info-card-skills">
                <!-- ngRepeat: skill in ProjectTile.project.skills --><span ng-repeat="skill in ProjectTile.project.skills"><font style="vertical-align: inherit;"></font></span><!-- end ngRepeat: skill in ProjectTile.project.skills --><span ng-repeat="skill in ProjectTile.project.skills"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Desain Situs Web </font></font></span><!-- end ngRepeat: skill in ProjectTile.project.skills --><font style="vertical-align: inherit;"><span ng-repeat="skill in ProjectTile.project.skills"><font style="vertical-align: inherit;">PHP </font></span></font><span ng-repeat="skill in ProjectTile.project.skills"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">WordPress </font></font></span><!-- end ngRepeat: skill in ProjectTile.project.skills --><span ng-repeat="skill in ProjectTile.project.skills"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CSS </font></font></span><!-- end ngRepeat: skill in ProjectTile.project.skills --><span ng-repeat="skill in ProjectTile.project.skills"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HTML</font></font></span><!-- end ngRepeat: skill in ProjectTile.project.skills -->
            </div>
        </div><!-- end ngIf: ProjectTile.project.skills -->
    </div>
    <div class="info-card-tags">
        <fl-upgrade-tags upgrades="ProjectTile.project.upgrades" type="'project'" max-tags="3"><ul class="UpgradeTag">
  <!-- ngRepeat: upgrade in UpgradeTags.upgradesShown -->
  <!-- ngIf: UpgradeTags.overflowCount -->
</ul>
</fl-upgrade-tags>
    </div>
    <!-- ngIf: ProjectTile.project.pool_ids.includes('facebook') -->
</div>

<!-- ngIf: ProjectTile.project.currency.code !== 'TKN' --><div class="info-card-action" ng-if="ProjectTile.project.currency.code !== 'TKN'">
    <!-- ngIf: ProjectTile.project.price --><div class="info-card-price" ng-if="ProjectTile.project.price">
        <!-- ngIf: ProjectTile.project.price.range --><span ng-if="ProjectTile.project.price.range"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            $ 9 - $ 33
        </font></font></span><!-- end ngIf: ProjectTile.project.price.range -->
        <!-- ngIf: ProjectTile.project.price.minimum -->
    </div><!-- end ngIf: ProjectTile.project.price -->
    <div class="info-card-price-type">
        <span i18n-id="718e01467010e10a3d656443dae6e088" i18n-msg="USD [1: per hour ]"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            USD
            </font></font><!-- ngIf: ProjectTile.project.price.type === 'hourly' -->
        </span>
    </div>
</div><!-- end ngIf: ProjectTile.project.currency.code !== 'TKN' -->

<!-- ngIf: ProjectTile.project.currency.code === 'TKN' -->
</fl-project-tile>
                                </div>

                            </div>
                    </div>
                    </div>

    <!-- tampil data mobil -->
    <!-- <?php foreach ($mobil as $row) : ?>

        <div class="card mb-2 ShadowBox" style="border-radius: 5px; height: 215px">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../../upload/imgmobil/<?= $row['gambar']; ?>" class="card-img" alt="No Image"
                         style="width: 100%; height: 200px; border-radius: 0px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row" style="width: 100%">
                            <div class="col-8">
                                <h2 class="card-title"
                                    style="font-family: 'Arial'"><?= $row["merk"]; ?></h2>
                                <small class="btn btn-outline-primary btn-sm"
                                       style="border-radius: 50px; min-width:100px; "><?= $row["tipe"] ?></small>
                                <br>
                                <br>
                                <small class="card-text" style="font-size: 12pt; margin-top: 15px; margin-right: 5px;">
                                    <img src="../../asset/icon/peopleincar.png" alt=""
                                         style="width: 24px; margin-right: 15px">
                                    <?= $row["kapasitas"]; ?> Orang
                                </small>
                                <small class="card-text" style="font-size: 12pt; margin-top: 15px; margin-left: 5px;">
                                    |
                                </small>
                                <small class="card-text" style="font-size: 12pt; margin-top: 15px; margin-left: 5px;">
                                    <img src="../../asset/icon/rental.png" alt=""
                                         style="width: 24px; margin-right: 15px">
                                    <?= $row["fasilitas"]; ?>
                                </small>


                            </div>
                            <div class="col-1">
                                <div style="width: 0px; height: 121%; border: 1px rgba(211,211,211,0.36) solid; margin-top: -19.5px">
                                </div>
                            </div>
                            <div class="col-3">
                                <p class="card-text"
                                   style="font-size: 30px; margin-top: 100px;"><b>
                                        <h5 style="color: #f38600;">
                                            Rp <?= number_format($row["tarif"], 0, ".", ".") ?></h5></b>
                                </p>

                                <?php
                                if (isset($_GET["durasi"])) {
                                    $tgl = $_GET['Tanggal_sewa'];
                                    $durasi = $_GET['durasi'];
                                } else {
                                    $tgl = 0;
                                    $durasi = 0;
                                }
                                ?>

                                <form action="../pemesanan/pemesanan.php" target="_blank" method="post">
                                    <input type="hidden" value="<?= $tgl ?>" name="Tanggal_sewa">
                                    <input type="hidden" value="<?= $durasi ?>" name="durasi">
                                    <input type="hidden" value="<?= $row['tipe'] ?>" name="tipe">
                                    <input type="hidden" value="<?= $row['fasilitas'] ?>" name="facilities">
                                    <input type="hidden" value="<?= $row['kapasitas'] ?>" name="kapasitas">
                                    <input type="hidden" value="<?= $row['gambar'] ?>" name="gambar">
                                    <input type="hidden" value="<?= $row['merk'] ?>" name="merk">
                                    <input type="hidden" value="<?= $row['no_pol'] ?>" name="no_pol">
                                    <input type="hidden" value="<?= $row['tarif'] ?>" name="harga">

                                    <?php if ($row['fasilitas'] == 'Dengan Sopir') : ?>
                                        <input type="hidden" value="80000" name="fasilitas">
                                    <?php else: ?>
                                        <input type="hidden" value="0" name="fasilitas">
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION["users"])) : ?>
                                        <button type="submit" class="btn btn-primary"
                                                style="float: right; width: 100%; border-radius: 100px">Sewa
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-primary disabled"
                                                style="float: right; width: 100%; border-radius: 100px">Sewa
                                        </button>
                                    <?php endif; ?>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <?php endforeach; ?>
    <br>
    <br> -->

    <!-- pagination -->
    <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($aktif > 1) : ?>
                <li class="page-item">
                    <a class="page-link" style="border: 0px; border-radius: 200px"
                       href="?halaman=<?= $aktif - 1; ?>&Tanggal_sewa=<?= $tgl; ?>&durasi=<?= $durasi; ?>">Previous</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" style="border: 0px; border-radius: 200px"
                       href="?halaman=<?= $aktif - 1; ?>&Tanggal_sewa=<?= $tgl; ?>&durasi=<?= $durasi; ?>">Previous</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $jmlhalaman; $i++) : ?>
                <?php if ($i == $aktif) : ?>
                    <li class="page-item  active">
                        <a class="page-link" style="border: 0px; border-radius: 200px"
                           href="?halaman=<?= $i; ?>&Tanggal_sewa=<?= $tgl; ?>&durasi=<?= $durasi; ?>">
                            <?= $i; ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" style="border: 0px; border-radius: 200px"
                                             href="?halaman=<?= $i; ?>&Tanggal_sewa=<?= $tgl; ?>&durasi=<?= $durasi; ?>"><?= $i; ?></a>
                    </li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($aktif < $jmlhalaman) : ?>
                <li class="page-item">
                    <a class="page-link" style="border: 0px; border-radius: 200px"
                       href="?halaman=<?= $aktif + 1 ?>&Tanggal_sewa=<?= $tgl; ?>&durasi=<?= $durasi; ?>">Next</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" style="border: 0px; border-radius: 200px"
                       href="?halaman=<?= $aktif + 1 ?>&Tanggal_sewa=<?= $tgl; ?>&durasi=<?= $durasi; ?>">Next</a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
</div>
</div> -->

<!-- Footer -->
<div class="card-footer " style="background-color: black;">
    <div class="container" style="margin-top: 25px; font-family: 'mada', sans-serif;">
        <div class="row">
            <div class="col-4">
                <img src="../../asset/icon/1x/sirent2.png" class="d-inline-block align-top" alt=""
                     style="width: 200px;">
            </div>
            <div class="col-2">
                <h5 style="color: white; margin-bottom: 15px;">Tentang Sirent</h5>
                <a href="" style="color: rgb(197, 196, 196);">Pusat Bantuan</a><br>
                <a href="" style="color: rgb(197, 196, 196);">Hubungi Kami</a><br>
                <br>
                <h5 style="color: white; margin-bottom: 15px;">Follow kami di</h5>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="../../asset/icon/twitter.png" alt="" style="width: 35px;">
                    Twitter</a><br>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="../../asset/icon/facebook.png" alt="" style="width: 35px;">
                    Facebook</a><br>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="../../asset/icon/instagram.png" alt="" style="width: 35px;">
                    Instagram</a>
            </div>
            <div class="col">
                <h5 style="color: white; margin-bottom: 15px;">Produk</h5>
                <a href="" style="color: rgb(197, 196, 196);">Rental Mobil Lepas Kunci</a><br>
                <a href="" style="color: rgb(197, 196, 196);">Rental Mobil Dengan Sopir</a><br>
            </div>
            <div class="col-3">
                <h5 style="color: white; margin-bottom: 15px;">Lainya</h5>
                <a href="" style="color: rgb(197, 196, 196);">Syarat & Ketentuan</a><br>
                <a href="" style="color: rgb(197, 196, 196);">Kebijakan Privasi</a><br>
                <br>
                <h5 style="color: white; margin-bottom: 15px;">Sponsor</h5>
                <div class="row">
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_bni.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_bri.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_mandiri.png" alt=""
                                 style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_bca.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr style="background-color: rgb(54, 54, 54); margin-top: 50px;">
    <br>
    <center style="color: white;">Copyright © 2019 Sirent</center>
    <br>
    <br>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style=" color: rgb(51, 51, 51)" id="exampleModalLabel">
                    Log In Ke Akun Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="">
                    <div class="form-group">
                        <label for="formGroupExampleInput" style="color: rgb(51, 51, 51);">Nama atau
                            no. Telpon</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" style="color: rgb(51, 51, 51);">Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" style="width: 100%;" name="login">Log
                                    In
                                </button>

                            </div>
                            <div class="col-7">
                                <p style="margin-bottom: 0%; margin-top: 0%; color: rgb(51, 51, 51);">
                                    Belum punya akun ?</p>
                                <a href="#" style="width: 20px;">Daftar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <p style="margin-bottom: 0%; margin-top: 0%; color: rgb(51, 51, 51); font-family: 'Kanit', 'sans-serif';">
                        Nikmati berbagai kemudahan dengan menjadi member Sirent.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->

</body>