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

$articles = getAllArticles();

// if (isset($_GET['q']))
// {
//   $articles = getAllArticles($_GET['q']);
// }

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
                    <h2 class="mb-2">Articles</h2>
                    <div class="row mb-2 d-flex justify-content-between">
                        <a class="btn btn-primary" href="/blog/app/actions/create_article.php?id=<?= $article['id'] ?>">Create new article</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($articles as $article) : ?>
                                <tr>
                                    <th scope="row"><?= $article['id']?></th>
                                    <td><?= $article['title']?></td>
                                    <td><?= $article['username']?></td>
                                    <td><?=formatDate($article['updated_at'])?></td>
                                    <td><?=formatDate($article['created_at'])?></td>
                                    <td>
                                        <div class='table-action'>
                                          <button class="btn btn-success w-100 mb-2">Show action</button>

                                          <ul class="d-none flex-column">
                                            <li class="mb-2">
                                              <a class="btn btn-warning w-100" href="/blog/app/actions/update_article.php?id=<?= $article['id'] ?>">Edit</a>
                                            </li>
                                            <li>
                                              <a class="btn btn-danger w-100" href="/blog/app/actions/remove_article.php?id=<?= $article['id'] ?>">Delete</a>
                                            </li>
                                          </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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