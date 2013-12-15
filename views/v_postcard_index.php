<!-- The postcard_index view is for listing out your created postcards and link to the postcard add page -->

<?php foreach($posts as $post): ?>

    <article>

        <h1><?=$post['first_name']?> <?=$post['last_name']?> posted:</h1>

        <p><?=$post['content']?></p>

        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
            <?=Time::display($post['created'])?>
        </time>

    </article>

<?php endforeach; ?>
