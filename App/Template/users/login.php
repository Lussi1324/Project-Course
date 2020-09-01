<?php
require_once dirname(__FILE__).'/../home/header.php';
/** @var array $errors  */ ?>
<?php /** @var \App\Data\UserDTO $data */ ?>



<main>
    <h1>Login</h1>
    <?php foreach ($errors as $error): ?>
        <p class="message" style="color: darkred"><?= $error ?></p>
    <?php endforeach; ?>

    <?php if($data != ""): ?>
        <p class="message" style="color: darkgreen">
            <?= $data?>, welcome to our platform!
        </p>
    <?php endif; ?>
    <form action="" method="post">
        <div>
            <label> Username:</label>
            <input type="text" name="username"/>
        </div>

        <div>
            <label> Password:</label>
            <input type="password" name="password"/>
        </div>

        <div>
            <button type="submit" name="login">Login</button>
        </div>

    </form>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';