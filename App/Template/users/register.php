<?php
require_once dirname(__FILE__).'/../home/header.php';
/** @var array $errors |null */
?>

<main>
    <h1>Register</h1>
        <?php foreach ($errors as $error): ?>
    <p class="message" style="color: darkred"><?= $error ?></p>
    <?php endforeach; ?>

    <form action="" method="post">
        <div>
            <label> Username:</label>
            <input type="text" name="username"/>
        </div>
        <div>
            <label> Email:</label>
            <input type="email" name="email"/>
        </div>
        <div>
            <label> Password:</label>
            <input type="password" name="password"/>
        </div>
        <div>
            <label> Re-Password:</label>
            <input type="password" name="confirm_password"/>
        </div>
        <div>
            <button type="submit" name="register">Register</button>
        </div>

    </form>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';