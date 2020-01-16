    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Freelancer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a class="nav-item nav-link" href="#">How It Works<span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a class="nav-item nav-link" href="#">Browse Job</a>
                    </li>
                    <li id="drop">
                        <a class="nav-item nav-link" href=" #" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log In</a>
                        <div class="dropdown-menu row" id="dropdownMenu" aria-labelledby="navbarDropdownMenuLink">
                            <form action="<?= BASEURL ?>auth_ws/login" method="POST" id="login" class="col-md">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User</label>
                                    <input required type="text" name="user" placeholder="Username atau email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary ">Submit</button>
                                <small> atau register <a href="<?= BASEURL ?>user/register">disini</a></small>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a class="nav-item btn btn-warning btn-tombol" href="#">Post a Project</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- last navbar -->

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
            <a class="nav-item btn btn-warning btn-tombol" href="#">I want to Work</a>
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