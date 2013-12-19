<!-- The postcard_photo view is for listing out your uploaded photos and to upload more -->

<?php //foreach($posts as $post): ?>

    <article>

        <h1><?=$post['first_name']?> <?=$post['last_name']?> posted:</h1>

        <p><?=$post['content']?></p>

        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
            <?=Time::display($post['created'])?>
        </time>

    </article>

<?php //endforeach; ?>
