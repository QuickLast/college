<?php require_once('app/components/base.php'); ?>

<?php

if (!auth()) {
    redirect();
    die();
}

$user = getUserById(auth());

if(!isAdmin($user)) {
    redirect();
    die();
}

if (!isset($_GET['id'])) {
    redirect();
    die();
}

$article = getArticleById($_GET['id']);

if (!count($article)) 
{
    redirect();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('app/components/meta.php'); ?>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <?php include('app/components/header.php'); ?>

    <section style="padding-top: 120px;" class="admin-panel">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mb-4">
                  <?php include("app/components/alerts.php"); ?>
                </div>

                <div class="col-lg-12">
                    <h2 class="mb-2">Update the article</h2>

                    <form enctype="multipart/form-data" action="/app/actions/update_article.php" method="post">

                        <div class="box">
                            <img src="<?= $article['image_path']; ?>" alt="">
                        </div>

                        <style>
                            .box {
                                height: 400px;
                                margin: 24px auto;
                            }

                            .box img {
                                width: 100%;
                                height: 100%;
                                object-fit: contain;
                            }
                        </style>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input 
                            name="title" 
                            type="text" 
                            class="form-control" 
                            id="title"
                            value="<?=$article['title']?>">
                        </div>

                        <div class="form-group">
                            <label for="theme">Theme</label>
                            <input name="theme" type="text" class="form-control" id="theme" value="<?=$article['theme']?>">>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" id="content" rows="3"><?=$article['content'];?></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input name="photo" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary">
                                        Update the Article
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Behance</a></li>
              <li><a href="#">Linkedin</a></li>
              <li><a href="#">Dribbble</a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p>Copyright 2020 Stand Blog Co.
                    
                 | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/admin.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>