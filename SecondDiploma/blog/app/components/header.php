    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>QuickLast<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog Entries</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="post-details.php">Post Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>

            <?php if (isAdmin(getUserByID(auth()))) : ?>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
            <?php endif; ?>
            <?php if(auth()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="signin.php">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.php">Sign Up</a>
              </li>
            <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
