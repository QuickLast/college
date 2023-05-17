<?php if(isset($_SESSION['alerts'])): ?>
    <ul class="alert alert-success">
        <?php foreach($_SESSION['alerts'] as $alert): ?>
            <li>
                <?= $alert; ?>
            </li>
        <?php endforeach; ?>

        <?php unset($_SESSION['alerts']); ?>
    </ul>
<?php endif; ?>