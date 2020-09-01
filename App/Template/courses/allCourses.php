<?php
require_once dirname(__FILE__) . '/../home/header.php';
/** @var \App\Data\FullCourseDTO[] $data */
/** @var array $errors |null */
?>

    <main>
    <div class="courses">
    <?php foreach ($data  as $course): ?>
        <div class="course">
            <h3><?=$course->getName(); ?></h3>
            <img src="<?=$course->getImage();?>"/>
        </div>
    <?php endforeach; ?>
    </div>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';