<?php
require_once dirname(__FILE__) . '/../home/header.php';
/** @var \App\Data\EditCourseDTO $data */
/** @var array $errors |null */
?>
<main>
    <h1>Edit Course</h1>
    <?php foreach ($errors as $error): ?>
        <p class="message" style="color: darkred"><?= $error ?></p>
    <?php endforeach; ?>

    <form action="" method="post">
        <div>
            <label> Name</label>
            <input type="text" name="name" value="<?=$data->getName();?>"/>
        </div>
        <div>
            <label> Image Url</label>
            <input type="text" name="image" value="<?=$data->getImage();?>"/>
        </div>
        <div>
            <label> Description</label>
            <textarea name="description"><?=$data->getDescription();?></textarea>
        </div>
        <div>
            <label> Technology</label>

            <select name="technology_id">
                <?php foreach ($data->getTechnologies() as $technology): ?>
                    <option <?= $technology->getId() == $data->getTechnologyId() ? 'selected' : ''?> value="<?=$technology->getId();?>"><?=$technology->getName();?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>

            <button type="submit" name="edit">Edit</button>
        </div>

    </form>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';