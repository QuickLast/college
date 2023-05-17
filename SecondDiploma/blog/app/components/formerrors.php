<?php if(isset($_SESSION['errors'])): ?>
    <ul class="alert alert-danger">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <li>
                <?= $error; ?>
            </li>
        <?php endforeach; ?>

        <?php unset($_SESSION['errors']); ?>
    </ul>
<?php endif; ?>