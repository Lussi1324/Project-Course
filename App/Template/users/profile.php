<?php
require_once dirname(__FILE__) . '/../home/header.php';
/** @var \App\Data\MyCourseTempDTO $data */

/** @var array $errors |null */

?>
<main>

  <div class="user-info">
      <div>
          <p>Username: <span><?=$data->getUser()->getUsername(); ?></span></p>
          <p>Email: <span><?=$data->getUser()->getEmail();?></span></p>

          <p>Created courses: <span> [<?= count($data->getCourses());?>]</span></p>

      </div>
      <div class="user-info"><div><p><span>My Courses</span></p></div></div>
      <div class="courses">
          <?php foreach ($data->getCourses() as $course):?>
              <div class="course">
                  <a href="details.php?id=<?=$course->getId();?>">
                  <h3><?=$course->getName();?></h3>
                  <img src="<?=$course->getImage()?>"/>
              </div>
          <?php endforeach; ?>
      </div>

  </div>
</main>
<?php require_once dirname(__FILE__).'/../home/footer.php';