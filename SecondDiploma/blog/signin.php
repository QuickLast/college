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

                        <form id="contact" action="app/actions/signin.php" method="POST">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="username" type="text" id="username" placeholder="Your username" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="password" type="password" id="password" placeholder="******">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Sign In</button>
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