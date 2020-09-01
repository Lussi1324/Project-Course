<?php
require_once dirname(__FILE__) . '/../home/header.php';
/** @var \App\Data\FullCourseDTO $data */
/** @var array $errors |null */
?>
<main>
    <div class="course-details">
        <h1><?=$data->getName(); ?></h1>
        <div class="info">
            <img src="<?=$data->getImage(); ?>" width="300" height="200"/>
            <div class="info description">
                <p ><?=$data->getDescription();?></p>
            </div>
        </div>
        <div class="actions">
            <button onclick="location.href='edit_course.php?id=<?=$data->getId();?>'">Edit</button>
            <button onclick="location.href='delete.php?id=<?=$data->getId();?>'">Delete</button>
        </div>
    </div>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';