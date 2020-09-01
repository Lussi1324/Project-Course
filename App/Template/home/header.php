<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="public/style.css">
</head>

<header>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
        </ul>
        <ul>
            <?php if(!empty($_SESSION['username'])): ?>

            <li>
                <a href="create_course.php">Create New Course</a>
            <li>
            <li>
                <a href="courses.php">Courses</a>
            <li>
            <li>
                <a href="profile.php">[ <?php echo $_SESSION['username'];?> ]</a>
            <li>
            <li>
                <a href="logout.php">Logout</a>
            <li>
            <?php else : ?>
            <li>
                <a href="login.php">Login</a>
            <li>
            <li>
                <a href="register.php">Register</a>
            <li>

            <?php endif;?>
        </ul>
    </nav>
</header>

