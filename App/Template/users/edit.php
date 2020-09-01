<?php
require_once dirname(__FILE__).'/../home/header.php';
/** @var \App\Data\UserDTO $data */
/** @var array $errors |null */
?>

    <main>
        <h1>Edit Profile</h1>
        <?php foreach ($errors as $error): ?>
            <p class="message" style="color: darkred"><?= $error ?></p>
        <?php endforeach; ?>

        <form action="" method="post">
            <div>
                <label> Username:</label>
                <input type="text" name="username" value="<?=$data->getUsername();?>"/>
            </div>
            <div>
                <label> Email:</label>
                <input type="email" name="email" value="<?=$data->getEmail();?>"/>
            </div>
            <div>
                <label>Old Password:</label>
                <input type="password" name="oldpassword"/>
            </div>
            <div>
                <label>New Password:</label>
                <input type="password" name="password"/>
            </div>
            <div>
                <label> Re-Password:</label>
                <input type="password" name="confirm_password"/>
            </div>
            <div>
                <button type="submit" name="edit">Edit Profile</button>
            </div>

        </form>
    </main>

<?php require_once dirname(__FILE__).'/../home/footer.php';