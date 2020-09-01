<?php
require_once dirname(__FILE__) . '/../home/header.php';
/** @var array $errors |null */
 /** @var \App\Data\TechnologyDTO[] $data */
?>

<main>
    <h1>Create Course</h1>
    <?php foreach ($errors as $error): ?>
        <p class="message" style="color: darkred"><?= $error ?></p>
    <?php endforeach; ?>

    <form action="" method="post">
        <div>
            <label> Name</label>
            <input type="text" name="name"/>
        </div>
        <div>
            <label> Image Url</label>
            <input type="text" name="image"/>
        </div>
        <div>
            <label> Description</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label> Technology</label>

            <select name="technology_id">
                <?php foreach ($data as $technology): ?>
                    <option value="<?=$technology->getId();?>"><?=$technology->getName();?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit" name="add">Create</button>
        </div>

    </form>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';