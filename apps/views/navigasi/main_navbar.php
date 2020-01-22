  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
          <a class="navbar-brand" href="#">Jobbook</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav ml-auto">
                  <li>
                      <a class="nav-item nav-link" href="<?= BASEURL ?>jobs">Browse Job</a>
                  </li>
                  <li id="drop">
                      <?php if (!isset($_SESSION['user_data'])) : ?>
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
                      <?php endif ?>
                  </li>
                  <li>
                      <a class="nav-item btn btn-warning btn-tombol" href="<?= BASEURL ?>jobs/buat">Post a Project</a>
                  </li>
                  <?php if (isset($_SESSION['user_data'])) : ?>
                      <li>
                          <div style="float:right; margin-left: 25%; margin-right:-230px;">
                              <!-- Code for profile image here -->
                              <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <div class="profile-image">
                                      <img style="border-radius: 50%; width:15%" src="https://www.dicoding.com/images/small/avatar/2019040917343047ff214c7a8d07ee3b5aea1f6451b1fd.jpg" alt="">
                                  </div>
                                  <div class="dropdown-menu row" id="dropdownMenu" aria-labelledby="navbarDropdownMenuLink">
                                      <ul class="nav">
                                          <li><a class="nav-link nav-item" href="<?= BASEURL ?>my/profile">Profile</a></li>
                                          <li><a class="nav-link nav-item" href="<?= BASEURL ?>auth_ws/logout">Logout</a></li>
                                      </ul>
                                  </div>
                              </a>
                          </div>
                      </li>
                  <?php endif ?>
              </ul>
          </div>
      </div>
  </nav>

  <!-- last navbar -->