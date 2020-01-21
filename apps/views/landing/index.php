    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">

            <!-- carausel -->
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="10000">
                        <h1 class="display-4"> Hire expert freelancers for any job, online</h1>
                        <p class="lead">Millions of small businesses use Freelancer to turn their ideas into reality.</p>
                        <br>
                        <h1>Join US</h1>
                    </div>
                    <div><?= flasher::flash(); ?></div>
                    <div class="carousel-item" data-interval="2000">
                        <p class="lead">travel to the any corner of the world. eithout going around in circles</p>
                        <h1 class="display-4">You <span>work</span> like at <br><span>home</span></h1>
                    </div>
                    <div class="carousel-item">
                        <p class="lead">travel to the any corner of the world. eithout going around in circles</p>
                        <h1 class="display-4">Make Your Tour Amazing <br> With Us</h1>
                    </div>
                </div>
            </div>
            <!-- akhir carausel -->
            <br>

            <a class="nav-item btn btn-warning btn-tombol" href="#">I want to Hire</a>
            <a class="nav-item btn btn-warning btn-tombol" href="views/pekerjaan/tpekerjaan.php">I want to Work</a>
        </div>
    </div>
    <!-- last jumbotron -->

    <div class="container">
        <!-- Profil -->
        <blockquote class="blockquote">
            <h3 class="text-center">Profil</h3>
            <hr>

            <div class="row">
                <div class="col">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae optio officiis tempora veniam alias
                        nemo
                        repellat dolorem saepe pariatur ut itaque similique soluta totam minima quo earum, suscipit fugiat sed.</p>
                </div>
                <div class="col">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae optio officiis tempora veniam alias
                        nemo
                        repellat dolorem saepe pariatur ut itaque similique soluta totam minima quo earum, suscipit fugiat sed.</p>
                </div>
            </div>
        </blockquote>
        <!-- last profil -->

        <!-- portofolio -->
        <div class="jumbotron-fluid" style="background-color: #ffffff; padding: 20px;">
            <h3 class="text-md-center">Portofolio</h3>
            <hr>
            <div class="row">
                <div class="col-lg">
                    <img src="<?= BASEPATH ?>asset/img/landingPage/img-1.jpg" alt="img-1" class="img-col1">
                </div>
                <div class="col-lg">
                    <img src="<?= BASEPATH ?>asset/img/landingPage/img-2.jpg" alt="img-2" class="img-col1">
                </div>
                <div class="col-lg">
                    <img src="<?= BASEPATH ?>asset/img/landingPage/img-3.jpeg" alt="img-3" class="img-col1">
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <img src="<?= BASEPATH ?>asset/img/landingPage/img-4.jpg" alt="img-4" class="img-col1">
                </div>
                <div class="col-lg">
                    <img src="<?= BASEPATH ?>asset/img/landingPage/img-5.webp" alt="img-5" class="img-col1">
                </div>
                <div class="col-lg">
                    <img src="<?= BASEPATH ?>asset/img/landingPage/img-6.jpg" alt="img-5" class="img-col1">
                </div>
            </div>
        </div>
        <!-- last portofolio -->
    </div>

    <!-- fotter -->
    <div class="row footer">
        <div class="col text-center">
            <p>2019 All Right Reserved by Me.</p>
        </div>
    </div>
    <!-- last fotter -->
    <?php if (isset($data['modal'])) :
        foreach ($data['modal'] as $modal) {
            echo $modal;
        }
    endif ?>