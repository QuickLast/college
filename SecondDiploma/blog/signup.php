<?php require_once('app/components/base.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('app/components/Meta.php'); ?>

<body>
    <?php include('app/components/Header.php'); ?>

    <div class="heading-page"></div>

    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">

                        <?php include("app/components/formerrors.php"); ?>

                        <form enctype="multipart/form-data" id="contact" action="app/actions/signup.php" method="POST">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="username" type="text" id="username" placeholder="Your username" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" id="email" placeholder="Your email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="password" type="password" id="password" placeholder="******">
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="re_password" type="password" id="re_password" placeholder="******">
                                    </fieldset>
                                </div>


                                <!-- Загрузка картинки -->
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Image</span>
                                            </div>
                                            <div class="custom-file">
                                                <input name="photo" type="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file (*.png, *.jpeg, *.jpg)</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Sign Up</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>